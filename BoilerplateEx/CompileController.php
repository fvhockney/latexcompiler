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
     * @param Request       $request form submitted request
     * @param LatexCompiler $compiler
     *
     * @return \Redirect
     */
    public function Compile( Request $request, LatexCompiler $compiler )
    {
        // Get only the input data to pass to the template
        $data = $request->input;

        // Set the template we want to use
        $view = "fvlatexcompiler::TexTemplates.TestTemplate";

        // Use the fluent interface to declare the file name, data, view and more
        $compiler->compile('Test')->with($data)->in($view)->run();

        // Save the path to the PDF to be sent to the user
        $pdf = $compiler->pdfUrl;

        // Add a success response to the Session with the location of
        // the pdf as the get() parameter.
        return \Redirect::back()->withSuccess($pdf);
    }


}
