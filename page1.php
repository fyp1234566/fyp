<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>project</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #66FFB2;
        }

        header {
            background: linear-gradient(45deg, rgba(204, 255, 204, 0.6), #ffb3ba, #bae1ff);
            border-radius: 20px;
            border: 2px solid #FF99CC;
            color: white;
            padding: 10px;
        }

        nav {
            display: flex;
            justify-content: space-between;
            max-width: 1200px;
            margin: 10px auto;
            background-color: rgba(204, 255, 204, 0);
            border-radius: 10px;
            overflow: hidden;           
        }        

        nav ul li {
            display: inline-block;
            margin-right: 15px;
        }

        nav ul li a {
        color: Black;
        text-decoration: none;
        padding: 15px 100px;
        transition: background-color 0.3s, color 0.3s;
        border-radius: 100px;
        font-weight: bold;
        font-size: 17px;
        
    }

    nav ul li a:hover {
        background-color: #9933FF;
        color: #FFD700; /* Gold color */
        border: 2px solid White;
    }

    nav ul li a:active {
        background-color: #777;
        color: white;
    }

    nav ul li::after {
        content: '';
        position: absolute;
        width: 100%;
        height: 2px;
        background: #FFD700; /* Gold underline */
        bottom: -5px;
        left: 0;
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }

    nav ul li:hover::after {
        transform: scaleX(1);
    }


        main {
            margin: 20px;
        }

        article {
            background-color: rgba(0, 255, 255, 0.5);           
            border: 1px solid #ccc;
            border-radius: 20px;
            border: 2px solid #FF99CC;
            padding: 20px;
            font-weight: bold;
            font-family: 'Sans-Serif';
        }

        h1 {
            font-size: 24px;
            font-family: 'Sans-Serif';
            margin-bottom: 10px;
            text-align: center;
        }

        p {
            line-height: 1.5;
        }

        footer {
            text-align: center;
            padding: 10px;
        }

        .bgVideo {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%; 
            min-height: 100%;
            width: auto; 
            height: auto; 
            z-index: -100;
            background-size: cover;
            overflow: hidden;
        }

        ::selection {
            background: #ffcc00; /* Background color for the selected text */
            color: #000000; /* Text color for the selected text */
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
    <header>
        <nav>
            <ul>
                <li><a href="project.php">DONATION</a></li>
                <li><a href="comments.php">COMMENTS</a></li>
                <li><a href="ID.php">ID</a></li>
                <li><a href="About us.php">About us</a></li>
            </ul>
        </nav>
        <video autoplay muted loop class="bgVideo">
            <source src="s2.mp4" type="video/mp4">
            Your browser does not support HTML5 video.
        </video>
    </header>

    <main>
        <article>
            <section>
                <h1>WELCOME!</h1>
                <p>Save Lives, Donate Blood: Your Guide to Giving the Gift of Life</p>
                <p>In the tapestry of human life, there are few acts as selfless and impactful as donating blood. Every day, hospitals and clinics rely on the generosity of donors to ensure that patients in need receive the blood transfusions that can make all the difference between life and death. By giving just a small amount of your time and blood, you have the power to save lives and contribute to the well-being of countless individuals. Here’s why donating blood is so crucial, and how you can become a hero in your community.</p>
                <p>A Personal Touch: Stories of Impact</p>
                <p>Consider the stories of individuals whose lives have been changed thanks to blood donations. From accident victims to patients undergoing surgery or treatment for chronic illnesses, many people are given a second chance because of donors like you. These personal stories highlight the profound impact your donation can have, turning what might seem like a small act into something truly life-changing.</p>
            </section>
            <footer>
                <p>PROJECT on Aug 23, 2024</p>
            </footer>
        </article>
    </main>

    <footer>
        <p>&copy; PROJECT 2024</p>
    </footer>

    <div class="circle" id="circle"></div>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var audio = new Audio('bs1.mp3?v=' + new Date().getTime());
        audio.preload = 'auto';

        audio.addEventListener('error', function() {
            console.error('Audio failed to load.');
        });

        audio.addEventListener('loadeddata', function() {
            console.log('Audio loaded successfully');
        });

        audio.addEventListener('play', function() {
            console.log('Audio started playing');
        });

        audio.addEventListener('ended', function() {
            console.log('Audio finished playing');
        });

        var links = document.querySelectorAll('nav a');

        links.forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent default link behavior

                var href = this.getAttribute('href'); // Store the href attribute of the clicked link

                audio.currentTime = 0;
                audio.play().then(function() {
                    // Navigate to the new page shortly after the audio starts
                    setTimeout(function() {
                        window.location.href = href;
                    }, 350); // Adjust the timeout value as needed
                }).catch(function(error) {
                    console.error('Audio play error:', error);
                    window.location.href = href; // Navigate to the new page if there's an error playing audio
                });
            });
        });
    });

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