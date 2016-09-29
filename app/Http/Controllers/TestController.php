<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use SnappyPDF;

class TestController extends Controller
{
    public function index()
    {
      $pdf = SnappyPDF::loadHTML('<h1>Asu</h1>');
return $pdf->inline();
    }
}
