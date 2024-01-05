$(document).ready(function () {
    const notification = $('.notification');
    if (notification.length) {
        notification.addClass('fadeInDown');
        setTimeout(function () {
            notification.removeClass('fadeInDown').addClass('fadeOutUp');
            setTimeout(function () {
                notification.hide();
            }, 500);
        }, 3000);
    }
});


// Modal
