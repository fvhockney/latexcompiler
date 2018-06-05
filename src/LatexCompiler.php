<?php
/**
* This file contains the functions used to generate the LaTeX document
* on the server and return the output to the Controler
*
* @package fvhockney/latexcompiler
* @license MIT
* @author Fred Hockney <fvhockney@gmail.com>
*/
namespace Fvhockney\LatexCompiler;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

Class LatexCompiler {
  /**
  * Data to be passed to $view
  * @var obj|aray
  */
  protected $data;

  /**
  * view to be rendered
  * @var string
  */
  protected $view;

  /**
  * File name without extension
  * @var string
  */
  protected $fileName;

  /**
  * Number of runs for pdflatex to run
  * @var int
  */
  protected $runs;

  function __construct($data,$view,$fileName,$runs=null){
    $this->data = $data;
    $this->view = $view;
    $this->fileName = $fileName;
    $this->fileNamePdf = $fileName.".pdf";
    $this->runs = is_null($runs) ? config("fvlatex.runs_default") : $runs;
    $this->tempPath = config("fvlatex.temp_path");
    $this->tempDir = uniqid("tex")."/";
    $this->fullTempPath = $this->tempPath.$this->tempDir;
    $this->pdfPath = config("fvlatex.pdf_path");
    Storage::makeDirectory($this->fullTempPath);
  }

  /**
  * Master Compile
  *
  * The master compilation function to generate a Latex Document from
  * the shell and return the file path to the user.
  *
  * @return string
  * @access public
  */
  public function compile()
  {
    $template = $this->fillTemplate($this->view);
    // dd($template);
    $this->writeToFile($this->fileName, $template);
    $this->compileTex($this->fileName, $this->runs);
    $this->handlePDF($this->fileNamePdf);
    $this->tearDownTemp();
    return Storage::url($this->pdfPath.$this->fileNamePdf);
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
    Storage::delete($this->pdfPath.$this->fileNamePdf);
  }

  /**
  * Set Storage Path
  *
  * Called after the class is initialized to overide the default storage path
  *
  * @param string $storagePath overrides default storage path
  * @return string
  * @access public
  */
  public function storagePath($storagePath)
  {
    return $this->pdfPath = $storagePath;
  }

  /**
  * Fills in the template
  *
  * @param string $view specific view to use when filling in
  * @return string Compiled template
  * @access protected
  */
  protected function fillTemplate($view)
  {
    return view($view)->with('data', $this->data)->render();
  }

  /**
  * Writes filled in template to file
  *
  * @param string $fileName file name without extension
  * @param string $template generated template
  * @access protected
  */
  protected function writeToFile($fileName, $template)
  {
    Storage::put($this->fullTempPath.$fileName.".tex", $template);
  }

  /**
  * Sends to terminal to compile in tex
  *
  * Sets the absolute file position on the disk and attempts to run pdf latex after cding into
  * the directory. If the exit code is anything other than 0, it logs the error in the latex.log,
  * tears down the temp directory, and throws a new exception which can be caught if desired.
  *
  * @param string $fileName file name without extension
  * @param int $runs Optional number of times to run pdflatex, default 2, set in construct
  * @throws \Exception indicates failure to finish compiling in the shell.
  * @access protected
  */
  protected function compileTex($fileName, $runs)
  {
    $fileLoc = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix().$this->fullTempPath;
    $latexPath = config("fvlatex.latex_path")."/pdflatex";
    $run = 0;
    while ($run < $runs){
        exec("cd {$fileLoc}; {$latexPath} --interaction=nonstopmode  {$fileName}", $output, $code);
        if($code!==0) {
          Log::channel('latexlog')->error(implode("\n", $output)."\nExit Code: $code");
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
  * @access protected
  */
  protected function handlePDF($fileName)
  {
    Storage::disk('local')->exists($this->pdfPath.$fileName) ? Storage::delete($this->pdfPath.$fileName) : null;
    Storage::move($this->fullTempPath.$fileName, $this->pdfPath.$fileName);
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
}
