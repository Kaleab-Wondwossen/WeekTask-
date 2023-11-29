<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>BLOGOLB POST A BLOG</title>
      <link rel="stylesheet" href="postBlog.css">
  </head>
  <body>
      <header class="navBar">
          <a href="index.php"><img src="logo.jfif" alt="Logo" class="logo"></a>
          <button class="btnNav" ><a class="butLetter" href="index.php"><span>Home</span></a></button>
          <button class="btnNav" ><a class="butLetter" href="postBlog.php"><span>Post a blog</span></a></button>
          <button class="btnNav" ><a class="butLetter" href="index.php"><span>Dashboard</span></a></button>
          <button class="btnNav" ><a class="butLetter" href="index.php"><span>AboutUs</span></a></button>
      </header>
      <br>
      <div class="body">
      <div class="signup">
        <h1 class="signup-heading">LogIn</h1>
        <button class="signup-social">
          <a href="signup.php"> <i class="fa fa-plus-circle" aria-hidden="true"></i>
          <span class="signup-social-text"> Don't Have an Account</span></a>
        </button>
        <form action="" class="signup-form" method="post" autocomplete="off">
          <label for="email" class="signup-label" >Email</label>
          <input type="email" id="email" name="email" class="signup-input" placeholder="You`r email">
          <label for="email" class="signup-label" >Passowrd</label>
          <input type="password" id="password" name="password" class="signup-input" placeholder="You`r password">
          <button class="signup-submit" name="submit"><a href="">Log In</a></button>
        </form>
        <p class="signup-already">
          <span style="color: purple;" class="oops">OOPS!! dont want to Log In </span>
          <a href="index.php" class="signup-login-link">Home</a>
        </p>
      </div>
    </div>
  </body>
</html>

<?php
session_start();
//$_SERVER["REQUEST_METHOD"] == "POST"
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $users = file_get_contents('user.json');
    $users = json_decode($users, true);

    foreach ($users as $user) {
        if ($user['email'] === $email && $user['password'] === $password) {
            $_SESSION['email'] = $email; 
            header('Location: dashboard.php'); 
            exit;
        }
    }
    echo "Invalid email or password. Please try again.";
}
?>

