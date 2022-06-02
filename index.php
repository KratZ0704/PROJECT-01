<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}
* {
  box-sizing: border-box;
}

.container {
  padding: 16px;
  background-color: white;
}

input[type=text], input[type=date], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}
</style>
</head>
<body>

<form action="/action_page.php">
  <div class="container">
    <h1>REGISTER</h1>
    <p>Please create an account.</p>
    <hr>
    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Username" name="username" id="username" required>
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="psw" required>
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="email" name="email" id="email" required>
    
    <label for="bday"><b>Birthdate</b></label>
    <input type="date">
  </div>
  
</form>
</body>
</html>
