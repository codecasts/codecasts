<?php

namespace Codecasts\Support\Helpers\Blade;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

/**
 * Class ExtensionsServiceProvider.
 */
class ExtensionsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerErrorBlockExtension();
    }

    protected function registerErrorBlockExtension()
    {
        $blade = Blade::getFacadeRoot();

        $blade->directive('hasErrorClass', function ($expression) {
            return '<?php echo ($errors->has('.$expression.')) ? "has-error" : null; ?>';
        });

        $blade->directive('errorBlock', function ($expression) {
            $name = str_replace(['(', ')'], null, $expression);

            return '<?php echo $errors->first('.$name.', \'<span class="help-block">:message</span>\') ?>';
        });
    }
}
