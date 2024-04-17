function toggleMenu() 
    {
        const navList = document.querySelector('.nav-list');
        navList.classList.toggle('active');
    }
    
//          Navigation Bar          //



let slideIndex = 0;
showSlides();

function showSlides() {
    let slides = document.querySelectorAll('.slide');
    let dots = document.querySelectorAll('.dot');

    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = 'none';
    }

    slideIndex++;

    if (slideIndex > slides.length) {
        slideIndex = 1;
    }

    for (let i = 0; i < dots.length; i++) {
        dots[i].classList.remove('active');
    }

    slides[slideIndex - 1].style.display = 'block';
    dots[slideIndex - 1].classList.add('active');

    setTimeout(showSlides, 4000); // Change slide every 4 seconds (adjust as needed)
}

     
//          SlideShow         //
    


function googleTranslateElementInit() 
{
    new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
    


document.addEventListener("DOMContentLoaded", function () {
    const togglePopupLink = document.getElementById("toggle-popup");
    const popup = document.getElementById("popup");

    // Toggle the popup when the link is clicked
    togglePopupLink.addEventListener("click", function (e) {
        e.preventDefault();
        if (popup.style.display === "none" || popup.style.display === "") 
        {
            popup.style.display = "flex";
        } 
        else 
        {
            popup.style.display = "none";
        }
    });
});



//          Customer Home           //





function decreaseQuantity() 
{
    var quantityInput = document.getElementById('quantity');
    var currentQuantity = parseInt(quantityInput.value, 10);

    if (currentQuantity > 1) {
        quantityInput.value = currentQuantity - 1;
    }
}

function increaseQuantity() 
{
    var quantityInput = document.getElementById('quantity');
    var currentQuantity = parseInt(quantityInput.value, 10);

    quantityInput.value = currentQuantity + 1;
}


//           Booking          //





