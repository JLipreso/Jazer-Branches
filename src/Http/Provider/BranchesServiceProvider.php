<?php

namespace Jazer\Branches\Http\Provider;

use Illuminate\Support\ServiceProvider;

class BranchesServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../../config/database.php', 'branches'  
        );
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../../../config/config.php' => config_path('branchesconfig.php')
        ], 'branchesconfig-config');
        
        $this->loadRoutesFrom( __DIR__ . '/../../../routes/api.php');

        config(['database.connections.conn_branches' => config('branches.database_connection')]);
    }
}
