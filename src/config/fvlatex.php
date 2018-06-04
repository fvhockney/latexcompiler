<?php
/**
* Configuration file for fvhockney/latexcompiler
*
* @package fvhockney/latexcompiler
*/

return [

  /**
  * Full file path to latexpdf on your system. This
  * would normally be in your path but since the web service
  * runs the process, we need to provide the path.
  */
  "latex_path" => "/usr/local/texlive/2018/bin/x86_64-linux",

  /**
  * Default number of times you want pdflatex to run. This
  * value defaults to two and can be overridden when initiating
  * the class.
  */
  "runs_default" => 2,

  /**
  * Default temp folder where you want the class to create
  * the build folder and files. These build folders and files
  * are deleted after each compilation, but the temp folder
  * is not.
  */
  "temp_path" => "temp/",

  /**
  * Default path where you want the generated pdf files
  * to be moved to once they have been built successfully.
  * This value can be overridden by calling the @method storagePath()
  * on the class.
  */
  "pdf_path" => "public/",

  /**
  * Path where you want errors to be displayed. Errors created
  * when pdflatex runs in the shell will be logged here and not
  * in the normal logs. You receive the $output and $code from the
  * exec() command in the logs.
  */
  "log_path" => "logs/latex.log"

];
