<?php

namespace Codecasts\Support\Comments;

use Illuminate\Contracts\View\Factory;
use Mockery as m;

/**
 * Test Disqus comments.
 */
class DisqusTest extends \TestCase
{
    public function test_disqus_view_is_called_correctly()
    {
        $viewFactory = m::mock(Factory::class)
            ->shouldReceive('make')
            ->once()
            ->with('disqus', ['disqus_id' => 1, 'disqus_title' => 'foo'], [])
            ->getMock();

        $this->app->instance(Factory::class, $viewFactory);

        Disqus::display(1, 'foo');
    }
}
