<?php

namespace Codecasts\Domains\Users\Parsers;

class FacebookParser extends AbstractSocialParser
{
    /**
     * Facebook not always returns an Email address.
     *
     * @return string Facebook
     */
    public function getEmail()
    {
        if (!$this->user->email) {
            return 'cadastre@um.email';
        }

        return $this->user->email;
    }
}
