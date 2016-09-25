<?php

namespace Codecasts\Domains\Users\Contracts;

use SocialNorm\User;

/**
 * Interface SocialParser.
 *
 * Interface for social profile parsers.
 */
interface SocialParser
{
    /**
     * SocialParser constructor.
     *
     * @param User $user Should receive an user
     */
    public function __construct(User $user);

    /**
     * @return string User profile id
     */
    public function getId();

    /**
     * @return string User name
     */
    public function getName();

    /**
     * @return mixed User username (handle)
     */
    public function getUsername();

    /**
     * @return mixed Avatar URL
     */
    public function getAvatar();

    /**
     * @return mixed User email
     */
    public function getEmail();
}
