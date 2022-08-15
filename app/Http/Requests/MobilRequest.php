<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class MobilRequest extends FormRequest
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

    public function rules()
    {
        return [
            'tahun_keluaran' => ['required', 'numeric'],
            'warna' => ['required', 'string'],
            'harga' => ['required', 'numeric'],
            'mesin' => ['required', 'string'],
            'kapasitas_penumpang' => ['required', 'numeric'],
            'tipe' => ['required', 'string'],
            'stok' => ['required', 'numeric']
        ];
    }

    public function attributes()
    {
        return [
            'tahun_keluaran' => 'tahun keluaran',
            'kapasitas_penumpang' => 'kapasitas penumpang',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => $validator->errors()->first(),
        ], 422));
    }
}
