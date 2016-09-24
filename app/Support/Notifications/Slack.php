<?php

namespace Codecasts\Support\Notifications;

/**
 * Class Slack.
 */
class Slack
{
    /**
     * @var \Maknz\Slack\Facades\Slack
     */
    protected $slack;

    /**
     * Slack constructor.
     */
    public function __construct()
    {
        $this->slack = app('maknz.slack');
    }

    /**
     * Sends a message to a slack channel, transforming
     * a array into message attachment lines.
     *
     * @param $message
     * @param array $fields
     *
     * @return mixed
     */
    public function notify($message, $fields = [])
    {
        if (count($fields)) {
            $values = [];
            foreach ($fields as $k => $v) {
                $values[] = [
                    'title' => $k,
                    'value' => $v,
                ];
            }

            return $this->slack->attach(['fields' => $values])->send($message);
        }

        return $this->slack->send($message);
    }
}
