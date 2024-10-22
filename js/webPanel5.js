
(function ($) {
    "use strict";

    /*[ Load page ]
    ===========================================================*/
    $(".animsition").animsition({
        inClass: 'fade-in',
        outClass: 'fade-out',
        inDuration: 1500,
        outDuration: 800,
        linkElement: '.animsition-link',
        loading: true,
        loadingParentElement: 'html',
        loadingClass: 'animsition-loading-1',
        loadingInner: '<div class="loader05"></div>',
        timeout: false,
        timeoutCountdown: 5000,
        onLoadEvent: true,
        browser: [ 'animation-duration', '-webkit-animation-duration'],
        overlay : false,
        overlayClass : 'animsition-overlay-slide',
        overlayParentElement : 'html',
        transition: function(url){ window.location.href = url; }
    });
    
    /*[ Back to top ]
    ===========================================================*/
    var windowH = $(window).height()/2;

    $(window).on('scroll',function(){
        if ($(this).scrollTop() > windowH) {
            $("#myBtn").css('display','flex');
        } else {
            $("#myBtn").css('display','none');
        }
    });

    $('#myBtn').on("click", function(){
        $('html, body').animate({scrollTop: 0}, 300);
    });


    /*==================================================================
    [ Fixed Header ]*/
    var headerDesktop = $('.container-menu-desktop');
    var wrapMenu = $('.wrap-menu-desktop');

    if($('.top-bar').length > 0) {
        var posWrapHeader = $('.top-bar').height();
    }
    else {
        var posWrapHeader = 0;
    }
    

    if($(window).scrollTop() > posWrapHeader) {
        $(headerDesktop).addClass('fix-menu-desktop');
        $(wrapMenu).css('top',0); 
    }  
    else {
        $(headerDesktop).removeClass('fix-menu-desktop');
        $(wrapMenu).css('top',posWrapHeader - $(this).scrollTop()); 
    }

    $(window).on('scroll',function(){
        if($(this).scrollTop() > posWrapHeader) {
            $(headerDesktop).addClass('fix-menu-desktop');
            $(wrapMenu).css('top',0); 
        }  
        else {
            $(headerDesktop).removeClass('fix-menu-desktop');
            $(wrapMenu).css('top',posWrapHeader - $(this).scrollTop()); 
        } 
    });


    /*==================================================================
    [ Menu mobile ]*/
    $('.btn-show-menu-mobile').on('click', function(){
        $(this).toggleClass('is-active');
        $('.menu-mobile').slideToggle();
    });

    var arrowMainMenu = $('.arrow-main-menu-m');

    for(var i=0; i<arrowMainMenu.length; i++){
        $(arrowMainMenu[i]).on('click', function(){
            $(this).parent().find('.sub-menu-m').slideToggle();
            $(this).toggleClass('turn-arrow-main-menu-m');
        })
    }

    $(window).resize(function(){
        if($(window).width() >= 992){
            if($('.menu-mobile').css('display') == 'block') {
                $('.menu-mobile').css('display','none');
                $('.btn-show-menu-mobile').toggleClass('is-active');
            }

            $('.sub-menu-m').each(function(){
                if($(this).css('display') == 'block') { console.log('hello');
                    $(this).css('display','none');
                    $(arrowMainMenu).removeClass('turn-arrow-main-menu-m');
                }
            });
                
        }
    });


    /*==================================================================
    [ Show / hide modal search ]*/
    $('.js-show-modal-search').on('click', function(){
        $('.modal-search-header').addClass('show-modal-search');
        $(this).css('opacity','0');
    });

    $('.js-hide-modal-search').on('click', function(){
        $('.modal-search-header').removeClass('show-modal-search');
        $('.js-show-modal-search').css('opacity','1');
    });

    $('.container-search-header').on('click', function(e){
        e.stopPropagation();
    });


    /*==================================================================
    [ Isotope ]*/
    var $topeContainer = $('.isotope-grid');
    var $filter = $('.filter-tope-group');

    // filter items on button click
    $filter.each(function () {
        $filter.on('click', 'button', function () {
            var filterValue = $(this).attr('data-filter');
            $topeContainer.isotope({filter: filterValue});
        });
        
    });

    // init Isotope
    $(window).on('load', function () {
        var $grid = $topeContainer.each(function () {
            $(this).isotope({
                itemSelector: '.isotope-item',
                layoutMode: 'fitRows',
                percentPosition: true,
                animationEngine : 'best-available',
                masonry: {
                    columnWidth: '.isotope-item'
                }
            });
        });
    });

    var isotopeButton = $('.filter-tope-group button');

    $(isotopeButton).each(function(){
        $(this).on('click', function(){
            for(var i=0; i<isotopeButton.length; i++) {
                $(isotopeButton[i]).removeClass('how-active1');
            }

            $(this).addClass('how-active1');
        });
    });

    /*==================================================================
    [ Filter / Search product ]*/
    $('.js-show-filter').on('click',function(){
        $(this).toggleClass('show-filter');
        $('.panel-filter').slideToggle(400);

        if($('.js-show-search').hasClass('show-search')) {
            $('.js-show-search').removeClass('show-search');
            $('.panel-search').slideUp(400);
        }    
    });

    $('.js-show-search').on('click',function(){
        $(this).toggleClass('show-search');
        $('.panel-search').slideToggle(400);

        if($('.js-show-filter').hasClass('show-filter')) {
            $('.js-show-filter').removeClass('show-filter');
            $('.panel-filter').slideUp(400);
        }    
    });




    /*==================================================================
    [ Cart ]*/
    $('.js-show-cart').on('click',function(){
        $('.js-panel-cart').addClass('show-header-cart');
    });

    $('.js-hide-cart').on('click',function(){
        $('.js-panel-cart').removeClass('show-header-cart');
    });

    /*==================================================================
    [ Cart ]*/
    $('.js-show-sidebar').on('click',function(){
        $('.js-sidebar').addClass('show-sidebar');
    });

    $('.js-hide-sidebar').on('click',function(){
        $('.js-sidebar').removeClass('show-sidebar');
    });

    /*==================================================================
    [ +/- num product ]*/
    $('.btn-num-product-down').on('click', function(){
        var numProduct = Number($(this).next().val());
        if(numProduct > 0) $(this).next().val(numProduct - 1);
    });

    $('.btn-num-product-up').on('click', function(){
        var numProduct = Number($(this).prev().val());
        $(this).prev().val(numProduct + 1);
    });

    /*==================================================================
    [ Rating ]*/
    $('.wrap-rating').each(function(){
        var item = $(this).find('.item-rating');
        var rated = -1;
        var input = $(this).find('input');
        $(input).val(0);

        $(item).on('mouseenter', function(){
            var index = item.index(this);
            var i = 0;
            for(i=0; i<=index; i++) {
                $(item[i]).removeClass('zmdi-star-outline');
                $(item[i]).addClass('zmdi-star');
            }

            for(var j=i; j<item.length; j++) {
                $(item[j]).addClass('zmdi-star-outline');
                $(item[j]).removeClass('zmdi-star');
            }
        });

        $(item).on('click', function(){
            var index = item.index(this);
            rated = index;
            $(input).val(index+1);
        });

        $(this).on('mouseleave', function(){
            var i = 0;
            for(i=0; i<=rated; i++) {
                $(item[i]).removeClass('zmdi-star-outline');
                $(item[i]).addClass('zmdi-star');
            }

            for(var j=i; j<item.length; j++) {
                $(item[j]).addClass('zmdi-star-outline');
                $(item[j]).removeClass('zmdi-star');
            }
        });
    });
    
    /*==================================================================
    [ Show modal1 ]*/
    // $('.js-show-modal1').on('click',function(e){
    //     let id = e.target.id;
    //     e.preventDefault();
    //     $('.js-modal1').addClass('show-modal1');

    // });

    // $('.js-hide-modal1').on('click',function(){
    //     $('.js-modal1').removeClass('show-modal1');
    // });



})(jQuery);


