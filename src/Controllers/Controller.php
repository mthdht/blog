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
        $test = "test ok";
        $content = $this->getContent($view);
        // remplacer les {{ X }} par des <?php echo X;
        $content = preg_replace('#\{\{ (.+) \}\}#', "<?php echo $1 ;?>", $content);
        $layout = $this->getLayout($layout);
        
        $view = preg_replace('#\{\{ \$content \}\}#', $content, $layout);

        echo $view;
    }

    protected function getContent($view)
    {
        ob_start();
        require VIEWS . $view . '.php';
        return $content = ob_get_clean();
    }

    protected function getLayout($layout)
    {
        ob_start();
        require VIEWS . 'layouts/' . $layout . '.php';
        return $content = ob_get_clean();
    } 
}