<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_email'])) {
    header("Location: Login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore showroom</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="explorebody">
    <div class="headerexplore">
        <a href="index.php">
            <img src="Screenshot_2024-12-04_193852-removebg-preview.png" alt="Logo" height="60vh" width="100%">
        </a>
        <h3>For car enthusiasts, by car enthusiasts...</h3>
    </div>

    <div class="navigation">
        <button onclick="window.location='Explore.php'">Explore</button>
        <button onclick="window.location='Contact.php'">Contact Us</button>
        <button onclick="window.location='About.php'">About Us</button>
        <button onclick="window.location='Register.php'">Register</button>
        <button onclick="window.location='Login.php'">Login</button>
        <button onclick="window.location='logout.php'">Logout</button>
    </div>

    <section id="hero">
        <div>
            <h1>Welcome to Riders Exoctics</h1>
            <p>Your vision, our responsibility...</p>
            <a href="About.php" class="btn">Learn More</a>
        </div>
    </section>

    <section id="about">
        <div class="containerexplore">
            <h2>About Us</h2>
            <p>At Riders Showroom, we offer a curated and preserved selection of the most excellent cars from every category, flowing with performance and luxury. Our sole mission is to ensure your dream car becomes a reality with every modification you can imagine. Our partners are happy to make your new ride a one of a kind!</p>
        </div>
    </section>

    <div id="showhide">
        <label for="toggle">Show/Hide Content</label>
        <input type="checkbox" id="toggle" onclick="visibility()">
    </div>

    <section id="services">
        <h2>Our Services</h2>
        <div class="service-grid">
            <div class="service-item">
                <img src="Showroom.avif" alt="Service 1">
                <h3>Wide Selection</h3>
                <p id="p1">Riders Showroom includes but is not limited to a wide selection of cars,
                    ranging from various luxury brands, to the core oposite a monstrous selection of offroad vehicles!</p>
                <script>
                    const updatedContent1 = localStorage.getItem('updatedContent1');

                    if(updatedContent1){
                        document.getElementById('p1').innerText=updatedContent1;
                    }
                </script>
            </div>
            <div class="service-item">
                <img src="Wraps.webp" alt="Service 2">
                <h3>Custom Wraps</h3>
                <p id="p2">Riders Wraps specializes in high-quality car wraps, offering custom designs to transform and protect your vehicle's appearance.
                     With precision and expertise, we provide durable, eye-catching wraps that make your ride stand out.</p>
                <script>
                    const updatedContent2 = localStorage.getItem('updatedContent2');
    
                    if(updatedContent1){
                        document.getElementById('p2').innerText=updatedContent2;
                    }
                </script>
            </div>
            <div class="service-item">
                <img src="carinsurance.jpg" alt="Service 3">
                <h3>Masterclass Insurance</h3>
                <p id="p3">Riders Insurance offers reliable and affordable car insurance solutions, providing comprehensive coverage to keep you protected on the road.
                     With personalized plans and exceptional service, we ensure peace of mind for every driver.</p>
                <script>
                    const updatedContent3 = localStorage.getItem('updatedContent3');
        
                    if(updatedContent3){
                        document.getElementById('p3').innerText=updatedContent3;
                    }
                </script>
            </div>
              <div class="service-item">
                <img src="Detailing.webp" alt="Service 4">
                <h3>Custom Detailing</h3>
                <p id="p4">Riders Auto Detailing is a professional car detailing service dedicated to restoring your vehicle's pristine condition.
                    Offering a range of services including exterior washes, interior cleaning, waxing, and paint correction, we ensure every inch of your car shines like new. </p>
                <script>
                    const updatedContent4 = localStorage.getItem('updatedContent4');
            
                    if(updatedContent4){
                        document.getElementById('p4').innerText=updatedContent4;
                    }
                </script>
            </div>
        </div>
    </section>

    <footer>
        <div class="container-footer">
            <p>&copy; 2024 Riders Showroom. All rights reserved.</p>
            <p>Follow us on <a herf="#">Social Media</a></p>
        </div>
    </footer>
    <script  src="jscript.js"></script>
</body>
</html>
