function openNav() {
    document.getElementById("myNav").style.width = "100%";
}

/* Close when someone clicks on the "x" symbol inside the overlay */
function closeNav() {
    document.getElementById("myNav").style.width = "0%";
}
jQuery(document).ready(function ($) {


$('#load-gallery').on('click', function (e) {

    e.preventDefault();
    let count =  $(this).attr('data-count');

    let
            data = {
            'action': 'load_more_images',
        };


    $.ajax({
        url: MyAjax.ajaxurl,
        data: data,
            success: function (data) {
               let gallery = JSON.stringify(data);
                let images = JSON.parse(gallery)
                for(count;count<images.length; count++){
                    $('.gallery-image').append('<img src="'+images[count]+'" alt="img">');
                }
                $('#load-gallery').css('display','none');
        }
    });
});

});