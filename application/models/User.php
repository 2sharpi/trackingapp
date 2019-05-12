<?php

class User extends CI_Model
{
    private $id;
    private $username;

    private function findByUsername($username)
    {
        $query = $this->db->get_where('User',['username'=> $username]);
        $result = $query->result();
        if(sizeof($result) === 0){
            return null;
        } else {
            return $result[0];
        }
    }

    private function validatePassword($password, $password_hash)
    {
        return password_verify($password, $password_hash);
    }

    public function login($username, $password)
    {
        $user = $this->findByUsername($username);

        if ($user !== null && $user->password) {
            if ($this->validatePassword($password, $user->password)) {
                $this->id = $user->idUser;
                $this->username = $user->username;
                return $user;
            }
        }

        return false;
    }

    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }
}
