<?php
session_start();

// Initialize variables
$error_message = '';
$show_info = false;
$user_info = [];

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbbd";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        // Handle form submission
        $name = htmlspecialchars($_POST['name']);
        $age = (int) $_POST['age'];
        $id_no = htmlspecialchars($_POST['id_no']); // Make sure this line is present
        $hashed_id_no = password_hash($id_no, PASSWORD_DEFAULT);
        $blood_type = htmlspecialchars($_POST['blood_type']);
        $occupation = htmlspecialchars($_POST['occupation']);
        $password = $_POST['password']; // Store the unhashed password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert user information into database
        $sql = "INSERT INTO users (id_no, name, age, blood_type, occupation, password) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssisss", $hashed_id_no, $name, $age, $blood_type, $occupation, $hashed_password);


        if ($stmt->execute()) {
            $show_info = true;
            $user_info = [
                'id_no' => str_repeat('*', strlen($id_no)), // Make sure this line is present
                'name' => $name,
                'age' => $age,
                'blood_type' => $blood_type,
                'occupation' => $occupation,
                'password' => str_repeat('*', strlen($password))
            ];

            // Save information to local file
            $file_path = 'C:\Users\User\Documents\XAMPP\htdocs\blood_donation2\check password\user_info.txt';
            $file_content = "Name: $name\nAge: $age\nID No: $id_no\nOccupation: $occupation\nBlood Type: $blood_type\nPassword: $password\n\n";
            file_put_contents($file_path, $file_content, FILE_APPEND);
        } else {
            $error_message = "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #CCFFFF;
            font-weight: bold;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #e74c3c;
            text-align: center;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            display: inline-block;
            width: 100px;
        }
        input[type="text"], input[type="number"], input[type="password"], select {
            width: 300px;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-weight: bold;
            background-color: #CCFFFF;
        }
        input[type="submit"] {
            background-color: #e74c3c;
            color: #fff;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #FF0000; /* Hover background color */
            color: #00FFFF;
        }
        
        a {
            display: inline-block;
            margin-bottom: 20px;
            color: #3498db;
            text-decoration: none;
        }
        .info {
            background-color: #eaf2f8;
            padding: 10px;
            border-radius: 5px;
        }
        .reset-btn {
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            margin-left: 10px;
        }
        .reset-btn:hover {
            background-color: #FF0000; /* Hover background color */
            color: #00FFFF;
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

    input[type="submit"], .reset-btn {
        display: inline-block;
        margin: 0 5px;
    }

    .circle {
    position: fixed;
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

<button class="menu-btn" onclick="toggleMenu()">☰</button>
    <div class="menu-content" id="menuContent">
        <a href="page1.php">🏠Home</a>
        <a href="Submit.php">🪪Profile</a>
        <a href="About us.php">🔎About us</a>
        <a href="comments.php">📞Contact us</a>
    </div>

    <div class="circle" id="circle"></div>

    <div class="container">
        <h1>👤 Personal Information</h1>

        <?php if ($error_message): ?>
            <p style="color: red;"><?php echo htmlspecialchars($error_message); ?></p>
        <?php endif; ?>

        <?php if (!$show_info): ?>
        <form method="POST" action="">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br>

            <label for="age">Age:</label>
            <input type="number" id="age" name="age" required><br>

            <label for="id_no">ID No:</label>
            <input type="text" id="id_no" name="id_no" required><br>

            <label for="blood_type">Blood Type:</label>
            <select id="blood_type" name="blood_type" required>

            
                <?php
                $blood_types = ['--- CHOOSE HERE ---','A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
                foreach ($blood_types as $type) {
                    echo "<option value=\"$type\">$type</option>";
                }
                ?>
            </select><br>

            <label for="occupation">Occupation:</label>
            <input type="text" id="occupation" name="occupation" required><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>

            <div class="button-container">
                <input type="submit" name="submit" value="Submit">
                <input type="submit" name="reset" value="Reset Information" class="reset-btn">
            </div>
        </form>

        <?php else: ?>
        <div class="info">
            <h2>Your Information:</h2>
            <p>Name       : <?php echo htmlspecialchars($user_info['name']); ?></p>
            <p>Age        : <?php echo htmlspecialchars($user_info['age']); ?></p>
            <p>ID No      : <?php echo htmlspecialchars($user_info['id_no']); ?></p>
            <p>Occupation : <?php echo htmlspecialchars($user_info['occupation']); ?></p>
            <p>Blood Type : <?php echo htmlspecialchars($user_info['blood_type']); ?></p>
            <p>Password   : <?php echo htmlspecialchars($user_info['password']); ?></p>
        </div>
        <?php endif; ?>

    </div>
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
</body>
</html>