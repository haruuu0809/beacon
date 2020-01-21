<?php

//creating response array
$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){

    //getting values
    $date = $_POST['date'];
    $flag = $_POST['flag'];

    //including the db operation file
    require_once '../includes/DbOperation.php';

    $db = new DbOperation();

    //inserting values
    if($db->beacon($date,$flag)){
        $response['error']=false;
        $response['message']='Data added successfully';
    }else{

        $response['error']=true;
        $response['message']='Could not add data';
    }

}else{
    $response['error']=true;
    $response['message']='You are not authorized';
}
echo json_encode($response);
?>
