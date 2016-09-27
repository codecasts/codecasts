<?php

namespace Codecasts\Support\Helpers;

use Carbon\Carbon;

/**
 * Class TimeHelper.
 *
 * Helps calculating time into human readable formats.
 */
class TimeHelper
{
    /**
     * @var int Time in seconds
     */
    protected $seconds;

    /**
     * TimeHelper constructor.
     *
     * @param int $seconds
     */
    public function __construct($seconds)
    {
        $this->seconds = $seconds;
    }

    /**
     * @return string The human readable time from seconds
     */
    public function humanTime()
    {
        $zero = new Carbon();
        $diff = (new Carbon($zero))->addSeconds($this->seconds)->diff($zero);

        $units = [
            'y' => 'A', 'm' => 'M', 'd' => 'D',
            'h' => 'h', 'i' => 'm', 's' => 's',
        ];

        $formatted = '';
        foreach ($units as $key => $label) {
            if ($diff->$key) {
                $formatted .= " {$diff->$key}{$label}";
            }
        }

        return trim($formatted);
    }

    /**
     * From seconds to Hours.
     *
     * @return string
     */
    public function toHours()
    {
        $hours = floor($this->seconds / 3600);

        return "{$hours}h";
    }

    /**
     * From seconds to hours and minutes.
     *
     * @return string
     */
    public function toHoursAndMinutes()
    {
        $hours = floor($this->seconds / 3600);
        $minutes = floor(($this->seconds / 60) % 60);

        if ($hours) {
            return "{$hours}h {$minutes}m";
        }

        return "{$minutes}m";
    }

    /**
     * From seconds to Hours, minutes and seconds.
     *
     * @return string
     */
    public function toHoursMinutesAndSeconds()
    {
        $hours = floor($this->seconds / 3600);
        $minutes = floor(($this->seconds / 60) % 60);
        $seconds = $this->seconds % 60;

        $return = '';

        if ($hours) {
            $return .= "{$hours}h ";
        }

        if ($minutes) {
            $return .= "{$minutes}m ";
        }

        if ($seconds) {
            $return .= "{$seconds}s ";
        }

        return trim($return);
    }
}
