import {showOrNotSaveBtn} from './functions.js';

const PIZZA_PIECES_COUNT = 8;
let addPieceButtons = $('.add-piece-btn');
let removePieceButtons = $('.remove-piece-btn');
let addPizzaButton = $('.add-pizza-btn');
let saveButton = $('.save-btn');
let newValuePieceCount = null;
let oldValuePieceCount = null;

// Если на момент загрузки страницы в базе есть пицца, недоступная к продаже (ноль кусочков) - делаем кнопку "-" неактивной
removePieceButtons.each(function() {
    if (Number($(this).next().text().trim()) <= 0) {
        $(this).prop('disabled', true);
    }
});

addPieceButtons.on('click', function(e) {
    if (newValuePieceCount === null) {
        oldValuePieceCount = Number($(this).prev().text().trim());
        newValuePieceCount = oldValuePieceCount + 1
    } else {
        newValuePieceCount += 1;
    }

    // showOrNotSaveBtn($(this), oldValuePieceCount, newValuePieceCount);

    // Если на момент нажатия на "+" было 0 (ноль) кусочков, активируем кнопку "-"
    if (newValuePieceCount > 0) {
        $(this).prev().prev().prop('disabled', false);
    }

    $(this).prev().find('.pieces-count').text(newValuePieceCount);

    let pizzaId = Number($(this).parents('.card-body').find('.pizza-id-container').text());
    let pizzaPiecesCount = Number($(this).parents('.card-body').find('.pieces-count').text());
    let pizzaPiecesContainer = $(this).parents('.card-body').find('.pieces-count');
    let successStatusImage = $(this).parents('.card-body').find('.success-status-image');

    $.ajax({
        url: './',
        method: 'POST',
        dataType: 'html',
        async: true,
        data: {
            'pizzaId': pizzaId,
            'piecesCount': pizzaPiecesCount
        },
        success: function(data) {
            oldValuePieceCount = null;
            newValuePieceCount = null;
        },
        error: function(jqXHR, exception) {
            if (jqXHR.status === 0) {
                alert('Not connect. Verify Network.');
            } else if (jqXHR.status === 404) {
                alert('Requested page not found (404).');
            } else if (jqXHR.status === 500) {
                alert('Internal Server Error (500).');
            } else if (exception === 'parsererror') {
                alert('Requested JSON parse failed.');
            } else if (exception === 'timeout') {
                alert('Time out error.');
            } else if (exception === 'abort') {
                alert('Ajax request aborted.');
            } else {
                alert('Uncaught Error. ' + jqXHR.responseText);
            }
        }
    });
});

removePieceButtons.on('click', function(e) {
    if (newValuePieceCount === null) {
        oldValuePieceCount = Number($(this).next().text().trim());
        newValuePieceCount = oldValuePieceCount - 1;
    } else {
        newValuePieceCount -= 1
    }

    // showOrNotSaveBtn($(this), oldValuePieceCount, newValuePieceCount);

    // Если после нажатия на "-" стало 0 (ноль) кусочков - деактивируем кнопку "-"
    if (newValuePieceCount === 0) {
        $(this).prop('disabled', true);
    }

    $(this).next().find('.pieces-count').text(newValuePieceCount);

    let pizzaId = Number($(this).parents('.card-body').find('.pizza-id-container').text());
    let pizzaPiecesCount = Number($(this).parents('.card-body').find('.pieces-count').text());

    $.ajax({
        url: './',
        method: 'POST',
        dataType: 'html',
        async: true,
        data: {
            'pizzaId': pizzaId,
            'piecesCount': pizzaPiecesCount
        },
        success: function(data) {
            oldValuePieceCount = null;
            newValuePieceCount = null;
        },
        error: function(jqXHR, exception) {
            if (jqXHR.status === 0) {
                alert('Not connect. Verify Network.');
            } else if (jqXHR.status === 404) {
                alert('Requested page not found (404).');
            } else if (jqXHR.status === 500) {
                alert('Internal Server Error (500).');
            } else if (exception === 'parsererror') {
                alert('Requested JSON parse failed.');
            } else if (exception === 'timeout') {
                alert('Time out error.');
            } else if (exception === 'abort') {
                alert('Ajax request aborted.');
            } else {
                alert('Uncaught Error. ' + jqXHR.responseText);
            }
        }
    });
});

addPizzaButton.on('click', function(e) {
    if (oldValuePieceCount === null) {
        oldValuePieceCount = Number($(this).closest('div').prev().find('.pieces-count').text().trim());
    } else if (oldValuePieceCount === newValuePieceCount) {

    }

    if (oldValuePieceCount === 0) {
        $(this).parents('.card-body').find('.remove-piece-btn').prop('disabled', false);
    }
    newValuePieceCount = Number($(this).closest('div').prev().find('.pieces-count').text().trim()) + PIZZA_PIECES_COUNT;
    $(this).closest('div').prev().find('.pieces-count').text(newValuePieceCount);

    let pizzaId = $(this).parents('.card-body').find('.pizza-id-container').text();
    let pizzaPiecesCount = $(this).parents('.card-body').find('.pieces-count').text();

    $.ajax({
        url: './',
        method: 'POST',
        dataType: 'html',
        async: true,
        data: {
            'pizzaId': pizzaId,
            'piecesCount': pizzaPiecesCount
        },
        success: function(data) {

        },
        error: function(jqXHR, exception) {
            if (jqXHR.status === 0) {
                alert('Not connect. Verify Network.');
            } else if (jqXHR.status === 404) {
                alert('Requested page not found (404).');
            } else if (jqXHR.status === 500) {
                alert('Internal Server Error (500).');
            } else if (exception === 'parsererror') {
                alert('Requested JSON parse failed.');
            } else if (exception === 'timeout') {
                alert('Time out error.');
            } else if (exception === 'abort') {
                alert('Ajax request aborted.');
            } else {
                alert('Uncaught Error. ' + jqXHR.responseText);
            }
        }
    });
});

// saveButton.on('click', function(e) {
//     let pizzaId = $(this).parents('.card-body').find('.pizza-id-container').text();
//     let pizzaPiecesCount = $(this).parents('.card-body').find('.pieces-count').text();
//
//     $.ajax({
//         url: './',
//         method: 'POST',
//         dataType: 'html',
//         async: false,
//         data: {
//             'pizzaId': pizzaId,
//             'piecesCount': pizzaPiecesCount
//         },
//         success: function(data) {
//             $('.save-btn-container').addClass('d-none');
//             $('.add-pizza-btn-container').removeClass('col-3');
//             $('.add-pizza-btn-container').addClass('col-6');
//         },
//         error: function(jqXHR, exception) {
//             if (jqXHR.status === 0) {
//                 alert('Not connect. Verify Network.');
//             } else if (jqXHR.status === 404) {
//                 alert('Requested page not found (404).');
//             } else if (jqXHR.status === 500) {
//                 alert('Internal Server Error (500).');
//             } else if (exception === 'parsererror') {
//                 alert('Requested JSON parse failed.');
//             } else if (exception === 'timeout') {
//                 alert('Time out error.');
//             } else if (exception === 'abort') {
//                 alert('Ajax request aborted.');
//             } else {
//                 alert('Uncaught Error. ' + jqXHR.responseText);
//             }
//         }
//     });
// });