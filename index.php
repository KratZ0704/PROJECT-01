<?php 
if(isset($_POST['submit'])){ 
    # connect to the database here 
    # search the database to see if the user name has been taken or not 
    $query = sprintf("SELECT * FROM users WHERE user_name='%s' LIMIT 1",mysql_real_escape_string($_POST['user_name'])); 
    $sql = mysql_query($query); 
    $row = mysql_fetch_array($sql); 
    #check too see what fields have been left empty, and if the passwords match 
    if($row||empty($_POST['user_name'])|| empty($_POST['fname'])||empty($_POST['lname'])|| empty($_POST['email'])||empty($_POST['password'])|| empty($_POST['re_password'])||$_POST['password']!=$_POST['re_password']){ 
        # if a field is empty, or the passwords don't match make a message 
        $error = '<p>'; 
        if(empty($_POST['user_name'])){ 
            $error .= 'User Name can\'t be empty<br>'; 
        } 
        if(empty($_POST['fname'])){ 
            $error .= 'First Name can\'t be empty<br>'; 
        } 
        if(empty($_POST['lname'])){ 
            $error .= 'Last Name can\'t be empty<br>'; 
        } 
        if(empty($_POST['email'])){ 
            $error .= 'Email can\'t be empty<br>'; 
        } 
        if(empty($_POST['password'])){ 
            $error .= 'Password can\'t be empty<br>'; 
        } 
        if(empty($_POST['re_password'])){ 
            $error .= 'You must re-type your password<br>'; 
        } 
        if($_POST['password']!=$_POST['re_password']){ 
            $error .= 'Passwords don\'t match<br>'; 
        } 
        if($row){ 
            $error .= 'User Name already exists<br>'; 
        } 
        $error .= '</p>' 
    }else{ 
        # If all fields are not empty, and the passwords match, 
        # create a session, and session variables, 
        $query = sprintf("INSERT INTO users_table(`user_name`,`f_name`,`l_name`,`email`,`password`) 
            VALUES('%s','%s','%s','%s',PASSWORD('%s'))", 
            mysql_real_escape_string($_POST['user_name']), 
            mysql_real_escape_string($_POST['fname']), 
            mysql_real_escape_string($_POST['lname']), 
            mysql_real_escape_string($_POST['email']), 
            mysql_real_escape_string($_POST['password']))or die(mysql_error()); 
        $sql = mysql_query($query); 
        # Redirect the user to a login page 
        header("Location: login.php"); 
        exit; 
    } 
} 
# echo out each variable that was set from above, 
# then destroy the variable. 
if(isset($error)){ 
    echo $error; 
    unset($error); 
} 
?>  
<!-- Start your HTML/CSS/JavaScript here --> 
<form action="<? echo $_SERVER['PHP_SELF']; ?>" method="post"> 
    <p>User Name:<br /><input type="text" name="user_name" <? if(!$row){echo 'value="'.$_POST['user_name'].'"';} ?>/></p> 
    <p>First Name:<br /><input type="text" name="fname" <? echo 'value="'.$_POST['fname'].'"'; ?>/></p> 
    <p>Last Name:<br /><input type="text" name="lname" <? echo 'value="'.$_POST['lname'].'"'; ?>/></p> 
    <p>Email:<br /><input type="text" name="email" <? echo 'value="'.$_POST['email'].'"'; ?>/></p> 
    <p>Password:<br /><input type="password" name="password" /></p> 
    <p>Re-Type Password:<br /><input type="password" name="re_password" /></p> 
    <p><input type="submit" name="submit" value="Sign Up" /></p> 
</form> 

Leave a comment
