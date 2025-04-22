(function ($) {
  "use strict";

  /*---------------------------------------------------
      * Initialize all widget js in elementor init hook
      ---------------------------------------------------*/
  $(window).on("elementor/frontend/init", function () {
    // Process Slider
    elementorFrontend.hooks.addAction(
      "frontend/element_ready/wpboilerplate-process-single-item-widget.default",
      function ($scope) {
        activeProcessSlider($scope);
      }
    );
    // Platform Slider
    elementorFrontend.hooks.addAction(
      "frontend/element_ready/wpboilerplate-platform-single-item-widget.default",
      function ($scope) {
        activePlatformSlider($scope);
      }
    );
    // Investment Slider
    elementorFrontend.hooks.addAction(
      "frontend/element_ready/wpboilerplate-header-slider-one-widget.default",
      function ($scope) {
        activeHeaderOneSlider($scope);
      }
    );
  });

  /*----------------------
       Search Popup
   -----------------------*/
  function activatePopup(popup, overlay) {
    popup.addClass("active");
    overlay.addClass("active");
  }

  function deactivatePopup(popup, overlay) {
    popup.removeClass("active");
    overlay.removeClass("active");
  }

  // Function to handle the click event for closing popups and overlays
  function closePopupOnClick(trigger, popup, overlay) {
    trigger.on("click", function (e) {
      e.preventDefault();
      deactivatePopup(popup, overlay);
    });
  }

  // Function to handle the click event for opening popups and overlays
  function openPopupOnClick(triggerSelector, popupSelector, overlay) {
    $(document).on("click", triggerSelector, function (e) {
      e.preventDefault();
      let teamId = $(this).data("team-id"); // Get the specific team ID
      let specificPopup = $(popupSelector).filter(`[data-team-id="${teamId}"]`); // Select the specific popup
      activatePopup(specificPopup, overlay); // Open the specific popup
    });
  }

  let bodyOverlay = $("#body-overlay");
  let galleryPopup = $(".team-member-popup-content");
  let closeTeam = $(".team-close");

  closePopupOnClick(closeTeam, galleryPopup, bodyOverlay);
  openPopupOnClick(".team-popup-button", galleryPopup, bodyOverlay);

  /*----------------------------------
        Process Slider Widget
    --------------------------------*/
  function activeProcessSlider($scope) {
    var el = $scope.find(".process-carousel");
    var elSettings = el.data("settings");
    // if ((el.children('div').length < 1) || (elSettings.items === '0' || elSettings.items === '' || typeof elSettings.items == 'undefined')) {
    //     return;
    // }
    let $selector = "#" + el.attr("id");

    let sliderSettings = {
      infinite: elSettings.loop === "yes",
      slidesToShow: 3,
      slidesToScroll: 1,
      arrows: elSettings.nav === "yes",
      dots: elSettings.dot === "yes",
      autoplaySpeed: elSettings.autoplaytimeout,
      autoplay: elSettings.autoplay === "yes",
      centerMode: elSettings.center === "yes",
      centerPadding: elSettings.margin + "px",
      appendArrows: $scope.find(".slick-carousel-controls .process-slider-nav"),
      appendDots: $scope.find(".slick-carousel-controls .slider-dots"),
      prevArrow: '<div class="prev-arrow">' + elSettings.navleft + "</div>",
      nextArrow: '<div class="next-arrow">' + elSettings.navright + "</div>",
      cssEase: "linear",
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          },
        },
      ],
    };
    wowSlickInit($selector, sliderSettings);
  }

  /*----------------------------------
       Brand Slider Widget
   --------------------------------*/
  function activePlatformSlider($scope) {
    var el = $scope.find(".platform-carousel");
    var elSettings = el.data("settings");
    if (
      el.children("div").length < 1 ||
      elSettings.items === "0" ||
      elSettings.items === "" ||
      typeof elSettings.items == "undefined"
    ) {
      return;
    }
    let $selector = "#" + el.attr("id");

    let sliderSettings = {
      infinite: elSettings.loop === "yes",
      slidesToShow: elSettings.items,
      slidesToScroll: 1,
      arrows: elSettings.nav === "yes",
      dots: elSettings.dot === "yes",
      autoplaySpeed: elSettings.autoplaytimeout,
      autoplay: elSettings.autoplay === "yes",
      centerMode: elSettings.center === "yes",
      centerPadding: elSettings.margin + "px",
      appendArrows: $scope.find(
        ".slick-carousel-controls .platform-slider-nav"
      ),
      appendDots: $scope.find(".slick-carousel-controls .slider-dots"),
      prevArrow: '<div class="prev-arrow">' + elSettings.navleft + "</div>",
      nextArrow: '<div class="next-arrow">' + elSettings.navright + "</div>",
      cssEase: "linear",
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 600,
          settings: {
            arrows: false,
            slidesToShow: 2,
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 480,
          settings: {
            arrows: false,
            slidesToShow: 1,
            slidesToScroll: 1,
          },
        },
      ],
    };
    wowSlickInit($selector, sliderSettings);
  }

  /*----------------------------------
       Brand Slider Widget
   --------------------------------*/
  function activeHeaderOneSlider($scope) {
    var el = $scope.find(".header-slider-one");
    var elSettings = el.data("settings");

    if (
      el.children("div").length < 1 ||
      elSettings.items === "0" ||
      elSettings.items === "" ||
      typeof elSettings.items == "undefined"
    ) {
      return;
    }

    let $selector = "#" + el.attr("id");

    let sliderSettings = {
      infinite: elSettings.loop === "yes",
      slidesToShow: elSettings.items,
      slidesToScroll: 1,
      arrows: elSettings.nav === "yes",
      dots: elSettings.dot === "yes",
      autoplaySpeed: elSettings.autoplaytimeout,
      autoplay: elSettings.autoplay === "yes",
      centerMode: elSettings.center === "yes",
      centerPadding: elSettings.margin + "px",
      appendArrows: $scope.find(
        ".slick-carousel-controls .slider-nav"
      ),
      appendDots: $scope.find(".slick-carousel-controls .slider-dots"),
      prevArrow: '<div class="prev-arrow">' + elSettings.navleft + "</div>",
      nextArrow: '<div class="next-arrow">' + elSettings.navright + "</div>",
      cssEase: "linear",
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          },
        },
      ],
    };
    wowSlickInit($selector, sliderSettings);
  }

  //slick init function
  function wowSlickInit($selector, settings, animateOut = false) {
    $($selector).slick(settings);
  }

  $(document).ready(function () {
    // Related Product Slider
    if ($(".related.products").length) {
      // activeRelatedProductsSlider($(".related.products"));
    }

    function activeRelatedProductsSlider($scope) {
      var $selector = $scope.find(".related-carousel");
      // console.log($selector);

      let sliderSettings = {
        infinite: "yes",
        loop: "yes",
        slidesToShow: 5,
        slidesToScroll: 1,
        arrows: "yes",
        dots: "yes",
        autoplay: false,
        // autoplaySpeed: 1500,
        appendArrows: $scope.find(".slick-carousel-controls .slider-nav"),
        appendDots: $scope.find(".slick-carousel-controls .slider-dots"),
        prevArrow: '<span class="prev-arrow">< </span>',
        nextArrow: '<span class="next-arrow"> >  </span>',
        cssEase: "linear",
        // responsive: [
        //   {
        //     breakpoint: 1024,
        //     settings: {
        //       slidesToShow: 3,
        //       slidesToScroll: 1,
        //     },
        //   },
        //   {
        //     breakpoint: 600,
        //     settings: {
        //       slidesToShow:2,
        //       slidesToScroll: 1,
        //     },
        //   },
        //   {
        //     breakpoint: 480,
        //     settings: {
        //       slidesToShow: 1,
        //       slidesToScroll: 1,
        //     },
        //   },
        // ],
      };
      
      wowSlickInit($selector, sliderSettings);
    }
  });
})(jQuery);

jQuery(document).ready(function ($) {
  $("#tax_toggle").on("change", function () {
    var excludeTax = $(this).is(":checked") ? "yes" : "no";

    $.ajax({
      url: taxToggleAjax.ajax_url,
      type: "POST",
      data: {
        action: "wpboilerplate_toggle_tax",
        security: taxToggleAjax.nonce,
        exclude_tax: excludeTax,
      },
      success: function (response) {
        if (response.success) {
          // Refresh product prices dynamically
          $("body").trigger("update_checkout"); // Update WooCommerce mini cart or checkout
          location.reload(); // Reload page to reflect changes
        }
      },
    });
  });
});
