<?php
/**
 * Created by PhpStorm.
 * User: vern
 * Date: 24.06.18
 * Time: 12:37
 */

namespace Tests\Unit;

use Fvhockney\LatexCompiler\LatexCompiler;
use Tests\TestCase;

class RunsTest extends TestCase
{
    protected $latexCompiler;

    protected function setUp()
    {
        parent::setup();
        $this->latexCompiler = new LatexCompiler();
        $this->latexCompiler->compile('test');
    }

    public function testRunsHasConfigRuns()
    {
        $this->assertAttributeEquals(config('fvlatex.runs_default'),'runs',$this->latexCompiler);
    }

    public function testRunsIsOverwritten()
    {
        $runs = 4;
        $this->latexCompiler->runs($runs);
        $this->assertAttributeEquals($runs, 'runs', $this->latexCompiler);
    }
}
