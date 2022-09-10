<?php

namespace App\Domains;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DemoController extends Controller
{
    public function demo($demopage = 'index')
    {
        return view('admin.' . $demopage)->with(['page' => $demopage]);
    }
}
