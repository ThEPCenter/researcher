$(function () {
    $("#lastname_en").focusout(function () {
        // var txt = $("#firstname_en").val() + ' ' + $("#lastname_en").val();
        // $("#check_name").html(txt);
        // $("#check_name").css("color", "green");

        $.ajax({
            url: 'check_name',
            data: {
                firstname_en: $("#firstname_en").val(),
                lastname_en: $("#lastname_en").val()
            },
            success: function (data) {
                $("#check_name").html(data);
            }
        });

    });

});
