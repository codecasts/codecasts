<?php

namespace Codecasts\Domains\Users\Parsers;

use Codecasts\Domains\Users\Contracts\SocialParser;
use Codecasts\Domains\Users\User;
use SocialNorm\User as SocialUser;

/**
 * Class AbstractSocialParser.
 *
 * Generic social parser for social networks.
 */
abstract class AbstractSocialParser implements SocialParser
{
    /**
     * @var SocialUser
     */
    protected $user = [];

    /**
     * FacebookParser constructor.
     *
     * @param SocialUser $user
     */
    public function __construct(SocialUser $user)
    {
        $this->user = $user;
    }

    /**
     * Raw data from social network response.
     *
     * @param $key
     */
    protected function getRawData($key)
    {
        if (array_key_exists($key, $this->user->raw())) {
            $raw = $this->user->raw();

            return $raw[$key];
        }
    }

    /**
     * @return string The Profile ID
     */
    public function getId()
    {
        return $this->user->id;
    }

    /**
     * @return string The profile name
     */
    public function getName()
    {
        return $this->user->full_name;
    }

    /**
     * @return string The profile Avatar URL
     */
    public function getAvatar()
    {
        return $this->user->avatar;
    }

    /**
     * @return string The profile email
     */
    public function getEmail()
    {
        return $this->user->email;
    }

    /**
     * Gets or generate a profile username (handle).
     *
     * @return string The profile username
     */
    public function getUsername()
    {
        $username = str_slug($this->getName(), '_');

        if ($username && User::usernameAvailable($username)) {
            return $username;
        } elseif ($username && !User::usernameAvailable($username)) {
            return $username.$this->getId();
        } else {
            return 'user'.$this->getId();
        }
    }
}
