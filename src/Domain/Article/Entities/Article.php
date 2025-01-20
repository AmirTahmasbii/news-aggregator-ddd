<?php

declare(strict_types=1);

namespace Domain\Article\Entities;

use Domain\Article\Factories\ArticleFactory;
use Domain\Article\Observers\ArticleObserver;
use Domain\Source\Entities\Source;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

#[ObservedBy([ArticleObserver::class])]
class Article extends Model
{
    use HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'content',
        'keywords',
        'category',
        'author',
        'source_id',
        'published_at'
    ];

    public function source()
    {
        return $this->belongsTo(Source::class);
    }

    public function scopePublishedBetween($query, ...$dates)
    {
        if (count($dates) === 2) {
            return $query->whereBetween('published_at', [$dates[0], $dates[1]]);
        }
    
        if (count($dates) === 1) {
            return $query->whereDate('published_at', '=', $dates[0]);
        }
    
        return $query;
    }
    
    protected static function newFactory()
    {
        return ArticleFactory::new();
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
        ];
    }
}
