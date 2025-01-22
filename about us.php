<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Blood Donation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 5px;
        }
        h1, h2 {
            color: #e74c3c;
            border-bottom: 2px solid #e74c3c;
            padding-bottom: 10px;
        }
        p {
            line-height: 1.6;
            font-weight: bold;
        }
        ul {
            list-style-type: none;
            padding-left: 0;
        }
        li {
            margin-bottom: 10px;
            padding-left: 25px;
            position: relative;
        }
        li:before {
            content: "❤";
            color: #e74c3c;
            position: absolute;
            left: 0;
        }
        .cta-button {
            display: inline-block;
            background-color: #e74c3c;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
        .cta-button:hover {
            background-color: #c0392b;
        }

        ::selection {
            background: #ffcc00; /* Background color for the selected text */
            color: #000000; /* Text color for the selected text */
        }

        .menu-btn {
            background-color: #A0A0A0;
            color: black;
            border: 1px solid #000000;;
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
            background-color: #FF3333;
            color: yellow;
        }
        .menu-content {
            display: none;
            background-color: #E0E0E0;
            padding: 10px;
            position: fixed;
            top: 70px;
            right: 10px;
            width: 150px;
            border-radius: 30px;
            border: 2px solid #FF3333;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
        .menu-content a {
            display: block;
            color: #333;
            padding: 8px 0;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
        .menu-content a:hover {
            background-color: #FF3333;
            color: white;
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

<button class="menu-btn" onclick="toggleMenu()">☰</button>
    <div class="menu-content" id="menuContent">
        <a href="page1.php">🏠Home</a>
        <a href="ID.php">🪪Profile</a>
        <a href="comments.php">📞Contact us</a>
        <a href="index.php">🔓Logout</a>
    </div>

    <div class="container">
        <h1>About Us</h1>
        <!-- ... existing content ... -->
        
        <div class="circle" id="circle"></div>

        <h2>Join Us</h2>
        <p>Your donation can make a difference. Join us in our mission to save lives through blood donation. Contact us to learn more about how you can get involved or schedule your donation today.😄</p>
        <p>Together, we can make a meaningful impact and help those in need. Our organization is dedicated to ensuring a steady supply of blood for hospitals and patients. By donating, you’re not only saving lives but also supporting your community in a vital way.</p>
<p>Here’s how you can get involved:</p>
<ul>
    <li><strong>Schedule a Donation:</strong> Visit our website or contact us directly to find a convenient time and location for your blood donation.</li>
    <li><strong>Volunteer:</strong> We’re always looking for passionate volunteers to assist with events, spread awareness, and support our operations.</li>
    <li><strong>Organize a Drive:</strong> Partner with us to host a blood drive at your workplace, school, or community center. We provide all the necessary resources and support.</li>
    <li><strong>Spread the Word:</strong> Share our mission with friends and family to help increase awareness and encourage more people to donate.</li>
</ul>
<p>Every drop counts, and your contribution is crucial in helping us maintain a safe and reliable blood supply. Join us in making a difference today!</p>
<p>For more information, visit our website or give us a call. Let’s work together to save lives and support our community. Thank you for your generosity and commitment! 😊</p>
        <a href="project.php" class="cta-button">Support us</a>
        <a href="details.php" class="cta-button">List</a>
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