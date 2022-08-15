<?php

namespace App\Providers;

use App\Repositories\KendaraanRepository;
use App\Repositories\KendaraanRepositoryImplement;

use App\Repositories\MotorRepository;
use App\Repositories\MotorRepositoryImplement;

use App\Repositories\MobilRepository;
use App\Repositories\MobilRepositoryImplement;

use App\Services\KendaraanInterfaceService;
use App\Services\KendaraanInterfaceServiceImplement;

use App\Services\MotorInterfaceService;
use App\Services\MotorInterfaceServiceImplement;

use App\Services\MobilInterfaceService;
use App\Services\MobilInterfaceServiceImplement;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(KendaraanRepository::class, KendaraanRepositoryImplement::class);
        $this->app->bind(KendaraanInterfaceService::class, KendaraanInterfaceServiceImplement::class);

        $this->app->bind(MotorRepository::class, MotorRepositoryImplement::class);
        $this->app->bind(MotorInterfaceService::class, MotorInterfaceServiceImplement::class);

        $this->app->bind(MobilRepository::class, MobilRepositoryImplement::class);
        $this->app->bind(MobilInterfaceService::class, MobilInterfaceServiceImplement::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
