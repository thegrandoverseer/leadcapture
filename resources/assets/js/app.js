
/**
 * Load project JS dependencies
 */
require('./bootstrap');

/**
 * Load quote-form.js to process the form on the Landing page with ajax,
 * each time an input changes
 */
require('./quote-form');

let ready = (fn) => {
    if (document.readyState !== 'loading') {
        fn();
    } else if (document.addEventListener) {
        document.addEventListener('DOMContentLoaded', fn);
    } else {
        document.attachEvent('onreadystatechange', () => {
            if (document.readyState !== 'loading') {
                fn();
            }
        });
    }
};

/**
 * Load auto-closing-alert.js to automatically dismiss alert messages
 * with class=auto-closing-alert and optional data-numseconds attribute
 */
ready(() => require('./auto-closing-alert'));
