$(document).ready(function () {

    formAddComment();
    clickReplyComment();

    inputKeyUpHideError();
});

function formAddComment() {
    $(document).on('submit', 'form.form-comment', function (e) {
        e.preventDefault();
        const button = $(this).find('button').first();

        button.prop('disabled', true);

        $.post($(this).attr('action'), $(this).serialize())
            .done((comment) => {
                const comment_section = $(this).parents('.comment-block').first().find('.sub-comments__content').first();
                comment_section.append(comment);

                $(this).find('input[type="text"]').val('');
                $(this).find('textarea').val('');
            })
            .fail((response) => {
                if (response.status === 422) {
                    const errors = response.responseJSON.errors;

                    for (let key in errors) {
                        const span = $(this).find('span.' + key + '-error').first();
                        span.text(errors[key]);
                        span.show();
                    }
                }
            })
            .always(() => {
                setTimeout(() => button.prop('disabled', false), 200);
            });
    });
}


function inputKeyUpHideError() {
    $('.form-control').keyup(function () {
        const span_error = $(this).parents('form').first().find('.' + $(this).attr('name') + '-error');
        span_error.hide();
    })
}

function clickReplyComment() {
    $(document).on('click', '.reply-comment', function () {
        const input_section = $(this).parents('.comment-block').first().find('form .reply-section').first();
        input_section.css('display', input_section.is(":visible") ? 'none' : 'block');
        return false;
    });
}
