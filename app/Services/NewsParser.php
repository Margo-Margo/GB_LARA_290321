<?php


namespace App\Services;




class NewsParser
{
    public static function run(string $source)
    {
        $xml = \XmlParser::load($source);
        $data = $xml->parse([
            'channel_title' => ['uses' => 'channel.title'],
            'channel_description' => ['uses' => 'channel.description'],
            'items' => ['uses' => 'channel.item[title,description,pubDate]']
        ]);
        return $data;
    }

}