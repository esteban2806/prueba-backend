<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $clienteId = $this->route('cliente') ?? null;
    return [
        'nombre' => 'required|string|max:255',
        'email' => 'required|email|unique:clientes,email,' . $clienteId,
        'telefono' => 'nullable|string|max:50',
    ];
    }
}
