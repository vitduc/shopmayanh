<?php
require_once '../../DB/dbConnect.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $qr = mysqli_query($conn, "DELETE FROM `admin` WHERE id = $id");
    header("LOCATION: index.php");
}
