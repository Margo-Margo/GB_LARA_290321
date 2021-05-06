<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    public function index()
    {
        $xml = \XmlParser::load('https://tsvetusajadacha.webnode.cz/rss/samodjelki-dlja-dachi.xml');
        $data = $xml->parse([
            'channel_title' => ['uses' => 'channel.title'],
            'items' => ['uses' => 'channel.item[title,description,pubDate]']
        ]);
        dd($data);
    }
}