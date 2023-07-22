import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;
Alpine.start();

var owl = $(".owl-carousel");
owl.owlCarousel({
    items: 4,
    loop: true,
    margin: 10,
    autoplay: true,
    autoplayTimeout: 500,
    autoplayHoverPause: true,
});
$(".play").on("click", function () {
    owl.trigger("play.owl.autoplay", [1000]);
});
$(".stop").on("click", function () {
    owl.trigger("stop.owl.autoplay");
});
$(".backward").on("click", function () {
    owl.trigger("prev.owl.carousel");
});
// Go to the previous item
$(".forward").on("click", function () {
    owl.trigger("next.owl.carousel");
});

(function () {
    const second = 1000,
        minute = second * 60,
        hour = minute * 60,
        day = hour * 24;

    let today = new Date(),
        dd = String(today.getDate()).padStart(2, "0"),
        mm = String(today.getMonth() + 1).padStart(2, "0"),
        yyyy = today.getFullYear(),
        year = yyyy,
        monthDay = "09/26/",
        dueDay = monthDay + yyyy;

    today = mm + "/" + dd + "/" + yyyy;
    if (today > dueDay) {
        dueDay = monthDay + year;
    }
    const countDown = new Date(dueDay).getTime(),
        x = setInterval(function () {
            const now = new Date().getTime(),
                distance = countDown - now;

            (document.getElementById("days").innerText = Math.floor(
                distance / day
            )),
                (document.getElementById("hours").innerText = Math.floor(
                    (distance % day) / hour
                )),
                (document.getElementById("minutes").innerText = Math.floor(
                    (distance % hour) / minute
                )),
                (document.getElementById("seconds").innerText = Math.floor(
                    (distance % minute) / second
                ));

            if (distance < 0) {
                document.getElementById("headline").innerText =
                    "It's the Due Day!";
                document.getElementById("countdown").style.display = "none";
                clearInterval(x);
            }
        }, 0);
})();

let defaultTransform = 0;
function goNext() {
    defaultTransform = defaultTransform - 398;
    var slider = document.getElementById("slider");
    if (Math.abs(defaultTransform) >= slider.scrollWidth / 1.7)
        defaultTransform = 0;
    slider.style.transform = "translateX(" + defaultTransform + "px)";
}
next.addEventListener("click", goNext);
function goPrev() {
    var slider = document.getElementById("slider");
    if (Math.abs(defaultTransform) === 0) defaultTransform = 0;
    else defaultTransform = defaultTransform + 398;
    slider.style.transform = "translateX(" + defaultTransform + "px)";
}
prev.addEventListener("click", goPrev);

const imageInput = document.getElementById("images");
const imagePreviewContainer = document.querySelector(".images-preview-div");

imageInput.addEventListener("change", function (event) {
    const files = event.target.files;

    // Clear the existing preview
    imagePreviewContainer.innerHTML = "";

    for (let i = 0; i < files.length; i++) {
        const file = files[i];
        const reader = new FileReader();

        reader.onload = function (e) {
            const imageUrl = e.target.result;

            const imageElement = document.createElement("img");
            imageElement.src = imageUrl;
            imageElement.alt = "Image";
            imageElement.classList.add("preview-image");

            // Append a delete button for each image
            const deleteButton = document.createElement("button");
            deleteButton.innerText = "Delete";
            deleteButton.classList.add("delete-image");
            deleteButton.dataset.index = i;

            // Attach event listener to delete button
            deleteButton.addEventListener("click", function () {
                const index = this.dataset.index;

                // Remove the image element from the preview
                imagePreviewContainer.removeChild(
                    imagePreviewContainer.childNodes[index]
                );

                // Remove the corresponding file from the input's file list
                files.splice(index, 1);
            });

            // Append the image and delete button to the preview container
            const imageWrapper = document.createElement("div");
            imageWrapper.classList.add("image-wrapper");
            imageWrapper.appendChild(imageElement);
            imageWrapper.appendChild(deleteButton);
            imagePreviewContainer.appendChild(imageWrapper);
        };

        reader.readAsDataURL(file);
    }
});

let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
    showSlides((slideIndex += n));
}

// Thumbnail image controls
function currentSlide(n) {
    showSlides((slideIndex = n));
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) {
        slideIndex = 1;
    }
    if (n < 1) {
        slideIndex = slides.length;
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
}

