<?php
namespace Blog\Controllers;

class Controller
{
    protected function redirect($path)
    {
        header('Location: '. $path);
        exit();
    }

    protected function view($view, $layout)
    {
        $content = $this->getContent($view); // string "<h1>...</h1>"

        // remplacer les {{ X }} par des <?php echo X;
        $content = preg_replace('#\{\{ (.+) \}\}#', '<?php echo $1 ;?>', $content);

        $layout = $this->getLayout($layout); // string <DOCTYPE>...."
        
        // associe le contenu de la vue avec le layout
        $page = preg_replace('#\{\{ \$content \}\}#', $content, $layout);

        // enregistre dans un fichier puis l'appel
        $pathFile = VIEWS . 'pages/' . str_replace('/', '-', $view) . '.php';// exemple si vue = "auth/showLogin" => auth-showLogin.php
        file_put_contents($pathFile, $page);
        require $pathFile;

    }

    protected function getContent($view)
    {
        ob_start();
        require VIEWS . $view . '.php';
        return ob_get_clean();
    }

    protected function getLayout($layout)
    {
        ob_start();
        require VIEWS . 'layouts/' . $layout . '.php';
        return ob_get_clean();
    } 
}