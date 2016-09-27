<?php

namespace Codecasts\Domains\Suggestions;

use Codecasts\Domains\Users\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Suggestion extends Model
{
    use SoftDeletes;

    protected $table = 'suggestions';

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'visible',
        'accepted',
        'released',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function votes()
    {
        return $this->belongsToMany(User::class, 'suggestions_votes', 'suggestion_id', 'user_id')->orderBy(\DB::raw('count(suggestion_id)'));
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
