<?php
$conn=new mysqli("localhost","root","","ticketing");
$usse = isset($_GET['usse'])?$_GET['usse']:'';
$pastee = isset($_GET['pastee'])?$_GET['pastee']:'';
if($usse!='' && $pastee!='')
{
$name='';
$sql="select name,usse,mobile,email,pastee from deeds where usse='$usse' and pastee='$pastee'";
$row=$conn->query($sql);
if($row->num_rows>0)
{
while($data=$row->fetch_assoc())
{
 
	$name=$data['name'];
	$usse=$data['usse'];
	$mobile=$data['mobile'];
	$email=$data['email'];
	$pastee=$data['pastee'];
	$_SESSION['name']=$name;
	$_SESSION['email']=$email;
  header('Location:dashboard1.php');
}
}	
else{
  $error="Invalid login details";
}
}
?>


<!doctype html>
<html>

<html>
<title>Centrepoint Travels - Admin Panel</title>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="Image/centerpoint.png" rel="icon">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Encode+Sans:wght@300&family=Handlee&family=Jaldi&display=swap"
        rel="stylesheet">
</head>

<style>
@use postcss-preset-env {
    stage: 0;
}

/* config.css */

:root {
    --baseColor: #606468;
}

/* helpers/align.css */

.align {
    display: grid;
    place-items: center;
}

/* helpers/grid.css */

.grid {
    inline-size: 90%;
    margin-inline: auto;
    max-inline-size: 20rem;
}

/* helpers/hidden.css */

