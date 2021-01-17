<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminNewsSaveRequest;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::query()
            ->orderBy('updated_at', 'desc')
            ->paginate(10);
        return view('admin.news.index', ['news' => $news]);
    }

    public function create()
    {

        return view(
            "admin.news.create",
            [
                'model' => new News(),
                'categories' => $this->getCategoriesList()
            ]
        );
    }

    public function update($id)
    {
        return view(
            "admin.news.create",
            [
                'model' => News::find($id),
                'categories' => $this->getCategoriesList()
            ]
        );
    }

    public function save(AdminSRequest $request)
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
}
