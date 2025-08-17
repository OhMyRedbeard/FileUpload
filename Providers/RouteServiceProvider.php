<?php

namespace Modules\FileUpload\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facade\Route;

class RouteServiceProvider extends ServiceProvider
{
    protected $namespace = 'Modules\FileUpload\Http\Controllers';

    public function before(Router $router)
    {
        //null
    }

    public function map(Router $router)
    {
        $this->registerWebRoutes();
        $this->registerAdminRoutes();
        $this->registerApiRoutes();
    }

    protected function registerWebRoutes()
    {
        $config = [
            'as' => 'fileupload',
            'prefix' => 'files',
            'namespace' => $this->namespace . '\Frontend',
            'middleware' => ['web'],
        ];

        Route::group($config, function () {
            $this->loadRoutesFrom(__DIR__ . '/../Http/Routes/web.php');
        });
    }

    protected function registerAdminRoutes()
    {
        $config = [
            'as' => 'admin.fileupload',
            'prefix' => 'admin/fileupload',
            'namespace' => $this->namespace . '\Admin',
            'middleware' => ['web', 'ability:admin,admin-access'],
        ];

        Route::group($config, function () {
            $this->loadRoutesFrom(__DIR__ . '/../Http/Routes/admin.php');
        });
    }

    protected function registerApiRoutes(){
        $config = [
            'as'=>'api.fileupload',
            'prefix'=>'api/fileupload',
            'namespace'=>$this->namespace . '\Api',
            'middleware'=>['api'];
        ];

        Route::group($config, function(){
            $this->loadRoutesFrom(__DIR__ . '/../Http/Routes/api.php');
        });
    }

}