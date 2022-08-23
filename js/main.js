/* globals customMain sd */
jQuery(function ($) {
  // Click anywhere other than navigation menu to close menu.
  $(document).click(function () {
    $('body').removeClass('nav-menu-show');
    $(
      '.site-header__navigation__menu .menu-item-has-children.show'
    ).removeClass('show');
    $('body').removeClass('vehicle-dropdown-show');
  });

  // Swipe to close nav menu.
  $(document).on('touchstart', function (event) {
    if ($('body').hasClass('nav-menu-show')) {
      const startX = event.touches[0].clientX;
      $(document).on('touchend', function (event) {
        const endX = event.changedTouches[0].clientX;
        const diffX = endX - startX;
        if (diffX > 100) {
          $('body').removeClass('nav-menu-show');
        }
      });
    }
  });

  // Navigation menu toggle.
  const $buttonText = $('#site-header__navigation__toggle__text');
  $('#site-header__navigation__toggle').on('click', function (event) {
    event.stopPropagation();
    $('body').toggleClass('nav-menu-show');
    $buttonText.text($('body').hasClass('nav-menu-show') ? 'Close' : 'Menu');
  });
  $('#site-header__navigation__backdrop').on('click', function (event) {
    event.stopPropagation();
    $('body').removeClass('nav-menu-show');
    $buttonText.text('Menu');

    const $openVehicleDropdown = $(
      '.site-header__navigation__menu .open-vehicle-dropdown'
    );
    if ($openVehicleDropdown.hasClass('show')) {
      $openVehicleDropdown.find('a').attr('aria-expanded', 'false');
      $openVehicleDropdown.removeClass('show');
    }
    $('body').removeClass('vehicle-dropdown-show');
  });

  // Navigation submenu dropdowns.
  $('.site-header__navigation__menu .menu-item-has-children > a').on(
    'click',
    function (event) {
      event.preventDefault();
      event.stopPropagation();
      const $listItem = $(this).parent();
      $('body').removeClass('vehicle-dropdown-show');
      if ($listItem.hasClass('show')) {
        // Menu is open. close it.
        $(this).attr('aria-expanded', 'false');
        $listItem.removeClass('show');
      } else {
        // Menu is closed. Open it.
        $(this).attr('aria-expanded', 'true');
        $listItem.siblings('li').removeClass('show');
        $listItem.addClass('show');
        if ($listItem.hasClass('open-vehicle-dropdown')) {
          $('body').addClass('vehicle-dropdown-show');
        }
      }
      return false;
    }
  );

  // Widows.
  $('.widow-fix').each(function () {
    const wordArray = $(this).text().split(' ');
    let finalText = '';
    for (let i = 0; i <= wordArray.length - 1; i++) {
      finalText += wordArray[i];
      if (i == wordArray.length - 2) {
        finalText += '&nbsp;';
      } else {
        finalText += ' ';
      }
    }
    $(this).html(finalText);
  });

  //
  if (typeof sd !== 'undefined') {
    const sdData = $('body').data();

    // Pageviews.
    const sdDataLayer = {
      pageType: sdData.sdPageType,
      websiteTier: 'Tier 3',
      pageBrand: 'car',
      language: 'en',
      dealerZipCode: sdData.sdDealerZipCode,
      dealerState: 'CA',
      trafficType: customMain.trafficType,
    };
    if ('Vehicle Details' === sdData.sdPageType) {
      const vehicleData = $('.vdp').data();
      sdDataLayer.vehicleDetails = {
        status: vehicleData.condition,
        year: vehicleData.year,
        make: vehicleData.make,
        model: vehicleData.model,
        trim: vehicleData.trim,
        engine: vehicleData.engine,
        transmission: vehicleData.transmissionType,
        exteriorColor: vehicleData.exteriorColor,
        vin: vehicleData.vin,
        msrp: vehicleData.msrp,
        displayedPrice: vehicleData.displayedPrice,
      };
    }
    sd('dataLayer', sdDataLayer);
    sd('send', 'pageview');

    // Events.
    // 'Link Clicked' events.
    $('a')
      .not('[href^="#"]')
      .on('click', function () {
        const $this = $(this);
        sd('send', 'event', 'Link Clicked', {
          hitCallback: function () {
            if ('_blank' === $this.attr('target')) {
              window.open($this.attr('href'));
            } else {
              window.location.href = $this.attr('href');
            }
          },
        });
      });
    // filterSearch event.
    if ($('body').hasClass('filter-results')) {
      sd('dataLayer', {
        countSearchResults: sdData.sdCountSearchResults,
        filterSearch: {
          status: sdData.sdFilterSearch.status,
          year: sdData.sdFilterSearch.year,
          make: sdData.sdFilterSearch.make,
          model: sdData.sdFilterSearch.model,
          trim: sdData.sdFilterSearch.trim,
          color: sdData.sdFilterSearch.color,
          minPrice: sdData.sdFilterSearch.minPrice,
          maxPrice: sdData.sdFilterSearch.maxPrice,
          bodyStyle: sdData.sdFilterSearch.bodyStyle,
          features: sdData.sdFilterSearch.features,
        },
        events: 'filterSearch',
      });
      sd('send');
    }

    // typedSearch event.
    if ($('body').hasClass('search-results')) {
      sd('dataLayer', {
        typedSearchContent: sdData.sdTypedSearchContent,
        events: 'typedSearch',
      });
      sd('send');
    }

    // offerClick.
    if ('OEM Incentives' === sdData.sdPageType) {
      $('.special__ctas a').on('click', function () {
        const $special = $(this).parents('.special');
        sd('dataLayer', {
          offerClick: {
            offerId: $special.data('sd-offer-id'),
            offerName: $special.data('sd-offer-name'),
          },
          events: 'offerClick',
        });
        sd('send');
      });
    }

    // carouselClick.
    if ('Home' === sdData.sdPageType) {
      $('.home__carousel a').on('click', function () {
        sd('dataLayer', {
          carouselClick: {
            assetPosition: $(this).data('asset-position'),
            assetName: $(this).data('asset-name'),
          },
          events: 'carouselClick',
        });
        sd('send');
      });
    }

    // clickToCall.
    $('a[href^="tel:"]').on('click', function () {
      sd('dataLayer', {
        clickToCallDepartment: $(this).data('sd-department'),
        events: 'clickToCall',
      });
      sd('send');
    });

    // formInitiation.
    $('.form--contact, .form--parts, .form--sales').one(
      'click keydown',
      function () {
        const data = {
          formType: '',
          events: 'formInitiation',
        };
        if ($(this).hasClass('.form--sales')) {
          data.formType = 'Request More Info';
        } else if ($(this).hasClass('form--parts')) {
          data.formType = 'Parts';
        } else if ($(this).hasClass('form--contact')) {
          data.formType = 'General Contact';
        }
        sd('dataLayer', data);
        sd('send');
      }
    );
  }
});

// Lazyload CSS background images.
document.addEventListener('DOMContentLoaded', function () {
  var lazyBackgrounds = [].slice.call(
    document.querySelectorAll('.lazy-background')
  );

  if ('IntersectionObserver' in window) {
    let lazyBackgroundObserver = new IntersectionObserver(function (
      entries,
      observer
    ) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          lazyBackgroundObserver.unobserve(entry.target);
        }
      });
    });

    lazyBackgrounds.forEach(function (lazyBackground) {
      lazyBackgroundObserver.observe(lazyBackground);
    });
  }
});
