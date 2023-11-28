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
      <h1 class="signup-heading">Sign up</h1>
      <button class="signup-social">
        <i class="fa fa-plus-circle" aria-hidden="true"></i>
        <span class="signup-social-text">Add a BLOG Dynamically</span>
      </button>
      <form action="" class="signup-form" method="post" autocomplete="off">
        <label for="fullname"  class="signup-label">Full name</label>
        <input type="text" id="fullname" name="blogger" class="signup-input" placeholder="You`r Name">
        <label for="email" class="signup-label" >Email</label>
        <input type="email" id="email" name="bloggerUname" class="signup-input" placeholder="You`r email">
        <textarea name="idea" cols="30" rows="10"></textarea>
        <!-- <input type="text" name="idea"> -->
        <button class="signup-submit" name="submit">Post</button>
      </form>
      <p class="signup-already">
        <span style="color: purple;" class="oops">OOPS!! dont want to contribute </span>
        <a href="index.php" class="signup-login-link">Home</a>
      </p>
    </div>
    </div>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $blog = $_POST['idea'];
    $blogger = $_POST['blogger'];
    echo $blog;
    echo $blogger;
    if (empty($blog) || empty($blogger)) {
        echo "All fields are required.";
        exit;
    }
    $data = array(
        'name' => $blogger,
        'blog' => $blog
    );
    $json = json_encode($data);
    if (file_exists('data.json')) {
        $existingData = file_get_contents('data.json');
        // if (!is_null($existingData)) {
        //     $existingData = $data;
        // } 
        if (!is_null($existingData)) {
            $existingData = json_decode($existingData, true);
            if (!is_array($existingData)) {
                $existingData = array($existingData);
            }
            $existingData[] = $data;
        }
        else {
            $existingData = array($data);
        }
        $json = json_encode($existingData);
        file_put_contents('data.json', $json);
    }
    if (file_put_contents('data.json', $json)) {
        echo"<br>";
        echo "Data saved successfully.";
    } else {
        echo"<br>";
        echo "An error occurred while saving the data.";
    }
}
echo "<footer><p style='text-align: center;' >&copy; 2023 BLOGOLB</p></footer>"
?>
