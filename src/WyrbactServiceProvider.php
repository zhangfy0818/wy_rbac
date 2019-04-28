<?php

namespace Wenyu\Wy_rbac;

use Illuminate\Support\ServiceProvider;

class WyrbactServiceProvider extends ServiceProvider
{
    /**
     * 服务提供者加是否延迟加载.
     *
     * @var bool
     */
    protected $defer = true; // 延迟加载服务

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->loadViewsFrom(__DIR__ . '/views', 'Wy_rbac'); // 视图目录指定
        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/vendor/wy_rbac'),  // 发布视图目录到resources 下
            __DIR__.'/config/wy_rbac.php' => config_path('wy_rbac.php'), // 发布配置文件到 laravel 的config 下
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // 单例绑定服务
        $this->app->singleton('wy_rbac', function ($app) {
            return new wy_rbac($app['session'], $app['config']);
        });
    }

    /**
     *
     * @return array
     * @author:
     * @date: 2019/4/28 10:44
     */
    public function provides()
    {
        // 因为延迟加载 所以要定义 provides 函数 具体参考laravel 文档
        return ['wy_rbac'];
    }
}
