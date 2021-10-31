<?php

require 'Model.php';

class MagasinModel extends Model {


    /**
     * Récupère tous les magasins de la table magasin
     */
    public function recupererLesMagasins()
    {
        $reponse = $this->bdd->query('SELECT * FROM magasin');
        $magasins = $reponse->fetchAll();

        return $magasins;
    }

    /**
     * Récupère tous les magasins de la table magasin filtré par la categorie
     */
    public function recupererLesMagasinsCategorie()
    {
        $categorie = $_POST["categorie"];
        $reponse = $this->bdd->query('SELECT * FROM magasin WHERE categorie ="'.$categorie.'"');
        $magasins = $reponse->fetchAll();

        return $magasins;
    }    

    /**
     * Récupère tous les magasins de la table magasin trié
     */
    public function recupererLesMagasinsTri()
    {
        $ordre = $_POST["ordre"];
        $tri = $_POST["tri"];
        $reponse = $this->bdd->query('SELECT * FROM magasin ORDER BY '.$tri.' '.$ordre);
        $magasins = $reponse->fetchAll();

        return $magasins;
    }

    /**
     * Ajouter un magasin
     */
    public function ajouterMagasin()
    {
  
        $nom = $_POST["nom"];
        $adresse = $_POST["adresse"];
        $categorie = $_POST["categorie"];
        $reponse = $this->bdd->query('INSERT INTO magasin (nom, adresse, categorie) VALUES ("'.$nom.'", "'.$adresse.'", "'.$categorie.'")');

        return $reponse;
    }

    /**
     * Ajouter un magasin
     */
    public function modifierMagasin($_PUT)
    {
        $id = $_PUT["id"];
        $nom = $_PUT["nom"];
        $adresse = $_PUT["adresse"];
        $categorie = $_PUT["categorie"];
        $reponse = $this->bdd->query('UPDATE magasin SET nom="'.$nom.'", adresse="'.$adresse.'", categorie="'.$categorie.'" WHERE id='.$id);

        return $reponse;
    }

    /**
     * Supprimer un magasin
     */
    public function supprimerMagasin($id)
    {
        $reponse = $this->bdd->exec('DELETE FROM magasin WHERE id='.$id);

        return $reponse;
    }

    
}