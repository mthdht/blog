<?php

namespace Blog\Models;


class Contact
{
    private $name;
    private $message;

    public function __construct($post)
    {
        $this->name = $post['name'];
        $this->message = $post['message'];
    }

    public function getName()
    {
        return $this->name;
    }

    public function getMessage()
    {
        return $this->message;
    }
}
