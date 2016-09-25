<?php

namespace Codecasts\Domains\Users\Parsers;

use Codecasts\Domains\Users\User;

class GithubParser extends AbstractSocialParser
{
    /**
     * Github returns a handle, but it maybe already defined.
     *
     * @return string An available handle
     */
    public function getUsername()
    {
        $username = $this->user->nickname;

        if ($username && User::usernameAvailable($username)) {
            return $username;
        } elseif ($username && !User::usernameAvailable($username)) {
            return $username.$this->getId();
        } else {
            return 'user'.$this->getId();
        }
    }

    /**
     * A Github profile can have no name, so it will be the
     * username (handle) case undefined.
     *
     * @return string User name
     */
    public function getName()
    {
        if (!$this->user->full_name) {
            return $this->user->nickname;
        }

        return $this->user->full_name;
    }
}
