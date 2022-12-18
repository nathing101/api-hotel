<?php header('Access-Control-Allow-Origin: *'); ?>
<?php
require "koneksi.php";
if(function_exists($_GET['function'])){
    $_GET['function']();
}

function get_api_hotel()
{
    global $connect;
    $query = $connect->query("SELECT * FROM master_hotel");
    while ($row = mysqli_fetch_object($query))
    {
        $data[] = $row;
    }

    $response = array(
        'status' => 200,
        'message' => 'Success',
        'data' => $data,
    );
    header('Content-Type: application/json');
    echo json_encode($response);
}


function get_api_hotel_id()
{
    global $connect;
    if(!empty($_GET["id"]))
    {
    $id = $_GET['id'];

    }
    $query = "SELECT * FROM master_hotel WHERE id-$id";
    $result = $connect->query($query);
    while($row = mysqli_fetch_object($result)) 
    {
        $data[] = $row;
    }
    if($data)
    {
        $response = array(
            'status' => 200,
            'message' => 'Success',
            'data' => $data,
        );
    }else{
        $response = array(
            'status' => 404,
            'message' => 'No Data Found',
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

?>