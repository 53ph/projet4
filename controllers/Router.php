<?php
require_once('views/View.php');
class Router
{
    private $_ctrl;
    private $_view;
    
    public function routeReq()
    {
        try
        {
            //Chargement automatique des classes
            spl_autoload_register(function ($class)){
                require_once('models/'.$class.'.php');
            });
            
            $url ='';
            //LE CONTROLLER EST INCLUS SELON L'ACTION DE L'UTILISATEUR
            if(isset($_GET['url']))
            {
                $url = explode ('/',filter_var($_GET['url'],
                FILTER_SANITIZE_URL));
                
                $controller = ucfirst(strtolower($url[0]));
                $controller = "Controller".$controller;
                $controller = "controllers/".controllerClass.".php";
                
                if(file_exists(£controllerFile))
            }
            
                    require_once($controllerFile);
                    $this->ctrl = new $controllerClass($url);
            } 
            else 
                throw new Exception ('Page intouvable');
        }
        else
        {
            require_once ('controllers/ControllerAccueil.php');
            $this->_ctrl = new ControllerAccueil($url);
        }
    // GESTION DES ERREURS
    
        catch (Execption $e)
        {
            $errorMsg = $e->getMessage();
          //  require_once('views/viewError.php');
            $this->_view = new View('Error');
            $this->_view->generate(array('error Msg' => $errorMsg ));
        }
    }
}