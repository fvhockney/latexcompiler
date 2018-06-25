<?php

namespace Tests;

use Fvhockney\LatexCompiler\LatexCompilerServiceProvider;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\Config;
use \Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    protected $latexCompiler;

	protected function setUp(){
		parent::setUp();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    protected function getPackageProviders($app){
		return [LatexCompilerServiceProvider::class];
	}

	protected function getEnvironmentSetUp($app) {
        $app['config']->set('view.paths', [ __DIR__ . '/views' ]);
        $app['config']->set('fvlatex.latex_path', "/usr/local/texlive/2018/bin/x86_64-linux");
        $app['config']->set('fvlatex.runs_default', 2);
        $app['config']->set('fvlatex.temp_path', "temp/");
        $app['config']->set('fvlatex.pdf_path', "public/");
        $app['config']->set('fvlatex.log_path', "logs/latex.log");

    }
}
