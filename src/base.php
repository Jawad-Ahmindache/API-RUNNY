<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
$app = new \Slim\App;

// Requete POST

//MODIFIER
$app->post('/exempleModule/modifier', function( Request $request, Response $response){
    
    $exemple = $request->getParam('exemple'); // Avoir une donnée passée en parametre
    
    $sql = "RENTRE SQL UPDATE ICI";
    try {
        $db = new db();
        $db = $db->connect();
        $stmt = $db->prepare( $sql );
        $stmt->bindParam(':example', $exemple, PDO::PARAM_INT);
        $stmt->execute();
    }
    catch( PDOException $e ) {
        echo courseJSONResponse($e->getMessage(),'error');
    }
});

// AJOUTER
   $app->post('/exempleModule/ajouter', function( Request $request, Response $response){
    $exemple = $request->getParam('exemple'); // Avoir une donnée passée en parametre
    
    $sql = "RENTRE SQL UPDATE ICI";

    try {
       $db = new db();
       $db = $db->connect();
       $stmt = $db->prepare( $sql );
       $stmt->bindParam(':exemple', $exemple, PDO::PARAM_INT);
       $stmt->execute();
    }
    catch( PDOException $e ) {
        echo courseJSONResponse($e->getMessage(),'error');
    }
 });
//

   

//REQUETE GET Afficher quelque chose
$app->get('/exempleModule/get/{param1}/{param2}', function( Request $request, Response $response){
    // Récupérer les paramètres
    $param1 = $request->getAttribute('param1');
    $param2 = $request->getAttribute('param2');
    $sql = "INSERER SQL SELECT";
    try {
    // Get DB Object
    $db = new db();
    // connect to DB
    $db = $db->connect();
    $stmt = $db->prepare( $sql );
    $stmt->bindParam(':param1', $param1, PDO::PARAM_INT);
    $stmt->bindParam(':param2', $param2, PDO::PARAM_INT);
    $stmt->execute();

    $resultat = $stmt->fetchAll( PDO::FETCH_ASSOC );
    // destruction de l'objet db
     $db = null; 
    // Affichage du résultat au format JSON en transformant le chiffes en int
       echo courseJSONResponse("Exemple de message",'success',$resultat);

    } catch( PDOException $e ) {
    // return error message as Json format
       echo courseJSONResponse($e->getMessage(),'error');

    }
});


//REQUETE DELETE SUPPRIMER quelque chose
$app->delete('/exempleModule/delete/{param1}', function( Request $request, Response $response){
    // Récupérer les paramètres
    $param1 = $request->getAttribute('param1');
    $sql = "INSERER SQL SELECT";
    try {
    // Get DB Object
    $db = new db();
    // connect to DB
    $db = $db->connect();
    $stmt = $db->prepare( $sql );
    $stmt->bindParam(':param1', $param1, PDO::PARAM_INT);
    $stmt->execute();

    $resultat = $stmt->fetchAll( PDO::FETCH_ASSOC );
    // destruction de l'objet db
     $db = null; 
    // Affichage du résultat au format JSON en transformant le chiffes en int
       echo courseJSONResponse("Exemple de message",'success',$resultat);

    } catch( PDOException $e ) {
    // return error message as Json format
       echo courseJSONResponse($e->getMessage(),'error');

    }
});
   
?>
