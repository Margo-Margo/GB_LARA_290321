<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    public function index()
    {
        $xml = \XmlParser::load('https://tsvetusajadacha.webnode.cz/rss/sad-ogorod.xml');
        $data = $xml->parse([
            'channel_title' => ['uses' => 'channel.title'],
            'items' => ['uses' => 'channel.item[title,description,pubDate]']
        ]);

        return ($data);
    }

    public function create()
    {
        $data= $this->index();
        $parceNews = [];
        foreach ($data['items'] as $item) {
            $model = new News();
            $model->title = $item['title'];
            $model->description =  $item['description'];
            $model->source = '3';
            $model->category_id = '3';
            $model->publish_date = date_create($item['pubDate']);
            $parceNews = $model->push();

        }

       // return $parceNews;
        dd($parceNews);
    }

}