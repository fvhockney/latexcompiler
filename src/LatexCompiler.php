<?php
/**
 * This file contains the functions used to generate the LaTeX document
 * on the server and return the output to the Controler
 *
 * @package fvhockney/latexcompiler
 * @license MIT
 * @author  Fred Hockney <fvhockney@gmail.com>
 */

namespace Fvhockney\LatexCompiler;

use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

Class LatexCompiler
{
    /**
     * File name without extension
     * @var string
     */
    public $fileName;
    public $fileNamePdf;
    public $template;
    public $storageUrl;

    protected $data;
    protected $runs;
    protected $view;
    protected $tempPath;
    protected $tempDir;
    public $fullTempPath;
    protected $pdfPath;

    function __construct()
    {
        $this->runs = config("fvlatex.runs_default");
        $this->tempPath = config("fvlatex.temp_path");
        $this->tempDir = uniqid("tex") . "/";
        $this->fullTempPath = $this->tempPath . $this->tempDir;
        $this->pdfPath = config("fvlatex.pdf_path");
    }

    public function compile( string $fileName )
    {
        $this->fileName = $fileName;
        $this->fileNamePdf = $this->fileName . ".pdf";

        return $this;
    }

    public function with( $data )
    {
        $this->data = $data;

        return $this;
    }

    public function runs( int $runs )
    {
        $this->runs = $runs;

        return $this;
    }

    public function in( string $view )
    {
        $this->view = $view;

        return $this;
    }


    /**
     * Delete PDF file
     *
     * Can be called anywhere to delete the PDF function generated
     * from the class.
     * @access public
     */
    public function deletePdf()
    {
        Storage::delete($this->pdfPath . $this->fileNamePdf);

        return true;
    }

    /**
     * Set Storage Path
     *
     * Called after the class is initialized to overide the default storage path
     *
     * @param string $storagePath overrides default storage path
     *
     * @return string
     * @access public
     */
    public function storagePath( string $storagePath )
    {
        $this->pdfPath = $storagePath;

        return $this;
    }

    public function run()
    {
        $this->makeTempDir();
        $this->fillTemplate();
        $this->writeToFile();
        $this->compileTex();
        $this->handlePDF();
        $this->tearDownTemp();

        $this->storageUrl = Storage::url($this->pdfPath . $this->fileNamePdf);
        return $this;
    }

    /**
     * Fills in the template
     *
     * @return string Compiled template
     * @access public
     */
    public function fillTemplate()
    {
        $this->template = view($this->view)->with('data', $this->data)->render();

        return $this->template;
    }

    /**
     * Writes filled in template to file
     *
     * @param string $template generated template
     *
     * @access protected
     */
    protected function writeToFile()
    {
        Storage::put($this->fullTempPath . $this->fileName . ".tex", $this->template);
    }

    /**
     * Sends to terminal to compile in tex
     *
     * Sets the absolute file position on the disk and attempts to run pdf latex after cding into
     * the directory. If the exit code is anything other than 0, it logs the error in the latex.log,
     * tears down the temp directory, and throws a new exception which can be caught if desired.
     *
     * @param string $fileName file name without extension
     * @param int    $runs     Optional number of times to run pdflatex, default 2, set in construct
     *
     * @throws \Exception indicates failure to finish compiling in the shell.
     * @access protected
     */
    protected function compileTex()
    {
        $fileLoc = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix() . $this->fullTempPath;
        $latexPath = config("fvlatex.latex_path") . "/pdflatex";
        $run = 0;
        while ( $run < $this->runs ) {
            exec("cd {$fileLoc}; {$latexPath} --interaction=nonstopmode  {$this->fileName}", $output, $code);
            if ( $code !== 0 ) {
                Log::channel('latexlog')->error(implode("\n", $output) . "\nExit Code: $code");
                $this->tearDownTemp();
                throw new \Exception("Error running shell command. Error has been logged. Exit code: $code");
            }
            $run++;
        }
    }

    /**
     * Check for existing PDF and move from temp
     *
     * Checks the PDF path to see if there is already a PDF with the
     * same name. If there is, it deletes the PDF in the path and
     * then moves the new PDF there. If not, then it moves the PDF.
     *
     * @param string $fileName filename with pdf extension created in __construct
     *
     * @access protected
     */
    protected function handlePDF()
    {
        Storage::disk('local')->exists($this->pdfPath . $this->fileNamePdf) ? Storage::delete($this->pdfPath . $this->fileNamePdf) : null;
        Storage::move($this->fullTempPath . $this->fileNamePdf, $this->pdfPath . $this->fileNamePdf);
    }

    /**
     * Tearsdown temp folder
     *
     * Deletes temp directory
     * @access protected
     */
    protected function tearDownTemp()
    {
        Storage::deleteDirectory($this->fullTempPath);
    }

    protected function makeTempDir()
    {
        Storage::makeDirectory($this->fullTempPath);
    }

}
