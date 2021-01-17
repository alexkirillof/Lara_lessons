<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
 

    public function news()
    {
        return $this->hasMany(News::class);
    }

    public function getCategories()
    {
        return  [
            1 => 'Main',
            2 => 'Politics',
            3 => 'Society',
            4 => 'Sport'
        ];
    }
}