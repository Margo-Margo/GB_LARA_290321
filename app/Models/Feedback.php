<?php


namespace App\Models;


class Feedback
{
    private $feed = [
        1 => [
            'id' => 1,
            'title' => 'отзыв 1',
            'content' => 'текст 1 отзыва',

        ],
        2 => [
            'id' => 2,
            'title' => 'отзыв 2',
            'content' => 'текст 2 отзыва',

        ],
        3 => [
            'id' => 3,
            'title' => 'отзыв 3',
            'content' => 'текст 3 отзыва',

        ],
        4 => [
            'id' => 4,
            'title' => 'отзыв 4',
            'content' => 'текст 4 отзыва',

        ],
        5 => [
            'id' => 5,
            'title' => 'отзыв 5',
            'content' => 'текст 5 отзыва',

        ]
    ];




    public function getById(int $id)
    {
        $feed = [];
        foreach ($this->feed as $new => $item) {
            if($item['id'] == $id) {
                $feed[$new] = $item;
            }
        }
        return $feed;
    }
}
