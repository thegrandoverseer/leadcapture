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
jQuery(document).ready($ => {
    let $quoteForm = $('#quoteForm');

    function formIsNotEmpty(data) {
        let exclude = ['_method', '_token', 'id'];
        let filteredKeys = Object.keys(data).filter( key => !exclude.includes(key) );
        let oneNotEmpty = false;
        filteredKeys.forEach((k) => {
            if(!!data[k]) {
                oneNotEmpty = true;
            }
        });
        // console.log('oneNotEmpty: ', oneNotEmpty, '; filteredKeys: ', filteredKeys);
        return oneNotEmpty;
    };

    function formData(el) {
        let data = el.serializeArray()
            .reduce(function(acc, item) { 
                acc[item.name] = item.value; 
                return acc; 
            }, {});
        // console.log('formData();', data);
        return data;
    }

    $quoteForm.on('submit', function(e) {
        let data = formData($(this));
        let $this = $(this);
        if($this.data('submitted') == true){
            if(!formIsNotEmpty(data)){
                e.preventDefault();
                $this.data('submitted', false);
                return false;
            } else {
                // normal (not ajax) submit
                return;
            }                
        }
        e.preventDefault();            
        handleSend(data);
    });    

    $quoteForm.on('change', ':input', function(e) {
        $quoteForm.trigger('submit');
    });

    $('#quoteFormSubmitButton').on('click', (e) => {
        $quoteForm.data('submitted', true);
    });
    
    function handleSend(formData) {
        //check formData - don't submit if empty!
        if (formIsNotEmpty(formData)) {
            // console.log('form data is not empty; send ajax', formData);
            $.ajax({
                url: '/updateOrCreateLead',
                method: 'PUT',
                context: $quoteForm,
                dataType: 'json',
                data: formData
            }).done(data => {
                console.log('ajax complete;');
            }).fail(() => {
                console.log('ajax failed');
            });
        }            
    }
});