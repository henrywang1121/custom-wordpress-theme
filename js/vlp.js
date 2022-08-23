/* global noUiSlider Popper */
jQuery(function ($) {
  // Filter Mobile.
  $('#vlpFilterButton').on('click', function () {
    $('.vlp__filter').addClass('show');
    $('body').addClass('filter-show');
  });

  $('#vlpFilterClose').on('click', function () {
    $('.vlp__filter').removeClass('show');
    $('body').removeClass('filter-show');
  });

  $('#vlpFilterBackdrop').on('click', function () {
    $('.vlp__filter').removeClass('show');
    $('body').removeClass('filter-show');
  });

  // Sort Dropdown.
  $('#vlpSortDropdownButton').on('click', function () {
    const $vlpSortDropdown = $('#vlpSortDropdown');
    if ($vlpSortDropdown.hasClass('show')) {
      $vlpSortDropdown.removeClass('show');
    } else {
      $vlpSortDropdown.addClass('show');
    }
  });
  $('#vlpSortDropdownMenu button').on('click', function () {
    const value = $(this).data('value');
    const text = $(this).text();
    $('#vlpSortDropdownSelected').text(text);
    $('#sort').val(value);
    $('#vlpFilter').submit();
  });

  // Filter Histograms.
  $('.slider-histogram').each(function () {
    const totalHeight = 70;
    let maxQuantity = 0;
    $(this)
      .find('.slider-histogram__col')
      .each(function () {
        const quantity = parseInt($(this).data('quantity'));
        if (quantity > maxQuantity) {
          maxQuantity = quantity;
        }
      });
    const ratio = totalHeight / maxQuantity;
    $(this)
      .find('.slider-histogram__col')
      .each(function () {
        const quantity = parseInt($(this).data('quantity'));
        $(this).height(quantity * ratio);
        $(this).css('opacity', quantity / maxQuantity);
      });
  });

  // noUiSlider.
  if (typeof noUiSlider !== 'undefined') {
    // Year.
    const sliderYear = document.getElementById('sliderYear');
    const yearFrom = document.getElementById('yearFrom');
    const yearTo = document.getElementById('yearTo');
    if (sliderYear && yearFrom && yearTo) {
      let yearFromOptions = parseInt(yearFrom.dataset.options);
      if (!yearFromOptions) {
        yearFromOptions = parseInt(yearFrom.value);
      }
      let yearToOptions = parseInt(yearTo.dataset.options);
      if (!yearToOptions) {
        yearToOptions = parseInt(yearTo.value);
      }
      if (yearToOptions === yearFromOptions) {
        yearToOptions++;
      }
      if (yearFromOptions && yearToOptions) {
        noUiSlider.create(sliderYear, {
          start: [parseInt(yearFrom.value), parseInt(yearTo.value)],
          connect: true,
          step: 1,
          range: {
            min: yearFromOptions,
            max: yearToOptions,
          },
          format: {
            to(value) {
              return value;
            },
            from(value) {
              return Number(value);
            },
          },
          handleAttributes: [
            { 'aria-label': 'Year From' },
            { 'aria-label': 'Year To' },
          ],
        });
        sliderYear.noUiSlider.on('update', function (values, handle) {
          const value = values[handle];
          if (0 === handle) {
            yearFrom.value = value;
          } else {
            yearTo.value = value;
          }
        });
        yearFrom.addEventListener('change', function () {
          sliderYear.noUiSlider.set([this.value, null]);
        });
        yearTo.addEventListener('change', function () {
          sliderYear.noUiSlider.set([null, this.value]);
        });
      }
    }

    // Miles.
    const sliderMiles = document.getElementById('sliderMiles');
    const milesFrom = document.getElementById('milesFrom');
    const milesTo = document.getElementById('milesTo');
    if (sliderMiles && milesFrom && milesTo) {
      let milesFromOptions = parseInt(milesFrom.dataset.options);
      if (!milesFromOptions) {
        milesFromOptions = parseInt(milesFrom.value);
      }
      let milesToOptions = parseInt(milesTo.dataset.options);
      if (!milesToOptions) {
        milesToOptions = parseInt(milesTo.value);
      }
      if (milesToOptions === milesFromOptions) {
        milesToOptions += 10000;
      }
      if (milesToOptions) {
        noUiSlider.create(sliderMiles, {
          start: [parseInt(milesFrom.value), parseInt(milesTo.value)],
          connect: true,
          step: 10000,
          range: {
            min: milesFromOptions,
            max: milesToOptions,
          },
          format: {
            to(value) {
              return value;
            },
            from(value) {
              return Number(value);
            },
          },
          handleAttributes: [
            { 'aria-label': 'Miles From' },
            { 'aria-label': 'Miles To' },
          ],
        });
        sliderMiles.noUiSlider.on('update', function (values, handle) {
          const value = values[handle];
          if (0 === handle) {
            milesFrom.value = value;
          } else {
            milesTo.value = value;
          }
        });
        milesFrom.addEventListener('change', function () {
          sliderMiles.noUiSlider.set([this.value, null]);
        });
        milesTo.addEventListener('change', function () {
          sliderMiles.noUiSlider.set([null, this.value]);
        });
      }
    }

    // Price.
    const sliderPrice = document.getElementById('sliderPrice');
    const priceFrom = document.getElementById('priceFrom');
    const priceTo = document.getElementById('priceTo');
    if (sliderPrice && priceFrom && priceTo) {
      let priceFromOptions = parseInt(priceFrom.dataset.options);
      if (priceFromOptions === '') {
        priceFromOptions = parseInt(priceFrom.value);
      }
      let priceToOptions = parseInt(priceTo.dataset.options);
      if (priceToOptions === '') {
        priceToOptions = parseInt(priceTo.value);
      }
      if (priceFromOptions === priceToOptions) {
        priceToOptions += 1000;
      }
      if (priceFromOptions !== '' && priceToOptions !== '') {
        noUiSlider.create(sliderPrice, {
          start: [parseInt(priceFrom.value), parseInt(priceTo.value)],
          connect: true,
          step: 1000,
          range: {
            min: priceFromOptions,
            max: priceToOptions,
          },
          format: {
            to(value) {
              return Number(value);
            },
            from(value) {
              return Number(value);
            },
          },
          handleAttributes: [
            { 'aria-label': 'Price From' },
            { 'aria-label': 'Price To' },
          ],
        });
        sliderPrice.noUiSlider.on('update', function (values, handle) {
          const value = values[handle];
          if (0 === handle) {
            priceFrom.value = value;
          } else {
            priceTo.value = value;
          }
        });
        priceFrom.addEventListener('change', function () {
          sliderPrice.noUiSlider.set([this.value, null]);
        });
        priceTo.addEventListener('change', function () {
          sliderPrice.noUiSlider.set([null, this.value]);
        });
      }
    }
  }

  // VLP Filter.
  const $vlpFilter = $('#vlpFilter');
  const $inputs = $vlpFilter.find(
    '#yearFrom, #yearTo, #milesFrom, #milesTo, #priceFrom, #priceTo'
  );

  $vlpFilter.on('submit', function () {
    // Zero hidden array fields.
    $(this)
      .find(
        'input[name="inventory"], input[name="make"], input[name="model"], input[name="trim"], input[name="color"], input[name="transmission"], input[name="drivetrain"], input[name="fuel"]'
      )
      .val('');

    // Consolidate array inputs into comma-seperated string inputs for WordPress.
    const arrayInputs = {};
    $(this)
      .find('input[name*="[]"]:checked')
      .each(function () {
        const name = $(this).prop('name').replace('[]', '');
        const value = $(this).prop('value');
        if (!Object.prototype.hasOwnProperty.call(arrayInputs, name)) {
          arrayInputs[name] = [];
        }
        arrayInputs[name].push(value);
        $(this).prop('name', '');
      });
    if (Object.keys(arrayInputs).length) {
      $.each(arrayInputs, function (key, value) {
        $('[name="' + key + '"]').val(value.join(','));
      });
    }

    // Don't submit empty range fields.
    $inputs.each(function () {
      const options = $(this).data('options');
      const value = Number($(this).val());
      if (value === options) {
        $(this).prop('name', '');
      }
    });

    // Don't submit empty fields.
    $(this)
      .find('input')
      .each(function () {
        if (!$(this).val()) {
          $(this).prop('name', '');
        }
      });
  });

  // Filter Selections.
  $('.vlpFilterSelectionsButton').on('click', function (event) {
    event.preventDefault();
    const key = $(this).data('key');
    const value = $(this).data('value');
    if (key.indexOf('[]') !== -1) {
      $('[name="' + key + '"][value="' + value + '"]').prop('name', '');
    } else {
      $('[name="' + key + '"]').prop('name', '');
    }
    $vlpFilter.trigger('submit');
  });

  // Limit Compare selections to two.
  const $compareInputs = $('input[name="compare[]"]');
  $compareInputs.on('change', function () {
    if ($compareInputs.filter(':checked').length === 2) {
      $compareInputs.not(':checked').attr('disabled', true);
    } else if ($compareInputs.filter(':checked').length > 2) {
      $(this).prop('checked', false);
    } else {
      $compareInputs.not(':checked').attr('disabled', false);
    }
  });
});

// Tooltip.[id^='inTransitInfoButton']
const buttons = document.querySelectorAll('.tooltip__button--inTransitButton');
const tooltip = document.querySelector('#inTransitInfoTooltip');
const popperInstances = {};
buttons.forEach((button) => {
  popperInstances[button.dataset.tooltip] = Popper.createPopper(
    button,
    tooltip,
    {
      modifiers: [
        {
          name: 'offset',
          options: {
            offset: [0, 16],
          },
        },
      ],
    }
  );
});

function show() {
  tooltip.setAttribute('data-show', '');

  // We need to tell Popper to update the tooltip position
  // after we show the tooltip, otherwise it will be incorrect
  popperInstances[this.dataset.tooltip].update();
}

function hide() {
  tooltip.removeAttribute('data-show');
}

const showEvents = ['mouseenter', 'focus'];
const hideEvents = ['mouseleave', 'blur'];

showEvents.forEach((event) => {
  buttons.forEach((button) => {
    button.addEventListener(event, show);
  });
});

hideEvents.forEach((event) => {
  buttons.forEach((button) => {
    button.addEventListener(event, hide);
  });
});
