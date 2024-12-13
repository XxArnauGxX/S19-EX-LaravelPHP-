<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CommonValidation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $num1 = $request->route('num1');
        $num2 = $request->route('num2');

        if (!is_numeric($num1) || !is_numeric($num2)) {
            return response()->json([
                'num1' => $num1,
                'num2' => $num2,
                'operacion' => 'desconocida',
                'errores' => ['Los parámetros num1 y num 2 deben ser numéricos.']
            ], 422);
        }
        
        return $next($request);
    }
}
