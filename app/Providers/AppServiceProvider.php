<?php

namespace App\Providers;

use App\Customer;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Auth;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(){
        view()->composer("*",function($view){
            if(Auth::check()){
                $customersWithDebt = Customer::yourCustomers()->withDebt()->get();
                $view->with('customersWithDebt',$customersWithDebt);
            }

        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
