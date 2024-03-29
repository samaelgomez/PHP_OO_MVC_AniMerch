<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/';
include ($path . 'model/connect.php');

function executor($query) {
    $connection = connect::con();
    $res = mysqli_query($connection, $query);

    if($res == true) {
        try {
            $data = [];
            while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
                $data[] = $row;
            }
        } catch (\Throwable $th) {
            $data = [];
        }
    } else{
        return $data = null;
    }

    connect::close($connection);

    return $data;
}