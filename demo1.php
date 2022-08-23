<?php
header('Access-Control-Allow-Origin: *');
if(isset($_GET['data'])){
    echo json_encode(array('status'=>"data get successsfully"));
}
else{
    echo json_encode(array('status'=>"data not get"));
}

?>