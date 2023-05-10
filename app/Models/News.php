<?php

namespace App\Models;

use App\Models\Category;
use App\Models\NewsSourcesData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'title',
        'description',
        'author',
        'status',
        'image',
        'created_at'
    ];
        /**
         * The roles that belong to the News
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
         */
        public function categories(): BelongsToMany
        {
            return $this->belongsToMany(Category::class, 'category_has_news', 'news_id', 'category_id');
        }

        /**
         * Get the sources that owns the News
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function sources(): BelongsTo
        {
            return $this->belongsTo(NewsSourcesData::class, 'news_sources_data_id');
        }

}
