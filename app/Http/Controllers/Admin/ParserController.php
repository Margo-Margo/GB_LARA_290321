<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NewsParsingJob;
use App\Models\News;
use App\Services\NewsParser;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    public function index()
    {
        $sources = [
            'https://news.yandex.ru/auto.rss',
            'https://news.yandex.ru/auto_racing.rss',
            'https://news.yandex.ru/gadgets.rss',
            'https://news.yandex.ru/index.rss',
            'https://news.yandex.ru/martial_arts.rss',
            'https://news.yandex.ru/communal.rss',
            'https://news.yandex.ru/health.rss',
            'https://news.yandex.ru/games.rss',
            'https://news.yandex.ru/internet.rss',
            'https://news.yandex.ru/cyber_sport.rss',
            'https://news.yandex.ru/movies.rss',
            'https://news.yandex.ru/cosmos.rss',
            'https://news.yandex.ru/culture.rss',
            'https://news.yandex.ru/championsleague.rss',
            'https://news.yandex.ru/music.rss',
            'https://news.yandex.ru/nhl.rss',
        ];

        foreach ($sources as $source) {
            NewsParsingJob::dispatch($source);
        }

    }

    public function create()
    {
       $data = NewsParser::run($this->source);

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