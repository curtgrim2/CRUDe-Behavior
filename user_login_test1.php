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

  form{
    /*background-color: pink;
    box-sizing:border-box;*/
    }

  h1, h2{
    text-align: center;
  }

  .fadedtext1, .fadedtext2{
    opacity: 1;
    /*visibility: hidden;*/
    /*display:none;*/
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
    position:relative;
    top:0%;
    right:20%;

  }

  .checkuserbox{
    text-shadow: 2px 2px 1px black;
    background-color:tan; /*#c7c0a5;*/
    border:white 3px solid;
    width:25%;
    height:33%;
    position:absolute;
    /*top:62.5%;
    left:25%;*/
    top:40%;
    right:40%;
  }

  .deletebox{
    color:white;
    background-color:black;/*#a86a6c;*/
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


  .updatebox{
    background-color: #dff7f7;
    border: 3px solid blue;
    color:black;
    position:absolute;
    width:25%;
    height:50%;
    /*height:90%;*/
    position:relative;
    left:70%;
    bottom:35%;
    /*visibility: hidden;*/
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

  .clickbutton{
    cursor:pointer;
  }

  #passchangeb{
    /*display:none;*/
  }

  #answer{
    color:white;
  }

  #rusure{
    background-color:black;
    width:50%;
    height:50%;
    position:absolute;
    bottom:25%;
    left:25%;
    border:white 3px solid;
    text-align:center;

    visibility: hidden;
        /*Have surrounding screen fade into "black opacity"*/
  }

  #credhelp{
    background-color: black;
    color:white;
    border-radius: 50%;
    width:7%;
    height:9%;
    font-size:100%;
    text-align:center;
    cursor:default;
    position:absolute;
    left:85%;
  }

  #credentialstatus{
    font-size: .7em;
    color:red;
  }

  .popupbutton{
    width:25%;
    height:25%;
    cursor:pointer;
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
/*
$(document).ready(function(){
  $('#enablepass').click(function(){

//$("#oldpass").removeAttr('disabled');
//$("#newpass").removeAttr('disabled');
//$("#enablepass").hide();
//$("#passchangeb").css("display","block");
$(".fadedtext2").css("opacity", "1");
  })
});
*/

function checkCheckbox1(){

  if($("#enableuser").prop("checked")){
    //  alert("Checked");
      $(".fadedtext1").css("opacity","1");
      $("#newuser").removeAttr('disabled');
  }

  else{
    //  alert("uNCHECKED");
    $(".fadedtext1").css("opacity",".5");
    $("#newuser").attr('disabled','disabled');
  }
}


function checkCheckbox2(){
if ($("#enablepass").prop("checked")){
  $(".fadedtext2").css("opacity","1");
  $("#newpass").removeAttr('disabled');
}
else{
  $(".fadedtext2").css("opacity",".5");
  $("#newpass").attr('disabled','disabled');
}
}



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
   $( '#answer' ).html("Please Enter Some Words");  //Does this work?
  }
}

function usernamecred(){
  var username = $("#username").val();
  var password = $("#password").val();

  //alert("Did this work:" + username + password);
  return;
  alert("Should stop");
}

function update4User(){

  var olduser = $("#olduser").val();
  var newuser = $("#newuser").val();
  var oldpass = $("#oldpass").val();
  var newpass = $("#newpass").val();


//alert(olduser + "," + newuser + "," + oldpass + "," + newpass + ","); //newpass.value

//if($("enableuser").prop("checked") && $("enablepass").prop("checked")){
  $.ajax({
    type:'POST',
    url:'user_update.php?olduser='+olduser+'&newuser='+newuser+ '&oldpass=' + oldpass+ '&newpass='+newpass, //'user_update.php',////
   /*data:{
      olduser:olduser,
      newuser:newuser,
      oldpass: oldpass,
      newpass:newpass
    },*/
    success: function(response){

      //alert(response);
      $("#updatestatus").html(response);
    }
  }) }
