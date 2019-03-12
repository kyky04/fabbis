<?php

namespace App\Http\Requests\Profil;

use App\Http\Requests\Request;

class SejarahRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'judul' => 'required|unique:ref_sejarah,judul,'.$this->get('id'),
            'konten' => 'required'
        ];
    }
}
