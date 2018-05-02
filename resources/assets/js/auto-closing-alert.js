/* eslint-env jquery */

document.querySelectorAll('.alert.auto-closing-alert').forEach((el) => {
    let numseconds = el.dataset.numseconds;

    // console.log('el', el, '; numseconds', numseconds);

    setTimeout(() => {
        $(el).alert('close');
    }, numseconds, el);

});

