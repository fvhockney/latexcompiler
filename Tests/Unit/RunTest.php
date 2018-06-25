<?php
/**
 * Created by PhpStorm.
 * User: vern
 * Date: 25.06.18
 * Time: 09:51
 */

namespace Tests\Unit;

use Fvhockney\LatexCompiler\LatexCompiler;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class RunTest extends TestCase
{

    protected $latexCompiler;

    protected function setUp()
    {
        parent::setUp();
        $this->latexCompiler = new LatexCompiler();
    }

    protected function tearDown()
    {
        $this->latexCompiler->deletePdf();
        parent::tearDown();
    }

    public function testRun()
    {
        $this->latexCompiler->compile('test')->in('Test')->run();
        Storage::disk('public')->assertExists('test.pdf');
    }
}
