<?php


namespace App\Http\Controllers;


use App\Models\News;


class NewsController extends Controller
{
    private $categories = [
        1 => 'Здоровье',
        2 => 'ИТ',
        3 => 'Спорт'
    ];

    public function index()
    {
       // $result = News::all();

        return view('news.index', ['categories' => $this->categories]);
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

    public function create()
    {
        return response(view('admin.news.create'));
    }

    public function save()
    {
        $news =[
            'title'=>$_GET('news[title]'),
            'description'=>$_GET('news[description]'),
            'source'=>$_GET('news[source]'),
            'publish_date'=>$_GET('news[publish_date]'),
            'category_id'=>$_GET('news[category_id]'),
            'created_at'=>date('Y-m-d'),
            'updated_at'=>date('Y-m-d'),
            'deleted_at'=>date('Y-m-d'),
        ];


        $model = new News();
        $model->fill($news);
        $model->save();

       return redirect()->route('news::create');
    }
}
