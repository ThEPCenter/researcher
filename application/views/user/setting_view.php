
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
                <form method="post" action="<?php echo site_url(); ?>user/reset_password_process">
                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                    <div class="modal-body">
                        <p><strong>Old Password: </strong><input type="password" id="oldPassword" name="oldPassword" required style="width: 50%;"> <span id="old_result"></span></p>
                        <p><strong>New Password: </strong><input type="password" id="newPassword" name="newPassword" required style="width: 50%;"> <span id="new_result"></span></p>
                        <p><strong>Re-type New Password: </strong><input type="password" id="reNewPassword" name="reNewPassword" required style="width: 50%;"> <span id="renew_result"></span></p>
                        <p id="ajax_result">&nbsp;</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> &nbsp;
                        <span id="saveResetWrap"><button id="saveReset" type="submit" class="btn btn-primary" disabled="disabled">Save changes</button></span>
                    </div>
                </form>
            </div>
        </div>
        <script>
            $(function () {
                var base_url = "<?php echo base_url(); ?>";
                $(document).ajaxStart(function () {
                    $("#ajax_result").html("<img src=\"" + base_url + "images/demo_wait.gif\">");
                });
                $(document).ajaxComplete(function () {
                    $("#ajax_result").html("<p id=\"ajax_result\"><p>");
                });

                $("#oldPassword").keyup(function () {
                    isEnableButton();
                    checkOldPassword();
                });
                $("#newPassword, #reNewPassword").keyup(function () {
                    isEnableButton();
                    checkNewPassword();
                });
            });

            function checkOldPassword() {
                var oldPassword = $("#oldPassword").val();
                $.ajax({
                    url: 'check_old_password',
                    type: "POST",
                    data: {
                        old_password: oldPassword
                    },
                    success: function (data) {
                        $("#old_result").html(data);
                    }
                });
            }

            function checkNewPassword() {
                var newPassword = $("#newPassword").val();
                var reNewPassword = $("#reNewPassword").val();
                $.ajax({
                    url: 'check_new_password',
                    type: "POST",
                    data: {
                        new_password: newPassword,
                        renew_password: reNewPassword
                    },
                    success: function (data) {
                        $("#new_result, #renew_result").html(data);
                    }
                });
            }

            function isEnableButton() {
                var oldPassword = $("#oldPassword").val();
                var newPassword = $("#newPassword").val();
                var reNewPassword = $("#reNewPassword").val();
                $.ajax({
                    url: 'check_enable_button',
                    type: "POST",
                    data: {
                        old_password: oldPassword,
                        new_password: newPassword,
                        renew_password: reNewPassword
                    },
                    success: function (data) {
                        if (data === 'enable') {
                            $("#saveResetWrap").html('<button id="saveReset" type="submit" class="btn btn-primary">Save changes</button>');
                        } else {
                            $("#saveReset").attr('disabled', 'disabled');
                        }
                    }
                });
            }
        </script>

    </div> <!-- END resetPassword -->

</div> <!-- /.container -->
