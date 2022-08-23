jQuery(function ($) {
  // Main Carousel.
  const $homeCarousel = $('.home__carousel').removeClass('is-hidden');
  $homeCarousel[0].offsetHeight;
  const $homeCarouselSmall = $('.home__carousel--small');
  const $homeCarouselLarge = $('.home__carousel--large');
  const homeCarouselOptions = {
    autoPlay: 5000,
    freeScroll: false,
    wrapAround: true,
    adaptiveHeight: true,
    imagesLoaded: true,
    lazyLoad: true,
    arrowShape: {
      x0: 25,
      x1: 75,
      y1: 50,
      x2: 80,
      y2: 45,
      x3: 35,
    },
  };
  // Set aria-hidden cells to tabindex -1.
  $homeCarousel.on('ready.flickity', function () {
    $(this).find('a[aria-hidden="true"]').attr('tabindex', '-1');
  });
  // Toggle aria-hidden cells to tabindex -1 on change.
  $homeCarousel.on('change.flickity', function () {
    $(this).find('a[aria-hidden="true"]').attr('tabindex', '-1');
    $(this).find('a[aria-hidden!="true"]').attr('tabindex', '');
  });

  if (matchMedia('screen and (max-width: 767px)').matches) {
    $homeCarouselSmall.flickity(homeCarouselOptions);
  } else if (matchMedia('screen and (min-width: 768px)').matches) {
    $homeCarouselLarge.flickity(homeCarouselOptions);
  }

  matchMedia('screen and (max-width: 767px)').addEventListener(
    'change',
    function () {
      if (this.matches) {
        $homeCarouselLarge.flickity('destroy');
        if (!$homeCarouselSmall.data('flickity')) {
          $homeCarouselSmall.flickity(homeCarouselOptions);
        }
      }
    }
  );

  matchMedia('screen and (min-width: 768px)').addEventListener(
    'change',
    function () {
      if (this.matches) {
        $homeCarouselSmall.flickity('destroy');
        if (!$homeCarouselLarge.data('flickity')) {
          $homeCarouselLarge.flickity(homeCarouselOptions);
        }
      }
    }
  );

  // New Vehicle Menu Carousels.
  const $newVehicleMenuCarousel = $(
    '.home__new-vehicle-menu__tabs-content__carousel'
  );
  // Options.
  const newVehicleOptions = {
    contain: true,
    freeScroll: false,
    adaptiveHeight: true,
    imagesLoaded: true,
    arrowShape: {
      x0: 25,
      x1: 75,
      y1: 50,
      x2: 77,
      y2: 47.5,
      x3: 30,
    },
  };
  // Change options based on screen size.
  if (matchMedia('screen and (min-width: 768px)').matches) {
    newVehicleOptions.groupCells = 2;
  } else if (matchMedia('screen and (min-width: 992px)').matches) {
    newVehicleOptions.groupCells = 3;
  }
  // Set aria-hidden cells to tabindex -1.
  $newVehicleMenuCarousel.on('ready.flickity', function () {
    $newVehicleMenuCarousel
      .find('[aria-hidden="true"] a')
      .attr('tabindex', '-1');
  });
  // Initialize.
  $newVehicleMenuCarousel.flickity(newVehicleOptions);
  // Toggle aria-hidden cells to tabindex -1 on change.
  $newVehicleMenuCarousel.on('change.flickity', function () {
    $newVehicleMenuCarousel
      .find('[aria-hidden="true"] a')
      .attr('tabindex', '-1');
    $newVehicleMenuCarousel
      .find('[aria-hidden!="true"] a')
      .attr('tabindex', '');
  });
  // Watch for changes in screen size.
  matchMedia('screen and (max-width: 767px)').addEventListener(
    'change',
    function () {
      if (this.matches) {
        newVehicleOptions.groupCells = false;
        $newVehicleMenuCarousel.each(function () {
          if ($(this).data('flickity')) {
            $(this).flickity('destroy');
          }
          $(this).flickity(newVehicleOptions);
        });
      }
    }
  );
  matchMedia(
    'screen and (min-width: 768px) and (max-width: 991px)'
  ).addEventListener('change', function () {
    if (this.matches) {
      newVehicleOptions.groupCells = 2;
      $newVehicleMenuCarousel.each(function () {
        if ($(this).data('flickity')) {
          $(this).flickity('destroy');
        }
        $(this).flickity(newVehicleOptions);
      });
    }
  });
  matchMedia('screen and (min-width: 992px)').addEventListener(
    'change',
    function () {
      if (this.matches) {
        newVehicleOptions.groupCells = 3;
        $newVehicleMenuCarousel.each(function () {
          if ($(this).data('flickity')) {
            $(this).flickity('destroy');
          }
          if (
            $(this).find(
              '.home__new-vehicle-menu__tabs-content__carousel__carousel-cell'
            ).length > 3
          ) {
            $(this).flickity(newVehicleOptions);
          }
        });
      }
    }
  );

  // New Vehicle Menu Tabs.
  const $tabs = $('#newVehicleMenuTabs .tab-link');
  $tabs.on('click', function () {
    $tabs.removeClass('active');
    $(this).addClass('active');
    const target = $(this).data('target');
    const $tabsContent = $('#newVehicleMenuTabsContent');
    $tabsContent.find('.tab-panel').removeClass('show');
    $tabsContent.find(target).addClass('show');
    $newVehicleMenuCarousel.each(function () {
      if ($(this).data('flickity')) {
        $(this).flickity('resize');
      }
    });
  });

  // Filter.
  const $homeFilter = $('#homeFilter');

  $(document).click(function () {
    $('.home__filter__dropdown').removeClass('show');
  });
  $('.home__filter__dropdown__button').on('click', function (event) {
    event.stopPropagation();
    const $dropdown = $(this).parents('.home__filter__dropdown');
    if ($dropdown.hasClass('show')) {
      $('.home__filter__dropdown').removeClass('show');
    } else {
      $('.home__filter__dropdown').removeClass('show');
      $dropdown.addClass('show');
    }
  });
  $('.home__filter__dropdown__menu button').on('click', function (event) {
    event.stopPropagation();
    const $dropdown = $(this).parents('.home__filter__dropdown');
    const $input = $dropdown.find('input');
    const value = $(this).data('value');
    $input.val(value);

    const text = $(this).text();
    $dropdown.find('.home__filter__dropdown__selected').text(text);
    $dropdown.removeClass('show');
  });

  // Don't submit empty filter fields.
  $homeFilter.on('submit', function () {
    $(this)
      .find('input')
      .each(function () {
        if (!$(this).val()) {
          $(this).prop('name', '');
        }
      });
  });
});
