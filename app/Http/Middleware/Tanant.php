<?php

namespace App\Http\Middleware;

use Closure;
use App\Company;
use App\Tanant\Manager;

class Tanant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $tanant = $this->resolveTanant($request->company ?: session('tanant'));

        if (!($tanant && auth()->user()->companies->contains('id', $tanant->id))) {
            return redirect('/home');
        }

        $this->registerTanant($tanant);

        return $next($request);
    }

    /**
     * registerTanant
     * @param  $tanant
     * @return void
     */
    public function registerTanant($tanant) : void
    {
        $status = app(Manager::class)->setTanant($tanant);

        if (!$status) {
            throw new \Exception("Check The Tanant", 1);
        }

        session()->put('tanant', $tanant->id);
    }

    /**
     * resolveTanant
     * @param  int $id
     * @return Company
     */
    public function resolveTanant($id)
    {
        return Company::find($id);
    }
}