.hidden {
    border: 0;
    clip: rect(0 0 0 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
}

/* helpers/icon.css */

:root {
    --iconFill: var(--baseColor);
}

.icons {
    display: none;

}

.icon {
    block-size: 1em;
    display: inline-block;
    fill: var(--iconFill);
    inline-size: 1em;
    vertical-align: middle;


}

/* layout/base.css */

:root {
    --htmlFontSize: 100%;

    --bodyBackgroundColor: #2c3338;
    --bodyColor: var(--baseColor);
    --bodyFontFamily: "Open Sans";
    --bodyFontFamilyFallback: sans-serif;
    --bodyFontSize: 0.875rem;
    --bodyFontWeight: 400;
    --bodyLineHeight: 1.5;
}

* {
    box-sizing: inherit;
}

html {
    box-sizing: border-box;
    font-size: var(--htmlFontSize);
}

body {
    background-color: var(--bodyBackgroundColor);
    color: var(--bodyColor);
    font-family: var(--bodyFontFamily), var(--bodyFontFamilyFallback);
    font-size: var(--bodyFontSize);
    font-weight: var(--bodyFontWeight);
    line-height: var(--bodyLineHeight);
    margin: 0;
    min-block-size: 100vh;
}

/* modules/anchor.css */

:root {
    --anchorColor: #eee;
}

a {
    color: var(--anchorColor);
    outline: 0;
    text-decoration: none;
}

a:focus,
a:hover {
    text-decoration: underline;
}

/* modules/form.css */

:root {
    --formFieldMargin: 0.875rem;
}

input {
    background-image: none;
    border: 0;
    color: inherit;
    font: inherit;
    margin: 0;
    outline: 0;
    padding: 0;
    transition: background-color 0.3s;
}

input[type="submit"] {
    cursor: pointer;
}

.form {
    margin: calc(var(--formFieldMargin) * -1);
}

.form input[type="password"],
.form input[type="text"],
.form input[type="submit"] {
    inline-size: 100%;
}

.form__field {
    display: flex;
    margin: var(--formFieldMargin);
}

.form__input {
    flex: 1;
}

/* modules/login.css */

:root {
    --loginBorderRadus: 0.25rem;
    --loginColor: #eee;

    --loginInputBackgroundColor: #3b4148;
    --loginInputHoverBackgroundColor: #434a52;

    --loginLabelBackgroundColor: #363b41;

    --loginSubmitBackgroundColor: #ea4c88;
    --loginSubmitColor: #eee;
    --loginSubmitHoverBackgroundColor: #d44179;
}

.login {
    color: var(--loginColor);
}

.login label,
.login input[type="text"],
.login input[type="password"],
.login input[type="submit"] {
    border-radius: var(--loginBorderRadus);
    padding: 1rem;
}

.login label {
    background-color: var(--loginLabelBackgroundColor);
    border-bottom-right-radius: 0;
    border-top-right-radius: 0;
    padding-inline: 1.25rem;
}

.login input[type="password"],
.login input[type="text"] {
    background-color: var(--loginInputBackgroundColor);
    border-bottom-left-radius: 0;
    border-top-left-radius: 0;
}

.login input[type="password"]:focus,
.login input[type="password"]:hover,
.login input[type="text"]:focus,
.login input[type="text"]:hover {
    background-color: var(--loginInputHoverBackgroundColor);
}

.login input[type="submit"] {
    background-color: var(--loginSubmitBackgroundColor);
    color: var(--loginSubmitColor);
    font-weight: 700;
    text-transform: uppercase;
}

.login input[type="submit"]:focus,
.login input[type="submit"]:hover {
    background-color: var(--loginSubmitHoverBackgroundColor);
}

/* modules/text.css */

p {
    margin-block: 1.5rem;
}

.text--center {
    text-align: center;
}
</style>

<body  style="background-image:url('./Image/travels.gif');background-repeat:no-repeat;background-size:100% 100vh;background-attachment:fixed;">

    <div class="container">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div style="height:200px"></div>
                <table>
                    <tr>
                        <td
                            style="border-left:1px solid #0000ff;border-top:1px solid #0000ff;border-right:1px solid #000000;border-bottom:1px solid #0000ff;background-color:blue;width:200px;height:300px;">
                            <p style="font-size:25px;text-align:left;color:#ffffff;text-indent:1em;"> Admin Login </p>

                            &nbsp &nbsp <img src="Image/centerpoint.png" width=" 170" height="200"
                                class="d-inline-block align-top" alt="">
                        </td>
                        <td
                            style="border-left:1px solid #0000ff;border-top:1px solid #0000ff;border-right:1px solid #0000ff;border-bottom:1px solid #0000ff;background-color:blue;width:500px;height:300px;">
                            <div class="grid" style="width:500px">
                                <span><?=@$error?></span>
                                <form action="" method="get">

                                    <div class="form__field">
                                        <label for="login__username"><svg class="icon" style="width:40px">
                                                <use xlink:href="#icon-user"></use>
                                            </svg><span class="hidden">Username</span></label>
                                        &nbsp <input autocomplete="username" id="login__username" type="text" name="usse"
                                            class="form__input" placeholder="Username" required>
                                    </div>

                                    <div class="form__field">
                                        <label for="login__password"><svg class="icon" style="width:40px">
                                                <use xlink:href="#icon-lock"></use>
                                            </svg><span class="hidden">Password</span></label>
                                        &nbsp <input id="login__password" type="password" name="pastee"
                                            class="form__input" placeholder="Password" required>
                                    </div>

                                    <div class="form__field">
                                        <p style="text-indent:9em"> <input type="submit" value="Enter Now"
                                                style="background-color:blue;color:white;font-size:15px;"></p>
                                    </div>

                                </form>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-md-2">
            </div>
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" class="icons">
        <symbol id="icon-arrow-right" viewBox="0 0 1792 1792">
            <path
                d="M1600 960q0 54-37 91l-651 651q-39 37-91 37-51 0-90-37l-75-75q-38-38-38-91t38-91l293-293H245q-52 0-84.5-37.5T128 1024V896q0-53 32.5-90.5T245 768h704L656 474q-38-36-38-90t38-90l75-75q38-38 90-38 53 0 91 38l651 651q37 35 37 90z" />
        </symbol>
        <symbol id="icon-lock" viewBox="0 0 1792 1792">
            <path
                d="M640 768h512V576q0-106-75-181t-181-75-181 75-75 181v192zm832 96v576q0 40-28 68t-68 28H416q-40 0-68-28t-28-68V864q0-40 28-68t68-28h32V576q0-184 132-316t316-132 316 132 132 316v192h32q40 0 68 28t28 68z" />
        </symbol>
        <symbol id="icon-user" viewBox="0 0 1792 1792">
            <path
                d="M1600 1405q0 120-73 189.5t-194 69.5H459q-121 0-194-69.5T192 1405q0-53 3.5-103.5t14-109T236 1084t43-97.5 62-81 85.5-53.5T538 832q9 0 42 21.5t74.5 48 108 48T896 971t133.5-21.5 108-48 74.5-48 42-21.5q61 0 111.5 20t85.5 53.5 62 81 43 97.5 26.5 108.5 14 109 3.5 103.5zm-320-893q0 159-112.5 271.5T896 896 624.5 783.5 512 512t112.5-271.5T896 128t271.5 112.5T1280 512z" />
        </symbol>
    </svg>

</body>

<script>
document.addEventListener('contextmenu', event => event.preventDefault());

$(document).keydown(function(event) {
    if (event.keyCode == 123) { // Prevent F12
        return false;
    } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I        
        return false;
    }
});
</script>
