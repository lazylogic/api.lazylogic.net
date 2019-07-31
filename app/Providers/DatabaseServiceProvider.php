<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class DatabaseServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength( 191 );

        \DB::listen( function ( $query ) {
            \Log::debug( $query->sql );
            \Log::debug( $query->bindings );
            \Log::debug( $query->time );
        } );

        Relation::morphMap( [

        ] );
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}