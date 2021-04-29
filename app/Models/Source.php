<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Source
 *
 * @property int $id
 * @property string $title
 * @property string|null $source
 * @property string $user
 * @property string|null $publish_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Source newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Source newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Source query()
 * @method static \Illuminate\Database\Eloquent\Builder|Source whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Source whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Source whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Source wherePublishDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Source whereSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Source whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Source whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Source whereUser($value)
 * @mixin \Eloquent
 */
class Source extends Model
{
    use HasFactory;

    public function news()
    {
        return $this->hasMany(News::class);
    }

}
