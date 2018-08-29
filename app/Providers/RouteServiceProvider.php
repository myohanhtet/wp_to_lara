<?php

namespace App\Providers;

use App\Models\Post;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Tags\Tag;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        $this->registerRouteModelBindings();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {

        $this->mapBackRoutes();
        $this->mapFrontRoutes();

    }

    protected function mapBackRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace . '\\Back')
            ->group(function () {

                Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
                Route::post('/login', 'Auth\LoginController@login');
                Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

                Route::prefix('admin')->group(function () {
                    Route::middleware('auth')->group(base_path('routes/back.php'));
                });
            });
    }
    protected function mapFrontRoutes()
    {
        Route::middleware(['web'])
            ->namespace($this->namespace . '\\Front')
            ->group(base_path('routes/front.php'));
    }

    public function registerRouteModelBindings()
    {
        Route::bind('postSlug', function ($slug) {
            $post = Post::where('slug', $slug)->first() ?? abort(404);

            if (auth()->check()) {
                return $post;
            }

            /**
             * Allow to display the event sourcing post
             */
            if ($post->id === 1058) {
                return true;
            }

            if (!$post->published) {
                abort(404);
            }

            return $post;
        });

        Route::bind('tagSlug', function ($slug) {
            return Tag::where('slug->en', $slug)->first() ?? abort(404);
        });
    }
    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    // protected function mapWebRoutes()
    // {
    //     Route::middleware('web')
    //         ->namespace($this->namespace)
    //         ->group(base_path('routes/web.php'));
    // }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    // protected function mapApiRoutes()
    // {
    //     Route::prefix('api')
    //         ->middleware('api')
    //         ->namespace($this->namespace)
    //         ->group(base_path('routes/api.php'));
    // }
}
