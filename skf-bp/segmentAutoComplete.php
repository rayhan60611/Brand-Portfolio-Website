<?php
include("connection.php");

$request = mysqli_real_escape_string($conn, $_POST["query"]);
if (isset($request)){
    $output = '';
    $sql = "SELECT DISTINCT `segment` FROM `brandportfolio` WHERE `segment` LIKE '%".$request."%' ";
    $result = mysqli_query($conn, $sql);
    $output = '<ul class = "list-unstyled">';
    if (mysqli_num_rows($result) > 0)
    {
        while ($row = mysqli_fetch_array($result))
        {
            $output .= '<li>'.$row['segment'].'</li>';
        }
    }

    else
        {
            $output .= '<li>Segment Not Found</li>';
        }
    $output .= '</ul>';
    echo $output;


}

?>