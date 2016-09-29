<?php

namespace Codecasts\Units\Pages\Http\Controllers;

use Artesaos\SEOTools\Traits\SEOTools;
use Codecasts\Support\Http\Controller;
use Codecasts\Support\Statistics\Sources\Codecasts;
use Codecasts\Support\Statistics\Sources\Laravel;
use Codecasts\Support\Statistics\Sources\Lessons;
use Codecasts\Support\Statistics\Sources\PHP;

/**
 * Class PagesController.
 */
class PagesController extends Controller
{
    use SEOTools;

    public function policy()
    {
        $this->seo()->setTitle('Política de Uso e Privacidade');

        return $this->view('pages::policy');
    }

    public function statistics()
    {
        $this->seo()->setTitle('Estatísticas');

        $data['app_version'] = (new Codecasts())->get();
        $data['laravel_version'] = (new Laravel())->get();
        $data['php_version'] = (new PHP())->get();
        $data['lessons_count'] = (new Lessons())->getCount();
        $data['lessons_time'] = (new Lessons())->getTime();
        $data['tracks'] = (new Lessons())->getTracks();

        return $this->view('pages::statistics')->with($data);
    }

    public function support()
    {
        $this->seo()->setTitle('Suporte');

        return $this->view('pages::support');
    }
}