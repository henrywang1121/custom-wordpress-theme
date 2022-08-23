jQuery(function ($) {
  // Sort Dropdown.
  $('#videosFilterButton').on('click', function () {
    const $videosFilterDropdown = $('#videosFilterDropdown');
    if ($videosFilterDropdown.hasClass('show')) {
      $videosFilterDropdown.removeClass('show');
    } else {
      $videosFilterDropdown.addClass('show');
    }
  });
  $('#videosFilterDropdownMenu button').on('click', function () {
    const value = $(this).data('value');
    const text = $(this).text();
    $('#videosFilterDropdownSelected').text(text);
    $('#videoCategory').val(value);
    $('#videosFilter').submit();
  });
});
