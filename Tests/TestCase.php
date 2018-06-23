<?php

namespace Tests;

use Fvhockney\LatexCompiler\LatexCompilerServiceProvider;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use \Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
	protected function setUp(){
		parent::setUp();
        Config::set('fvlatex.runs_default', 2);
        Config::set('fvlatex.temp_path', 'tmp/');
        Config::set('fvlatex.pdf_paht', 'public/');
        Storage::fake('local');
	}

	protected function getPackageProviders($app){
		return [LatexCompilerServiceProvider::class];
	}

}