document.addEventListener('DOMContentLoaded',()=>{
    let modalTriggers = document.querySelectorAll('.js-show-modal1');
    let hidemodal = document.querySelectorAll('.js-hide-modal1');
    let modal = document.querySelector('.js-modal1');

    modalTriggers.forEach((triggers)=>{
        triggers.addEventListener('click',(event)=>{
            event.preventDefault();
            // console.log(triggers.getAttribute('id'));
            let productId = event.target.id;
            let productmodal =  document.querySelector(`#product${productId}`);
            // console.log(productmodal);
            productmodal && productmodal.classList.add('show-modal1');
        })
    });
    hidemodal.forEach((hidetrigger)=>{
        hidetrigger.addEventListener('click',(event)=>{
            let trrigerParent = event.target.closest('.js-modal1');
            console.log(trrigerParent);
            // hidetrigger.classList.remove('show-modal1');
            trrigerParent && trrigerParent.classList.remove('show-modal1');
        })
    })
})

function tabContent(){
let navLinks = document.querySelectorAll('.nav-link');
let tabDives = document.querySelectorAll('.tab-pane');

navLinks.forEach((links)=>{
    links.addEventListener('click',(event)=>{
        event.preventDefault();
        navLinks.forEach((nav)=> nav.classList.remove('active'));
        tabDives.forEach((tabPanes)=> tabPanes.classList.remove('show','active'));
        links.classList.add('active');
         let tabElement = document.querySelector(links.getAttribute('href')); //nav-link k href sy tab-pane ki id's to get kr rahy hai 
        //  console.log(tabElement);
         tabElement.classList.add('show','active');
    })
})

}

