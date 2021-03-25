<?php
namespace Blog\Models;

class ArticleManager
{

    private $pdo;

    public function __construct()
    {
        $this->pdo = new \PDO('mysql:host=localhost;dbname=blog', 'root', 'root');
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
    // methods

    public function save($article)
    {
        $request = $this->pdo->prepare('INSERT INTO article (title, slug, content) VALUES (:title, :slug, :content, NOW(), NOW());');

        return $request->execute([
            "title" => $article->title(),
            "slug" => $article->slug(),
            "content" => $article->content()
        ]);
    }

    public function delete($slug)
    {
        $request = $this->pdo->prepare('DELETE FROM article WHERE slug = :slug;');

        return $request->execute([
            "slug" => $slug
        ]);
    }

    public function update($article, $oldSlug)
    {
        $request = $this->pdo->prepare('UPDATE article SET title = :title, slug = :slug, content = :content, updated_date = NOW() WHERE slug = :oldSlug');

        return $request->execute([
            'title' => $article->title(),
            "slug" => $article->slug(),
            "content" => $article->content(),
            "oldSlug" => $oldSlug
        ]);
    }

    public function all()
    {
        
    }

    public function get($slug)
    {
        
    }
}
