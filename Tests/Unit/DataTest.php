<?php
/**
 * Created by PhpStorm.
 * User: vern
 * Date: 24.06.18
 * Time: 12:39
 */

namespace Tests\Unit;

use Fvhockney\LatexCompiler\LatexCompiler;
use Tests\TestCase;

class DataTest extends TestCase
{
    protected $latexCompiler;

    protected function setUp()
    {
        parent::setup();
        $this->latexCompiler = new LatexCompiler();
        $this->latexCompiler->compile('test');
    }

    public function testWithHasData()
    {
        $data = array('');
        $this->latexCompiler->with($data);
        $this->assertAttributeEquals($data,'data',$this->latexCompiler);
    }
}
