$(document).ready(function() {
    

    $('.categories').masonry({
        itemSelector: '.category',
        columnWidth: '.category',
        transitionDuration : 0
    });
    window.dispatchEvent(new Event('resize'));

});