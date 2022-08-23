jQuery(function ($) {
  // Trim Carousel and nav.
  const trimsOptions = {
    adaptiveHeight: true,
    freeScroll: false,
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
  if (matchMedia('screen and (min-width: 768px)').matches) {
    trimsOptions.adaptiveHeight = false;
    trimsOptions.pageDots = false;
    trimsOptions.wrapAround = false;
    trimsOptions.fade = true;
    trimsOptions.prevNextButtons = false;
  }
  $('.research__trims__carousel').flickity(trimsOptions);
  matchMedia('screen and (max-width: 767px)').addEventListener(
    'change',
    function () {
      if (this.matches) {
        trimsOptions.adaptiveHeight = true;
        trimsOptions.pageDots = true;
        trimsOptions.wrapAround = true;
        trimsOptions.fade = false;
        trimsOptions.prevNextButtons = true;
        $('.research__trims__carousel').each(function () {
          if ($(this).data('flickity')) {
            $(this).flickity('destroy');
          }
          $(this).flickity(trimsOptions);
        });
      }
    }
  );
  matchMedia('screen and (min-width: 768px)').addEventListener(
    'change',
    function () {
      if (this.matches) {
        trimsOptions.adaptiveHeight = false;
        trimsOptions.pageDots = false;
        trimsOptions.wrapAround = false;
        trimsOptions.fade = true;
        trimsOptions.prevNextButtons = false;
        $('.research__trims__carousel').each(function () {
          if ($(this).data('flickity')) {
            $(this).flickity('destroy');
          }
          $(this).flickity(trimsOptions);
        });
      }
    }
  );

  $('.research__trims__carousel__nav').flickity({
    contain: true,
    freeScroll: false,
    groupCells: 5,
    imagesLoaded: true,
    asNavFor: '.research__trims__carousel',
    pageDots: false,
    wrapAround: false,
    arrowShape: {
      x0: 25,
      x1: 75,
      y1: 50,
      x2: 77,
      y2: 47.5,
      x3: 30,
    },
  });

  // Highlights card carousels.
  const highlightsOptions = {
    freeScroll: false,
    groupCells: true,
    imagesLoaded: true,
    percentPosition: false,
    arrowShape: {
      x0: 25,
      x1: 75,
      y1: 50,
      x2: 77,
      y2: 47.5,
      x3: 30,
    },
  };
  $('.research__highlights__carousel').flickity(highlightsOptions);

  // Timeline Carousel and nav.
  const timelineOptions = {
    adaptiveHeight: true,
    draggable: false,
    freeScroll: false,
    pageDots: false,
    prevNextButtons: false,
  };
  const $timelineCarousel = $('.research__timeline__carousel');
  $timelineCarousel.flickity(timelineOptions);
  // Add 'is-settled' when a selected slide stops moving.
  $timelineCarousel.on('settle.flickity', function (event, index) {
    // Remove 'is-settled' classes.
    $timelineCarousel
      .find('.research__timeline__carousel__cell')
      .removeClass('is-settled');
    // Add 'is-settled' class.
    $($timelineCarousel.flickity('getCellElements')[index]).addClass(
      'is-settled'
    );
  });
  // Add 'prev' and 'next' classes to slides.
  if ($timelineCarousel.data('flickity')) {
    const initIndex = $timelineCarousel.data('flickity').selectedIndex;
    $($timelineCarousel.flickity('getCellElements')[initIndex + 1])
      .addClass('next')
      .on('click', function () {
        $timelineCarousel.flickity('next');
      });
    $timelineCarousel.on('change.flickity', function (event, index) {
      // Remove classes.
      $timelineCarousel
        .find('.research__timeline__carousel__cell')
        .removeClass('prev next');
      // Add 'prev' class.
      $($timelineCarousel.flickity('getCellElements')[index - 1])
        .addClass('prev')
        .on('click', function () {
          $timelineCarousel.flickity('previous');
        });
      // Add 'next' class.
      $($timelineCarousel.flickity('getCellElements')[index + 1])
        .addClass('next')
        .on('click', function () {
          $timelineCarousel.flickity('next');
        });
    });
  }

  // Timeline Nav.
  $('.research__timeline__carousel__nav').flickity({
    asNavFor: '.research__timeline__carousel',
    contain: true,
    pageDots: false,
  });

  // Trim and Color Pickers
  $('.research__color__section').each(function () {
    const $photos = $(this).find('.research__color__photo');
    const $buttons = $(this).find('.research__color__picker__button');
    const $selected = $(this).find('.research__color__selected');
    const initColor = $photos.first().data('color');
    $photos.first().show();
    const $initButtonSelected = $buttons.filter(
      `[data-target-color="${initColor}"]`
    );
    $initButtonSelected.addClass('selected');
    $selected.text($initButtonSelected.data('colorName'));

    // Show correct trim and color when selecting colors.
    $buttons.on('click', function () {
      const color = $(this).data('target-color');
      $buttons.removeClass('selected');
      $(this).addClass('selected');
      $photos.hide();
      $photos.filter(`[data-color="${color}"]`).show();
      $selected.text($(this).data('colorName'));
    });
  });

  const $exteriorTrimTabs = $('#researchColorExteriorTrimTabs .tab-link');
  const $exteriorTrimTabsContent = $('#researchColorExteriorTrimTabsContent');
  const $roofTrimTabs = $('#researchColorRoofTrimTabs .tab-link');
  const $roofTrimTabsContent = $('#researchColorRoofTrimTabsContent');
  const $interiorTrimTabs = $('#researchColorInteriorTrimTabs .tab-link');
  const $interiorTrimTabsContent = $('#researchColorInteriorTrimTabsContent');

  // Color Interior/Exterior Tabs.
  const $colorTabs = $('#researchColorAreaTabs .tab-link');
  $colorTabs.on('click', function () {
    // Switch top level tabs.
    $colorTabs.removeClass('active').attr('aria-selected', false);
    $(this).addClass('active').attr('aria-selected', true);
    const target = $(this).data('target');
    const $colorTabsContent = $('#researchColorAreaTabsContent');
    $colorTabsContent.find('.tab-panel').removeClass('show');
    $colorTabsContent.find(target).addClass('show');

    // Initialize trim tabs.
    $exteriorTrimTabs.removeClass('active').attr('aria-selected', false);
    $exteriorTrimTabs.first().addClass('active').attr('aria-selected', true);
    $exteriorTrimTabsContent.find('.tab-panel').removeClass('show');
    $exteriorTrimTabsContent.find('.tab-panel').first().addClass('show');
    $roofTrimTabs.removeClass('active').attr('aria-selected', false);
    $roofTrimTabs.first().addClass('active').attr('aria-selected', true);
    $roofTrimTabsContent.find('.tab-panel').removeClass('show');
    $roofTrimTabsContent.find('.tab-panel').first().addClass('show');
    $interiorTrimTabs.removeClass('active').attr('aria-selected', false);
    $interiorTrimTabs.first().addClass('active').attr('aria-selected', true);
    $interiorTrimTabsContent.find('.tab-panel').removeClass('show');
    $interiorTrimTabsContent.find('.tab-panel').first().addClass('show');
  });

  // Color Exterior Trim Tabs.
  $exteriorTrimTabs.on('click', function () {
    $exteriorTrimTabs.removeClass('active').attr('aria-selected', false);
    $(this).addClass('active').attr('aria-selected', true);
    const target = $(this).data('target');
    $exteriorTrimTabsContent.find('.tab-panel').removeClass('show');
    $exteriorTrimTabsContent.find(target).addClass('show');
  });

  // Color Roof Trim Tabs.
  $roofTrimTabs.on('click', function () {
    $roofTrimTabs.removeClass('active').attr('aria-selected', false);
    $(this).addClass('active').attr('aria-selected', true);
    const target = $(this).data('target');
    $roofTrimTabsContent.find('.tab-panel').removeClass('show');
    $roofTrimTabsContent.find(target).addClass('show');
  });

  // Color Interior Trim Tabs.
  $interiorTrimTabs.on('click', function () {
    $interiorTrimTabs.removeClass('active').attr('aria-selected', false);
    $(this).addClass('active').attr('aria-selected', true);
    const target = $(this).data('target');
    $interiorTrimTabsContent.find('.tab-panel').removeClass('show');
    $interiorTrimTabsContent.find(target).addClass('show');
  });

  // Highlights Tabs.
  const $highlightsTabs = $('#researchHighlightsTabs .tab-link');
  $highlightsTabs.on('click', function () {
    $highlightsTabs.removeClass('active');
    $(this).addClass('active');
    const target = $(this).data('target');
    const $highlightsTabsContents = $('#researchHighlightsTabsContent');
    $highlightsTabsContents.find('.tab-panel').removeClass('show');
    $highlightsTabsContents.find(target).addClass('show');
    $('.research__highlights__carousel').flickity('resize');
  });
});
