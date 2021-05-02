<?php


namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\News;
use Session;

class NewsController extends Controller
{


    public function index()
    {
        $result = Category::all();
        return view('news.index', ['categories' =>$result]);
    }

    public function list(News $news, $categoryId)
    {
        return view('news.list', ['news' => $news->getByCategoryId($categoryId)]);
    }

    public function card(News $news)
    {  //dd($news->id);
      return view('news.card', ['news'=>$news]);
       // $card = (new News_old())->getById($id);
       // return view('news.card', ['news' => $card]);
    }

    public function source(News $news, $sourceId)
    {
       // dd($sourceId);
        return view('news.source', ['news' => $news->getBySourceId($sourceId)]);
    }

}
