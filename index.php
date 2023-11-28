<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLOGOLB</title>
    <style>
        .body {
            text-align: center;
            display: flex;
        }
        .navBar {
            flex: 0 0 auto;
            background-color: black;
            background-image: url("bgNavBlog.jpg");
            text-align: right;
            height: 200px;
            border: 2px solid black;
        }
        .btnNav {
            border-radius: 30%;
            margin: 15px;
            font-family: cursive;
            background-color: black;
            color: red;
        }
        .btnNav:hover {
            color: blue;
        }
        .header{
            font-family: cursive;
        }
        .left-content, .right-content {
            flex: 1;
            padding: 20px; /* Add some padding for aesthetics */
        }
        .right-content img {
            border: 2px solid black;
            border-radius: 10px; /* Optional: to make the border rounded */
        }
        .loremImg{
            width: 500px;
            height: 600px;
        }
        .logo {
            width: 50px;
            height: 50px;
            position: absolute; /* Set the position of the logo to absolute */
            top: 0; /* Position the logo at the top */
            left: 0; /* Position the logo at the left */
        }
        .footer {
            background-color: #f2f2f2;
            padding: 20px;
            text-align: center;
            font-family: cursive;
        }
        .butLetter{
            color: white;
        }
        @media only screen and (max-width: 768px) {
        .body {
            flex-direction: column;
        }

        .navBar {
            height: auto;
        }

        .btnNav {
            margin: 5px;
            font-size: 14px;
        }

        .header {
            font-size: 24px;
        }

        .left-content,  .right-content {
            padding: 10px;
        }

        .loremImg {
            width: 100%;
            height: auto;
        }
        }

        /* Media queries for even smaller screens */
        @media only screen and (max-width: 480px) {
        .btnNav {
            font-size: 12px;
        }

        .header {
            font-size: 20px;
        }

        .left-content,
        .right-content {
            padding: 5px;
        }
}
    </style>
</head>
<body>
    <header class="navBar">
        <a href="index.php"><img src="logo.jfif" alt="Logo" class="logo"></a>
        <button class="btnNav" ><a  class="butLetter" href="index.php"><span>Home</span></a></button>
        <button class="btnNav" ><a  class="butLetter" href="postBlog.php"><span>Post a blog</span></a></button>
        <button class="btnNav" ><a  class="butLetter"href="dashboard.php"><span>Dashboard</span></a></button>
        <button class="btnNav" ><a  class="butLetter" href="index.php"><span>AboutUs</span></a></button>
    </header>
    <div class="body">
        <div class="left-content">
            <h1 class="header">LOREM IPSUM</h1>
            <hr>
            <h3 class="header">What is Lorem Ipsum?</h3>
            <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer 
                took a galley of type and scrambled it to make a type specimen book. It has survived not only five 
                centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 
                It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, 
                and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem 
                Ipsum
            </p>
            <h3 class="header">Where does it come from?</h3>
            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical
                Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at 
                Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, 
                from a Lorem Ipsum passage, and going through the cites of the word in classical literature, 
                discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de 
                Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. 
                This book is a treatise on the theory of ethics, very popular during the Renaissance. 
                The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
            </p>
            <h3 class="header">Why do we use it?</h3>
            <p>
            It is a long established fact that a reader will be distracted by the readable content of a page when 
            looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution 
            of letters, as opposed to using 'Content here, content here', making it look like readable English. Many 
            desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a 
            search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved
            over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
            </p>
            <hr>
        </div>
        <div class="right-content">
            <<h1 class="header">LOREM IPSUM</h1>
            <img class="loremImg" src="loremIpsum.jfif" alt="">
        </div>
    </div>
    
</body>

</html>

<?php
ob_start();
include 'file.php';
ob_end_clean();
$Bolgs = array(
    "User user@b1123" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et 
    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea 
    commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla 
    pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est 
    laborum",
    "User user@b2123" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et 
    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea 
    commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla 
    pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est 
    laborum"
);
echo "<h1 style='font-family: cursive; text-align: center;'>Your Posts!</h1>";
foreach ($Bolgs as $key => $blog) {
    echo "<div style='text-align: center;'>";
    echo "<div style='font-family: cursive;'>" . $key . "</div>";
    echo "<div>" . $blog . "</div>";
}
echo "</div><hr>";

if (isset($_POST['submit'])) {
    $blogIdea = $_POST['idea'];
    $blogger = $_POST['blogger'];
    $bloggerUname = $_POST['bloggerUname'];
    echo "<h1 style='font-family: cursive; text-align: center;'>","This Is The New Added Blog! ","</h1>";
    echo "<h1 style='font-family: cursive; text-align: center;'>",$blogger," ",$bloggerUname,"</h1>";
    echo "<p style='font-family: cursive; text-align: center;'>",$blogIdea,"</p>" ;
}
if (file_exists('data.json')) {
    $existingData = file_get_contents('data.json');

    // Decode the JSON data into a PHP array
    $decodedData = json_decode($existingData, true);
    foreach ($decodedData as $data) {
        foreach ($data as $key => $value) {
            echo "<h3 style='font-family: cursive; text-align: center;'>",$key,"</h3>";
            echo "<p style='font-family: cursive; text-align: center;'>",$value,"</p>" ;
        }
        echo "<hr>";
    }
} else {
    echo "The data file does not exist.";
}

echo"<footer><p>&copy; 2023 BLOGOLB</p></footer>";
?>