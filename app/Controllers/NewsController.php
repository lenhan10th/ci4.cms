<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NewsModel;
use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class NewsController extends BaseController
{
    public function index()
    {
        $model = model(NewsModel::class);
        // $userModel = new UserModel();

        // $pager = \Config\Services::pager();
        $pager = service('pager');
        $posts = new UserModel();
        // $group = 'group1';
        $group = 'default';

        $data = [
            'users'       => $posts->paginate(5, $group),
            'pager'       => $posts->pager,
            'currentPage' => $posts->pager->getCurrentPage($group), // The current page number
            'totalPages'  => $posts->pager->getPageCount($group),   // The total page count
            'groupPage'  => $group,

            // 'users' => $userModel->paginate(10),
            // 'pager' => $userModel->pager,
            'news'  => $model->getNews(),
            'title' => 'News archive',
        ];

        return view('templates/header', $data)
            . view('news/index')
            . view('templates/footer');
    }

    public function show($slug = null)
    {
        $model = model(NewsModel::class);

        $data['news'] = $model->getNews($slug);

        if (empty($data['news'])) {
            throw new PageNotFoundException('Cannot find the news item: ' . $slug);
        }

        $data['title'] = $data['news']['title'];

        return view('templates/header', $data)
            . view('news/view')
            . view('templates/footer');
    }

    public function new()
    {
        helper('form');

        return view('templates/header', ['title' => 'Create a news item'])
            . view('news/create')
            . view('templates/footer');
    }

    public function create()
    {
        helper('form');

        // Checks whether the submitted data passed the validation rules.
        if (! $this->validate([
            'title' => 'required|max_length[255]|min_length[3]',
            'body'  => 'required|max_length[5000]|min_length[10]',
        ])) {
            // The validation fails, so returns the form.
            return $this->new();
        }

        // Gets the validated data.
        $post = $this->validator->getValidated();

        $model = model(NewsModel::class);

        $model->save([
            'title' => $post['title'],
            'slug'  => url_title($post['title'], '-', true),
            'body'  => $post['body'],
        ]);

        return view('templates/header', ['title' => 'Create a news item'])
            . view('news/success')
            . view('templates/footer');
    }
}
