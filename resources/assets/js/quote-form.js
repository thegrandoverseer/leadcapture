/* eslint-env jquery */

/**
 * Process the quote form on the Landing page;
 * Send any data the user enters via ajax, when an input
 * changes. The id guid is generated server side and populated
 * in the form. Every time the data is sent, and upsert is executed
 * with only the non-empty fields.
 * If the user submits the form by clicking the submit button,
 * the form is submitted without ajax, and the user will be redirected
 * back to the quote form, where a new guid will be populated
 */
jQuery(document).ready(($) => {
    const $quoteForm = $('#quoteForm'),

        /**
         * function formData
         * @param {object} el jquery dom element
         * @returns {object} data
         */
        formData = (el) => {
            let data = el.serializeArray().reduce((acc, item) => {
                acc[item.name] = item.value;

                return acc;
            }, {});
            // console.log('formData();', data);

            return data;
        },

        /**
         * function formIsNotEmpty
         * @param {object} data the form data
         * @returns {boolean} oneNotEmpty
         */
        formIsNotEmpty = (data) => {
            let exclude = [
                    '_method',
                    '_token',
                    'id'
                ],
                filteredKeys = Object.keys(data).filter((key) => !exclude.includes(key) ),
                oneNotEmpty = false;

            filteredKeys.forEach((k) => {
                if (data[k]) {
                    oneNotEmpty = true;
                }
            });
            // console.log('oneNotEmpty: ', oneNotEmpty, '; filteredKeys: ', filteredKeys);

            return oneNotEmpty;
        },
        handleSend = (sendData) => {
            //  check formData - don't submit if empty!
            if (formIsNotEmpty(sendData)) {
                // console.log('form data is not empty; send ajax', formData);
                $.ajax({
                    context: $quoteForm,
                    data: sendData,
                    dataType: 'json',
                    method: 'PUT',
                    url: '/updateOrCreateLead'
                });
            }
        };

    $quoteForm.on('submit', function quoteFormOnSubmit (e) {
        let $this = $(this),
            data = formData($(this));

        if ($this.data('submitted') === true) {
            if (formIsNotEmpty(data) === false) {
                e.preventDefault();
                $this.data('submitted', false);

                return false;
            }

            return;               
        }
        e.preventDefault();
        handleSend(data);

        return;
    });

    $quoteForm.on('change', ':input', () => {
        $quoteForm.trigger('submit');
    });

    $('#quoteFormSubmitButton').on('click', () => {
        $quoteForm.data('submitted', true);
    });
});
