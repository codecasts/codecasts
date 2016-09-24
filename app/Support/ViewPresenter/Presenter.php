<?php

namespace Codecasts\Support\ViewPresenter;

use Carbon\Carbon;
use Illuminate\Support\Str;

/**
 * Class Presenter.
 */
abstract class Presenter
{
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $entity;

    /**
     * @param $entity
     */
    public function __construct($entity)
    {
        $this->entity = $entity;
    }

    /**
     * Allow for property-style retrieval.
     *
     * @param $property
     *
     * @return mixed
     */
    public function __get($property)
    {
        if (method_exists($this, $property)) {
            return $this->{$property}();
        }

        return $this->entity->{$property};
    }

    /**
     * @param Carbon $date
     * @param string $fallback
     *
     * @return string
     */
    protected function formatDateTime($date, $fallback = null)
    {
        return (is_null($date)) ? $fallback : $date->toDateTimeString();
    }

    /**
     * @param Carbon $date
     * @param string $fallback
     * @param string $format
     *
     * @return string
     */
    protected function formatDate($date, $fallback = null, $format = 'd/m/Y')
    {
        return (is_null($date)) ? $fallback : $date->format($format);
    }

    /**
     * @param float  $number
     * @param string $symbol
     *
     * @return string
     */
    protected function moneyFormat($number, $symbol = 'R$')
    {
        return $symbol.number_format($number, 2, ',', '.');
    }

    /**
     * Limit a string into chars.
     *
     * @param string $string
     * @param string $limit
     * @param string $ending
     *
     * @return string
     */
    protected function strLimitChars($string, $limit, $ending = '...')
    {
        return empty($limit) ? $string : Str::limit($string, $limit, $ending);
    }

    /**
     * Limit a string into words.
     *
     * @param string $string
     * @param string $limit
     * @param string $ending
     *
     * @return string
     */
    protected function strLimitWords($string, $limit, $ending = '...')
    {
        return empty($limit) ? $string : Str::words($string, $limit, $ending);
    }
}
