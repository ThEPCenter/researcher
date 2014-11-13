$(function () {
    $("#firstname_en, #lastname_en").focusout(function () {
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
