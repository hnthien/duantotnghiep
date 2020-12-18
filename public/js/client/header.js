$(document).ready(function() {
    $('#error').click(function() {
        $("#error_box").show();
        // $("#error_box").slideToggle('slow');
        $("#feedback_box").hide();

    });

    $('#error_closed').click(function() {
        $("#error_box").hide();
        // $("#dialog_box").slideToggle('slow');

    });
    $('#feedback').click(function() {
        $("#feedback_box").show();
        // $("#feedback_box").slideToggle('slow');
        $("#error_box").hide();

    });

    $('#feedback_closed').click(function() {
        $("#feedback_box").hide();
        // $("#dialog_box").slideToggle('slow');

    });
    $('#category_show').click(function() {
        $("#list_category_menu").slideToggle('slow');
        $("#category_show1").show();
        $("#category_show").hide();

    });
    $('#category_show1').click(function() {
        $("#list_category_menu").hide();
        $("#category_show").show();
        $("#category_show1").hide();
    });

    $('#search').keyup(function() {
        var keyword = $('#search').val();
        $.ajax({
            url: "{{url('post/search')}}",
            type: "get",
            data: {
                keyword: keyword
            },
            success: function(res) {
                $('#SearchResults').html(res);
            },
            error: function(error) {
                alert('lỗi');
            }
        })

    })


});