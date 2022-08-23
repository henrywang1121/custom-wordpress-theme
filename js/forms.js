/* global customForms grecaptcha sd dataLayer */
// Google Ads Conversion: "DMZ - Form Conversions".
const gtmFormSubmission = (action, category, label) => {
  dataLayer.push({
    'event': 'form_submission',
    'event_action': action,
    'event_category': category,
    'event_label': label,
  });
};

jQuery(function ($) {
  // Modify jQuery Validation plugin to require TLD on email addresses.
  $.validator.methods.email = function (value, element) {
    return (
      this.optional(element) || /[a-z0-9]+@[a-z0-9]+\.[a-z0-9]+/.test(value)
    );
  };

  // Trade-In Section on VDP Forms.
  $('#tradeIn').on('change', function () {
    $('#tradeInForm').removeClass('show');
    if ($(this).is(':checked')) {
      $('#tradeInForm').addClass('show');
    }
  });

  // Open modal.
  $('[data-toggle="modal"]').on('click', function (event) {
    event.preventDefault();
    const target = $(this).data('target');
    if (typeof $(this).data('modalTemplatePart') !== 'undefined') {
      $(target).remove();
      const id = $(this).data('modalId');
      const templatePart = $(this).data('modalTemplatePart');

      $.ajax({
        dataType: 'html',
        method: 'POST',
        url: customForms.ajaxurl,
        data: {
          action: 'custom_get_modal_callback',
          _wpnonce: customForms._wpnonce,
          id,
          templatePart,
        },
      }).done(function (response) {
        if (response.length) {
          $('body').append(response);
          openModal($(target));

          // const hash = $(target).attr('id');
          // window.location.hash = hash;
          // window.onhashchange = function () {
          //   if (!location.hash) {
          //     closeModal($(target));
          //   } else {
          //     openModal($(target));
          //   }
          // };

          // Close modal.
          $('.modal__close').on('click', function () {
            const $modal = $(this).parents('.modal');
            closeModal($modal);
            // window.history.back();
          });
        }
      });
    } else {
      openModal($(target));
      // const hash = $(target).attr('id');
      // window.location.hash = hash;
      // window.onhashchange = function () {
      //   if (!location.hash) {
      //     closeModal($(target));
      //   } else {
      //     openModal($(target));
      //   }
      // };

      // Close modal.
      $('.modal__close').on('click', function () {
        const $modal = $(this).parents('.modal');
        closeModal($modal);
        // window.history.back();
      });
    }
  });

  // Open modal.
  function openModal($modal) {
    $('body').addClass('modal-show');
    $modal.addClass('show');

    // Initialize recaptcha, if present.
    const $recaptcha = $modal.find('.grecaptcha');
    grecaptcha.ready(function () {
      const recaptchaId = grecaptcha.render($recaptcha[0], {
        'sitekey': customForms.sitekey,
      });
      $recaptcha.data('recaptchaId', recaptchaId);
    });

    // Initialize Validation.
    $modal.find('.form--sales').validate(salesValidation);
    $modal.find('.form--parts').validate(partsValidation);
    $modal.find('.form--contact').validate(contactValidation);
    $modal.find('.form--special-order').validate(specialOrderValidation);
    $modal.find('.form--custom-order').validate(customOrderValidation);
  }

  // Close modal.
  function closeModal($modal) {
    $('body').removeClass('modal-show');
    $modal.removeClass('show');
    $modal.find('form').trigger('reset');
  }

  /**
   * Sales Form.
   */

  // Validation Options.
  const salesValidation = {
    rules: {
      firstName: 'required',
      lastName: 'required',
      email: {
        required: true,
        email: true,
      },
      phone: {
        phoneUS: true,
      },
      preferredContact: 'required',
    },
    messages: {
      firstName: customForms.firstNameRequired,
      lastName: customForms.lastNameRequired,
      email: {
        required: customForms.emailRequired,
        email: customForms.emailInvalid,
      },
      phone: {
        phoneUS: customForms.phoneInvalid,
      },
      preferredContact: customForms.preferredContactRequired,
    },
    errorElement: 'div',
    submitHandler: function (form) {
      const $this = $(form);
      const gaEvent = {
        cat: $('#gaCat').val(),
        action: 'Submit',
        label: $('#gaLabel').val(),
      };
      const recaptchaId = $this.find('.grecaptcha').data('recaptchaId');
      const formData = {
        action: 'custom_sales_form_submit_callback',
        interest: $('input[name=interest]:checked').val(),
        firstName: $('#firstName').val(),
        lastName: $('#lastName').val(),
        phone: $('#phone').val(),
        email: $('#email').val(),
        preferredContact: $('#preferredContact').val(),
        comments: $('#comments').val(),
        timeframe: $('input[name=timeframe]:checked').val(),
        gRecaptchaResponse: grecaptcha.getResponse(recaptchaId),
        vehicleId: $('#vehicleId').val(),
        _wpnonce: customForms._wpnonce,
      };
      if ($('#tradeIn').prop('checked')) {
        formData.tradeInYear = $('#tradeInYear').val();
        formData.tradeInMake = $('#tradeInMake').val();
        formData.tradeInModel = $('#tradeInModel').val();
        formData.tradeInMiles = $('#tradeInMiles').val();
      }
      if (formData.gRecaptchaResponse) {
        $this.find('button[type=submit] .buttonSpinner').show();
        $.ajax({
          dataType: 'json',
          method: 'POST',
          url: customForms.ajaxurl,
          data: formData,
        }).done(function (response) {
          let confirmation = '';
          if (true === response.success) {
            //  event tracking.
            sd('dataLayer', {
              leadId: response.lead_id,
              formType: 'Check Availability',
              events: 'formSubmission',
            });
            sd('send');

            // custom Google Analytics Event and AdWords Conversion.
            gtmFormSubmission(gaEvent.action, gaEvent.cat, gaEvent.label);

            // Confirmation.
            confirmation = '.formResponse--success';
          } else {
            // Confirmation.
            confirmation = '.formResponse--fail';
          }
          // Show confirmation.
          const formHeight = $this.height();
          const $response = $this.find(confirmation);
          $response.height(formHeight);
          $this.replaceWith($response);
          $response.addClass('show');
        });
      }
      return false;
    },
  };

  // Validate Sales Form.
  $('.form--sales').validate(salesValidation);

  /**
   * Parts Form.
   */

  // Validation Options.
  const partsValidation = {
    rules: {
      firstName: 'required',
      lastName: 'required',
      email: {
        required: true,
        email: true,
      },
      phone: {
        phoneUS: true,
      },
    },
    messages: {
      firstName: customForms.firstNameRequired,
      lastName: customForms.lastNameRequired,
      email: {
        required: customForms.emailRequired,
        email: customForms.emailInvalid,
      },
      phone: customForms.phoneRequired,
    },
    errorElement: 'div',
    submitHandler: function (form) {
      const $this = $(form);
      const gaEvent = {
        cat: 'Parts',
        action: 'Submit',
        label: 'Parts Page Form Submit',
      };
      const recaptchaId = $this.find('.grecaptcha').data('recaptchaId');
      const formData = {
        action: 'custom_parts_form_submit_callback',
        firstName: $('#firstName').val(),
        lastName: $('#lastName').val(),
        phone: $('#phone').val(),
        email: $('#email').val(),
        partsYear: $('#partsYear').val(),
        partsMake: $('#partsMake').val(),
        partsModel: $('#partsModel').val(),
        partsTrim: $('#partsTrim').val(),
        partsTransmission: $('#partsTransmission').val(),
        gRecaptchaResponse: grecaptcha.getResponse(recaptchaId),
        _wpnonce: customForms._wpnonce,
      };
      const parts = [];
      const count = $('.parts__list__part').length;
      for (let i = 0; i < count; i++) {
        const part = {};
        part.name = $('#partName' + (i + 1)).val();
        part.number = $('#partNumber' + (i + 1)).val();
        part.description = $('#partDescription' + (i + 1)).val();
        part.installation = $('#partInstallation' + (i + 1)).prop('checked');
        parts.push(part);
      }
      if (parts.length) {
        formData.parts = parts;
      }
      if (formData.gRecaptchaResponse) {
        $this.find('button[type=submit] .buttonSpinner').show();
        $.ajax({
          dataType: 'json',
          method: 'POST',
          url: customForms.ajaxurl,
          data: formData,
        }).done(function (response) {
          let confirmation = '';
          if (true === response.success) {
            //  event tracking.
            sd('dataLayer', {
              leadId: response.lead_id,
              formType: 'Parts',
              events: 'formSubmission',
            });
            sd('send');

            // custom Google Analytics Event and AdWords Conversion.
            gtmFormSubmission(gaEvent.action, gaEvent.cat, gaEvent.label);

            // Confirmation.
            confirmation = '.formResponse--success';
          } else {
            // Confirmation.
            confirmation = '.formResponse--fail';
          }
          // Show confirmation.
          const formHeight = $this.height();
          const $response = $this.find(confirmation);
          $response.height(formHeight);
          $this.replaceWith($response);
          $response.addClass('show');
        });
      }
      return false;
    },
  };

  // Add New Part to Parts Request Form.
  $('#addPart').on('click', function () {
    const newIndex = $('.parts__list__part').length + 1;
    const $part = $('.parts__list__part').first().clone();
    const partIndex = $part.data('partIndex');

    // Close previous parts.
    $('.parts__list__part').prop('open', false);

    $part.prop('open', true);
    $part.attr('data-part-index', newIndex);
    $part.find('#partIndex').text(newIndex);

    $part.find('label').each(function () {
      const labelfor = $(this).attr('for').replace(partIndex, newIndex);
      $(this).attr('for', labelfor);
    });
    $part.find('input, textarea').each(function () {
      if ('checkbox' === $(this).attr('type')) {
        $(this).prop('checked', false);
      } else {
        $(this).val('');
      }
      const inputId = $(this).attr('id').replace(partIndex, newIndex);
      const inputName = $(this).attr('name').replace(partIndex, newIndex);
      $(this).attr('id', inputId).attr('name', inputName);
    });
    $('#partsList').append($part);
  });

  // Reset Parts Requests.
  $('.form--parts').on('reset', function () {
    $('.parts__list__part:not(:first)').remove();
  });

  // Validate parts forms.
  $('.form--parts').validate(partsValidation);

  /**
   * Contact Form.
   */

  // Validation Options.
  const contactValidation = {
    rules: {
      firstName: 'required',
      lastName: 'required',
      email: {
        required: true,
        email: true,
      },
      phone: {
        phoneUS: true,
      },
      preferredContact: 'required',
    },
    messages: {
      firstName: customForms.firstNameRequired,
      lastName: customForms.lastNameRequired,
      email: {
        required: customForms.emailRequired,
        email: customForms.emailInvalid,
      },
      phone: customForms.phoneRequired,
      preferredContact: customForms.preferredContactRequired,
    },
    errorElement: 'div',
    submitHandler: function (form) {
      const $this = $(form);
      const gaEvent = {
        cat: 'Contact',
        action: 'Submit',
        label: 'Contact Form Submit',
      };
      const recaptchaId = $this.find('.grecaptcha').data('recaptchaId');
      const formData = {
        action: 'custom_contact_form_submit_callback',
        firstName: $('#firstName').val(),
        lastName: $('#lastName').val(),
        phone: $('#phone').val(),
        email: $('#email').val(),
        department: $('#department').val(),
        comments: $('#comments').val(),
        gRecaptchaResponse: grecaptcha.getResponse(recaptchaId),
        _wpnonce: customForms._wpnonce,
      };
      if (formData.gRecaptchaResponse) {
        $this.find('button[type=submit] .buttonSpinner').show();
        $.ajax({
          dataType: 'json',
          method: 'POST',
          url: customForms.ajaxurl,
          data: formData,
        }).done(function (response) {
          let confirmation = '';
          if (true === response.success) {
            //  event tracking.
            sd('dataLayer', {
              leadId: response.lead_id,
              formType: 'General Contact',
              events: 'formSubmission',
            });
            sd('send');

            // custom Google Analytics Event and AdWords Conversion.
            gtmFormSubmission(gaEvent.action, gaEvent.cat, gaEvent.label);

            // Confirmation.
            confirmation = '.formResponse--success';
          } else {
            // Confirmation.
            confirmation = '.formResponse--fail';
          }
          // Show confirmation.
          const formHeight = $this.height();
          const $response = $this.find(confirmation);
          $response.height(formHeight);
          $this.replaceWith($response);
          $response.addClass('show');
        });
      }
      return false;
    },
  };

  // Validate contact form.
  $('.form--contact').validate(contactValidation);

  /**
   * Value Your Car Form
   */

  // Validation Options.
  const valueYourCarValidation = {
    rules: {
      firstName: 'required',
      lastName: 'required',
      phone: {
        phoneUS: true,
      },
      email: {
        required: true,
        email: true,
      },
      preferredContact: 'required',
      vehicleVIN: {
        minlength: 17,
        maxlength: 17,
      },
    },
    messages: {
      firstName: customForms.firstNameRequired,
      lastName: customForms.lastNameRequired,
      phone: {
        phoneUS: customForms.phoneInvalid,
      },
      email: {
        required: customForms.emailRequired,
        email: customForms.emailInvalid,
      },
      preferredContact: customForms.preferredContactRequired,
      vehicleVIN: {
        minlength: customForms.vehicleVINInvalid,
        maxlength: customForms.vehicleVINInvalid,
      },
    },
    errorElement: 'div',
    submitHandler: function (form) {
      console.log('submit');
      const $this = $(form);
      const gaEvent = {
        cat: 'Contact',
        action: 'Submit',
        label: 'Contact Form Submit',
      };
      const formData = new FormData(form);
      formData.append('action', 'custom_value_your_car_form_submit_callback');
      formData.append('_wpnonce', customForms._wpnonce);
      console.log('submit');
      if (formData.get('g-recaptcha-response')) {
        console.log('recaptcha');
        $this.find('button[type=submit] .buttonSpinner').show();
        $.ajax({
          dataType: 'json',
          method: 'POST',
          contentType: false,
          processData: false,
          url: customForms.ajaxurl,
          data: formData,
        }).done(function (response) {
          console.log(response);
          let confirmation = '';
          if (true === response.success) {
            //  event tracking.
            sd('dataLayer', {
              leadId: response.lead_id,
              formType: 'General Contact',
              events: 'formSubmission',
            });
            sd('send');

            // custom Google Analytics Event and AdWords Conversion.
            gtmFormSubmission(gaEvent.action, gaEvent.cat, gaEvent.label);

            // Confirmation.
            confirmation = '.formResponse--success';
          } else {
            // Confirmation.
            confirmation = '.formResponse--fail';
          }
          // Show confirmation.
          const formHeight = $this.height();
          const $response = $this.find(confirmation);
          $response.height(formHeight);
          $this.replaceWith($response);
          $response.addClass('show');
        });
      }
      return false;
    },
  };

  $('.form--value-your-car').validate(valueYourCarValidation);

  /**
   * Special Order Form.
   */

  // Validation Options.
  const specialOrderValidation = {
    rules: {
      firstName: 'required',
      lastName: 'required',
      email: {
        required: true,
        email: true,
      },
      zip: 'required',
    },
    messages: {
      firstName: customForms.firstNameRequired,
      lastName: customForms.lastNameRequired,
      email: {
        required: customForms.emailRequired,
        email: customForms.emailInvalid,
      },
      zip: customForms.zipCodeRequired,
    },
    errorElement: 'div',
    submitHandler: function (form) {
      const $this = $(form);
      const gaEvent = {
        cat: $('#specialOrderGaCat').val(),
        action: 'Submit',
        label: 'Special Order Form Submit',
      };
      const recaptchaId = $this.find('.grecaptcha').data('recaptchaId');
      const formData = {
        action: 'custom_special_order_form_submit_callback',
        firstName: $('#specialOrderFirstName').val(),
        lastName: $('#specialOrderLastName').val(),
        email: $('#specialOrderEmail').val(),
        zip: $('#specialOrderZip').val(),
        comments: $('#specialOrderComments').val(),
        vehicleYear: $('#specialOrderVehicleYear').val(),
        vehicleMake: $('#specialOrderVehicleMake').val(),
        vehicleModel: $('#specialOrderVehicleModel').val(),
        vehicleTrim: $('#specialOrderVehicleTrim').val(),
        leadSourceId: $('#specialOrderLeadSourceId').val(),
        leadName: $('#specialOrderLeadName').val(),
        gRecaptchaResponse: grecaptcha.getResponse(recaptchaId),
        _wpnonce: customForms._wpnonce,
      };
      if (formData.gRecaptchaResponse) {
        $this.find('button[type=submit] .buttonSpinner').show();
        $.ajax({
          dataType: 'json',
          method: 'POST',
          url: customForms.ajaxurl,
          data: formData,
        }).done(function (response) {
          let confirmation = '';
          if (true === response.success) {
            //  event tracking.
            sd('dataLayer', {
              leadId: response.lead_id,
              formType: 'General Contact',
              events: 'formSubmission',
            });
            sd('send');

            // custom Google Analytics Event and AdWords Conversion.
            gtmFormSubmission(gaEvent.action, gaEvent.cat, gaEvent.label);

            // Confirmation.
            confirmation = '.formResponse--success';
          } else {
            // Confirmation.
            confirmation = '.formResponse--fail';
          }
          // Show confirmation.
          const formHeight = $this.height();
          const $response = $this.find(confirmation);
          $response.height(formHeight);
          $this.replaceWith($response);
          $response.addClass('show');
        });
      }
      return false;
    },
  };

  // Validate Special Order form.
  $('.form--special-order').validate(specialOrderValidation);

  /**
   * Custom Order Form.
   */

  // Validation Options.
  const customOrderValidation = {
    rules: {
      firstName: 'required',
      lastName: 'required',
      email: {
        required: true,
        email: true,
      },
      phone: {
        phoneUS: true,
      },
      confirmAge: 'required',
    },
    messages: {
      firstName: customForms.firstNameRequired,
      lastName: customForms.lastNameRequired,
      email: {
        required: customForms.emailRequired,
        email: customForms.emailInvalid,
      },
      phone: {
        phoneUS: customForms.phoneInvalid,
      },
      confirmAge: customForms.confirmAgeRequired,
    },
    errorElement: 'div',
    submitHandler: function (form) {
      const $this = $(form);
      const gaEvent = {
        cat: 'Custom Order',
        action: 'Submit',
        label: 'Custom Order Form Submit',
      };
      const recaptchaId = $this.find('.grecaptcha').data('recaptchaId');
      const formData = {
        action: 'custom_custom_order_form_submit_callback',
        firstName: $('#firstName').val(),
        lastName: $('#lastName').val(),
        email: $('#email').val(),
        phone: $('#phone').val(),
        year: $('#year').val(),
        model: $('#model').val(),
        trim: $('#trim').val(),
        extColor: $('#extColor').val(),
        intColor: $('#intColor').val(),
        confirmAge: $('#confirmAge').prop('checked'),
        gRecaptchaResponse: grecaptcha.getResponse(recaptchaId),
        _wpnonce: customForms._wpnonce,
      };
      if (formData.gRecaptchaResponse) {
        $this.find('button[type=submit] .buttonSpinner').show();
        $.ajax({
          dataType: 'json',
          method: 'POST',
          url: customForms.ajaxurl,
          data: formData,
        }).done(function (response) {
          let confirmation = '';
          if (true === response.success) {
            // custom Google Analytics Event and AdWords Conversion.
            gtmFormSubmission(gaEvent.action, gaEvent.cat, gaEvent.label);

            // Confirmation.
            confirmation = '.formResponse--success';
          } else {
            // Confirmation.
            confirmation = '.formResponse--fail';
          }
          // Show confirmation.
          const formHeight = $this.height();
          const $response = $this.find(confirmation);
          $response.height(formHeight);
          $this.replaceWith($response);
          $response.addClass('show');
        });
      }
    },
  };

  // Dynamically change year, vehicle trim, exterior color, and interior color.
  const vehicleOptions = {
    '2022': {
      'CX-5': {
        '2.5 S': {
          extColor: [
            'Eternal Blue Mica',
            'Jet Black Mica',
            'Snowflake White Pearl Mica',
            'Soul Red Crystal Metallic',
          ],
          intColor: ['Black Cloth'],
        },
        '2.5 S Select': {
          extColor: [
            'Deep Crystal Blue Mica',
            'Eternal Blue Mica',
            'Jet Black Mica',
            'Machine Gray Metallic',
            'Snowflake White Pearl Mica',
            'Sonic Silver Metallic',
            'Soul Red Crystal Metallic',
          ],
          intColor: ['Black Leatherette', 'Silk Beige Leatherette'],
        },
        '2.5 S Preferred': {
          extColor: [
            'Deep Crystal Blue Mica',
            'Eternal Blue Mica',
            'Jet Black Mica',
            'Machine Gray Metallic',
            'Snowflake White Pearl Mica',
            'Sonic Silver Metallic',
            'Soul Red Crystal Metallic',
          ],
          intColor: ['Black Leather'],
        },
        '2.5 S Carbon Edition': {
          extColor: ['Polymetal Gray Metallic'],
          intColor: ['Red Leather', 'Black Leather'],
        },
        '2.5 S Premium': {
          extColor: [
            'Deep Crystal Blue Mica',
            'Eternal Blue Mica',
            'Jet Black Mica',
            'Machine Gray Metallic',
            'Snowflake White Pearl Mica',
            'Sonic Silver Metallic',
            'Soul Red Crystal Metallic',
          ],
          intColor: ['Black Leather'],
        },
        '2.5 S Premium Plus': {
          extColor: [
            'Deep Crystal Blue Mica',
            'Eternal Blue Mica',
            'Jet Black Mica',
            'Machine Gray Metallic',
            'Snowflake White Pearl Mica',
            'Sonic Silver Metallic',
            'Soul Red Crystal Metallic',
          ],
          intColor: ['Black Leather', 'Parchment Leather'],
        },
        '2.5 S Turbo': {
          extColor: [
            'Deep Crystal Blue Mica',
            'Eternal Blue Mica',
            'Jet Black Mica',
            'Machine Gray Metallic',
            'Snowflake White Pearl Mica',
            'Sonic Silver Metallic',
            'Soul Red Crystal Metallic',
          ],
          intColor: ['Black Leather'],
        },
        '2.5 S Turbo Signature': {
          extColor: [
            'Deep Crystal Blue Mica',
            'Eternal Blue Mica',
            'Jet Black Mica',
            'Machine Gray Metallic',
            'Snowflake White Pearl Mica',
            'Soul Red Crystal Metallic',
          ],
          intColor: ['Caturra Brown Nappa Leather'],
        },
      },
      'CX-9': {
        'Sport': {
          extColor: [
            'Deep Crystal Blue Mica',
            'Jet Black Mica',
            'Machine Gray Metallic',
            'Snowflake White Pearl Mica',
          ],
          intColor: ['Black Cloth'],
        },
        'Touring': {
          extColor: [
            'Deep Crystal Blue Mica',
            'Jet Black Mica',
            'Machine Gray Metallic',
            'Snowflake White Pearl Mica',
            'Sonic Silver Metallic',
            'Soul Red Crystal Metallic',
          ],
          intColor: ['Black Leather', 'Sand Leather'],
        },
        'Touring Plus': {
          extColor: [
            'Deep Crystal Blue Mica',
            'Jet Black Mica',
            'Machine Gray Metallic',
            'Snowflake White Pearl Mica',
            'Sonic Silver Metallic',
            'Soul Red Crystal Metallic',
          ],
          intColor: ['Black Leather', 'Sand Leather'],
        },
        'Grand Touring': {
          extColor: [
            'Deep Crystal Blue Mica',
            'Jet Black Mica',
            'Machine Gray Metallic',
            'Snowflake White Pearl Mica',
            'Sonic Silver Metallic',
            'Soul Red Crystal Metallic',
          ],
          intColor: ['Black Leather', 'Sand Leather'],
        },
        'Signature': {
          extColor: [
            'Jet Black Mica',
            'Machine Gray Metallic',
            'Snowflake White Pearl Mica',
            'Soul Red Crystal Metallic',
          ],
          intColor: ['Deep Chestnut Nappa Leather', 'Parchment Nappa Leather'],
        },
        '': {
          extColor: ['Polymetal Gray Metallic'],
          intColor: ['Red Leather'],
        },
      },
      'CX-30': {
        '2.5 S': {
          extColor: [
            'Deep Crystal Blue Mica',
            'Jet Black Mica',
            'Snowflake White Pearl Mica',
          ],
          intColor: ['Black Cloth'],
        },
        'Select': {
          extColor: [
            'Deep Crystal Blue Mica',
            'Jet Black Mica',
            'Machine Gray Metallic',
            'Platinum Quartz Metallic',
            'Snowflake White Pearl Mica',
            'Soul Red Crystal Metallic',
          ],
          intColor: ['Black Leatherette'],
        },
        'Preferred': {
          extColor: [
            'Deep Crystal Blue Mica',
            'Jet Black Mica',
            'Machine Gray Metallic',
            'Platinum Quartz Metallic',
            'Snowflake White Pearl Mica',
            'Soul Red Crystal Metallic',
          ],
          intColor: ['Black Leatherette', 'Greige Leatherette'],
        },
        'Premium': {
          extColor: [
            'Deep Crystal Blue Mica',
            'Jet Black Mica',
            'Machine Gray Metallic',
            'Platinum Quartz Metallic',
            'Snowflake White Pearl Mica',
            'Soul Red Crystal Metallic',
          ],
          intColor: ['Black Leather', 'White Leather'],
        },
        '2.5 Turbo': {
          extColor: [
            'Deep Crystal Blue Mica',
            'Jet Black Mica',
            'Machine Gray Metallic',
            'Platinum Quartz Metallic',
            'Polymetal Gray Metallic',
            'Snowflake White Pearl Mica',
            'Soul Red Crystal Metallic',
          ],
          intColor: ['Black Leatherette', 'Greige Leatherette'],
        },
        '2.5 Turbo Premium': {
          extColor: [
            'Deep Crystal Blue Mica',
            'Jet Black Mica',
            'Machine Gray Metallic',
            'Platinum Quartz Metallic',
            'Polymetal Gray Metallic',
            'Snowflake White Pearl Mica',
            'Soul Red Crystal Metallic',
          ],
          intColor: ['Black Leather', 'White Leather'],
        },
        '2.5 Turbo Premium Plus': {
          extColor: [
            'Deep Crystal Blue Mica',
            'Jet Black Mica',
            'Machine Gray Metallic',
            'Platinum Quartz Metallic',
            'Polymetal Gray Metallic',
            'Snowflake White Pearl Mica',
            'Soul Red Crystal Metallic',
          ],
          intColor: ['Black Leather'],
        },
        'Carbon Edition': {
          extColor: ['Polymetal Gray Metallic'],
          intColor: ['Red Leather'],
        },
      },
      'car3 Sedan': {
        '2.0': {
          extColor: ['Deep Crystal Blue Mica', 'Jet Black Mica'],
          intColor: ['Black Cloth'],
        },
        '2.5 S': {
          extColor: [
            'Deep Crystal Blue Mica',
            'Jet Black Mica',
            'Snowflake White Pearl Mica',
          ],
          intColor: ['Black Cloth'],
        },
        'Select': {
          extColor: [
            'Deep Crystal Blue Mica',
            'Jet Black Mica',
            'Machine Gray Metallic',
            'Platinum Quartz Metallic',
            'Snowflake White Pearl Mica',
            'Soul Red Crystal Metallic',
          ],
          intColor: ['Black Leatherette '],
        },
        'Preferred': {
          extColor: [
            'Deep Crystal Blue Mica',
            'Jet Black Mica',
            'Machine Gray Metallic',
            'Platinum Quartz Metallic',
            'Snowflake White Pearl Mica',
            'Soul Red Crystal Metallic',
          ],
          intColor: ['Black Leatherette ', 'Greige Leatherette '],
        },
        'Premium': {
          extColor: [
            'Deep Crystal Blue Mica',
            'Jet Black Mica',
            'Machine Gray Metallic',
            'Platinum Quartz Metallic',
            'Snowflake White Pearl Mica',
            'Soul Red Crystal Metallic',
          ],
          intColor: ['Black Leather', 'White Leather'],
        },
        'Carbon Edition': {
          extColor: ['Polymetal Gray Metallic'],
          intColor: ['Red Leather'],
        },
        '2.5 Turbo': {
          extColor: [
            'Jet Black Mica',
            'Machine Gray Metallic',
            'Platinum Quartz Metallic',
            'Polymetal Gray Metallic',
            'Snowflake White Pearl Mica',
            'Soul Red Crystal Metallic',
          ],
          intColor: ['Black Leatherette', 'Greige Leatherette'],
        },
        '2.5 Turbo Premium Plus': {
          extColor: [
            'Jet Black Mica',
            'Machine Gray Metallic',
            'Platinum Quartz Metallic',
            'Polymetal Gray Metallic',
            'Snowflake White Pearl Mica',
            'Soul Red Crystal Metallic',
          ],
          intColor: ['Black Leather', 'White Leather'],
        },
      },
      'car3 Hatchback': {
        '2.5 S': {
          extColor: [
            'Deep Crystal Blue Mica',
            'Jet Black Mica',
            'Snowflake White Pearl Mica',
          ],
          intColor: ['Black Cloth'],
        },
        'Select': {
          extColor: [
            'Deep Crystal Blue Mica',
            'Jet Black Mica',
            'Machine Gray Metallic',
            'Platinum Quartz Metallic',
            'Snowflake White Pearl Mica',
            'Soul Red Crystal Metallic',
          ],
          intColor: ['Black Leatherette '],
        },
        'Preferred': {
          extColor: [
            'Deep Crystal Blue Mica',
            'Jet Black Mica',
            'Machine Gray Metallic',
            'Platinum Quartz Metallic',
            'Snowflake White Pearl Mica',
            'Soul Red Crystal Metallic',
          ],
          intColor: ['Black Leatherette', 'Greige Leatherette'],
        },
        'Premium': {
          extColor: [
            'Jet Black Mica',
            'Machine Gray Metallic',
            'Polymetal Gray Metallic',
            'Snowflake White Pearl Mica',
          ],
          intColor: ['Black Leather', 'Red Leather'],
        },
        'Carbon Edition': {
          extColor: ['Polymetal Gray Metallic'],
          intColor: ['Red Leather'],
        },
        '2.5 Turbo': {
          extColor: [
            'Jet Black Mica',
            'Machine Gray Metallic',
            'Polymetal Gray Metallic',
            'Snowflake White Pearl Mica',
            'Soul Red Crystal Metallic',
          ],
          intColor: ['Black Leatherette', 'Greige Leatherette'],
        },
        '2.5 Turbo Premium Plus': {
          extColor: [
            'Jet Black Mica',
            'Machine Gray Metallic',
            'Platinum Quartz Metallic',
            'Polymetal Gray Metallic',
            'Snowflake White Pearl Mica',
            'Soul Red Crystal Metallic',
          ],
          intColor: ['Black Leather'],
        },
      },
      'MX-5 Miata': {
        'Sport': {
          extColor: ['Jet Black Mica', 'Soul Red Crystal Metallic'],
          intColor: ['Black Cloth'],
        },
        'Club': {
          extColor: [
            'Deep Crystal Blue Mica',
            'Jet Black Mica',
            'Machine Gray Metallic',
            'Polymetal Gray Metallic',
            'Snowflake White Pearl Mica',
            'Soul Red Crystal Metallic',
          ],
          intColor: ['Black Cloth with Light Gray Stitching'],
        },
        'Grand Touring': {
          extColor: [
            'Jet Black Mica',
            'Machine Gray Metallic',
            'Snowflake White Pearl Mica',
            'Soul Red Crystal Metallic',
            'Machine Gray Metallic',
            'Snowflake White Pearl Mica',
            'Platinum Quartz Metallic',
          ],
          intColor: ['Black Leather', 'Terracotta Napa Leather'],
        },
      },
      'MX-5 Miata RF': {
        'Club': {
          extColor: [
            'Deep Crystal Blue Mica',
            'Jet Black Mica',
            'Machine Gray Metallic',
            'Platinum Quartz Metallic',
            'Polymetal Gray Metallic',
            'Snowflake White Pearl Mica',
            'Soul Red Crystal Metallic',
          ],
          intColor: ['Heated Recaro Sport Seats'],
        },
        'Grand Touring': {
          extColor: ['Machine Gray Metallic', 'Snowflake White Pearl Mica'],
          intColor: ['Terracotta Napa Leather', 'Black Leather'],
        },
      },
      'MX-30': {
        'EV': {
          extColor: [
            'Ceramic Metallic',
            'Jet Black Mica',
            'Polymetal Gray Metallic',
          ],
          intColor: ['Black Leatherette with Pure White Trim'],
        },
        'Premium Plus': {
          extColor: [
            'Soul Red Metallic (3-Tone)',
            'Ceramic Metallic (3-Tone)',
            'Polymetal Gray Metallic (3-Tone)',
            'Machine Gray Metallic',
          ],
          intColor: [
            'Black Leatherette with Pure White Trim',
            'Black Leatherette with Vintage Brown Trim',
          ],
        },
      },
    },
    '2023': {
      'CX-50': {
        '2.5 S': {
          extColor: [
            'Ingot Blue Metallic',
            'Jet Black Mica',
            'Polymetal Gray Metallic',
          ],
          intColor: ['Black Cloth'],
        },
        '2.5 S Select': {
          extColor: [
            'Ingot Blue Metallic',
            'Jet Black Mica',
            'Machine Gray Metallic',
            'Polymetal Gray Metallic',
            'Soul Red Crystal Metallic',
            'Wind Chill Pearl',
          ],
          intColor: ['Black Leatherette with Gray'],
        },
        '2.5 S Preferred': {
          extColor: [
            'Ingot Blue Metallic',
            'Jet Black Mica',
            'Machine Gray Metallic',
            'Polymetal Gray Metallic',
            'Soul Red Crystal Metallic',
            'Wind Chill Pearl',
          ],
          intColor: ['Black Leatherette with Gray'],
        },
        '2.5 S Preferred Plus': {
          extColor: [
            'Ingot Blue Metallic',
            'Jet Black Mica',
            'Machine Gray Metallic',
            'Polymetal Gray Metallic',
            'Soul Red Crystal Metallic',
            'Wind Chill Pearl',
          ],
          intColor: ['Black Leatherette with Gray'],
        },
        '2.5 S Premium': {
          extColor: [
            'Ingot Blue Metallic',
            'Jet Black Mica',
            'Machine Gray Metallic',
            'Polymetal Gray Metallic',
            'Soul Red Crystal Metallic',
            'Wind Chill Pearl',
          ],
          intColor: ['Black Leather with Brown'],
        },
        '2.5 S Premium Plus': {
          extColor: [
            'Ingot Blue Metallic',
            'Jet Black Mica',
            'Machine Gray Metallic',
            'Polymetal Gray Metallic',
            'Soul Red Crystal Metallic',
            'Wind Chill Pearl',
          ],
          intColor: ['Black Leather with Brown'],
        },
        '2.5 Turbo': {
          extColor: [
            'Ingot Blue Metallic',
            'Jet Black Mica',
            'Machine Gray Metallic',
            'Polymetal Gray Metallic',
            'Soul Red Crystal Metallic',
            'Wind Chill Pearl',
          ],
          intColor: ['Black Leather with Brown', 'Terracotta Leather'],
        },
        '2.5 Turbo Premium': {
          extColor: [
            'Ingot Blue Metallic',
            'Jet Black Mica',
            'Machine Gray Metallic',
            'Polymetal Gray Metallic',
            'Soul Red Crystal Metallic',
            'Wind Chill Pearl',
            'Zircon Sand Metallic',
          ],
          intColor: ['Black Leather with Brown', 'Terracotta Leather'],
        },
        '2.5 Turbo Premium Plus': {
          extColor: [
            'Ingot Blue Metallic',
            'Jet Black Mica',
            'Machine Gray Metallic',
            'Polymetal Gray Metallic',
            'Soul Red Crystal Metallic',
            'Wind Chill Pearl',
            'Zircon Sand Metallic',
          ],
          intColor: ['Black Leather with Brown', 'Terracotta Leather'],
        },
      },
    },
  };

  // Set the Vehicle Year options of Custom Order
  let yearOptions = '<option value="">Any</option>';
  Object.keys(vehicleOptions).forEach((year) => {
    yearOptions += '<option value="' + year + '">' + year + '</option>';
  });
  $('#year').html(yearOptions);

  // Custom Order On-Change Listener for Vehicle Year.
  $('#year').on('change', function () {
    const year = $(this).val();

    // Reset and disable other inputs.
    $('#model, #trim, #extColor, #intColor')
      .html('<option value="">Any</option>')
      .prop('disabled', true);

    // If the selected option is not "Any".
    if (year) {
      let modelOptions = '<option value="">Any</option>';
      Object.keys(vehicleOptions[year]).forEach((model) => {
        modelOptions += '<option value="' + model + '">' + model + '</option>';
      });

      // Set options and enable.
      $('#model').html(modelOptions).prop('disabled', false);
    }
  });

  // Custom Order On-Change Listener for Vehicle Model.
  $('#model').on('change', function () {
    const year = $('#year').val();
    const model = $(this).val();

    // Reset and disable other inputs.
    $('#trim, #extColor, #intColor')
      .html('<option value="">Any</option>')
      .prop('disabled', true);

    // If the selected option is not "Any"
    if (model) {
      let trimOptions = '<option value="">Any</option>';
      Object.keys(vehicleOptions[year][model]).forEach((trim) => {
        trimOptions += '<option value="' + trim + '">' + trim + '</option>';
      });

      // Set options and enable.
      $('#trim').html(trimOptions).prop('disabled', false);
    }
  });

  // Custom Order On-Change Listener for Trim.
  $('#trim').change(function () {
    const year = $('#year').val();
    const model = $('#model').val();
    const trim = $(this).val();

    // Reset and disable other inputs.
    $('#extColor, #intColor')
      .html('<option value="">Any</option>')
      .prop('disabled', true);

    // If the selected dropdown is not "Any"
    if (trim) {
      let extColorOptions = '<option value="">Any</option>';
      let intColorOptions = '<option value="">Any</option>';
      vehicleOptions[year][model][trim].extColor.forEach((color) => {
        extColorOptions +=
          '<option value="' + color + '">' + color + '</option>';
      });
      vehicleOptions[year][model][trim].intColor.forEach((color) => {
        intColorOptions +=
          '<option value="' + color + '">' + color + '</option>';
      });

      // Set options
      $('#extColor').html(extColorOptions).prop('disabled', false);
      $('#intColor').html(intColorOptions).prop('disabled', false);
    }
  });

  // Validate Custom Order Form.
  $('.form--custom-order').validate(customOrderValidation);

  /**
   * Payment Calculator.
   */

  const $formPaymentCalculator = $('#formPaymentCalculator');

  // Payment Calculator Form Validation.
  $formPaymentCalculator.validate({
    rules: {
      salePrice: {
        required: true,
        digits: true,
        min: 1,
      },
      downPayment: {
        digits: true,
        min: 0,
      },
      apr: {
        number: true,
        min: 0,
      },
      term: {
        required: true,
      },
    },
    messages: {
      salePrice: {
        required: 'Sale Price is required.',
        digits: 'Enter only digits for Sale Price.',
        min: 'Sale Price must be greater than zero.',
      },
      downPayment: {
        digits: 'Enter only digits for Down Payment.',
        min: 'Down Payment cannot be less than zero.',
      },
      apr: {
        number: 'Enter APR as a decimal value.',
        min: 'APR cannot be less than zero.',
      },
      term: {
        required: 'A payment term is required.',
      },
    },
    errorLabelContainer: '#formErrors ul',
    wrapper: 'li',
  });

  // Payment Calculator.
  $formPaymentCalculator
    .find('#salePrice, #downPayment, #apr')
    .on('keyup change', calculateMonthlyPayments);
  $formPaymentCalculator.find('#term').on('change', calculateMonthlyPayments);

  function calculateMonthlyPayments() {
    if ($formPaymentCalculator.valid()) {
      const salePrice = parseInt(
        $formPaymentCalculator.find('#salePrice').val()
      );
      const $downPayment = $formPaymentCalculator.find('#downPayment');
      const downPayment = $downPayment.val() ? parseInt($downPayment.val()) : 0;
      const $apr = $formPaymentCalculator.find('#apr');
      const apr = $apr.val() ? parseFloat($apr.val()) : 0;
      const term = $formPaymentCalculator.find('#term').val();
      $.ajax({
        dataType: 'json',
        url: customForms.ajaxurl,
        method: 'POST',
        data: {
          action: 'custom_ajax_calculate_monthly_payments',
          _wpnonce: customForms._wpnonce,
          salePrice,
          downPayment,
          apr,
          term,
        },
      }).done(function (response) {
        response.payment = response.payment === 0 ? 1 : response.payment;
        if (response.payment) {
          $('#formResultsMonthlyPaymentAmount').text(response.payment);
        }
      });
    }
  }

  $formPaymentCalculator.on('reset', function () {
    $('#formResultsMonthlyPaymentAmount').text('___');
  });
});
