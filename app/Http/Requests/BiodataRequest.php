<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BiodataRequest extends FormRequest
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
            'nama'                  => 'required',
            'tanggal_lahir'         => 'required',
            'tempat_lahir'          => 'required',
            'jenis_kelamin'         => 'required',
            'status'                => 'required',
            'alamat'                => 'required',
            'email'                 => 'required',
            'no_hp'                 => 'required',
            'pendidikan_terakhir'   => 'required',
            'jurusan_pendidikan'    => 'required',
            'ipk'                   => 'required',
            'file'                  => 'nullable',
        ];
    }
}
