<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CalculadoraController extends Controller
{
    // Sumar
    public function suma(Request $request, $num1, $num2) {

        $data = [
            'num1' => $num1,
            'num2' => $num2,
        ];

        $rules = [
            'num1' => 'required|integer|min:1',
            'num2' => 'required|integer|min:1',
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'errors' => $validator->errors(),
            ], 400);
        }

        $resultado = $num1 + $num2;
        return response()->json([
            'error' => false,
            'num1' => $num1,
            'num2' => $num2,
            'operacion' => 'suma',
            'resultado' => $resultado
        ]);
    }

    // Restar
    public function resta(Request $request, $num1, $num2) {

        $data = [
            'num1' => $num1,
            'num2' => $num2,
        ];

        $rules = [
            'num1' => 'required|integer',
            'num2' => 'required|integer',
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'errors' => $validator->errors(),
            ], 400);
        }

        $resultado = $num1 - $num2;
        return response()->json([
            'error' => false,
            'num1' => $num1,
            'num2' => $num2,
            'operacion' => 'resta',
            'resultado' => $resultado
        ]);
    }

    // Multiplicar
    public function multiplicacion(Request $request, $num1, $num2) {

        $data = [
            'num1' => $num1,
            'num2' => $num2,
        ];

        $rules = [
            'num1' => 'required|numeric',
            'num2' => 'required|numeric',
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'errors' => $validator->errors(),
            ], 400);
        }

        $resultado = $num1 * $num2;
        return response()->json([
            'error' => false,
            'num1' => $num1,
            'num2'=> $num2,
            'operacion' => 'multiplicacion',
            'resultado' => $resultado
        ]);
    }

    // Dividir
    public function division($num1, $num2) {

        $data = [
            'num1' => $num1,
            'num2' => $num2,
        ];

        $rules = [
            'num1' => 'required|numeric',
            'num2' => 'required|numeric|not_in:0',
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'errors' => $validator->errors(),
            ], 400);
        }
        
        $resultado = $num1 / $num2;
        return response()->json([
            'error' => false,
            'num1' => $num1,
            'num2' => $num2,
            'operacion' => 'division',
            'resultado' => $resultado
        ]);
    }

    // Exponenciar
    public function exponencial(Request $request, $num1, $num2) {

        $data = [
            'num1' => $num1,
            'num2' => $num2,
        ];

        $rules = [
            'num1' => 'required|numeric',
            'num2' => 'required|integer|between:0,5',
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'errors' => $validator->errors(),
            ], 400);
        }

        $resultado = $num1 ** $num2;
        return response()->json([
            'error' => false,
            'num1' => $num1,
            'num2' => $num2,
            'operacion' => 'exponencial',
            'resultado' => $resultado
        ]);
    }
}
