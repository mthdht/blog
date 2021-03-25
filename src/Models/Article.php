<?php
namespace Blog\Models;

class Article
{

    public function __construct(Array $data= [])
    {
        if ($data) {
            $this->id = isset($data['id']) ? $data['id'] : null;
            $this->title = $data['title'];
            $this->slug = $data['slug'];
            $this->content = $data['content'];
        }
    }
    // atributs
    private $title;
    private $slug;
    private $content;
    private $creation_date;
    private $updated_date;

    // methodes

    public function preview($size = 100)
    {
        return substr($this->content, 0, $size);
        // $obvj->preview();
        // $obvj->preview(250);
    }

    public function title()
    { 
        return $this->title;
    }

    public function slug()
    {
        return $this->slug;
    }

    public function content()
    {
        return $this->content;
    }

    public function creationDate()
    {
        return $this->creation_date;
    }

    public function updatedDate()
    {
        return $this->updated_date;
    }


    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function setCreationDate($date)
    {
        $this->creation_date = $date;
    }

    public function setUpdatedDate($date)
    {
        $this->updated_date = date;
    }

}
