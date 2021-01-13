<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Support\Facades\DB;

class DbController extends Controller
{
    public function index()
    {
        $model = News::find(4);
        dump($model->category->news);
    }
}