<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 04.04.2021
 * Time: 0:27
 */

namespace App\Http\Controllers;


class NewsController extends Controller
{
public function index(){
    echo "this is main news page";
    exit;
}
public function card($id){
    echo "this is news card {$id}";
    exit;
}
public function category($category){
    echo "this is category {$category}";
    exit;
}
public function categoryNews($category){
    echo "this is news from category {$category}";
    exit;
}
}