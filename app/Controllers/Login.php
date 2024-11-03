<?php
namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function login()
    {
        if (session()->get('id')) {
            $url = base_url("public/");
            return redirect()->to($url);
        }
        $data["error"] = "";
        return view('login',$data);
    }
    // public function check()
    // {
    //     $model = new UserModel();
    //     $email = $this->request->getPost('email');
    //     $password = $this->request->getPost('password');
    //     // $password = password_hash($this->request->getPost('password'),PASSWORD_DEFAULT);
    //     $errorEmail = $model->where('email',$email)->findAll();
    //     $errorPass = $model->where('password',$password)->findAll();
    //     $users = $model->where('email',$email)->where('password',$password)->findAll();
    //     if (count($users) > 0) {
    //         $id = $users[0]['id'];
    //         session()->set('id', $id);
    //         $url = base_url("public/");
    //         return redirect()->to($url);
    //     }
    //     $error = "";
    //     if (!$errorEmail || !$errorPass) {
    //         $error = "votre email ou mot de passe sont incorrect";
    //     }
    //     $data["error"] = $error;
    //     return view('login',$data);
    // }

    public function check() {
        $model = new UserModel();
        $data = [
            "email" => $this->request->getPost("email"),
            "password" => $this->request->getPost("password"),
        ];
        $matchingUser = $model->where("email", $data["email"])->findAll()[0];
        if(isset($matchingUser)) {
            if(password_verify($data["password"], $matchingUser["password"])) {
                // Connected
                $id = $matchingUser['id'];
                session()->set('id', $id);
                $url = base_url("public/");
                return redirect()->to($url);
            }else {
                $error = "votre mot de passe est incorrect";
            }
        }else {
            $error = "votre email est incorrect";
        }
        $data["error"] = $error;
        return view('login',$data);

    }

    public function logout()
    {
        session();
        session_destroy();
        $url = base_url("public/login");
        return redirect()->to($url);
    }
}