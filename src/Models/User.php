<?php 

namespace Blog\Models;

class User
{
    private $id;
    private $pseudo;
    private $email;
    private $password;

    public function __construct(Array $data= [])
    {
        if ($data) {
            $this->id = isset($data['id']) ? $data['id'] : null;
            $this->pseudo = $data['pseudo'];
            $this->email = $data['email'];
            $this->password = $data['password'];
        }
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
