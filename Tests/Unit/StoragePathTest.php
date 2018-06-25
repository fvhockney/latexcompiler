<?php
/**
 * Created by PhpStorm.
 * User: vern
 * Date: 24.06.18
 * Time: 12:41
 */

namespace Tests\Unit;

use Fvhockney\LatexCompiler\LatexCompiler;
use Tests\TestCase;

class StoragePathTest extends TestCase
{
    protected $latexCompiler;

    protected function setUp()
    {
        parent::setup();
        $this->latexCompiler = new LatexCompiler();
        $this->latexCompiler->compile('test');
    }

    public function testStoragePathIsConfig()
    {
        $this->assertAttributeEquals(config('fvlatex.pdf_path'),'pdfPath',$this->latexCompiler);
    }

    public function testStoragePathChangeFromConfig()
    {
        $newStoragePath = '/user/name';
        $this->latexCompiler->storagePath($newStoragePath);
        $this->assertAttributeEquals($newStoragePath,'pdfPath',$this->latexCompiler);
    }
}
