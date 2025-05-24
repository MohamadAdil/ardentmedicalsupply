// owl hero
$('.owl-carousel.banner-owl').owlCarousel({
    loop: true,
    margin: 10,
    nav: false,
    navText: ["<i class='fas fa-chevron-left'></i>", "<i class='fas fa-chevron-right'></i>"],
    dots: true,
    autoplay: true,
    autoHeight: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 1
        }
    }
})
// category
$('.owl-carousel.cate-car').owlCarousel({
    loop: true,
    margin: 18,
    nav: true,
    dots: false,
    autoHeight: true,
    navText: ["<i class='fas fa-chevron-left'></i>", "<i class='fas fa-chevron-right'></i>"],
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        900: {
            items: 4
        },
        1299: {
            items: 6
        }
    }
})
// Customers
$('.owl-carousel.customers-owl').owlCarousel({
    loop: true,
    // autoplay:true,
    margin: 40,
    nav: true,
    dots: true,
    autoHeight: true,
    navText: ["<i class='fa-solid fa-arrow-left'></i>", "<i class='fa-solid fa-arrow-right'></i>"],
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        1000: {
            items: 3
        }
    }
})

// Product Rating Form Open On Click
jQuery(document).ready(function ($) {
    $('.writeProductReview').on('click', function () {
        if ($('#review_form').hasClass('d-none')) {
            $('#review_form').removeClass('d-none');
        }
    });
    $('form#commentform').on('submit', function () {
        var comment = $('#comment').val().trim();
        if (comment === '') {
            alert('Please leave your review message.');
            return false; // Prevent form submission
        }
    });


    // Forms Phone Number Validation
    $(document).on('input', '#ardental-breast-pump-telephone', function() {
        var phoneNumber = $(this).val(); // Remove non-digits
        console.log(phoneNumber)
        if (phoneNumber.length !== 10) {
            // $(this).addClass('is-invalid');
            // alert("")
            console.log("Please Enter 10 Digits")
        } else {
            $(this).removeClass('is-invalid');
            console.log("Entered 10 Digits")
        }
    });
});

