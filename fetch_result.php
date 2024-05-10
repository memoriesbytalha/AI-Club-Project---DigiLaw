<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $crime = $_POST["crime"];

   
    $sql = "SELECT ConcernedInformation FROM firsttable WHERE NameOfCrime = '$crime'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
       
        if (mysqli_num_rows($result) > 0) {
           
            $row = mysqli_fetch_assoc($result);
            $punishment = $row["ConcernedInformation"];

          
            $output = "<div class='chat response'>";
            $output .= "<span> $punishment</span>";
            $output .= "</div>";
           

           
            echo $output;
        } else {// no rows
            echo "<div class='chat response'>";
            echo "<span>Sorry, no information found for the entered crime.</span>";
            echo "</div>";
        }
    } else {
      
        echo "Error: " . mysqli_error($conn);
    }


    mysqli_free_result($result);

} else {
    echo "No crime entered.";
}


mysqli_close($conn);
?>
