var hideOrder = function() {
    $('.table tr td [data-order]').removeClass('disabled');
    $('.table tr td [data-order="up"]').first().addClass('disabled');
    $('.table tr td [data-order="down"]').last().addClass('disabled');
}, setOrder = function() {
    var item = $(this),
        order = item.data('order'),
        data = {
            id: item.data('id'),
            order: order
        }, swap = function(item1, item2) {
            var temp1 = item1.clone(),
                temp2 = item2.clone();

            item1.replaceWith(temp2);
            item2.replaceWith(temp1);
        }, callback = function() {
            if (order == 'up') {
                swap(item.parents('tr'), item.parents('tr').prev());
            } else {
                swap(item.parents('tr'), item.parents('tr').next());
            }

            hideOrder();
        };
    ajax('/' + item.data('name') + '/order', data, callback);
}, ajax = function(url, data, callback) {
    $.ajax(url, { data: data, method: 'post' }).done(callback);
}, documentReady = function() {
    hideOrder();
    $(this).off('click', '[data-order]').on('click', '[data-order]', setOrder);
};

$(document).ready(documentReady);