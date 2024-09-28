<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCurso extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Cambiamos el valor a true
    }

    // Validaciones
    public function rules(): array
    {
        return [
            'nombre' => 'required | min:5',
            'descripcion' => 'required',
        ];
    }

    // Personalizar mensajes
    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre es requerido.',
        ];
    }

    // Personalizar atributos
    public function attributes(): array
    {
        return[
            'nombre' => 'nombre del curso', 
            // Solo funciona si el mensaje no esta personalizado
        ];
    }
}
