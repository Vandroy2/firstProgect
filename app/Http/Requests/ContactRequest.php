<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
    public function rules() # функция проверок
    {
        return [
            'email' => 'required|email', # проверка на обязательность указания параметра email в форме submit с обязательным форматом электронного адреса
            'name'=>'required|min:3|max:50', # проверка на колличество символов и обязательность поля 'name' в заполнятемой форме
            'message'=>'required|min:5|max:5000',
        ];
    }

    public function attributes(){ # функция изменяет название атрибутов 'name' , 'email' и др...
        return[
            'name' => 'name important'
        ];
    }

    public function messages(){ # функция меняет текст ошибки 
        return[
            'name.required' => 'field name is required.If you forgot your name, just look in your passport'
            // массив где в ключе  name.required name - поле формы, required - тип ошибки из проверки public function rules
        ];
    }


}
