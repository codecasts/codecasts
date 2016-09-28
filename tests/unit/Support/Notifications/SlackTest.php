<?php

namespace Codecasts\Support\Notifications;

use Maknz\Slack\Client as SlackClient;
use Mockery as m;

/**
 * Class SlackTest.
 */
class SlackTest extends \TestCase
{
    public function test_send_notifications()
    {
        $slackClient = m::mock(SlackClient::class)
            ->shouldReceive('send')
            ->with('foo')
            ->getMock();

        $this->app->instance('maknz.slack', $slackClient);

        $slack = new Slack();

        $slack->notify('foo');
    }

    public function test_send_notifications_with_attached_fields()
    {
        $clientAttachMock = m::mock(SlackClient::class)
            ->shouldReceive('send')
            ->once()
            ->with('foo')->getMock();

        $slackClient = m::mock(SlackClient::class)
            ->shouldReceive('attach')
            ->with(['fields' => [
                ['title' => 'field1', 'value' => 'value1'],
                ['title' => 'field2', 'value' => 'value2'],
            ]])
            ->once()
            ->andReturn($clientAttachMock)
            ->getMock();

        $this->app->instance('maknz.slack', $slackClient);

        $slack = new Slack();

        $slack->notify('foo', [
            'field1' => 'value1',
            'field2' => 'value2',
        ]);
    }
}
