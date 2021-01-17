<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\News
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $active
 * @property string $source
 * @property string $publish_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|News newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News query()
 * @method static \Illuminate\Database\Eloquent\Builder|News whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News wherePublishDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class News extends Model
{
  

    protected $table = 'news';

    protected $fillable = [
        'id',
        'name',
        'description',
        'source',
        'publish_date',
        'category_id'
    ];
    public static function rules()
    {
        return [
            'name' => 'required|min:10|max:255|unique:news',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id|integer',
            'actual' => 'boolean',
            'publish_date' => 'date'
        ];
    }
   

    public function getByCategoryId(int $categoryId)
    {
        return static::query()
            ->where('category_id', $categoryId)
            ->get();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}