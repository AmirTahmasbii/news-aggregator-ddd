<?php

declare(strict_types=1);

namespace Domain\Preference\Entities;

use Domain\Preference\Factories\PreferenceFactory;
use Domain\Preference\Observers\PreferenceObserver;
use Domain\Source\Entities\Source;
use Domain\User\Entities\User;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

#[ObservedBy([PreferenceObserver::class])]
class Preference extends Model
{
    use HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'author',
        'category',
        'source_id',
        'user_id'
    ];

    public function source()
    {
        return $this->belongsTo(Source::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    protected static function newFactory()
    {
        return PreferenceFactory::new();
    }
}
