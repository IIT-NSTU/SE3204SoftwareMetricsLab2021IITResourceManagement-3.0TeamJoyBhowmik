<?php



$ResourceID = $_POST['decreaseId'];
$decreasedAmount = $_POST['decreasedAmount'];

// $selectsql= "SELECT * from resource where `id`= $ResourceID and `amount` >= $decreasedAmount";
// $res = mysqli_query($conn, $selectsql);

// if(mysqli_num_rows($res) >0)
// {
    function decreaseResources($ResourceID ,$decreasedAmount)
    {
        include('DatabaseConnection.php');
        $sql = "UPDATE resource
        SET amount = amount - $decreasedAmount
        WHERE `id`=$ResourceID";
    
        $res = mysqli_query($conn, $sql);
        return $res;
    
    }    

    if(decreaseResources($ResourceID ,$decreasedAmount)){

        echo '<script>alert("Resource decreased successfully!");
            location= "UpdateResources.php";
            </script>';
    }

//}
// else
// {
//     echo '<script>alert("Invalid decreased amount!");
//         location= "UpdateResources.php";
//         </script>';
// }



?>

