<?php


namespace App\Http\Controllers\Admin;

use App\Models\Admin\News;
use Illuminate\Support\Facades\View;

class AdminNewsController extends AdminController
{
    private $categories = [
        1 => 'Редактировать Здоровье',
        2 => 'Редактировать ИТ',
        3 => 'Редактировать Спорт'
    ];

    public function index()
    {
        return view('news.admin.index', ['categories' => $this->categories]);
    }

    public function list($categoryId)
    {
        $news = (new News())->getByCategoryId($categoryId);
        return view('news.admin.list', ['news' => $news]);
    }

    public function card($id)
    {
        $card = (new News())->getById($id);
        return view('news.admin.card', ['news' => $card]);
    }

    public function create()
    {
        return response(view('admin.news.create'));
    }

    public function save()
    {
        return redirect()->route('admin::news::create');
    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
