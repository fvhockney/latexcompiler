<?php
/**
 * Created by PhpStorm.
 * User: vern
 * Date: 21.06.18
 * Time: 13:40
 */

namespace Tests\Unit;

use Tests\TestCase;
use Fvhockney\LatexCompiler\LatexCompiler;

class DeleteTest extends TestCase
{

    protected $latexCompiler;

    protected function setUp()
    {
        parent::setup();
        $this->latexCompiler = new LatexCompiler();
        $this->latexCompiler->compile('test');
    }

    public function testDeletePdf()
    {
        $result = $this->latexCompiler->deletePdf();
        $this->assertTrue($result);
    }

}
