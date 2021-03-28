<?php
class Accueil extends Controller {

    public function index() {
        $accueilModel = $this->model('Accueils');
        $userMoedl = $this->model('Utilisateur');

        $user = $userMoedl->getUserById($_SESSION['user_id']);
        $posts = $accueilModel->getPosts();

        $data = [
            'current_home' => 'current',
            'posts' => $posts,
            'user' => $user
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
