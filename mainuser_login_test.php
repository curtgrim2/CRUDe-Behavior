<!DOCTYPE html>
<html>

<head>
    <title>Insert Page page</title>
</head>

<body>
    <center>
      <?php

              // servername => localhost
              // username => root
              // password => empty
              // database name => staff
              $conn = mysqli_connect("localhost", "root");

              // Check connection
              if($conn === false){
                  die("ERROR: Could not connect. "
                      . mysqli_connect_error());
              }

              // Taking all 5 values from the form data(input)
              $username =  $_REQUEST['username'];
              $password = $_REQUEST['password'];


              if($username === "" || $password === ""){
                echo "Empty! Please enter username AND passwords.";
                exit;
              }


//Check to see if username is already taken.
              $sql = "SELECT username FROM testdb3.testtable3 WHERE username = '$username'";

              $result = $conn->query($sql);

              if ($result->num_rows > 0 ) {
                echo "Username already exists. Please create a different username.";
                exit;
              }



              $sql = "INSERT INTO testdb3.testtable3  VALUES ('$username',
                  '$password')";

              if(mysqli_query($conn, $sql)){
                  echo "<h3>data stored in a database successfully."
                      . " Please browse your localhost php my admin"
                      . " to view the updated data</h3>";

                  echo nl2br("\n$username\n $password\n ");
              } else{
                  echo "ERROR: Hush! Sorry $sql. "
                      . mysqli_error($conn);
              }

              // Close connection
              mysqli_close($conn);
              ?>
    </center>
</body>

</html>
