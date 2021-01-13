<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{

    private $categories = [
        1 => 'Main',
        2 => 'Politics',
        3 => 'Society',
        4 => 'Sport'
    ];

    public function index()
    {

        return view(
            'news.index',
            [
                'categories' => $this->categories,
            ]);
    }

    public function list($categoryId)
    {
       
        $news = (new News())->getByCategoryId($categoryId);

        return view(
            'news.list',
            [
                'news' => $news
            ]);
    }

    public function newsCard($id)
    {
        $news = News::find($id);
        return view(
            'news.card',
            [
                'news' => $news
            ]
        );
    }


}