<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<style type="text/css">{
    margin: 0;
    padding: 0;
    background-color:#6abadeba;
    font-family: 'Arial';
}
.login{
        width: 382px;
        overflow: hidden;
        margin: auto;
        margin: 20 0 0 450px;
        padding: 80px;
        background: #23463f;
        border-radius: 15px ;

}
h2{
    text-align: center;
    color: #277582;
    padding: 20px;
}
label{
    color: #08ffd1;
    font-size: 17px;
}
#Uname{
    width: 300px;
    height: 30px;
    border: none;
    border-radius: 3px;
    padding-left: 8px;
}
#Pass{
    width: 300px;
    height: 30px;
    border: none;
    border-radius: 3px;
    padding-left: 8px;

}
#log{
    width: 300px;
    height: 30px;
    border: none;
    border-radius: 17px;
    padding-left: 7px;
    color: blue;


}
span{
    color: white;
    font-size: 17px;
}
a{
    float: right;
    background-color: blue;
}
#error{
	color: red;
}
</style>
    <h2>Login Page</h2><br>
    <div class="login">
    	  <?php if(isset($error)) echo $error; ?>
    	<div id="error"> <?php echo validation_errors(); ?></div>
    <form id="login" method="post" action="<?php echo base_url('index.php/auth/login'); ?>">
        <label><b>User Email
        </b>
        </label>
        <input type="text" name="email" id="Uname" placeholder="User email">
        <br><br>
        <label><b>Password
        </b>
        </label>
        <input type="Password" name="password" id="Pass" placeholder="Password">
        <br><br>
        <input type="submit" name="log" id="log" value="Log In">
        <br><br>
        <!-- <input type="checkbox" id="check">
        <span>Remember me</span> -->
        <br><br>
         <a href="<?php echo base_url('index.php/auth/register'); ?>">Register</a>
    </form>
</div>
</body>
</html>