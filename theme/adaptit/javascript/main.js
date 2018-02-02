jQuery(document).ready(function($) {

    /* ======= Flexslider ======= */
    $('.flexslider').flexslider({
        animation: "fade"
    });
    
    /* ======= Twitter Bootstrap hover dropdown ======= */
    
    // apply dropdownHover to all elements with the data-hover="dropdown" attribute
    $('li.dropdown>[data-toggle="dropdown"]').dropdownHover();
    
    /* ======= Carousels ======= */
    $('#testimonials-carousel').carousel({interval: false, pause: "hover"});
    
});