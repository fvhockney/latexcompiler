<?php
/**
* Test Controller
*
* Use this controller as a starting point to test out the functionality
* of the compiler
*
* @package fvhockney/latexcompiler
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Fvhockney\LatexCompiler\LatexCompiler;


class CompileController extends Controller
{
  /**
  * Handles POST request
  *
  * Takes the Request $request and handles the compilation
  * and return of the link back to the webuser
  *
  * @param class $request form submitted request
  * @return response
  */
  public function Compile(Request $request)
  {
    // Get only the input data to pass to the template
    $data = $request->input;

    // Set the template we want to use
    $view="fvlatexcompiler::TexTemplates.TestTemplate";

    // Initiate a new class and save it as a variable
    // and passing 'test' as the file name
    $template = new LatexCompiler($data,$view,'test');

    // Compile the template and save the location as a variable
    $pdf=$template->compile();

    // Add a success response to the Session with the location of
    // the pdf as the get() parameter.
    return \Redirect::back()->withSuccess($pdf);
  }




}
