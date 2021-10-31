<?php

class MagasinCRUDController {
    /**
     * Affiche tous les magasins
     */
    public function afficherLesMagasins() {
        require Config::MODELS . '/MagasinModel.php';
        $magasinModel = new MagasinModel;
        $magasins = $magasinModel->recupererLesMagasins();

        $reponse = array(
            'status' => 200,
            'status_message' =>'liste des magasins',
            'datas' => $magasins
        );

        echo json_encode($reponse);

    }

    /**
     * Affiche tous les magasins d'une catégorie
     */
    public function afficherLesMagasinsCategorie() {
        require Config::MODELS . '/MagasinModel.php';
        $magasinModel = new MagasinModel;
        $magasins = $magasinModel->recupererLesMagasinsCategorie();

        $reponse = array(
            'status' => 200,
            'status_message' =>'liste des magasins de la catégorie '.$_POST["categorie"],
            'datas' => $magasins
        );

        echo json_encode($reponse);
    }

    /**
     * Affiche tous les magasins trié et par ordre Ascendant ou descendant
     */
    public function afficherLesMagasinsTri() {
        require Config::MODELS . '/MagasinModel.php';
        $magasinModel = new MagasinModel;
        $magasins = $magasinModel->recupererLesMagasinsTri();

        $reponse = array(
            'status' => 200,
            'status_message' =>'liste des magasins trié par '.$_POST["tri"].' et par ordre '.$_POST["ordre"],
            'datas' => $magasins
        );

        echo json_encode($reponse);
    }    


    /**
     * Ajoute un magasin
     */
    public function ajouterMagasin() {
        if (!empty($_POST)) {
            // Si $_POST n'est pas vide
            // Le formulaire a été soumis
            if (
                !empty($_POST['nom'])
                && !empty($_POST['adresse'])
                && !empty($_POST['categorie'])
            ) {
                require Config::MODELS . '/MagasinModel.php';
                $magasinModel = new MagasinModel;
                $result = $magasinModel->ajouterMagasin();

                if($result){
                    $reponse = array(
                        'status' => 200,
                        'status_message' =>'magasin '.$_POST["nom"].' ajouté',
                    );
            
                    echo json_encode($reponse);
                }

                
            } else {
                $erreur = 'Formulaire mal rempli';
                $reponse = array(
                    'status' => 500,
                    'status_message' =>$erreur,
                );
                echo json_encode($reponse);
            }
        }
    }

    /**
     * Modifie un magasin
     */
    public function modifierMagasin() {
        $_PUT = array();
        parse_str(file_get_contents('php://input'), $_PUT);
        if (!empty($_PUT)) {
            // Si $_POST n'est pas vide, le formulaire a été soumis
            if (
                !empty($_PUT['nom'])
                && !empty($_PUT['id'])
                && !empty($_PUT['adresse'])
                && !empty($_PUT['categorie'])
            ) {
                require Config::MODELS . '/MagasinModel.php';
                $magasinModel = new MagasinModel;
                $result = $magasinModel->modifierMagasin($_PUT);

                if($result){
                    $reponse = array(
                        'status' => 200,
                        'status_message' =>'magasin '.$_PUT["nom"].', id='.$_PUT["id"].' a été modifié',
                    );
            
                    echo json_encode($reponse);
                }

                
            } else {
                $erreur = 'Formulaire mal rempli';
                $reponse = array(
                    'status' => 500,
                    'status_message' =>$erreur,
                );
                echo json_encode($reponse);
            }
        }
    }

    /**
     * Supprimer un magasin
     */
    public function supprimerMagasin() {
        if($_SERVER['REQUEST_METHOD'] === "DELETE"){
            parse_str(file_get_contents('php://input'), $data);
            $id= $data["id"];

            require Config::MODELS . '/MagasinModel.php';
            $magasinModel = new MagasinModel;

            $result = $magasinModel->supprimerMagasin($id);

            if($result == 1){
                $reponse = array(
                    'status' => 200,
                    'status_message' =>'le magasin '.$id.' a bien été supprimé',
                );
            } else {
                $reponse = array(
                    'status' => 400,
                    'status_message' =>'ce magasin '.$id.' n\'était pas dans la base de donnée',
                );            
            }
            echo json_encode($reponse);
        }
        
    }  
}
