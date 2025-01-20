<?php

declare(strict_types=1);

namespace Domain\Source\Entities;

use Domain\Article\Entities\Article;
use Domain\Source\Factories\SourceFactory;
use Domain\Source\Observers\SourceObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

#[ObservedBy([SourceObserver::class])]
class Source extends Model
{
    use HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'api_key'
    ];
    
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
    
    protected static function newFactory()
    {
        return SourceFactory::new();
    }
}
