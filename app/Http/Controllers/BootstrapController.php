<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BootstrapController extends Controller
{
    public function index()
    {
        return view('view-bootstrap');
    }
}
