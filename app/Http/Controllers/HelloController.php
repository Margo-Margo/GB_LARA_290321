<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 04.04.2021
 * Time: 0:27
 */

namespace App\Http\Controllers;


class HelloController extends Controller
{
public function index(){
    echo "Hi all!";
    exit;
}

}