<?php 

namespace Blog\Models;

class User
{
    private $pseudo;
    private $email;
    private $password;

    public function __construct($post)
    {
        $this->pseudo = $post['pseudo'];
        $this->email = $post['email'];
        $this->password = $post['password'];
    }


    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }
}
