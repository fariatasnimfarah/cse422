<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>Travel Management System</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="style.css">
</head>

<header>
<?php

include "navbar.php"

?>

  </header>
  
<body>


  <main>
    <section class="slideshow">
      <div class="slideshow-container">
        <video class="slide" src="video4.mp4" autoplay loop muted></video>
        <video class="slide" src="video3.mp4" autoplay loop muted></video>
        <video class="slide" src="video5.mp4" autoplay loop muted></video>
        <video class="slide" src="video1.mp4" autoplay loop muted></video>
      </div>
      <div class="slideshow-text">
        <p>Explore World's Best Destinations With Us!</p>
      </div>
      <div class="slideshow-nav">
        <button class="prev-slide" onclick="prevSlide()">&#10094;</button>
        <button class="next-slide" onclick="nextSlide()">&#10095;</button>
      </div>
    </section>
    <section class="features">
      <div class="feature">
        <i class="fas fa-plane"></i>
        <h2>Flights</h2>
        <p>Find the best deals on flights to your dream destination.</p>
      </div>
      <div class="feature">
        <i class="fas fa-hotel"></i>
        <h2>Hotels</h2>
        <p>Discover comfortable and affordable accommodations.</p>
      </div>
      <div class="feature">
        <i class="fas fa-car"></i>
        <h2>Rental Cars</h2>
        <p>Get around with ease in a reliable rental car.</p>
      </div>
    </section>
    <section class="destinations">
      <div class="container">
        <h2>Discover Our Top Destinations</h2>
        <div class="destination-cards">
          <div class="destination-card">
            <img src="FR.jpg" alt="Destination 1">
            <h3>Paris, France</h3>
            <p>Experience the beauty and romance of the City of Light.</p>
          </div>
          <div class="destination-card">
            <img src="TK.jpg" alt="Destination 2">
            <h3>Tokyo, Japan</h3>
            <p>Explore the vibrant culture and technology of Tokyo.</p>
          </div>
          <div class="destination-card">
            <img src="CY.jpg" alt="Destination 3">
            <h3>Sydney, Australia</h3>
            <p>Relax on the stunning beaches and discover the natural wonders of Sydney.</p>
          </div>
          <div class="destination-card">
            <img src="NYC.jpg" alt="Destination 4">
            <h3>New York City, USA</h3>
            <p>Experience the hustle and bustle of the Big Apple.</p>
          </div>
          <div class="destination-card">
            <img src="SA.jpg" alt="Destination 5">
            <h3>Cape Town, South Africa</h3>
            <p>Discover the breathtaking scenery and diverse wildlife of Cape Town.</p>
          </div>
          <div class="destination-card">
            <img src="BK.jpg" alt="Destination 6">
            <h3>Bangkok, Thailand</h3>
            <p>Indulge in the vibrant street food and nightlife of Bangkok.</p>
          </div>
        </div>
        <a href="destinations.html" class="btn">See More</a>
      </div>
    </section>


  </main>

  <footer>
    <div class="container">
      <p>&copy; 2023 Travel Management System</p>
      <div class="social-icons">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
      </div>
      <ul>
        <li><a href="#">Terms &amp; Conditions</a></li>
        <li><a href="#">Privacy Policy</a></li>
        <li><a href="#">Contact Us</a></li>
      </ul>
    </div>
  </footer>

  <script>
    var slideIndex = 1;
    showSlide(slideIndex);

    function nextSlide() {
      showSlide(slideIndex += 1);
    }

    function prevSlide() {
      showSlide(slideIndex -= 1);
    }

    function showSlide(n) {
      var slides = document.getElementsByClassName("slide");
      var text = document.getElementsByClassName("slideshow-text")[0];

      if (n > slides.length) {
        slideIndex = 1;
      } else if (n < 1) {
        slideIndex = slides.length;
      }

      for (var i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }

      slides[slideIndex-1].style.display = "block";
    }
  </script>

</body>
</html>