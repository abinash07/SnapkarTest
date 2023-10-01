<?php
    session_start();
    require_once("../../connect.php");
    if(isset($_POST['state']) && isset($_POST['city']) && isset($_POST['sub_city'])){

        $userid = $_SESSION["sbuserid"];
        $state = mysqli_real_escape_string($con,$_POST['state']);
        $state = htmlentities($state);

        $city = mysqli_real_escape_string($con,$_POST['city']);
        $city = htmlentities($city);

        $sub_city = mysqli_real_escape_string($con,$_POST['sub_city']);
        $sub_city = htmlentities($sub_city);

        $query2 = "SELECT * FROM subcity WHERE name = '$sub_city'";
        $run2 = mysqli_query($con, $query2);
        if(mysqli_num_rows($run2) <= 0){
            $query = "INSERT INTO subcity (name,city_id) VALUES ('$sub_city','$city')";
            if(mysqli_query($con, $query)){

                $query4 = "SELECT * FROM subcity order by 1 desc limit 1";
                $run4 = mysqli_query($con, $query4);
                $row4 = mysqli_fetch_array($run4);
                $lastId = $row4['id'];

                $query3 = "UPDATE aboutme SET home='$lastId' WHERE userid ='$userid'";
                mysqli_query($con, $query3);
                echo 1;
            }else{
                echo 0;
            }
        }else{
            echo 2;
        }
    }   
?>