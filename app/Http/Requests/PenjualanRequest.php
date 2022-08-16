<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class PenjualanRequest extends FormRequest
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
            'tanggal' => ['required', 'date'],
            'id_kendaraan' => ['required', 'string'],
            'atas_nama' => ['required', 'string'],
            'alamat' => ['required', 'string'],
            'total' => ['required','numeric'],
            'keterangan' => ['string'],
            'no_rangka' => ['required','string'],
            'no_mesin' => ['required','string'],
        ];
    }

    public function attributes()
    {
        return [
            'atas_nama' => 'atas nama',
            'no_rangka' => 'nomor rangka',
            'no_mesin' => 'nomor mesin',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => $validator->errors()->first(),
        ], 422));
    }
}
