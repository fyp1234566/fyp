<?php
$uploadDir = 'uploads/';
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $text = $_POST['note_text'];
    
    // Handle file upload
    if (!empty($_FILES['file']['name'])) {
        $fileName = basename($_FILES['file']['name']);
        $targetFilePath = $uploadDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        
        // Allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'mp4', 'avi', 'mov','pdf');
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {
                echo "The file " . $fileName . " has been uploaded.<br>";
            } else {
                echo "Sorry, there was an error uploading your file.<br>";
            }
        } else {
            echo 'Sorry, only JPG, JPEG, PNG, GIF, MP4, AVI & MOV files are allowed to upload.<br>';
        }
    }
    
    // Save text note
    if (!empty($text)) {
        $textFileName = $uploadDir . 'note_' . date('Y-m-d_H-i-s') . '.txt';
        if (file_put_contents($textFileName, $text)) {
            echo "Text note has been saved as " . basename($textFileName) . "<br>";
        } else {
            echo "Sorry, there was an error saving your text note.<br>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Notes</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #FFFFCC;
            background-image: url('i4.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            color: #333;
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        textarea, input[type="file"] {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #f9f9f9;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        ::selection {
            background: #ffcc00;
            color: #000000;
        }
        .menu-btn {
            background-color: #3498db;
            color: yellow;
            border: 1px solid #0000FF;
            padding: 15px;
            cursor: pointer;
            margin-bottom: 10px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            font-size: 20px;
            line-height: 1;
            text-align: center;
            position: absolute;
            top: 10px;
            right: 10px;
        }
        .menu-btn:hover {
            background-color: #0000FF;
            color: yellow;
        }
        .menu-content {
            display: none;
            background-color: #CCFFCC;
            padding: 10px;
            position: fixed;
            top: 70px;
            right: 10px;
            width: 150px;
            border-radius: 30px;
            border: 2px solid #0000FF;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
        .menu-content a {
            display: block;
            color: #333;
            padding: 8px 0;
            text-decoration: none;
            border-radius: 5px;
        }
        .menu-content a:hover {
            background-color: #0000FF;
            color: white;
        }
        ::selection {
            background: #ffcc00;
            color: #000000;
        }

        .button-container {
        text-align: center;
        margin-top: 30px;
    }

    .circle {
    position: absolute;
    width: 50px;
    height: 50px;
    background-color: rgba(255, 255, 255, 0.5);
    border-radius: 50%;
    border: 1px solid #000000;
    pointer-events: none;
    z-index: 9999;
    transform: translate(-45%, -40%);
    transition: all 0.1s ease;
}
    </style>
</head>
<body>
    <div class="container">
        <h2>Upload Notes</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <textarea name="note_text" rows="4" placeholder="Enter your text note here"></textarea>
            <input type="file" name="file"><br><br>
            <input type="submit" name="submit" value="Upload">
        </form>
    </div>

    <div class="circle" id="circle"></div>

</body>
<button class="menu-btn" onclick="toggleMenu()">☰</button>
    <div class="menu-content" id="menuContent">
        <a href="page1.php">🏠Home</a>

    <script>
    function toggleMenu() {
        var menu = document.getElementById("menuContent");
        if (menu.style.display === "block") {
            menu.style.display = "none";
        } else {
            menu.style.display = "block";
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
const circle = document.getElementById('circle');

document.addEventListener('mousemove', e => {
    circle.style.left = e.pageX + 'px';
    circle.style.top = e.pageY + 'px';
});
});
    </script>
</html>