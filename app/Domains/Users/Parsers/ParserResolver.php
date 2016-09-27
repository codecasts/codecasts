<?php

namespace Codecasts\Domains\Users\Parsers;

/**
 * Class ParserResolver.
 *
 * Resolves which parsed should be used from configuration binding.
 */
class ParserResolver
{
    /**
     * @var array Available parsers aliases
     */
    protected $aliases = [];

    /**
     * @var string Current required parsed alias
     */
    protected $driverAlias;

    /**
     * @var \SocialNorm\User The current user profile instance
     */
    protected $details;

    public function __construct($driverAlias, $details)
    {
        $this->aliases = config('social.parsers');
        $this->driverAlias = $driverAlias;
        $this->details = $details;
    }

    /**
     * @return AbstractSocialParser
     */
    public function resolve()
    {
        $parserClass = $this->aliases[$this->driverAlias];

        $parser = new $parserClass($this->details);

        return $parser;
    }
}
