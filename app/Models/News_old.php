<?php


namespace App\Models;


class News_old
{
    private $news = [
        1 => [
            'id' => 1,
            'title' => 'news 1',
            'content' => 'news 1 content',
            'category_id' => 1
        ],
        2 => [
            'id' => 2,
            'title' => 'news 2',
            'content' => 'new2 content',
            'category_id' => 2
        ],
        3 => [
            'id' => 3,
            'title' => 'news 3',
            'content' => 'new3 content',
            'category_id' => 3
        ],
        4 => [
            'id' => 4,
            'title' => 'news 4',
            'content' => 'new4 content',
            'category_id' => 1
        ],
        5 => [
            'id' => 5,
            'title' => 'news 5',
            'content' => 'new5 content',
            'category_id' => 2
        ]
    ];


    public function getByCategoryId(int $categoryId)
    {
        $news = [];
        foreach ($this->news as $id => $item) {
            if($item['category_id'] == $categoryId) {
                $news[$id] = $item;
            }
        }
        return $news;
    }

    public function getById(int $id)
    {
        $news = [];
        foreach ($this->news as $new => $item) {
            if($item['id'] == $id) {
                $news[$new] = $item;
            }
        }
        return $news;
    }
}
