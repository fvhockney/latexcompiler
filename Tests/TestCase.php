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
        Storage::fake('local');

    }

	protected function getPackageProviders($app){
		return [LatexCompilerServiceProvider::class];
	}

	protected function getEnvironmentSetUp($app) {
        $app['config']->set('view.paths', [ __DIR__ . '/views' ]);
	}

}
