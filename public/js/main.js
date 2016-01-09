var setActiveMenu = function() {
    var $item = $('.left-menu li.active');

    if ($item.length) {
        $item.parents('li').addClass('active');
    }
}, searchClick = function() {
    var $search_input = $(this).parents('form').find('input[type="text"]'),
        search_value = $.trim($search_input.val());
        search_status = search_value != '';

    if (!search_status) {
        $search_input.attr('placeholder', 'Введіть текст пошуку...');
    }

    return search_status;
}, documentReady = function() {
    $('.selectpicker').selectpicker();
    setActiveMenu();
    $('#search').on('click', searchClick);
};

$(document).ready(documentReady);