/*
  else{
    alert("CHECK BOTH PLEASE");
  }*/

  /*else if($("enablepass").prop("checked")&& $("enableuser").prop("unchecked")){
    $.ajax({
      type:'POST',
      url:'user_update.php?'
    })
  }

  else{

  }*/


//}

$(document).ready(function(){
  $("#firstbox").submit(function(e){

  //  var username = $("#username").val();
    var password = $("#password").val();

    var username = document.getElementById("username").value;

var regex = /[^a-zA-Z0-9 ]/;
var notvalid = regex.test(username);
//Next step is to read username value and based off of that do e.preventDefault
  if(notvalid){
  $("#credentialstatus").html("NO SPECIAL CHARACTERS OR SPACES");
    e.preventDefault();
  }


if(username.length < 5){
$("#credentialstatus").html("Not enough characters! Must be at least 5");
  e.preventDefault();
}
else if(username.length >15){
  $("#credentialstatus").html("Over 15 characters; Too many! ")
  e.preventDefault();
}
/*
switch (true){

case username.length < 5:
  alert("MORE CHARACTERS");
case username.length>15:
    alert("Too little characters");
default:
    alert("YAYYYY");

  }
  */


  });
});



function deleteCheck(){

}

/*

$("#passchangeb").click(function(){

  var olduser = $("#olduser").val();
  var newuser = $("#newuser").val();
  var oldpass = $("#oldpass").val();
  var newuser = $("#newpass").val();
  $.post("user_update.php",
  {
    olduser:olduser,
    newuser:newuser,
    oldpass: oldpass,
    newpass:newpass
  },
  function(data, status){
    alert("Data: " + data + "\nStatus: " + status);
  });
});
*/
</script>


<div class = "overall">
<h1>CRUD(e) Behavior</h2>


<div class = "createbox">
  <h1>Enter credentials to verify if account exists </h1>

<div id = "credhelp" title ="At least 5 characters + no more than 15 and no special characters">?</div>
<form id = "firstbox" onsubmit="" action = "mainuser_login_test.php" method = "post" > <!--Have the action filled out if you want page redirect to  the php-->
<div> Add Username: </div>
<input id = "username" type = "text" name = "username"/>
<br/>
<div> Add Password: </div>
<input id = "password" type = "password" name = "password"/>

<input class = "clickbutton" type = "submit" value = "Submit" onclick = "usernamecred()"/>
<div id = "credentialstatus">   </div>
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
<div id = "answer"> </div>
<button id =  "checksubmit" class = "clickbutton" onclick = "loadUp2AJAX()"> Lets Check</button>
</div>


<div class = "updatebox">
<h2>Update username or password?  </h2>
 Username:
<input type = "text" id = "olduser"/>
<span>Password:
<input type = "password" id = "oldpass" /></span>

<br>

<br>
<!--<input type = "button" id = "userchangeb" value = "Change Username" class = "clickbutton"/> -->


<!--
<span > Change Username  <input type = "checkbox"  id ="enableuser" onclick ="checkCheckbox1()"/> </span>
<span > Change Password  <input type = "checkbox"  id ="enablepass" onclick ="checkCheckbox2()"/> </span>
-->


<div class = "fadedtext1"> New Username:
<input type = "text" id = "newuser"  /></div>
<div class = "fadedtext2"> New Password:
<input type = "password" id ="newpass" /> </div>

<input type = "button"  id = "passchangeb" value = "Update credential(s)" class = "clickbutton" onclick = "update4User()"/>
<!--<button id = "passchangeb" value = "Change Password" class = "clickbutton">  </button> -->

<div id = "updatestatus"></div>
</div>


<div id = "rusure">
<h1>Are you sure you want to delete (username)'s account?</h1>
<button class = "popupbutton" >Yes, delete account </button>
<button class = "popupbutton" >Go back</button>
</div>


</div> <!--For .overall div -- >
</body>
</html>
