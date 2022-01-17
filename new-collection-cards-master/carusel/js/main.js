
  // Testimonials carousel (uses the Owl Carousel library)
  $(".testimonials-carousel").owlCarousel({
    autoplay: true,
    dots: true,
    loop: true,
    responsive: {
      0: {
        items: 1
      },
      320:{
        items: 1
      },
      // 425: {
      //   items: 2
      // },
      768: {
        items: 2
      },
      900:{
        items: 3
      },
      1024: {
        items: 5
      },
      1440: {
        items: 5
      }
    }
  });

  // Clients carousel (uses the Owl Carousel library)
  $(".clients-carousel").owlCarousel({
    autoplay: true,
    dots: true,
    nav:true,
    loop: true,
    responsive: {
      0: {
        items: 1
      },
      425: {
        items: 2
      },
      768: {
        items: 3
      },
      1024: {
        items: 5
      }
      
    }
  });


  


// })(jQuery);