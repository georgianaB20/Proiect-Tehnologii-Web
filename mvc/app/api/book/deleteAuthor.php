<?php
//headers
header('Access-Controll-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

include_once '../../../config/Database.php'; #aducem baza de date
include_once '../../models/Author.php'; #aducem modelele necesare

//Instatiem BD & connect

$database = new Database();
$db = $database->connect();

//instantiem autorii
$author=new Author($db);

//get raw posted data
//$data = json_decode(file_get_contents("php://input"));
$author->id = isset($_GET['id'])? $_GET['id']:die();
//set ID to update

//delete user
if($author->delete()) {
    echo json_encode(
        array('message' => 'Author Deleted')
    );
}
else {
    echo json_encode(
        array('message' => 'Author Not Deleted')
    );
}

