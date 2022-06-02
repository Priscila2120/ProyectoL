<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CATEGORIAFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */


    public function authorize()
    {
        return true;    /*1.Vamos a modificar false por true, para indicarle que si estamos autorizados*/
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            //2.Vamos a crear nuestra reglas de acuerdo a la tabla categoria
            //2.1 vamos a tener un objeto dentro de nuestro formulario que se va llamar nombre, descripcion
            //que va ser obligatorio de ingresar es decir requerido al+62, alt+124, y que tenga maximo 50 caracteres
            //3
            'nombre'=>'required|max:50',
            'descripcion'=>'max:256',

        ];
    }
}
