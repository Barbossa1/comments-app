$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

function createComments(perPage) {
    let comment = $('#comment').val();

    if (comment === '') {
        $('#err_block').html('Where is comment?').show('slow');
        setTimeout(() => $('#err_block').hide('slow'), 2500);
    }
    else {
        $.ajax({
            url: '/comments/create',
            method: 'post',
            cache: false,
            data: {'comment': comment, 'comment_quantity': perPage},
            success: function (html) {
                $('body').html(html);
            }
        });
    }
}

function showEdit(id, comment, perPage) {
    $('#input_' + id).html('<input type="text" class="form-control" id="new_comment" value="' + comment + '"/>');
    $('#card_footer_' + id).html('<button class="btn btn-outline-success" onclick="updateComment(' + id + ',' + perPage + ')">Save</button>');
}

function updateComment(id, perPage) {
    let comment = $('#new_comment').val();

    $.ajax({
        url: '/comments/' + id,
        method: 'patch',
        cache: false,
        data: {'comment': comment, 'comment_quantity': perPage},
        success: function (html) {
            $('body').html(html);
        }
    });
}

function removeComment(id, perPage) {
    $.ajax({
        url: '/comments/' + id,
        method: 'delete',
        cache: false,
        data: {'comment_quantity': perPage},
        success: function (html) {
            $('body').html(html);
        }
    });
}

function moreComments(perPage) {
    $.ajax({
        url: '/comments/show',
        method: 'post',
        cache: false,
        data: {'comment_quantity': perPage + 3},
        success: function (html) {
            $('body').html(html);
        }
    });
}
