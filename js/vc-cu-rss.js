(function ($) {
  $(function () {
    $("a[href$='#latest-announcements'], #expand-announcements").on("click", function () {
      if ($(".cu-rss-feed__outer-wrapper")[0]) {
        $(".cu-rss-feed__outer-wrapper").owlCarousel({
          loop: true,
          margin: 0,
          autoHeight: false,
          autoWidth: true,
          margin: 30,
          nav: true,
          navText: [".owl-prev", ".owl-next"],
          autoplay: false,
          autoplayHoverPause: true,
          responsive: {
            0: {
              items: 1,
            },
            300: {
              items: 2,
            },
            600: {
              items: 3,
            },
            1000: {
              items: 3,
            },
          },
        });

        $(".vc_column-inner .cu-rss-feed__outer-wrapper").owlCarousel({
          responsive: {
            0: {
              items: 1,
            },
            1024: {
              items: 3,
            },
          },
        });

        $.each($(".rss-carousel-relative-wrapper"), function (ind) {
          $(this).attr("id", "rss-carousel__" + parseInt(ind + 1));

          var currentCarousel = "#" + $(this).attr("id");
          var owlNext = " .owl-next";
          var owlPrev = " .owl-prev";

          var owl = $(".cu-rss-feed__outer-wrapper");
          owl.owlCarousel();
          // Go to the next item
          $(currentCarousel + owlNext).click(function () {
            $(currentCarousel + owlNext).trigger("next.owl.carousel", [300]);
          });

          // Go to the previous item
          $(currentCarousel + owlPrev).click(function () {
            $(currentCarousel + owlNext).trigger("prev.owl.carousel", [300]);
          });
        });
      }
      // window.dispatchEvent(new Event('resize'));
    });
  }); // end documentready
})(jQuery);