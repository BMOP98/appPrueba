<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        $dominiosPermitidos = 'gmail.com|yahoo.com|outlook.com|hotmail.com|msn.com|live.com|uisrael.edu.ec|outlook.es|icloud.com|' .
            'mail.com';
            

            $messages = [
               'nombre.required' => 'El campo nombre es obligatorio.',
                'nombre.string' => 'El nombre debe ser una cadena de texto.',
                'nombre.max' => 'El nombre no debe exceder de 255 caracteres.',

                'email.required' => 'El campo email es obligatorio.',
                'email.string' => 'El email debe ser una cadena de texto.',
                'email.email' => 'El email debe tener un formato válido.',
                'email.max' => 'El email no debe exceder de 255 caracteres.',
                'email.unique' => 'El email ya está registrado.',
                'email.regex' => 'El email debe pertenecer a uno de los dominios permitidos: ' . $dominiosPermitidos . '.',

                'password.required' => 'El campo contraseña es obligatorio.',
                'password.min' => 'La contraseña debe tener al menos :min caracteres.',
                'password.confirmed' => 'Las contraseñas no coinciden.',
                'password.regex' => 'La contraseña debe contener al menos una letra mayúscula, una letra minúscula, un número y un carácter especial.',
                'password.max' => 'La contraseña no debe exceder de :max caracteres.',
                'password.different' => 'La contraseña debe ser diferente al nombre de usuario o email.',
                'rol_id.required' => 'El campo rol es obligatorio.',
                'rol_id.exists' => 'El rol seleccionado no es válido. Por favor, elija un rol válido de la lista.',
            ];
            
            Validator::make($input, [
                'nombre' => ['required', 'string', 'max:255'],
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    'unique:users',
                    'regex:/^[a-zA-Z0-9_.+-]+@(' . $dominiosPermitidos . ')$/'
                ],
                'password' => $this->passwordRules(),
                'rol_id' => ['required', 'exists:roles,id'],
            ], $messages)->validate();
        return User::create([
            'nombre' => $input['nombre'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'rol_id' => $input['rol_id']
        ]);
    }
    
}