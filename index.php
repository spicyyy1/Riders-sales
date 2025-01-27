<?php
session_start();
echo $_SESSION["email"];
if(!isset($_SESSION["email"])){
    header("Location: Login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="content">
        <div class="header">
            <a href="index.php">
                <img src="Screenshot_2024-12-04_193852-removebg-preview.png" alt="Logo" height="60vh" width="100%">
            </a>
            <h3 style="color: black;">For car enthusiasts, by car enthusiasts...</h3>
        </div>
        <div class="navigation">
            <button onclick="window.location='Explore.php'">Explore</button>
            <button onclick="window.location='Contact.php'">Contact Us</button>
            <button onclick="window.location='About.php'">About Us</button>
            <button onclick="window.location='Register.php'">Register</button>
            <button onclick="window.location='Login.php'">Login</button>
            <button onclick="window.location='logout.php'">Logout</button>
        </div>
        <div class="slideImages-container">
            <div class="slide fade">
                <img src="first-background-image.png" alt="supercars" id="firstImage">
            </div>
            <div class="slide fade">
                <img src="second-background-image.png" alt="supercars" id="secondImage">
            </div>
            <div class="slide fade">
                <img src="third-background-image.png" alt="supercars" id="thirdImage">
            </div>
        </div>

        <div id="showhide" style="display: flex; flex-direction: row; justify-content: center; align-items: center; flex-wrap: wrap; color: black; font-family: Arial, Helvetica, sans-serif; line-height: 1.6; padding-top: 0.5%;">
            <label for="toggle">Show/Hide Content</label>
            <input type="checkbox" id="toggle" onclick="visibility()">
        </div>

        <div class="contentHome" id="contentHome">
            <h3>Explore the World of Cars</h3>
            <p>Welcome to the ultimate hub for car enthusiasts, where innovation meets passion. Whether you're fascinated by the roar of a high-performance engine, the elegance of luxury vehicles, or the eco-friendly efficiency of electric cars, we have something for you.</p><br>
            
            <h3>Discover Automotive Excellence</h3>
            <p>Dive into the fascinating world of automobiles. From timeless classics to cutting-edge modern designs, explore how cars shape the way we move, work, and live.</p><br>

            <h3>Latest Trends & Technologies</h3>
            <p>Stay up-to-date with the newest advancements in the automotive industry. Discover self-driving technologies, hybrid innovations, and the rise of sustainable electric vehicles driving the future of transportation.</p><br>

            <h3>Reviews, Guides, & Comparisons</h3>
            <p>Not sure which car is right for you? Browse our in-depth reviews, buying guides, and side-by-side comparisons to make an informed choice tailored to your needs.</p><br>

            <h3>Community of Car Lovers</h3>
            <p>Join a thriving community of gearheads, collectors, and casual fans. Share your stories, exchange tips, and celebrate the art of driving with like-minded enthusiasts.</p><br>
            
            <h3>Start Your Journey</h3>
            <p>Fuel your curiosity and let your exploration begin. Whether you're searching for your dream car, seeking inspiration, or simply indulging in your passion for automobiles, this is the place for you.</p> <br>
        </div>
        <footer>
            <div class="container-footer">
                <p>&copy; 2024 Riders Showroom. All rights reserved.</p>
                <p>Follow us on <a herf="#">Social Media</a></p>
            </div>
        </footer>
        <script>
            let slideIndex = 0;
            showSlides();

            function showSlides(){
                let slides = document.getElementsByClassName("slide");

                for(let i = 0; i < slides.length; i++){
                    slides[i].style.display="none";
                }

                if(slideIndex >= slides.length){
                    slideIndex = 0;
                }

                slides[slideIndex].style.display = "block";

                slideIndex++;

                setTimeout(showSlides, 7000);
            }

            function visibility(){
                const checkbox = document.getElementById('toggle');
                const contentHome = document.getElementById('contentHome');

                if(checkbox.checked){
                    contentHome.style.display='none';
                } else {
                    contentHome.style.display='block';
                }
            }
            </script>
    </div>
</body>
</html>