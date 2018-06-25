<?php
/**
 * Created by PhpStorm.
 * User: vern
 * Date: 24.06.18
 * Time: 12:46
 */

namespace Tests\Unit;

use Fvhockney\LatexCompiler\LatexCompiler;
use Tests\TestCase;

class CompileTest extends TestCase
{
    protected $latexCompiler;

    protected function setUp()
    {
        parent::setup();
        $this->latexCompiler = new LatexCompiler();
    }

    public function testCompileHasFileName()
    {
        $fileName = 'fizbang';
        $this->latexCompiler->compile($fileName);
        $result = $this->latexCompiler->fileName;
        $this->assertEquals($fileName, $result);
    }
}
