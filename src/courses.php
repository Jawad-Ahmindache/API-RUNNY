<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;



//REQUETE GET Afficher quelque chose
$app->get('/courses/get/{nom}/{mode}', function( Request $request, Response $response){
    // Récupérer les paramètres
    $nom = $request->getAttribute('nom');
    $mode = $request->getAttribute('mode');
    $sql = "SELECT Nom,Mode,Distance,Duree,HeureDepart,LongueurPiste FROM course WHERE Nom = :nom AND Mode = :mode";
    try {
    // Get DB Object
    $db = new db();
    // connect to DB
    $db = $db->connect();
    $stmt = $db->prepare( $sql );
    $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
    $stmt->bindParam(':mode', $mode, PDO::PARAM_INT);
    $stmt->execute();

    $resultat = $stmt->fetchAll( PDO::FETCH_ASSOC );
    // destruction de l'objet db
     $db = null; 
    // Affichage du résultat au format JSON en transformant le chiffes en int
       echo courseJSONResponse("Course",'success',$resultat);

    } catch( PDOException $e ) {
    // return error message as Json format
       echo courseJSONResponse($e->getMessage(),'error');

    }
});


//Info course grâce à son ID

$app->get('/courses/id/{id}', function( Request $request, Response $response){
   // Récupérer les paramètres
   $id = $request->getAttribute('id');
   $sql = "SELECT Nom,Mode,Distance,Duree,HeureDepart,LongueurPiste FROM course WHERE Id = :id";
   try {
   // Get DB Object
   $db = new db();
   // connect to DB
   $db = $db->connect();
   $stmt = $db->prepare( $sql );
   $stmt->bindParam(':id', $id, PDO::PARAM_INT);
   $stmt->execute();

   $resultat = $stmt->fetchAll( PDO::FETCH_ASSOC );
      
   // destruction de l'objet db
    $db = null; 

   // Affichage du résultat au format JSON en transformant le chiffes en int
      echo courseJSONResponse("Course",'success',$resultat);

   } catch( PDOException $e ) {
   // return error message as Json format
      echo courseJSONResponse($e->getMessage(),'error');

   }
});