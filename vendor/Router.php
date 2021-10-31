<?php

class Router {
    private $route;

    /**
     * Construit le Router
     * 
     * Prend la valeur de $_SERVER['PATH_INFO']
     * pour la stocker dans $this->route
     * (ou bien la valeur par défaut "/accueil")
     */
    public function __construct() {
        if (isset($_SERVER['PATH_INFO'])) {
            // Si on a un endpoint
            $this->route = $_SERVER['PATH_INFO'];
            // echo "test";
        }
    }

    /**
     * Appelle le bon contrôleur en fonction de la route appelée
     */
    public function handleRequest() {
        switch ($this->route) {
            case '/magasins':
                // On instancie le bon contrôleur
                require Config::CONTROLLERS_CRUD . '/MagasinCRUDController.php';
                // On instancie le contrôleur
                $controller = new MagasinCRUDController;
                // On appelle la méthode de notre contrôleur
                $controller->afficherLesMagasins();
                break;

            case '/magasins-categorie':
                require Config::CONTROLLERS_CRUD . '/MagasinCRUDController.php';
                $controller = new MagasinCRUDController;
                $controller->afficherLesMagasinsCategorie();
                break;  
                
            case '/magasins-tri':
                require Config::CONTROLLERS_CRUD . '/MagasinCRUDController.php';
                $controller = new MagasinCRUDController;
                $controller->afficherLesMagasinsTri();
                break;     

            case '/magasin-ajout':
                require Config::CONTROLLERS_CRUD . '/MagasinCRUDController.php';
                $controller = new MagasinCRUDController;
                $controller->ajouterMagasin();
                break;

            case '/magasin-modifier':
                require Config::CONTROLLERS_CRUD . '/MagasinCRUDController.php';
                $controller = new MagasinCRUDController;
                $controller->modifierMagasin();
                break;
                
            case '/magasin-supprimer':
                require Config::CONTROLLERS_CRUD . '/MagasinCRUDController.php';
                $controller = new MagasinCRUDController;
                $controller->supprimerMagasin();
                break;  

            default:
                // Erreur 404
                // include Config::DOSSIER_VIEWS . '/errors/404.html.php';
        }
    }

    public function getRoute() {
        return $this->route;
    }
}


