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

    public $fileName;
    public $template;
    public $pdfUrl;

    protected $data;
    protected $pdfName;
    protected $runs;
    protected $view;
    protected $tempPath;
    protected $buildDir;
    protected $buildPath;
    protected $pdfPath;

    function __construct()
    {
        $this->runs = config("fvlatex.runs_default");
        $this->tempPath = config("fvlatex.temp_path");
        $this->buildDir = uniqid("tex") . "/";
        $this->buildPath = $this->tempPath . $this->buildDir;
        $this->pdfPath = config("fvlatex.pdf_path");
    }

    /**
     * Define the name of the file to be compiled without
     * file suffix
     *
     * @param string $fileName
     *
     * @return $this
     */
    public function compile( string $fileName )
    {
        $this->fileName = $fileName;
        $this->pdfName = $this->fileName . ".pdf";

        return $this;
    }

    /**
     * Set data to be passed to the view
     *
     * @param $data
     *
     * @return $this
     */
    public function with( $data )
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Override default runs
     *
     * @param int $runs
     *
     * @return $this
     */
    public function runs( int $runs )
    {
        $this->runs = $runs;

        return $this;
    }

    /**
     * Define view
     *
     * @param string $view
     *
     * @return $this
     */
    public function in( string $view )
    {
        $this->view = $view;

        return $this;
    }


    /**
     * Delete PDF file
     *
     * @return true
     */
    public function deletePdf()
    {
        Storage::delete($this->pdfPath . $this->pdfName);

        return true;
    }

    /**
     * Set Storage Path
     *
     * @param string $storagePath overrides default storage path
     *
     * @return string
     */
    public function storagePath( string $storagePath )
    {
        $this->pdfPath = $storagePath;

        return $this;
    }

    /**
     * Compiles the PDF and store the path to the file
     *
     * @return $this
     * @throws \Exception
     */
    public function run()
    {
        $this->makeTempDir();
        $this->fillTemplate();
        $this->writeToFile();
        $this->compileTex();
        $this->handlePDF();
        $this->tearDownTemp();

        $this->pdfUrl = Storage::url($this->pdfPath . $this->pdfName);
        return $this;
    }

    /**
     * Fills in the template
     *
     * @return string Compiled template
     * @throws \Throwable
     */
    public function fillTemplate()
    {
        $this->template = view($this->view)->with('data', $this->data)->render();

        return $this->template;
    }

    /**
     * Writes filled in template to file
     *
     */
    protected function writeToFile()
    {
        Storage::put($this->buildPath . $this->fileName . ".tex", $this->template);
    }

    /**
     * Sends to terminal to compile in tex
     *
     * Sets the absolute file position on the disk and attempts to run pdf latex after cding into
     * the directory. If the exit code is anything other than 0, it logs the error in the latex.log,
     * tears down the temp directory, and throws a new exception which can be caught if desired.
     *
     * @throws \Exception indicates failure to finish compiling in the shell.
     * @access protected
     */
    protected function compileTex()
    {
        $fileLoc = Storage::getDriver()->getAdapter()->getPathPrefix() . $this->buildPath;
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
     */
    protected function handlePDF()
    {
        Storage::exists($this->pdfPath . $this->pdfName) ? Storage::delete($this->pdfPath . $this->pdfName) : null;
        Storage::move($this->buildPath . $this->pdfName, $this->pdfPath . $this->pdfName);
    }

    /**
     * Deletes build directory
     */
    protected function tearDownTemp()
    {
        Storage::deleteDirectory($this->buildPath);
    }

    /**
     * Makes build directory
     */
    protected function makeTempDir()
    {
        Storage::makeDirectory($this->buildPath);
    }

}
