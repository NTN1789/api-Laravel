<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FaixasStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
       // return false;
            return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        if (request()->isMethod('post')) {
                return [
                        'nome' => 'required|max:255',
                        'album' => 'required|max:255',
                        'artista'=> 'required|max:255',
                        'id_categoria' => 'nullable|exists:categorias,id'
                       
                ];


        }   else {
                    return [
                            'nome' => 'required|string|max:255',
                            'album' => 'required|string|max:255',
                            'artista'=> 'required|string|max:255',
                            'id_categoria' => 'nullable|exists:categorias,id'
                    ];
        
        }
    }
}
