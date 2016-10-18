$(document).on('ready', function () {

    $(document).on('click', 'figcaption h3', function () {
        var dest = $(this).data('value');
        var page = $('#' + dest);

        $('#main-row').hide("slide", {direction: "left"}, 500);
        $('#bottom-page').hide("slide", {direction: "left"}, 500);
        $(page).show("slide", {direction: "right"}, 500);
    });

    $(document).on('click', 'button.home', function () {
        var dest = $(this).data('value');
        var page = $('#' + dest);

        $(page).hide("slide", {direction: "right"}, 500);
        $('#main-row').show("slide", {direction: "left"}, 500);
        $('#bottom-page').show("slide", {direction: "left"}, 500);
    });
});