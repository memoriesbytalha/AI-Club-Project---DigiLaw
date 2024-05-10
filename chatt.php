<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="HTMLPages/style1.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title>Document</title>
</head>
<body>

<nav class="navbar">
  <div class="dropdown">
    <button class="dropbtn">
      <div class="image">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="35" viewBox="0 0 24 24" style="fill: white;transform: ;msFilter:;"><path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"></path></svg>
      </div>
    </button>
    <div class="dropdown-content">
      <a href="#">Home</a>
      <a href="#">About</a>
      <a href="#">Contact</a>
    </div>
  </div>
  <div class="topic">DIGI LAW</div>
  <div class="icons">
    <i class="fas fa-chevron-right"></i>
    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
  </div>
</nav>

<?php
echo "<div class='chat response' style='color: #333; background-color: #f1f1f1 !important; font-size: 16px;' >";
echo "<span>Hi, I'm DigiLaw? Regarding what matter would you like to discuss ?</span>";
echo "</div>";
?>


<div class="messagebar">
<form method="POST">
  <div class="bar-wrapper">
    <input type="text" id="crimeInput" name="crimee" placeholder="Enter the crime...">
    <button type="submit">
      <span class="material-symbols-rounded">send</span>
    </button>
  </div>
</form>
</div>

<div class="chatbox-wrapper">

<?php
include("connection.php");



// Start the message box container
echo "<div class='message-box'>";


$crime=null;
// Check if a crime has been submitted
if (isset($_POST["crime"])) {
    $crime = $_POST["crime"];
    $processingQuery = true; // Set flag to true when processing a user's query
}
//useless 
if ($crime!== null) {
    $sql = "SELECT ConcernedInformation FROM firsttable WHERE NameOfCrime = '$crime'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $punishment = $row["ConcernedInformation"];
            // Display the punishment message
            echo "<div class='chat response' style='color: #333; background-color: #f1f1f1 !important; font-size: 16px;' >";

            echo "<img src='images/logo.png'>";
            echo "<span>The punishment for '$crime' is: $punishment</span>";
            echo "</div>";
            
            echo "<br>";
     
            echo "<div class='chat response' style='color: #333; background-color: #f1f1f1 !important; font-size: 16px;' >";
            echo "<span>Do you want to ask about something else?</span>";
            echo "</div>";
            
            echo "<br>";
        } else {
            // Display a message when no information is found
            echo "<div class='chat response' style='color: #333; background-color: #f1f1f1 !important; font-size: 16px;' >";

            echo "<img src='images/logo.png'>";
            echo "<span>Sorry, no information found for the entered crime.</span>";
            echo "</div>";
        }
    } else {
        // Display an error message
        echo "<div class='chat response' style='color: #333; background-color: #f1f1f1 !important; font-size: 16px;' >";

        echo "<img src='images/logo.png'>";
        echo "<span>Error: ". mysqli_error($conn). "</span>";
        echo "</div>";
    }
    mysqli_free_result($result);
}
//useless
// Close the message box container
echo "</div>";
mysqli_close($conn);
?>


</div>

<script>
document.querySelector('form').addEventListener('submit', function(e) {
  e.preventDefault(); // Prevent the default form submission behavior
  
  var crime = document.getElementById('crimeInput').value;
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'fetch_result.php', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Create chat messages
      var resultMessage = document.createElement('div');
      resultMessage.className = 'chat response';
      resultMessage.innerHTML = xhr.responseText;

      // Get the chatbox wrapper
      var chatbox = document.querySelector('.chatbox-wrapper');

      // Append the result message to the chatbox
      chatbox.appendChild(resultMessage);
      
      // Check if the crime is a greeting
      if (crime.toLowerCase() !== "hi" && crime.toLowerCase() !== "hello" && crime.toLowerCase() !== "bye" && crime.toLowerCase()!== "Hi, Can you help me with this legal issue?" && crime.toLowerCase!=="Thank you") {
        // Create additional messages if the crime is not a greeting
        var botMessage = document.createElement('div');
        botMessage.className = 'chat response';
        botMessage.innerHTML = "<span>Here's information about what you wanted, Do you want to ask something else?  </span>";

       // var botMessage2 = document.createElement('div');
        //botMessage2.className = 'chat response';
       // botMessage2.innerHTML = "<span>Do you want to ask something else? </span>";

        // Append the additional messages to the chatbox
        chatbox.appendChild(botMessage);
        //chatbox.appendChild(botMessage2);
      }

      // Remove the event listener to prevent multiple submissions
      document.querySelector('form').removeEventListener('submit', arguments.callee);
    }
  };
  xhr.send('crime=' + encodeURIComponent(crime));
});


</script>
</body>
</html>