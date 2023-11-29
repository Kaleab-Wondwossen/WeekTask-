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
      <h1 class="signup-heading">Sign Up</h1>
      <button class="signup-social">
        <a href=""> <i class="fa fa-plus-circle" aria-hidden="true"></i>
        <span class="signup-social-text"> Welcome To Sign Up</span></a>
       </button>
      <form action="" class="signup-form" method="post" autocomplete="off">
        <label for="fullname"  class="signup-label">Full name</label>
        <input type="text" id="fullname" name="name" class="signup-input" placeholder="You`r Name">
        <label for="email" class="signup-label" >Email</label>
        <input type="email" name="email" class="signup-input" placeholder="You`r email">
        <label for="email" class="signup-label" >Passowrd</label>
        <input type="password"  name="password" class="signup-input" placeholder="You`r password">
        <button class="signup-submit" name="submit"><a href="login.php">Sign Up</a></button>
      </form>
      <p class="signup-already">
        <span style="color: purple;" class="oops">OOPS!! dont want to Sign Up </span>
        <a href="index.php" class="signup-login-link">Home</a>
      </p>
    </div>
    </div>
</body>
</html>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fullname = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
    
        $user = array(
            'fullname' => $fullname, 
            'email' => $email, 
            'password' => $password
        );
        $json_string = json_encode($user);
    
        if (file_exists('user.json')) {
            $existingData = file_get_contents('user.json');
            if (!is_null($existingData)) {
                $users = json_decode($existingData, true);
                if (!is_array($users)) {
                    $users = array($users);
                }
                $users[] = $user;
            }
            else {
                $users = array($user);
            }
            $json = json_encode($users);
            file_put_contents('user.json', $json);
        }
        else {
            $users = array($user);
            $json = json_encode($users);
            file_put_contents('user.json', $json);
        }
    
        echo "Data saved successfully.";
    }
?>