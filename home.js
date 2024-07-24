var slideIndex = 0;
showSlides();
function showSlides() {
        var i;
        var j;
        var slides = document.getElementsByClassName("Slide");
        var dots = document.getElementsByClassName("navigation-auto");
        for(i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
        }
        for(j = 0; j < dots.length; j++) {
          dots[j].className = dots[j].className.replace(" active", "");
        }
        slideIndex++;
        if(slideIndex > slides.length) {
          slideIndex = 1
        }

        
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
    setTimeout(showSlides, 2000); // Change image every 2 seconds
}
var slideIndex1 = 1;
      showSlides1(slideIndex1);
      function plusSlides(n) {
        showSlides1(slideIndex1 += n);
      }
      function currentSlide(n) {
        showSlides1(slideIndex1 = n);
      }
      function showSlides1(n) {
        var i;
        var slides = document.getElementsByClassName("Slide");
        var dots = document.getElementsByClassName("navigation-manual");
        if(n > slides.length) {
          slideIndex1 = 1
        }
        if(n < 1) {
          slideIndex1 = slides.length
        }
        for(i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
        }
        for(i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex1 - 1].style.display = "block";
        dots[slideIndex1 - 1].className += " active";
      }