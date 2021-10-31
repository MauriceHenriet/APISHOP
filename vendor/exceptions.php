<?php


class NotFoundException extends Exception {
    public function __construct() {
        // parent::__construct('Page non trouvée.', 404);
        $response=array(
            'status' => 404,
            'status_message' =>'Mauvaise requete.'
        );
        echo json_encode($response);
    }
}


class NotAllowedException extends Exception {
    public function __construct() {
        // parent::__construct('Accès refusé.', 403);
        $response=array(
            'status' => 403,
            'status_message' =>'Accès refusé.'
        );
        echo json_encode($response);
    }
}
