<?php

namespace Codecasts\Units\Panel\Http\Controllers;

use Artesaos\SEOTools\Traits\SEOTools;
use Codecasts\Support\Http\Controller;

class UtilsController extends Controller
{
    use SEOTools;

    public function cacheClear()
    {
        $this->seo()->setTitle('Limpar Cache');

        $basePath = base_path();

        // clear cache
        $result = exec("cd {$basePath}; php artisan cache:clear");

        // reindex search entries on elastic search
        $result .= exec("cd {$basePath}; php artisan lessons:index");
        
        return $this->view('panel::cache')->with(compact('result'));
    }
}
