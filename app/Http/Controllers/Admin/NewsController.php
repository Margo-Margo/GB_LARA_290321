<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        echo "index";
        exit;
    }

    public function create()
    {

        dd(route('admin::news::create'));
        echo "create";
        exit;
    }

    public function update()
    {

    }

    public function delete()
    {

    }

    public function show()
    {

    }
}
