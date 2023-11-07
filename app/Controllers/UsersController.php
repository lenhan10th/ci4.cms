<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Controllers\BaseController;

class UsersController extends BaseController
{
    public function index()
    {
        return view('dashboard/index');
        // echo base_url('public'); die;
        // $password = '@A123456';
        // echo password_hash($password, PASSWORD_DEFAULT); die;

        $data = [];
        helper(['form']);


        if ($this->request->getMethod() == 'post') {
            //let's do the validation here
            //1
            /*$rules = [
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
                'password' => 'required|min_length[8]|max_length[255]|validateUser[email,password]',
            ];
            $errors = [
                'password' => [
                    'validateUser' => 'Email or Password don\'t match'
                ]
            ];*/

            //2
            $rules = [
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
                'password' => 'required|min_length[8]|max_length[255]',
            ];
            $errors = [];

            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            }else{
                //1
                /*$model = new UsersModel();
                $user = $model->where('email', $this->request->getVar('email'))->first();
                $this->setUserSession($user);
                //$session->setFlashdata('success', 'Successful Registration');
                return redirect()->to('dashboard');
                */

                //2
                $model = new UsersModel();
                $user = $model->where('email', $this->request->getVar('email'))->first();
                if(isset($user['password']) && password_verify($this->request->getVar('password'), $user['password'])){
                    $this->setUserSession($user);
                    //$session->setFlashdata('success', 'Successful Registration');
                    return redirect()->to('dashboard');
                }
            }
        }

        echo view('templates/header', $data);
        echo view('login');
        echo view('templates/footer');
    }

    private function setUserSession($user){
        $data = [
            'id' => $user['id'],
            'firstname' => $user['name'],
            'lastname' => $user['name'],
            'email' => $user['email'],
            'isLoggedIn' => true,
        ];

        session()->set($data);
        return true;
    }

    public function register(){
        $data = [];
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            //let's do the validation here
            $rules = [
                'name' => 'required|min_length[3]|max_length[20]',
                'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[8]|max_length[255]',
                'password_confirm' => 'matches[password]',
            ];

            if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
            }else{
                $model = new UsersModel();

                $newData = [
                    'name' => $this->request->getVar('name'),
                    'email' => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password'),
                ];
                $model->save($newData);
                $session = session();
                $session->setFlashdata('success', 'Successful Registration');
                return redirect()->to('/');

            }
        }


        echo view('templates/header', $data);
        echo view('register');
        echo view('templates/footer');
    }

    public function profile(){
        
        $data = [];
        helper(['form']);
        $model = new UsersModel();
        $user_id = session()->get('id');

        if ($this->request->getMethod() == 'post') {
            //let's do the validation here
            $rules = [
                'name' => 'required|min_length[3]|max_length[20]',
            ];

            if($this->request->getPost('password') != ''){
                $rules['password'] = 'required|min_length[8]|max_length[255]';
                $rules['password_confirm'] = 'matches[password]';
            }


            if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
            }else{

                $newData = [
                    'id' => $user_id,
                    'name' => $this->request->getPost('name'),
                ];
                if($this->request->getPost('password') != ''){
                    $newData['password'] = $this->request->getPost('password');
                }
                $model->save($newData);

                session()->setFlashdata('success', 'Successfuly Updated');
                return redirect()->to('/profile');

            }
        }

        $data['user'] = $model->where('id', $user_id)->first();
        echo view('templates/header', $data);
        echo view('profile');
        echo view('templates/footer');
    }

    public function logout(){
        session()->destroy();
        return redirect()->to('/');
    }
}
