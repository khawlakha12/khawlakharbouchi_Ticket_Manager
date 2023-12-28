<?php
$id = $_GET["id"];

$conn = mysqli_connect("localhost", "root", "", "ticket");
$result = mysqli_query($conn, "SELECT * FROM comments WHERE ticket_id = '$id'");
$htmlreturn = "";
while ($row = mysqli_fetch_assoc($result)) {
    $htmlreturn .= '<h1 class="h-auto w-11/12 mx-auto p-1 border border-black rounded-lg italic font-medium text-lg text-blue-600/100">' . $row["mescription"] . '</h1>';
}
echo $htmlreturn;
