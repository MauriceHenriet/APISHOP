APISHOP

Environnement : XAMPP, avec MySQL (MariaDB, version 10.4.19) et PHP 7.4.20

1 - dézipper l'application APISHOP dans C:\xampp\htdocs\

2 - installer la base de données à partir du fichier _apishop.sql

3 - vérifier/modifier vos paramètres de connection à la BDD dans APISHOP\src\vendor\config.php


MODE D'EMPLOI DE L'API :
A -Récupérer la liste des magasins (méthode GET) : http://localhost/apishop/index.php/magasins

B -Récupérer la liste des magasins filtrés par la catégorie (méthode POST) : http://localhost/apishop/index.php/magasins-categorie
Paramètres (dans body en x-www-form-urlencoded) : 
{ categorie : [ bricolage ou vetements ou restauration ou chaussure] },  
par exemple { categorie : restauration }

C -Récupérer la liste des magasins triés (méthode POST) : http://localhost/apishop/index.php/magasins-tri
Paramètres (dans body en x-www-form-urlencoded) : 
{ tri : [id ou nom ou adresse ou categorie] , ordre : [DESC ou ASC]} 
par exemple { tri : categorie , ordre : DESC }

D - Ajouter un magasin (méthode POST) : http://localhost/apishop/index.php/magasin-ajout
Paramètres (dans body en x-www-form-urlencoded) :
{ nom : xxx , adresse : yyyyyyyy , categorie : [ bricolage ou vetements ou restauration ou chaussure ou zzzzzzzzzzzzz] } 
par exemple { nom : tartampion , adresse : avenue des Champs 75008 , categorie bricolage }

E - Modifier un magasin (méthode PUT) : http://localhost/apishop/index.php/magasin-modifier
Paramètres (dans body en x-www-form-urlencoded) :
{ id = un_id_existant, nom : xxx , adresse : yyyyyyyy , categorie : [ bricolage ou vetements ou restauration ou chaussure ou zzzzzzzzzzzzz] } 
par exemple { id : 1 , nom : tartampion2 , adresse : avenue des Champs 75008 , categorie bricolage }

F - Supprimer un magasin (méthode DELETE) : http://localhost/apishop/index.php/magasin-supprimer
Paramètres (dans body en x-www-form-urlencoded) :
{ id = un_id_existant } 
par exemple { id : 1 }