<?php
namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        if ($this->request->getMethod() === 'POST') {
            
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            

            $model = new UserModel();
            $user = $model->where('username', $username)
                          ->where('password', $password)
                          ->first();
            
            if ($user) {
                session()->set('user', $user['id_user']);
                return redirect()->to('/buku');
            }

            session()->setFlashdata('error', 'Login gagal');
            return redirect()->to('/auth/login');
        }

        return view('auth/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth/login');
    }

    
}
