<?php

namespace Fvhockney\LatexCompiler;

use Illuminate\Support\Facades\Facade;

class LatexCompilerFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Fvlatex';
    }
}
