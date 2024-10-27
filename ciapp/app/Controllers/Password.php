<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class Password extends BaseController
{
    public function set()
    {
        return view("Password/set");
    }

    public function update()
    {
        $rules = [
            "password" => [
                "label" => "Password",
                "rules" => "required|matches[password]"
            ]
            ];

        if ( ! $this->validate($rules)) {

            return redirect()->back()
                                ->with("errors", $this->validator->getErrors());
        }

        $user = auth()->user();
        $user->password = $this->request->getPost("password");

        $model = new UserModel;
        $model->save($user);


        $model->save($user);

        session()->removeTempdata("maginLogin");

        return redirect()->to("/")
                        ->with("message", "Password changed successfully");

    }

}
