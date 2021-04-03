<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 04.04.2021
 * Time: 0:27
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminNewsController extends Controller
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
        dd(route('admin::news::update'));
        echo "update";
        exit;
    }

    public function delete()
    {
        dd(route('admin::news::delete'));
        echo "delete";
        exit;
    }

    public function show()
    {
        dd(route('admin::news::show'));
        echo "show";
        exit;
    }
}