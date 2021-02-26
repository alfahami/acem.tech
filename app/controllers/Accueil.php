<?php
class Accueil extends Controller {

    public function index() {
        $accueilModel = $this->model('Accueils');
        $posts = $accueilModel->getPosts();

        $data = [
            'current_home' => 'current',
            'posts' => $posts
        ];

        $this->view('pages/index', $data);
    }

    public function article() {
        $this->view('pages/article');
    }

    public function erreur(){
        $this->view('pages/abort');
    }

}
