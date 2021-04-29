<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\News
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string|null $publish_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int $category_id
 * @property int $source
 * @method static \Illuminate\Database\Eloquent\Builder|News newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News query()
 * @method static \Illuminate\Database\Eloquent\Builder|News whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News wherePublishDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Category $category
 */
class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'source',
        'publish_date',
        'category_id',
    ];

    /**
     * @param int $categoryId
     * @return News[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */


    public function getByCategoryId(int $categoryId) {
        return static::query()
           // ->with(['category'])
            ->where('category_id', $categoryId)
            ->get();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getBySourceId(int $sourceId) {
        return static::query()
            ->where('source', $sourceId)
            ->get();
    }

    public function source()
    {
        return $this->belongsTo(Source::class);
    }



}

