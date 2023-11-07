<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        //return view('welcome_message');
        return view('users/index');
    }

    public function dashboard(): string
    {
        return view('dashboard/index');
    }

    public function dashboard2(): string
    {
        $data = [
            'body_class' => ' dark-mode layout-fixed layout-navbar-fixed layout-footer-fixed',
            'navbar_class' => ' navbar-dark',
        ];

        return view('dashboard/index2', $data);
    }

    public function dashboard3(): string
    {
        $data = [
            'body_class' => '',
            // 'navbar_class' => '',
        ];

        return view('dashboard/index3', $data);
    }

    public function profile(): string
    {
        return view('users/profile');
    }

    public function contacts(): string
    {
        return view('contacts/index');
    }

    public function calendar(): string
    {
        return view('calendar/index');
    }

    public function pagesTablesSimple(): string
    {
        return view('calendar/index');
    }

    public function pages404(): string
    {
        return view('404/index');
    }

    public function pagesProjects(): string
    {
        return view('projects/index');
    }

    public function pagesProjectsAdd(): string
    {
        $data = [
            'body_class' => '',
        ];

        return view('projects/add', $data);
    }

    public function pagesProjectsEdit(): string
    {
        $data = [
            'body_class' => '',
        ];

        return view('projects/edit', $data);
    }

    public function pagesTables(): string
    {
        return view('tables/index');
    }

    public function pagesTablesData(): string
    {
        return view('tables/data');
    }
}
