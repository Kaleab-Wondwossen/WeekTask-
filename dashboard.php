<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLOGOLB</title>
    <style>
        .body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 10px; 
            margin: 0;
            padding: 0;
            box-sizing: border-box;
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
        .DashOptions {
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            align-items: center;
            background-color: black;
            color: white;
            padding: 20px;
            border-radius: 10px;
        }
        button {
            margin: 10px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: darkgray;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: gray;
        }     
        .FormClass {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
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
}
    </style>
</head>
<body>
    <header class="navBar">
        <a href="index.php"><img src="logo.jfif" alt="Logo" class="logo"></a>
        <button class="btnNav" ><a  class="butLetter" href="index.php"><span>Home</span></a></button>
        <button class="btnNav" ><a  class="butLetter" href="postBlog.php"><span>Post a blog</span></a></button>
        <button class="btnNav" ><a  class="butLetter"href="index.php"><span>Dashboard</span></a></button>
        <button class="btnNav" ><a  class="butLetter" href="index.php"><span>AboutUs</span></a></button>
    </header>
    <div class="body">
        <div class="DashOptions">
            <span><button id="edit">Edit Post</button></span>
            <span><button id="search">Search Post</button></span>
            <span><button id="delete">Delete Post</button></span>
            <span><button id="details">Post Details</button></span>
        </div>
        <div id="formDisplay" class="FormClass">

        </div>
    </div>
   <script>
        document.getElementById('edit').addEventListener('click', showForm);
        function showForm() 
        {
            var form = document.createElement('form');
            form.setAttribute('id', 'editForm');

            var keyInput = document.createElement('input');
            keyInput.setAttribute('type', 'text');
            keyInput.setAttribute('name', 'key');
            keyInput.setAttribute('placeholder', 'Enter Key');

            var bloggerInput = document.createElement('input');
            bloggerInput.setAttribute('type', 'text');
            bloggerInput.setAttribute('name', 'blogger');
            bloggerInput.setAttribute('placeholder', 'Enter Blogger');

            var submitButton = document.createElement('button');
            submitButton.setAttribute('type', 'submit');
            submitButton.setAttribute('name', 'sub');
            submitButton.innerHTML = 'Submit';

            form.appendChild(keyInput);
            form.appendChild(bloggerInput);
            form.appendChild(submitButton);

            document.getElementById('formDisplay').appendChild(form);
        }
        function hideForm() {
            var form = document.getElementById('editForm');
            form.parentNode.removeChild(form);
        }
   </script> 
</body>

</html>
<?php
if(isset($_POST['sub'])){
    // Get the form input for key and blogger
$key = $_POST['key'];
$blogger = $_POST['blogger'];

// Read the JSON file
$jsonString = file_get_contents('data.json');
$data = json_decode($jsonString, true);

// Search for the entry with the provided key and remove it
foreach ($data as $key => $entry) {
    if ($entry['key'] === $key) {
        unset($data[$key]);
        echo"blog of ", $key, "deleted";
        break;
    }
}

// Encode the updated data back to JSON and write it to the file
$newJsonString = json_encode($data);
file_put_contents('data.json', $newJsonString);
}

?>