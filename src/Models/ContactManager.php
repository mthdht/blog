<?php

namespace Blog\Models;

class ContactManager
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new \PDO('mysql:host=localhost;dbname=blog', 'root', '');
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function save(Contact $contact)
    {
        $request = $this->pdo->prepare("INSERT INTO contact (name, message) VALUES (:name, :message);");

        $request->execute([
            "name" => $contact->getName(),
            "message" => $contact->getMessage()
        ]);
    }
}
