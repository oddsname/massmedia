$(document).ready(function() {


    formAddComment();
    replyCommentClick();
});

function formAddComment() {
    $(document).on('submit', 'form.form-comment', function (e) {
        e.preventDefault();


        $.post($(this).attr('action'), $(this).serialize())
            .done((response) => {
                console.log(response);
            })
    });
}

function replyCommentClick() {
    $(document).on('click', '.reply-comment', function () {
       const input_section = $(this).parents('.comment-block').first().find('.reply-section').first();
       input_section.css('display', input_section.is(":visible") ? 'none' : 'block');
       return false;
    });
}
