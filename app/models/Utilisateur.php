<?php
    class Utilisateur {
        private $db;

        public function __construct()
        {
            
            $this->db = new Database;
        }

        public function inscription($data){
            $this->db->query('INSERT INTO users(firstname, lastname, email, password, bio) VALUES(:firstname, :lastname, :email, :password, :bio)');
            $this->db->bind(':firstname', $data['firstname']);
            $this->db->bind(':lastname', $data['lastname']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':bio', $data['bio']);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function connexion($email, $password){
            $this->db->query('SELECT * FROM users WHERE email = :email');
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            $hashed_password = $row->password;

            if(password_verify($password, $hashed_password)){
                return $row;
            } else {
                return false;
            }
        }

        public function getUserById($user_id){
            $this->db->query("SELECT * FROM users WHERE id = :user_id");
            $this->db->bind('user_id', $user_id);

            return $this->db->single();
        }

        public function findUserByEmail($email){
            $this->db->query('SELECT * FROM users WHERE email = :email');
            $this->db->bind(':email', $email);

            $row = $this->db->single();
            $this->db->rowCount();

            if($this->db->rowCount() > 0){
                return true;
            } else {
                return false;
            }
        }

        public function deleteUserById($id) {
            $this->db->query('DELETE FROM users WHERE id = :id');
            $this->db->bind(':id', $id);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function editerBio($data){
            $this->db->query('UPDATE users SET firstname = :fname, lastname = :lname, bio = :bio WHERE id = :id');

            $this->db->bind(':fname', $data['fname']);
            $this->db->bind(':lname', $data['lname']);
            $this->db->bind(':bio', $data['bio']);
            $this->db->bind(':id', $data['id']);

            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

    }

