<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Good;

class TestController extends Controller
{
    public function show()
    {
      return view('test');
    }
}
