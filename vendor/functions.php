<?php

	function se_connecter() {
        $bdd = new PDO('mysql:host=localhost;dbname=_apishop', 'root', '');
    
        return $bdd;
    }