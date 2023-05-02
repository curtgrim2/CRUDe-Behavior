<!DOCTYPE>
<html>
<head>


</head>

<body>



  <?php
    $servername = "localhost:3306";
$username = "Laptizzy";
$password = "Sugarplume";

//$conn = new mysqli($servername,$username,$password);
//$conn = mysqli_connect("localhost","root","Sugarplume2","testdb3");
$conn = mysqli_connect("localhost","root");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";


$sql = "SELECT username, password FROM testdb3.testtable3";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "Username: " . $row["username"]. "<br>". " Password: " . $row["password"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
/*
$sql = "INSERT INTO `testdb3`.`testtable3`
(`username`,
`password`)
VALUES
('joesmoe',
'passnumber');" */

?>

<script>

function loadUp(){

  const xhttp = new XMLHttpRequest();
  xhttp.onload = function(){

  /*  if(this.responseText == ){

  } */

  document.getElementbyId("answer").innerHTML = this.responseText;
  }

  xhttp.open("GET","checkusername.php?q="+ "username2")
}

</script>



<div id = "form1">
  <h1>Enter credentials to verify if account exists </h1>


<form action = "mainuser_login_test.php" method = "post" name = "credentials">
<div> Add Username: </div>
<input type = "text" name = "username"/>
<br/>
<div> Add Password: </div>
<input type = "password" name = "password"/>

<input id = "clickbutton" type = "submit" value = "Submit" onclick=""/>

<div id = "answer"> </div>
</form>




</div>

<form action = "checkusername.php" method="get"> <!--  -->
<div>Check username </div>
<input type= "text" name = "username2"/>

<input type = "submit" value="Check" />


</form>

<style>
body{

background-color:  #4f4357;
color:white;
/*background-image: linear-gradient(#4f4357 80%,darkgrey 10%,black 10%);
*/

}

div{
  text-shadow: 2px 2px 1px black;
}
#form1{
  border:3px red solid;
  background-color:#6e2e99;
  width:50%;
  height:33%;
  margin-left: auto;
  margin-right: auto;

  position:absolute;
  top:25%;
  left:25%;
}

#clickbutton{
  cursor:pointer;
}

#answer{
  color:white;
}

</style>
</body>

</html>
