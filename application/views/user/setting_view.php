
<div class="container">

    <h1>User Setting</h1>
    <p><strong>Username: </strong><?php echo $username; ?></p>
    <p><strong>Password: </strong>**********</p>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#resetPassword">
        Reset Password
    </button>

    <!-- resetPassword Modal -->
    <div class="modal fade" id="resetPassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="resetPasswordLabel">Reset Password</h4>
                </div>
                <form>
                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                    <div class="modal-body">
                        <p><strong>Old Password: </strong><input type="password" id="oldPassword" name="oldPassword" required style="width: 50%;"> <span id="old_result"></span></p>
                        <p><strong>New Password: </strong><input type="password" id="newPassword" name="newPassword" required style="width: 50%;"> <span id="new_result"></span></p>
                        <p><strong>Re-type New Password: </strong><input type="password" id="reNewPassword" name="reNewPassword" required style="width: 50%;"> <span id="renew_result"></span></p>
                        <p id="ajax_result">&nbsp;</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <span id="saveResetWrap"><button id="saveReset" type="button" class="btn btn-primary" disabled="disabled">Save changes</button></span>
                    </div>
                </form>
            </div>
        </div>
        <script>
            function checkOldPassword() {
                var new_pass_word = $("#newPassword").val();
                var renew_password = $("#reNewPassword").val();
                $.ajax({
                    url: 'check_old_password',
                    type: "POST",
                    data: {
                        old_password: $("#oldPassword").val()
                    },
                    success: function (data) {
                        if (new_pass_word && renew_password) {
                            if (new_pass_word === renew_password) {
                                if (data === '<span style="color: green;" class="glyphicon glyphicon-ok" aria-hidden="true"></span>') {
                                    $("#saveResetWrap").html('<button id="saveReset" type="button" class="btn btn-primary">Save changes</button>');
                                } else {
                                    $("#saveReset").attr('disabled', 'disabled');
                                }
                            } else {
                                $("#saveReset").attr('disabled', 'disabled');
                            }
                        } else {
                            $("#saveReset").attr('disabled', 'disabled');
                        }
                        $("#old_result").html(data);
                    }
                });
            }

            $(function () {

                var base_url = "<?php echo base_url(); ?>";
                $(document).ajaxStart(function () {
                    $("#ajax_result").html("<img src=\"" + base_url + "images/demo_wait.gif\">");
                });
                $(document).ajaxComplete(function () {
                    $("#ajax_result").html("<p id=\"ajax_result\"><p>");
                });

                $("#oldPassword").keyup(function () {
                    checkOldPassword();
                });

                $("#newPassword").keyup(function () {
                    $.ajax({
                        url: 'check_new_password',
                        data: {
                            new_password: $("#newPassword").val(),
                            renew_password: $("#reNewPassword").val()
                        },
                        success: function (data) {
                            if (data === '<span style="color: green;" class="glyphicon glyphicon-ok" aria-hidden="true"></span>') {
                                $("#saveResetWrap").html('<button id="saveReset" type="button" class="btn btn-primary">Save changes</button>');
                            } else {
                                $("#saveReset").attr('disabled', 'disabled');
                            }
                            $("#new_result, #renew_result").html(data);
                        }
                    });
                    checkOldPassword();
                });

                $("#reNewPassword").keyup(function () {
                    $.ajax({
                        url: 'check_new_password',
                        data: {
                            new_password: $("#newPassword").val(),
                            renew_password: $("#reNewPassword").val()
                        },
                        success: function (data) {
                            if (data === '<span style="color: green;" class="glyphicon glyphicon-ok" aria-hidden="true"></span>') {
                                $("#saveResetWrap").html('<button id="saveReset" type="button" class="btn btn-primary">Save changes</button>');
                            } else {
                                $("#saveReset").attr('disabled', 'disabled');
                            }
                            $("#new_result, #renew_result").html(data);
                        }
                    });
                    checkOldPassword();
                });

            });
        </script>

    </div> <!-- END resetPassword -->

</div> <!-- /.container -->
