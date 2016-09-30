<?php

namespace Codecasts\Units\Panel\Http\Controllers;

use Artesaos\SEOTools\Traits\SEOTools;
use Codecasts\Support\Http\Controller;
use Codecasts\Support\Statistics\Sources\Codecasts;
use Codecasts\Support\Statistics\Sources\Laravel;
use Codecasts\Support\Statistics\Sources\Lessons;
use Codecasts\Support\Statistics\Sources\PHP;
use Codecasts\Support\Statistics\Sources\Users;
use Codecasts\Support\StatisticsService;

class DashboardController extends Controller
{
    use SEOTools;

    public function dashboard()
    {
        $this->seo()->setTitle('Dashboard');

        $data['app_version'] = (new Codecasts())->get();
        $data['laravel_version'] = (new Laravel())->get();
        $data['php_version'] = (new PHP())->get();
        $data['lessons_count'] = (new Lessons())->getCount();
        $data['lessons_time'] = (new Lessons())->getTime();
        $data['tracks'] = (new Lessons())->getTracks();
        $data['users'] = (new Users())->get();

        return $this->view('panel::dashboard')->with($data);
    }
}
