<?php
require_once('views/View.php');

class ControllerAccueil
{
    private $_articleManager;
    private $_view;
    
    public function __construct($url)
    {
        if (isset($url)&& count ($url) > 1)// 1 seul paramètre est utilisé
            throw new Exception('Page introuvable');
        else
            $this->articles();
    }
    private function articles()
    {
        $this->articleManager = new ArticleManager;
        $articles = $this->_articleManager->getArticles();
        
    //    require_once('views/viewAccueil.php');// Appel non sécurisé de la vue
        $this->_view = new View('Accueil');
        $this ->_view->generate(array('articles'=> $articles));
        
    }
}
