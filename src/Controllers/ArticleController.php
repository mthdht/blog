<?php 

namespace Blog\Controllers;

use Blog\Models\ArticleManager;
use Blog\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        // creer un manager
        $manager = new ArticleManager();

        // utiliser une methode de ce manager
        $articles = $manager->all();

        dump($articles);
        // return view

    }

    public function show($slug)
    {
        $manager = new ArticleManager();
        $article = $manager->get($slug);

        dump($article);
    }

    public function create()
    {
        $this->view('Articles/nouveau', 'layout');
    }

    public function store()
    {
        // valider le formulaire

        $article = new Article($_POST);
        $manager = new ArticleManager();
        $manager->save($article);

        $this->redirect('/articles/' . $article->slug());
    }

    public function edit($slug)
    {
        # code...
    }

    public function update($slug)
    {
        # code...
    }

    public function destroy($slug)
    {
        
    }
}
