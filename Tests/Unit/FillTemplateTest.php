<?php
/**
 * Created by PhpStorm.
 * User: vern
 * Date: 24.06.18
 * Time: 20:58
 */

namespace Tests\Unit;

use Fvhockney\LatexCompiler\LatexCompiler;
use View;
use Tests\TestCase;

class FillTemplateTest extends TestCase
{
    protected $latexCompiler;

    protected function setUp()
    {
        parent::setUp();
        $this->latexCompiler = new LatexCompiler();
    }

    public function testFillTemplate()
    {
        $this->latexCompiler->compile('test')->in('Test')->fillTemplate();
        $this->assertNotNull($this->latexCompiler->template);
        $this->assertContains('Test', $this->latexCompiler->template);
    }
}
