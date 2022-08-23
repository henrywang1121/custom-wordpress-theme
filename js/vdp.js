/* global Popper */
jQuery(function ($) {
  // Carousel
  const $vdpPhotosCarousel = $('.vdp__photos__carousel');
  const $vdpPhotosCarouselPaginationCurrent = $(
    '#vdpPhotosCarouselPaginationCurrent'
  );
  const options = {
    cellSelector: '.vdp__photos__carousel__cell',
    freeScroll: false,
    adaptiveHeight: true,
    imagesLoaded: true,
    lazyLoad: true,
    pageDots: false,
    arrowShape: {
      x0: 25,
      x1: 75,
      y1: 50,
      x2: 80,
      y2: 45,
      x3: 35,
    },
    on: {
      select: function (index) {
        $vdpPhotosCarouselPaginationCurrent.text(index + 1);
      },
    },
  };

  if (matchMedia('screen and (max-width: 767px)').matches) {
    $vdpPhotosCarousel.flickity(options);
  }

  if (matchMedia('screen and (min-width: 768px)').matches) {
    $('.vdp__photos__carousel__cell').each(function () {
      const src = $(this).data('flickityLazyloadSrc');
      const srcset = $(this).data('flickityLazyloadSrcset');
      $(this).attr('src', src).attr('srcset', srcset).attr('loading', 'lazy');
    });
  }

  matchMedia('screen and (max-width: 767px)').addEventListener(
    'change',
    function () {
      if (this.matches && !$vdpPhotosCarousel.data('flickity')) {
        $vdpPhotosCarousel.flickity(options);
      }
    }
  );

  matchMedia('screen and (min-width: 768px)').addEventListener(
    'change',
    function () {
      if (this.matches && $vdpPhotosCarousel.data('flickity')) {
        $vdpPhotosCarousel.flickity('destroy');
        $('.vdp__photos__carousel__cell').each(function () {
          const src = $(this).data('flickityLazyloadSrc');
          const srcset = $(this).data('flickityLazyloadSrcset');
          $(this)
            .attr('src', src)
            .attr('srcset', srcset)
            .attr('loading', 'lazy');
        });
      }
    }
  );

  $(
    '#vdpPhotosCarouselFullscreenOpen, #vdpPhotosCarouselCellFullscreenOpen'
  ).on('click', function () {
    $('.vdp__photos').addClass('fullscreen');
    $('body').addClass('carousel-fullscreen');
    if ($vdpPhotosCarousel.data('flickity')) {
      $vdpPhotosCarousel.flickity('resize');
    } else {
      $vdpPhotosCarousel.flickity(options);
    }
  });

  $('.vdp__photos__carousel__cell').on('click', function () {
    const index = $(this).data('index');
    $('.vdp__photos').addClass('fullscreen');
    $('body').addClass('carousel-fullscreen');
    $vdpPhotosCarousel.flickity(options);
    $vdpPhotosCarousel.flickity('select', index, false, true);
  });

  $('#vdpPhotosCarouselFullscreenClose').on('click', function () {
    $('.vdp__photos').removeClass('fullscreen');
    $('body').removeClass('carousel-fullscreen');
    if (matchMedia('screen and (min-width: 768px)').matches) {
      $vdpPhotosCarousel.flickity('destroy');
    } else {
      $vdpPhotosCarousel.flickity('resize');
    }
  });

  $('#vdpPhotosCarouselPaginationPrev').on('click', function () {
    $vdpPhotosCarousel.flickity('previous');
  });

  $('#vdpPhotosCarouselPaginationNext').on('click', function () {
    $vdpPhotosCarousel.flickity('next');
  });
});

// Tooltip.
const button = document.querySelector('#inTransitInfoButton');
const tooltip = document.querySelector('#inTransitInfoTooltip');
const popperInstance = Popper.createPopper(button, tooltip, {
  modifiers: [
    {
      name: 'offset',
      options: {
        offset: [0, 16],
      },
    },
  ],
});

function show() {
  tooltip.setAttribute('data-show', '');

  // We need to tell Popper to update the tooltip position
  // after we show the tooltip, otherwise it will be incorrect
  popperInstance.update();
}

function hide() {
  tooltip.removeAttribute('data-show');
}

const showEvents = ['mouseenter', 'focus'];
const hideEvents = ['mouseleave', 'blur'];

showEvents.forEach((event) => {
  if (button) {
    button.addEventListener(event, show);
  }
});

hideEvents.forEach((event) => {
  if (button) {
    button.addEventListener(event, hide);
  }
});
