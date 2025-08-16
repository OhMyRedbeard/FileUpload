<?php

namespace Modules\FileUpload\Providers;

use App\Contracts\Modules\ServiceProvider;

class FileUploadServiceProvider extends ServiceProvider
{
    private $moduleSvc;

    protected $defer = false;

    public function boot()
    {
        $this->moduleSvc = app('App\Services\ModuleService');

        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();

        $this->registerLinks();

        $this->loadMigrationsFrom(__DIR__ . '/../$MIGRATIONS_PATH$');
    }

    public function register()
    {
        //null
    }

    public function registerConfig()
    {
        $this->moduleSvc->addFrontendLink('FileUpload', '/files/', '', $logged_in = true);
        $this->moduleSvc->addAdminLink('FileUpload', '/admin/fileupload');
    }

    public function registerViews()
    {
        $viewPath = resource_path('views/modules/fileupload');
        $sourcePath = __DIR__ . '/../Resources/views';

        $this->publishes([$source_path => $viewPath], 'views');

        $this->loadViewsFrom(
            array_merge(
                array_map(
                    function ($path) {
                        return $path . '/modules/fileupload';
                    },
                    \Config::get('view.paths')
                ),
                [$sourcePath]
            ),
            'fileupload'
        );
    }

    public function registerTranslations(){
        $langPath = resource_path('lang/modules/fileupload');
        if(is_dir($langPath)){
            $this->loadTranslationsFrom($langPath, 'fileupload');
        } else {
            $this->loadTranslationsFrom(module_path('FileUpload', 'Resources/lang', 'fileupload'));
        }
    }
}