export function showOrNotSaveBtn(changeCountBtn, oldValuePieceCount, newValuePieceCount) {
    if (oldValuePieceCount === null || oldValuePieceCount !== newValuePieceCount) {
        changeCountBtn.parents('.card-body').find('.add-pizza-btn-container').removeClass('col-6');
        changeCountBtn.parents('.card-body').find('.add-pizza-btn-container').addClass('col-3');

        changeCountBtn.parents('.card-body').find('.save-btn-container').removeClass('d-none');
    } else if (oldValuePieceCount === newValuePieceCount) {
        changeCountBtn.parents('.card-body').find('.save-btn-container').addClass('d-none');

        changeCountBtn.parents('.card-body').find('.add-pizza-btn-container').removeClass('col-3');
        changeCountBtn.parents('.card-body').find('.add-pizza-btn-container').addClass('col-6');
    }
}