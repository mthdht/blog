<?php
namespace Blog\Models;


class UserManager
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new \PDO('mysql:host=localhost;dbname=blog', 'root', 'root');
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function save(User $user)
    {
        $request = $this->pdo->prepare("INSERT INTO user (pseudo, email, password) VALUES (:pseudo, :email, :password);");

        $request->execute([
            "pseudo" => $user->getPseudo(),
            "email" => $user->getEmail(),
            "password" => password_hash($user->getPassword(), PASSWORD_DEFAULT)
        ]);
    }

    public function exists($email)
    {
        $request = $this->pdo->prepare("SELECT * FROM user WHERE email = :email;");

        $request->execute([
            "email" => $email,
        ]);

        // récupere le résultat de la requète
        return $request->fetch() ? true : false;
    }

    public function getForLogin($email)
    {
        $request = $this->pdo->prepare("SELECT * FROM user WHERE email = :email;");

        $request->execute([
            "email" => $email,
        ]);

        // récupere le résultat de la requète
        $request->setFetchMode(\PDO::FETCH_CLASS, \Blog\Models\User::class);
        return $request->fetch(); // method de récupération
    }
}
