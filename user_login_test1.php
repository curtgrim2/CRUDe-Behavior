<!DOCTYPE>
<html>
<head>
<!--<script src="https://code.jquery.com/jquery-3.1.1.js"></script> -->
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>


  <style>
  body{

  background-color: darkgrey;/*background-color: #4f4357;*/
  color:white;
  /*background-image: linear-gradient(#4f4357 80%,darkgrey 10%,black 10%);
  */

  }

  h1, h2{
    text-align: center;
  }


   .overall{
     position:relative;
     width:100%;
     height:100%;
   }

  div{

  }
  .createbox{
    color:black;
    text-shadow: 0px 0px 0px black;
    border:3px black solid;
    background-color: #ededed; /*#6e2e99;*/
    width:25%;
    height:33%;
    margin-left: auto;
    margin-right: auto;
    position:absolute;
    top:10%;
    left:20%;
  }

  .deletebox{
    color:white;
    background-color:black;
    text-shadow:0px 0px 0px white;
    border:red 3px solid;
    width:25%;
    height:33%;
    position:absolute;
    /*top:25%;
    left:62.5%;*/
    top:70%;
    left:55%;

  }

  .accounts{
    /*style = 'height:100%; width: 100%; position:absolute'*/
    background-color: darkgrey;
    text-shadow: 1px 1px 0px black;
    border:2px black dashed;
    height:90%;
    width:15%;
    color:white;
    /*float:left*/
    position: absolute;
    top:5%;
    overflow:auto;

  }

  .checkuserbox{
    text-shadow: 2px 2px 1px black;
    background-color: tan;
    border:white 3px solid;
    width:25%;
    height:33%;
    position:absolute;
    /*top:62.5%;
    left:25%;*/
    top:40%;
    right:40%;
  }

  .clickbutton{
    cursor:pointer;
  }


.updatebox{
  background-color: lightblue;
  border: 3px solid blue;
  color:black;
  position:absolute;
  width:25%;
  height:33%;
  visibility: hidden;
}
  #answer{
    color:white;
  }

  </style>

</head>

<body>

  <?php
$conn = mysqli_connect("localhost","root");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT username, password FROM testdb3.testtable3";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  echo "<div class = 'accounts'>";
  while($row = $result->fetch_assoc()) {
    echo " Username: " . $row["username"]. "<br>". " Password: " . $row["password"]. "<br> ";
  }

}

else {
  echo "0 results";
}
echo "</div>";
$conn->close();
/*
$sql = "INSERT INTO `testdb3`.`testtable3`
(`username`,
`password`)
VALUES
('joesmoe',
'passnumber');" */

?>


<script type="text/javascript">
//document.getElementbyId("checksubmit").onclick = function(){loadUp2AJAX()};
function loadUp1(){
     var username=$('#username').val();
     var password = $('#password').val();
     //alert("This should work");
     $.post("mainuser_login_test.php",'username='+username +'&password=' +password, function(result,status,xhr) {
             if( status.toLowerCase()=="error".toLowerCase() )
             { alert("An Error Occurred.."); }
             else {

                // alert(result);
                 $('#answer').html(result);
             }
         })
         .fail(function(){ alert("something went wrong. Please try again") });
 }


function loadUp2(){
     var username2=$('#username2').val();
     $.get("checkusername.php",'username2='+username2,function(result,status,xhr) {
             if( status.toLowerCase()=="error".toLowerCase() )
             { alert("An Error Occurred.."); }
             else {

                 alert(result);
                 $('#answer').html(result);
             }
         })
         .fail(function(){ alert("something went wrong. Please try again") });
 }
/*
$(function() {
    $( "#checksubmit" ).on( "click", function() {
        alert("clicked");
    });
});*/

/*$(function() {
  $("#deletebut").on("click",function(){
      var username3 = $("#username3").val();
      var password3 = $("#password").val();

    $.post()


  })

});*/ /*Create 2nd button/function that precedes this that unveils a div
  in front of the screen and asks user if they're sure. From then THAT button in THAT div will trigger this function*/

function loadUp2AJAX(){

//var username2 = document.getElementbyId("usernameout"); //wON'T WORK HERE; This is a javascript function not a jGrasp on
 var username2=$('#usernameout').val();
  if(usernameout)
  {
   $.ajax({
   type: 'GET',
   url: 'checkusername.php?username_2='+username2,
   /*   data: {
       username_2:username2,
      },  */
   success: function (response) {
    // We get the element having id of display_info and put the response inside it
    $( '#answer' ).html(response);
   }
   });
  }

  else
  {
   $( '#answer' ).html("Please Enter Some Words");
  }

}

</script>


<div class = "overall">
<h1>CRUD(e) Behavior</h2>


<div class = "createbox">
  <h1>Enter credentials to verify if account exists </h1>


<form onsubmit="" action = "mainuser_login_test.php" method = "post" name = "firstbox"> <!--Have the action filled out if you want page redirect to  the php-->
<div> Add Username: </div>
<input id = "username" type = "text" name = "username"/>
<br/>
<div> Add Password: </div>
<input id = "password" type = "password" name = "password"/>

<input class = "clickbutton" type = "submit" value = "Submit" />
</form>
</div>

<!--<form name = "box2" method = "get" onsubmit="loadUp2AJAX();" action = "">
<input id = "username2" type= "text" name = "username2"/>

<input id = "submit" type = "submit" value="Check"/>


</form> --> <!--<form action = "checkusername.php" method="get" target = "_blank">  -->

<div class = "deletebox">
<form name = "deleteform" method = "post" action = "deleteuser.php" onsubmit="">
<h2> TIME TO DELETE?</h2>

<div>Username:</div> <input type = "text" name = "username3" id ="username3" />

<div>Password:</div> <input type = "password" name = "password3" id = "password3" />
<input class = "clickbutton" type = "submit" value = "DELETE" id = "deletebut"/>
</form>
</div>


<div class = "checkuserbox">
  <h2>Does the following username exist?</h2>
<input type = "text" id = "usernameout"/>
<div id = "answer"> ...</div>
<button id =  "checksubmit" class = "clickbutton" onclick = "loadUp2AJAX()"> Lets Check</button>
</div>


<div class = "updatebox">
<h2>Update username or password?  </h2>
<input type = "text" />

</div>

</div> <!--For .overall div -- >
</body>
</html>
