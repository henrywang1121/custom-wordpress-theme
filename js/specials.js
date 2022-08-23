jQuery(function ($) {
  // Print.
  $('.special-cta .button').on('click', function (event) {
    event.preventDefault();
    $('.special-wrap').removeClass('print');
    $(this).closest('.special-wrap').addClass('print');
    window.print();
  });

  // Sort Dropdown.
  $('#specialsFilterButton').on('click', function () {
    const $specialsFilterDropdown = $('#specialsFilterDropdown');
    if ($specialsFilterDropdown.hasClass('show')) {
      $specialsFilterDropdown.removeClass('show');
    } else {
      $specialsFilterDropdown.addClass('show');
    }
  });
  $('#specialsFilterDropdownMenu button').on('click', function () {
    const value = $(this).data('value');
    const text = $(this).text();
    $('#specialsFilterDropdownSelected').text(text);
    $('#specialCategory').val(value);
    $('#specialsFilter').submit();
  });

  // View Offer Button.
  $('.special__view-offer').on('click', function () {
    $(this).closest('.special').toggleClass('show');
  });

  // Hide View Offer Button if text isn't long enough to be hidden.
  $('.special__description').each(function () {
    const height = $(this).prop('scrollHeight');
    if (height < 190) {
      $(this).find('.special__view-offer').remove();
    }
    $(this).removeClass('show');
  });
});
