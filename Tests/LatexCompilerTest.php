<?php
/**
 * Created by PhpStorm.
 * User: vern
 * Date: 21.06.18
 * Time: 13:40
 */

namespace Tests;

use Fvhockney\LatexCompiler\LatexCompiler;

class LatexCompilerTest extends TestCase
{

    private $latexCompiler;

    protected function setUp()
    {
        parent::setup();
        $data = array();
        $view = 'tex.blade.php';
        $fileName = 'file';
        $runs = 2;
        $this->latexCompiler = new LatexCompiler($data, $view, $fileName, $runs);
    }

    public function testDeletePdf()
    {
        $result = $this->latexCompiler->deletePdf();
        $this->assertTrue($result);
    }

    public function testStoragePathChangeFromConfig()
    {
        $newStoragePath = '/user/name';
        $result = $this->latexCompiler->storagePath($newStoragePath);
        $this->assertEquals($newStoragePath, $result);
    }

    public function testWriteToFile(){
        $this->invo
    }
}
