<?php
$content = file_get_contents("php://input");
$data = json_decode($content);


if (json_last_error() === JSON_ERROR_NONE) {
    var_dump($data);
    echo $data->message;
    echo $data->id;
}

$conn = mysqli_connect("localhost", "root", "", "ticket");
mysqli_query($conn, "INSERT INTO comments (ticket_id,mescription) VALUES ('$data->id','$data->message')");