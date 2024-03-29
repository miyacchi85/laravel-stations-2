<?php

namespace App\Http\Controllers;

class PracticeController extends Controller
{
  public function sample()
  {
    return response('practice');
  }

  public function sample2()
  {
    $test = 'practice2';
    return response($test);
  }

  public function sample3()
  {
    $test2 = 'test';
    return response($test2);
  }
}