<?php

class User_model2 extends CI_Model
{
    private $id;
    private $username;

    private static $users = [
        [
            'id' => 1,
            'username' => 'admin123',
            'password' => '$2y$10$9iiJgGYGWpHr3j65fNxnk.QAt2oTDU3N71ZZEx8G485TC/O4jddxq'
        ]
    ];

    private function findByUsername($username)
    {
        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return $user;
            }
        }

        return null;
    }

    private function validatePassword($password, $password_hash)
    {
        return password_verify($password, $password_hash);
    }

    public function login($username, $password)
    {
        $user = $this->findByUsername($username);

        if ($user !== null && $user['password']) {
            if ($this->validatePassword($password, $user['password'])) {
                $this->id = $user['id'];
                $this->username = $user['username'];
                return true;
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
