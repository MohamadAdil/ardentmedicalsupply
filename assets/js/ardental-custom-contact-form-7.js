jQuery(document).ready(function($) {
    alert("Hello")
    $('#ardental-breast-pump-telephone').on('change', function() {
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
