<?php
/**
* Configuration for log channel
*
* This is added to the config.logging array of channels.
* @package fvhckney/latexcompiler
*/

return [
  'channels' => [
    'latexlog' => [
      'driver' => 'single',
      'path' => storage_path(config('fvlatex.log_path')),
    ],
  ]
];
