<?php

/**
 * Class Posts
 *
 * @package \\${NAMESPACE}
 */
class Posts extends Controller
{
    private $postModel;
    private $userModel;
    public function __construct()
    {
        $this->postModel = $this->model('Post');
        $this->userModel = $this->model('Utilisateur');
    }

    public function index(){
//        $data = [
//            'current_dashboard' => 'current'
//        ];
        if(isLoggedIn()){
            $data = $this->postsByUser();
            $user = $this->userModel->getUserById($_SESSION['user_id']);
            if(!empty($data)) {
                $data = [
                    'posts' => $data,
                    'user' => $user
                ];

                // send array of posts by user to view
                $this->view('posts/index', $data);
            } else {
                // User doesn't have post yet
                flash('no_post_error', 'Vous n\'avez aucune article! Publiez-en une.', 'alert alert-danger');
                $data = [
                    'posts' => '',
                    'user' => $user
                ];
                $this->view('posts/index', $data);
            }
        } else {
           redirect('pages/index');
        }
    }

    public function postsByUser(){
        $data = array();
        $data = $this->postModel->getPostsByUser($_SESSION['user_id']);
        return $data;
    }

    /**
     * TO DO : Limit number of letter on the title
     *
     */
    public function ajouterarticle(){
        if(isLoggedIn()){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $filename = $_FILES['img_article']['name'];

                $data = [
                    'user_id'       =>'',
                    'title'         => trim($_POST['title']),
                    'category'      => trim($_POST['categories']),
                    'body'          => $_POST['editor1'],
                    'filename'      => $filename,
                    'title_err'     => '',
                    'category_err'  => '',
                    'body_err'      => '',
                    'filename_err'  => ''
                ];

                if(empty($data['title'])) {
                    $data['title_err'] = 'Champ obligatoire';
                }

                if(empty($data['category'])){
                    $data['category_err'] = 'Champ obligatoire';
                }
                if(empty($data['body'])){
                    $data['body_err'] = 'Champ obligatoire';
                }

                if(empty($data['filename'])){
                    $data['filename_err'] = 'Veuillez inclure une image';
                }
                if(empty($data['title_err']) && empty($data['category_err']) && empty($data['body_err']) && empty($data['filename_err'])) {
//                    Handling store image errors
                    // Check if file was uploaded without errors
                    if(isset($_FILES["img_article"]) && $_FILES["img_article"]["error"] == 0){
                        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                        $filename = $_FILES["img_article"]["name"];
                        $filetype = $_FILES["img_article"]["type"];
                        $filesize = $_FILES["img_article"]["size"];

                        // Verify file extension
                        $maxsize = 5 * 1024 * 1024;
                        $extension = pathinfo($filename, PATHINFO_EXTENSION);
                        if(!array_key_exists($extension, $allowed)) {
                            flash('format_error', 'Image extension: ".jpg, .gif, .png"', 'alert alert-danger');
                            $this->view('posts/ajouterarticle', $data);

//            die("Error: Please select a valid file format.");
                        }
                        // Verify file size - 5MB maximum
                        else if($filesize > $maxsize) {
                            flash('size_error', 'File size is larger than the allowed size', 'alert alert-danger');
                            $this->view('posts/ajouterarticle', $data);

//            die("Error: File size is larger than the allowed limit.");
                        }
                        // Verify MYME type of the file
                        else if(in_array($filetype, $allowed)){
                            // Check whether file exists before uploading it
                            if(file_exists(SITE_ROOT. DIRECTORY_SEPARATOR . 'storage/posts' . DIRECTORY_SEPARATOR  . $filename)){
                                flash('file_exist_error', 'File already exists, choose another one', 'alert alert-danger');
                                $this->view('posts/ajouterarticle', $data);

                            } else {

                                if(move_uploaded_file($_FILES["img_article"]["tmp_name"], SITE_ROOT . DIRECTORY_SEPARATOR .  'storage/posts' . DIRECTORY_SEPARATOR . $filename)) {
                                    $random_string = sha1(bin2hex($filename));
                                    $newname = $random_string . "." . $extension;
                                    rename(SITE_ROOT . DIRECTORY_SEPARATOR . "storage/posts" . DIRECTORY_SEPARATOR . $filename, SITE_ROOT . DIRECTORY_SEPARATOR . "storage/posts" .DIRECTORY_SEPARATOR . $newname);
                                    $data['filename'] = $newname;
                                    $data['user_id'] = $_SESSION['user_id'];
                                    if($this->postModel->addPost($data)) {
                                        flash('post_success', 'Post added');
                                        redirect('posts/index');
//                                        $this->view('posts/index', $data);
                                    } else {
                                        flash('post_error', 'Error, please try again', 'alert alert-danger');
                                        $this->view('posts/addpost', $data);
                                    }
                                } else {
                                    flash('upload_error', 'Error while uploading, please try again');
                                    $this->view('posts/ajouterarticle', $data);
                                }
                            }
                        } else {
                            flash('upload_error', 'Error while uploading, please try again');
                            $this->view('posts/ajouterarticle', $data);
//            return "Error: There was a problem uploading your file. Please try again.";
                        }
                    } else{
                        flash('upload_error', 'Error while uploading, please try again');
                        $this->view('posts/ajouterarticle', $data);
//        return "Error: " . $_FILES["$image_name"]["error"];
                    }

                } else {
                $this->view('posts/ajouterarticle', $data);
                }
            } else {
                $data = [
                    'title'         => '',
                    'category'      => '',
                    'body'          => '',
                    'filename'      => '',
                    'title_err'     => '',
                    'category_err'  => '',
                    'body_err'      => '',
                    'filename_err'  => ''
                ];
                $this->view('posts/ajouterarticle', $data);
            }
        } else {
            $this->view('pages/index');
        }
    }

    public function editer($id){
        if(isLoggedIn()) {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
                    'id' => $id,
                    'title' => trim($_POST['title']),
                    'body' => trim($_POST['body']),
                    'title_error' => '',
                    'body_error' => ''
                ];

                if (empty($data['title'])) {
                    $data['title_error'] = 'Saisissez une titre';
                }

                if (empty($data['body'])) {
                    $data['body_error'] = 'Remplir le contenu de l\'article';
                }

                // Make sure no errors left
                if (empty($data['title_error']) && empty($data['body_error'])) {
                    if ($this->postModel->updatePost($data)) {
                        flash('post_update_success', 'Votre poste a été mis à jour');
                        redirect('posts/dashboard');
                    } else {
                        die('Une erreur est survenue! Merci de ressayer');
                    }
                } // Displaying errors
                else {
                    $this->view('posts/editer', $data);
                }
            } else {
                // Get the existing post
                $post = $this->postModel->getPostById($id);

                if ($post->user_id != $_SESSION['user_id']) {
                    redirect('posts');
                }

                $data = [
                    'id' => $id,
                    'post' => $post,
                    'body_error' => '',
                    'title_error' => ''
                ];
                $this->view('posts/editer', $data);
            }
        } else {
            redirect('pages/index');
        }
    }

    public function article($id){

        $post = $this->postModel->getPostById($id);
        $user = $this->userModel->getUserById($post->user_id);

        $data = [
          'post' => $post,
          'user' => $user
        ];
        $this->view('posts/article', $data);
    }

    public function editerBio($id){
        if(isLoggedIn()) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $input_name = 'profile_image';
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $filename = $_FILES[$input_name]['name'];

                $data = [
                    'id' => $id,
                    'filename' => $filename,
                    'fname' => trim($_POST['fname']),
                    'lname' => trim($_POST['lname']),
                    'bio' => trim($_POST['bio']),
                    'filename_error' => '',
                    'fname_err' => '',
                    'lname_err' => '',
                    'bio_err' => ''
                ];
                if(empty($filename)){
                    $data['posts'] = $this->postsByUser();
                    $data['filename_error'] = 'Champ obligatore';
                }

                if (empty($data['fname'])) {
                    $data['posts'] = $this->postsByUser();
                    $data['fname_err'] = 'Champ obligatoire';
                }

                if (empty($data['fname'])) {
                    $data['posts'] = $this->postsByUser();
                    $data['lname_err'] = 'Champ obligatoire';
                }

                if (empty($data['bio'])) {
                    $data['posts'] = $this->postsByUser();
                    $data['bio_err'] = 'Champ obligatoire';
                }
                if (empty($data['fname_err']) && empty($data['lname_err']) && empty($data['bio_err']) && empty($data['filename_error'])) {

                    $input_name = 'profile_image';
                    $view = 'posts/editerBio';
                    $dest_path = 'storage/profiles';

                    if(upload_image($input_name, $data, $view, $dest_path)) {
                        $data['filename'] = FILENAME;
                        if ($this->userModel->editerBio($data)) {
                            flash('bio_success', 'Votre bio a été mis à jour');
                            redirect('posts/index');
                        } else {
                            die('Une erreur est survenue. Merci de ressayer');
                        }
                    }
                } else {
                    $this->view('posts/editerBio', $data);
                }
            } else {
                $data['posts'] = $this->postsByUser();
                $data['user'] = $this->userModel->getUserById($id);
                $this->view('posts/editerBio', $data);
            }
        } else {
            redirect('pages/index');
        }
    }

    public function supprimer($id)
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $post = $this->postModel->getPostById($id);
            $filename = SITE_ROOT . DIRECTORY_SEPARATOR . "storage/posts" . DIRECTORY_SEPARATOR . $post->img_name;

            if ($post->user_id != $_SESSION['user_id']) {
                redirect('posts/index');
            }

            if ($this->postModel->deletePost($id)) {
                flash('delete_success', 'Votre article a été supprimer');
                if(unlink($filename)) {
                    redirect('posts/index');
                } else {
                    die('Error while deleteing your picture! Try again!');
                }

            } else {
                flash('delete_error', 'Une erreur est survenue, merci de ressayer plus tard.', 'alert alert-danger');
                redirect('posts/index');
            }
        } else {
            redirect('pages/accueil');
        }
    }

}


