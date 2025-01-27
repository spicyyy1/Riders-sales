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
    <title>About Us</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main-content">
        <div class="header">
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

        <div class="content">
            <video id="bgVideo" autoplay loop muted playsinline>
                <source src="992 night run.mp4" type="video/mp4">
            </video>
    <h2>What We Offer:</h2>
    <div class="mini-list">
        <ul>
                <li>
                    <img src="Wraps.webp" alt="Custom Wraps" />
                    <h3>Custom Wraps</h3>
                    <p>Stylish and unique wraps for your vehicles.</p>
                </li>
                <li>
                    <img src="Detailing.webp" alt="Detailing" />
                    <h3>Detailing</h3>
                    <p>Top-tier detailing services for all vehicles.</p>
                </li>
                <li>
                    <img src="carinsurance.jpg" alt="Insurance" />
                    <h3>Insurance</h3>
                    <p>Comprehensive insurance for peace of mind.</p>
        </ul>
    </div>
    <div class="table">
        <table>
            <caption>Our Sales:</caption>
            <tr>
                <th>Wraps</th>
                <th>Detailing</th>
                <th>Insurance</th>
            </tr>
            <tr>
                <td>1000</td>
                <td>2000</td>
                <td>2000</td>
            </tr>
        </table>
    </div>
</div>


        <p style="color: aliceblue;">We would love to hear from you about your impressions, we would gladly accept your review...</p>
        <button onclick="window.location='Review.php'">Click here to get redirected to the review page</button>

        <footer>
            <div class="container-footer">
                <p>&copy; 2024 Riders Showroom. All rights reserved.</p>
                <p>Follow us on <a href="#">Social Media</a></p>
            </div>
        </footer>
    </div>
</body>
</html>
