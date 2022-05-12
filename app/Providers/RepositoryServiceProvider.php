<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\Cidade;
use App\Models\Empresa;
use App\Models\Endereco;
use App\Models\Estado;
use App\Repositories\AdminRepository;
use App\Repositories\CidadeRepository;
use App\Repositories\EmpresaRepository;
use App\Repositories\EnderecoRepository;
use App\Repositories\EstadoRepository;
use App\Repositories\Interfaces\AdminRepositoryInterface;
use App\Repositories\Interfaces\CidadeRepositoryInterface;
use App\Repositories\Interfaces\EmpresaRepositoryInterface;
use App\Repositories\Interfaces\EnderecoRepositoryInterface;
use App\Repositories\Interfaces\EstadoRepositoryInterface;
use App\Services\AdminService;
use App\Services\CidadeService;
use App\Services\EmpresaService;
use App\Services\EnderecoService;
use App\Services\EstadoService;
use App\Services\Interfaces\AdminServiceInterface;
use App\Services\Interfaces\CidadeServiceInterface;
use App\Services\Interfaces\EmpresaServiceInterface;
use App\Services\Interfaces\EnderecoServiceInterface;
use App\Services\Interfaces\EstadoServiceInterface;
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
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //Admin
        $this->app->bind(AdminServiceInterface::class, function ($app) {
            return new AdminService($app->make(AdminRepositoryInterface::class));
        });
        $this->app->bind(AdminRepositoryInterface::class, function ($app) {
            return new AdminRepository(new Admin());
        });

        //Empresa
        $this->app->bind(EmpresaServiceInterface::class, function ($app) {
            return new EmpresaService($app->make(EmpresaRepositoryInterface::class));
        });
        $this->app->bind(EmpresaRepositoryInterface::class, function ($app) {
            return new EmpresaRepository(new Empresa());
        });

        //Endereço
        $this->app->bind(EnderecoServiceInterface::class, function ($app) {
            return new EnderecoService($app->make(EnderecoRepositoryInterface::class));
        });
        $this->app->bind(EnderecoRepositoryInterface::class, function ($app) {
            return new EnderecoRepository(new Endereco());
        });

        //Estado
        $this->app->bind(EstadoServiceInterface::class, function ($app) {
            return new EstadoService($app->make(EstadoRepositoryInterface::class));
        });
        $this->app->bind(EstadoRepositoryInterface::class, function ($app) {
            return new EstadoRepository(new Estado());
        });

        //Cidade
        $this->app->bind(CidadeServiceInterface::class, function ($app) {
            return new CidadeService($app->make(CidadeRepositoryInterface::class));
        });
        $this->app->bind(CidadeRepositoryInterface::class, function ($app) {
            return new CidadeRepository(new Cidade());
        });
    }
}
