<?php

namespace Codecasts\Domains\Users;

use Carbon\Carbon;
use Codecasts\Domains\Suggestions\Suggestion;
use Codecasts\Domains\Users\Contracts\SocialParser;
use Codecasts\Domains\Users\Presenters\UserPresenter;
use Codecasts\Support\Subscription\SubscriptionTrait;
use Codecasts\Support\ViewPresenter\Presentable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /*
     * Enable Subscriptions, Presenter and Notifications for model
     */
    use SubscriptionTrait, Presentable, Notifiable;

    /**
     * @var string Database table
     */
    protected $table = 'users';

    /**
     * @var string Model presenter class name
     */
    protected $presenter = UserPresenter::class;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'avatar',
        'url',
        'location',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Gets the user avatar url.
     *
     * @todo Refactor to another service
     *
     * @param int $size
     *
     * @return string
     */
    public function getAvatarUrl($size = 30)
    {
        $size_query = '?s=' . $size;

        if (!isset($this->avatar)) {
            return '//www.gravatar.com/avatar/' . md5($this->email) . $size_query . '&d=identicon';
        }

        if (str_contains($this->avatar, '?')) {
            $size_query = '&s=' . $size;
        }

        return $this->avatar . $size_query;
    }

    /**
     * Is the user admin?
     *
     * @return bool
     */
    public function isAdmin()
    {
        return (bool) $this->admin;
    }

    /**
     * Suggestions relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function suggestions()
    {
        return $this->hasMany(Suggestion::class, 'user_id');
    }

    /**
     * Relationship for Votes on Suggestions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function suggestionsVotes()
    {
        return $this->belongsToMany(Suggestion::class, 'suggestions_votes', 'user_id', 'suggestion_id');
    }

    /**
     * Check username availability.
     *
     * @todo refator to another service
     *
     * @param $username
     *
     * @return bool
     */
    public static function usernameAvailable($username)
    {
        $user = self::where('username', $username)->first();

        if ($user) {
            return false;
        }

        return true;
    }

    /**
     * Fill social data into users model.
     *
     * @todo move to repository
     *
     * @param SocialParser $parser
     */
    public function fillSocialData(SocialParser $parser)
    {
        if (!$this->exists) {
            $this->name = $parser->getName();
            $this->username = $parser->getUsername();
            $this->email = $parser->getEmail();
        }

        $this->avatar = $parser->getAvatar();
    }

    /**
     * @todo move this method to users's presenter
     *
     * @return string
     */
    public function presentGuestUntil()
    {
        $dt = Carbon::createFromFormat('Y-m-d', $this->guest_until);

        return $dt->format('d/m/Y');
    }
}
