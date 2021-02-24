<?php
namespace Blog\Models;


class UserManager
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new \PDO('mysql:host=localhost;dbname=blog', 'root', '');
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function save(User $user)
    {
        $request = $this->pdo->prepare("INSERT INTO user (pseudo, email, password) VALUES (:pseudo, :email, :password);");

        $request->execute([
            "pseudo" => $user->getPseudo(),
            "email" => $user->getEmail(),
            "password" => $user->getPassword()
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

    public function getForLogin($email, $password)
    {
        $request = $this->pdo->prepare("SELECT * FROM user WHERE email = :toto and password = :tata;");

        $request->execute([
            "toto" => $email,
            "tata" => $password
        ]);

        // récupere le résultat de la requète
        return $request->fetch(\PDO::FETCH_ASSOC); // method de récupération
    }
}