function popover(){
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
      return new bootstrap.Popover(popoverTriggerEl)
    })
    
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    })
};

popover();
tabContent();

// Select all icon buttons
const toggleButtons = document.querySelectorAll('.toggleOptions');

// Add event listener to each toggle button
toggleButtons.forEach((toggleButton) => {
    toggleButton.addEventListener('click', () => {
        // Find the corresponding options div (the next sibling)
        const optionsDiv = toggleButton.closest('.reviewModal').querySelector('.options');

        // Toggle the visibility using opacity and visibility
        if (optionsDiv.classList.contains('hidden')) {
            optionsDiv.classList.remove('hidden');  // Show the options
            optionsDiv.classList.add('visible');     // Make it visible
        } else {
            optionsDiv.classList.remove('visible');  // Hide the options
            optionsDiv.classList.add('hidden');       // Make it hidden
        }
    });
});





// Star rating update functionality
document.addEventListener('DOMContentLoaded', function () {
    const starRatings = document.querySelectorAll('.wrap-rating');

    starRatings.forEach((ratingContainer) => {
        const stars = ratingContainer.querySelectorAll('.item-rating');

        stars.forEach((star, index) => {
            // console.log(star ,index)
            star.addEventListener('click', () => {
                // Update star rating value
                // console.log(ratingContainer.parentElement); //parent ko search kiya or phir wha sy input ko target kiya
                const starRatingValue = ratingContainer.parentElement.querySelector('.starRatingValue');
                starRatingValue.value = index + 1; // +1 for 1-based index
                // console.log(starRatingValue.value)

                // Set the star visuals
                stars.forEach((s, i) => {
                    if (i <= index) {
                        // console.log(i,index)
                        s.classList.remove('zmdi-star-outline');
                        s.classList.add('zmdi-star');
                    } else {
                        s.classList.remove('zmdi-star');
                        s.classList.add('zmdi-star-outline');
                    }
                });
            });
        });
    });
});



