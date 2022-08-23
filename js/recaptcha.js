/* global grecaptcha customRecaptcha */
// How this code snippet works:
// This logic overwrites the default behavior of `grecaptcha.ready()` to
// ensure that it can be safely called at any time. When `grecaptcha.ready()`
// is called before reCAPTCHA is loaded, the callback function that is passed
// by `grecaptcha.ready()` is enqueued for execution after reCAPTCHA is
// loaded.
if (typeof grecaptcha === 'undefined') {
  grecaptcha = {};
}
grecaptcha.ready = function (cb) {
  if (typeof grecaptcha.render === 'undefined') {
    // window.__grecaptcha_cfg is a global variable that stores reCAPTCHA's
    // configuration. By default, any functions listed in its 'fns' property
    // are automatically executed when reCAPTCHA loads.
    const c = '___grecaptcha_cfg';
    window[c] = window[c] || {};
    (window[c]['fns'] = window[c]['fns'] || []).push(cb);
  } else {
    cb();
  }
};

// Render all reCAPTCHAS when ready. Add reCAPTCHA ID to data attribute.
grecaptcha.ready(function () {
  document.querySelectorAll('.grecaptcha').forEach((element) => {
    const recaptchaId = grecaptcha.render(element, {
      sitekey: customRecaptcha.sitekey,
    });
    element.dataset.recaptchaId = recaptchaId;
  });
});
