var quill;
$(document).ready(function() {
    quill = new Quill('#editor', {
        modules: {
            'toolbar': {
                container: '#toolbar'
            },
            'image-tooltip': true,
            'link-tooltip': true
        },
        theme: 'snow'
    });
    $('.quill-wrapper').tooltip({
        trigger: 'manual',
        animation: false
    }).tooltip('show');
    $('.quill-wrapper + .tooltip').hide();
    var tooltipTimer = setTimeout(function() {
        $('.quill-wrapper + .tooltip').fadeIn(1000);
    }, 2500);
    quill.once('selection-change', function(hasFocus) {
        $('#editor').toggleClass('focus', hasFocus);
        if (/mobile/i.test(navigator.userAgent)) {
            $('#editor').css('height', quill.root.scrollHeight + 30)
        }
        $('.quill-wrapper').tooltip('destroy');
        clearTimeout(tooltipTimer);
    });
});
