<?php

namespace App\Providers;

use App\Models\TbEscalacaoCliente;
use App\Models\TbPlanos;
use App\Models\TbUnidadeNegocio;
use App\Models\TbUsuario;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
        /**
         * Restrição dos requests de acordo com o plano contratado pelo cliente/loja
         * @authenticated
         */
        RateLimiter::for('grao', function (Request $request) {
            $data = $request->all();

            $usuarios = TbUsuario::select('id_usuario', 'uni_neg_select')
            ->where('id_usuario', '=', Auth::user()->id_usuario)->get();

            foreach ($usuarios as $usuario) {
                $escalacao_clientes = TbEscalacaoCliente::select('loja')
                ->where('data_escalacao', '=', $data['data'])
                ->where('loja', '=', $usuario->uni_neg_select)->get();

                foreach ($escalacao_clientes as $escalacao_cliente) {
                    $uni_neg_planos = TbUnidadeNegocio::select('nome_plano') 
                    ->where('id_uni_neg', '=', $escalacao_cliente->loja)
                    ->get();
        
                    foreach ($uni_neg_planos as $uni_neg_plano) {
                        $plano_n_requests = TbPlanos::select('n_request')
                        ->where('nome', '=', $uni_neg_plano->nome_plano)
                        ->get();
        
                        foreach ($plano_n_requests as $plano_n_request) {
                            $data_n_request = $plano_n_request->n_request;
        
                            return Limit::perDay($data_n_request)->by($data_n_request)
                            ->response(fn() => response()->json([ 'Mensagem' => 'Você excedeu a cota de requisições'], 429));
                        }
                    }
                }
            }
        }); 
    }
}