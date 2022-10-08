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
    newValuePieceCount !== null ?  newValuePieceCount += 1 : newValuePieceCount = Number($(this).prev().text().trim()) + 1;

    if (oldValuePieceCount === null) {
        oldValuePieceCount = Number($(this).prev().text().trim());
    } else if (oldValuePieceCount === newValuePieceCount) {

    }

    // Если на момент нажатия на "+" было 0 (ноль) кусочков, активируем кнопку "-"
    if (newValuePieceCount > 0) {
        $(this).prev().prev().prop('disabled', false);
    }

    console.log($(this).text());
    $(this).prev().find('.pieces-count').text(newValuePieceCount);
});

removePieceButtons.on('click', function(e) {
    newValuePieceCount !== null ?  newValuePieceCount -= 1 : newValuePieceCount = Number($(this).next().text().trim()) - 1;

    if (oldValuePieceCount === null) {
        oldValuePieceCount = Number($(this).next().text().trim());
    } else if (oldValuePieceCount === newValuePieceCount) {

    }

    // Если после нажатия на "-" стало 0 (ноль) кусочков - деактивируем кнопку "-"
    if (newValuePieceCount === 0) {
        $(this).prop('disabled', true);
    }

    console.log($(this).text());
    $(this).next().find('.pieces-count').text(newValuePieceCount);
});

addPizzaButton.on('click', function(e) {
    if (oldValuePieceCount === null) {
        oldValuePieceCount = Number($(this).closest('div').prev().find('.pieces-count').text().trim().length);
    } else if (oldValuePieceCount === newValuePieceCount) {

    }
    console.log(Number($(this).closest('div').prev().find('.pieces-count').text().trim()) + 8);
    newValuePieceCount = Number($(this).closest('div').prev().find('.pieces-count').text().trim()) + PIZZA_PIECES_COUNT;
    $(this).closest('div').prev().find('.pieces-count').text(newValuePieceCount);

    // После нажатия на "Добавить целую пиццу" делаем эту кнопку в два раза меньше для последующего отображения кнопки "Сохранить"
    $(this).closest('div').removeClass('col-6');
    $(this).closest('div').addClass('col-3');

    $(this).closest('div').next('.save-btn-container').removeClass('d-none');

});