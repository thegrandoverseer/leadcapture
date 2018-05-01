jQuery(document).ready(($) => {
    $('.alert.auto-closing-alert').each(function (i) {
        let $el = $(this),
            numseconds = parseInt($el.data('numseconds') || 3000, 10);
        
        setTimeout(() => {
            $el.alert('close');
        }, numseconds, $el);
    });
});
