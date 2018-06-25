<?php
/**
 * Created by PhpStorm.
 * User: vern
 * Date: 24.06.18
 * Time: 12:59
 */

namespace Tests\Unit;

use Fvhockney\LatexCompiler\LatexCompiler;
use Tests\TestCase;

class ViewTest extends TestCase
{

    protected $latexCompiler;

    protected function setUp()
    {
        parent::setup();
        $this->latexCompiler = new LatexCompiler();
        $this->latexCompiler->compile('test');
    }

    public function testInSetsView()
    {
        $view = 'latex.testview';
        $this->latexCompiler->in($view);
        $this->assertAttributeEquals($view, 'view', $this->latexCompiler);
    }
}
