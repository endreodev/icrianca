<?php

namespace App\Providers;

use App\Models\Definition;
use App\Models\Program;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;

use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
        
        \Carbon\Carbon::setLocale($this->app->getLocale());
        date_default_timezone_set('America/Cuiaba');
        setlocale(LC_TIME, 'ptb');
        setlocale(LC_ALL, 'pt_BR.utf-8', 'ptb', 'pt_BR', 'portuguese-brazil', 'portuguese-brazilian', 'bra', 'brazil', 'br');
        setlocale(LC_TIME, 'pt_BR.utf-8', 'ptb', 'pt_BR', 'portuguese-brazil', 'portuguese-brazilian', 'bra', 'brazil', 'br');
        Paginator::useBootstrap();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $programs = Program::where('status', TRUE)->get();
        $definitions = Definition::firstOrCreate(['id' => 1]);
        View::share('boot_programs', $programs);
        // \Illuminate\Support\Facades\DB::statement('SET SESSION sql_require_primary_key=0');
        View::share('boot_definitions', $definitions);
        App::setLocale('pt_BR');
    }
}
