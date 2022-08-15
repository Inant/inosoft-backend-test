<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class MotorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tahun_keluaran' => ['required', 'numeric'],
            'warna' => ['required', 'string'],
            'harga' => ['required', 'numeric'],
            'tipe_suspensi' => ['required', 'string'],
            'tipe_transmisi' => ['required', 'string'],
            'stok' => ['required', 'numeric']
        ];
    }

    public function attributes()
    {
        return [
            'tahun_keluaran' => 'tahun keluaran',
            'tipe_suspensi' => 'tipe suspensi',
            'tipe_transmisi' => 'tipe transmisi',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => $validator->errors()->first(),
        ], 422));
    }
}
