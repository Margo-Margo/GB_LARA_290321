<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminNewsSaveRequest;
use App\Http\Requests\AdminCategorySaveRequest;
use App\Models\Category;
use App\Models\News;
use App\Models\Source;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class NewsController extends Controller
{


    public function index()
    {
        $news = News::query()
            ->orderBy('updated_at', 'desc')
            ->paginate(8);
        return view('admin.news.index', ['news' => $news]);
    }

    public function create()
    {

        return view("admin.news.create", [
                'model' => new News(),
                'categories' => $this->getCategoriesList(),
                'sources' => $this->getSourcesList()
            ]
        );
    }

    public function update($id)
    {
        return view("admin.news.create", [
                'model' => News::find($id),
                'categories' => $this->getCategoriesList(),
                'sources' => $this->getSourcesList()
            ]
        );
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function save(AdminNewsSaveRequest $request)
    {
        $id = $request->post('id');
        /** @var News $model */
        $model = $id ? News::find($id) : new News();
        $model->fill($request->all());
        $model->save();
        return redirect()->route("admin::news::update", ['id' => $model->id])
            ->with('success', "Данные сохранены");
    }

    public function delete($id)
    {
        News::destroy([$id]);
        return redirect()->route("admin::news::index");
    }

    protected function getCategoriesList()
    {
        return Category::query()
            ->select(['id', 'name'])
            ->get()
            ->pluck('name', 'id');
    }

    protected function getSourcesList()
    {
        return Source::query()
            ->select(['id', 'source'])
            ->get()
            ->pluck('source', 'id');
    }
/** Категории */
    public function indexCategory()
    {
        $categories = Category::query()
            ->orderBy('updated_at', 'desc')
            ->paginate(8);
        return view('admin.news.indexCategory', ['categories' => $categories]);
    }

    public function createCategory()
    {
        return view("admin.news.createCategory", [
                'model' => new Category()]
        );
    }

    public function saveCategory(AdminCategorySaveRequest $request)
    {
        $id = $request->post('id');
        /** @var News $model */
        $model = $id ? Category::find($id) : new Category();
        $model->fill($request->all());
        $model->save();
        return redirect()->route("admin::news::updateCategory", ['id' => $model->id])
            ->with('success', "Данные сохранены");
    }

    public function updateCategory($id)
    {
        return view("admin.news.createCategory", [
                'model' => Category::find($id)]
        );
    }
    public function deleteCategory($id)
    {
        Category::destroy([$id]);
        return redirect()->route("admin::news::index");
    }

}