
  const images = [
    "assets/img/bukaa1.jpg",
    "assets/img/bukaa2.jpg",
    "assets/img/bukaa3.jpg",
    "assets/img/bukaa4.jpg",
    "assets/img/bukaa5.jpg",
    "assets/img/bukaa6.jpg"
  ];

  let currentImageIndex = 0;

  function rotateImage() {
    const aboutImg = document.getElementById('rotating-images');
    aboutImg.style.backgroundImage = `url(${images[currentImageIndex]})`;
    currentImageIndex = (currentImageIndex + 1) % images.length;
  }

  setInterval(rotateImage, 5000); // Change image every 5 seconds

