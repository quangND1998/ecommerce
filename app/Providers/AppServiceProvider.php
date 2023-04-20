<?php

namespace App\Providers;

use App\Contracts\OrderContract;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Order\Repositories\OrderRepository;

use Modules\ProductCategory\Entities\Attribute;
use Modules\ProductCategory\Entities\AttributeValue;
use Modules\ProductCategory\Entities\Product;
use Modules\ProductCategory\Entities\CategoryProduct;
use Illuminate\Support\Facades\View;
use Modules\BlogPage\Entities\Setting;
use Illuminate\Support\Facades\Blade;
use Cart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(OrderContract::class, OrderRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Blade::directive('money', function ($amount) {
            return "<?php echo number_format($amount); ?>";
        });
        JsonResource::withoutWrapping();
        view()->composer('*', function ($view) {
            if ($view->getName() != 'app') {
                $category = CategoryProduct::with('attributes.values')->get();
                $carts = Cart::getContent();
                $total_price = Cart::getSubTotal();
                $getTotalQuantity = Cart::getTotalQuantity();
                $cartConditions = Cart::getConditions();

                $setting = Setting::first();
                $view->with(compact('category', 'carts', 'total_price', 'getTotalQuantity', 'setting'));
            }
        });

        Inertia::share([
            'locale' => function () {
                return app()->getLocale();
            },
            'language' => function () {
                return translations(
                    resource_path('lang/' . app()->getLocale() . '.json')
                );
            },
        ]);
        Blade::directive('money', function ($amount) {
            return "<?php echo number_format($amount); ?>";
        });
    }
}
