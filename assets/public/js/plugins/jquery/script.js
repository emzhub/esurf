

$('document').ready(function ()
{

    /* validation */
    $("#chatForm").validate({
        rules:
                {
                    message: {
                        required: true
                    },
                    to_id: {
                        required: true
                        //email: true
                    }
                },
        messages:
                {
                    message: {
                        required: "Please Enter Your Message"
                    },
                    to_id: "Plsease Refresh Your Current Page"
                },
        submitHandler: sendChat
    });
    /* validation */


    /* login submit */
    function sendChat()
    {
        var data = $("#chatForm").serialize();

        $.ajax({
            type: 'POST',
            url: 'template/action/tpl_message_center_action.php',
            data: data,
            beforeSend: function ()
            {
                $("#error").fadeOut();
                $("#btn-chat").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
                   document.getElementById('imbox').scrollTop = document.getElementById('imbox').scrollHeight;
                 document.getElementById('message').value = '';
                   noty({text: 'Message has been sent successfully', layout: 'topRight', type: 'success'});

            },
            success: function (response)
            {
                if (response === "ok") {
                    $("#btn-chat").html('<img src="btn-ajax-loader.gif" /> &nbsp; Sent...');
                    document.getElementById('imbox').scrollTop = document.getElementById('imbox').scrollHeight;
                    document.getElementById('message').value = '';

//						$("#btn-chat").html('<img src="btn-ajax-loader.gif" /> &nbsp; Signing In ...');
//						setTimeout(' window.location.href = "index"; ',4000);
                }
                else {

                    $("#error").fadeIn(1000, function () {
                        $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; ' + response + ' !</div>');
                        $("#btn-chat").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Send');
                    });
                }
            }
        });
        return false;
    }


//
//    /* validation */
//    $("#login-form").validate({
//        rules:
//                {
//                    userpass: {
//                        required: true,
//                    },
//                    username: {
//                        required: true,
//                        //email: true
//                    },
//                },
//        messages:
//                {
//                    userpass: {
//                        required: "please enter your password"
//                    },
//                    username: "please enter your username",
//                },
//        submitHandler: submitForm
//    });
//    /* validation */
//
//
//    /* login submit */
//    function submitForm()
//    {
//        var data = $("#login-form").serialize();
//
//        $.ajax({
//            type: 'POST',
//            url: 'login_process.php',
//            data: data,
//            beforeSend: function ()
//            {
//                $("#error").fadeOut();
//                $("#btn-login").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
//            },
//            success: function (response)
//            {
//                if (response == "ok") {
//
//                    $("#btn-login").html('<img src="btn-ajax-loader.gif" /> &nbsp; Signing In ...');
//                    setTimeout(' window.location.href = "index"; ', 4000);
//                }
//                else {
//
//                    $("#error").fadeIn(1000, function () {
//                        $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; ' + response + ' !</div>');
//                        $("#btn-login").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In');
//                    });
//                }
//            }
//        });
//        return false;
//    }
//
//
//    /* validation */
//    $("#register-form").validate({
//        rules:
//                {
//                    password: {
//                        required: true,
//                        minlength: 8,
//                        maxlength: 15
//                    },
//                    cpassword: {
//                        required: true,
//                        equalTo: '#password'
//                    },
//                    email: {
//                        required: true,
//                        email: true
//                    },
//                    username: {
//                        required: true,
//                        minlength: 3
//
//                    },
//                },
//        messages:
//                {
//                    password: {
//                        required: "please provide a password",
//                        minlength: "password at least have 8 characters"
//                    },
//                    cpassword: {
//                        required: "please retype your password",
//                        equalTo: "password doesn't match !"
//                    },
//                    email: {
//                        required: "please enter your email"
//                    },
//                    username: "please enter your username",
//                },
//        submitHandler: submitForm1
//    });
//    /* validation */
//    /* login submit */
//    function submitForm1()
//    {
//        var data = $("#register-form").serialize();
//
//        $.ajax({
//            type: 'POST',
//            url: 'reg_process.php',
//            data: data,
//            beforeSend: function ()
//            {
//                $("#error").fadeOut();
//                $("#btn-register").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
//            },
//            success: function (data)
//            {
//                if (data == 1) {
//
//                    $("#error").fadeIn(1000, function ()
//                    {
//                        $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Sorry email already taken !</div>');
//                        $("#btn-register").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account');
//
//                    });
//
//                }
//                else if (data == "registered")
//                {
//                    $("#btn-register").html('<img src="btn-ajax-loader.gif" /> &nbsp; Signing Up ...');
//                    setTimeout(' window.location.href = "index"; ', 4000);
//
//                }
//                else {
//
//                    $("#error").fadeIn(1000, function () {
//
//                        $("#error").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; ' + data + ' !</div>');
//
//                        $("#btn-register").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account');
//
//                    });
//
//                }
//
//            }
//        });
//        return false;
//    }
//    /* login submit */
//
//
//    /* validation */
//    $("#newcat-form").validate({
//        rules:
//                {
//                    cname: {
//                        required: true
//
//                    },
//                    cdes: {
//                        required: true
//
//                    },
//                },
//        messages:
//                {
//                    cname: {
//                        required: "please provide a name"
//
//                    },
//                    cdes: "please enter a category description",
//                },
//        submitHandler: submitForm12
//    });
//    /* validation */
//    /* login submit */
//    function submitForm12()
//    {
//        var data = $("#newcat-form").serialize();
//
//        $.ajax({
//            type: 'POST',
//            url: 'cat_proce.php',
//            data: data,
//            beforeSend: function ()
//            {
//                $("#error").fadeOut();
//                $("#btn-cat").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
//            },
//            success: function (data)
//            {
//                if (data == 1) {
//
//                    $("#error").fadeIn(1000, function ()
//                    {
//                        $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Sorry category already exist !</div>');
//                        $("#btn-cat").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create  New cat');
//
//                    });
//
//                }
//                else if (data == "created")
//                {
//                    $("#btn-cat").html('<img src="btn-ajax-loader.gif" /> &nbsp; Creating ...');
//                    //setTimeout(' window.location.href = "forum.php"; ',4000);
//                    setTimeout('  window.history.go(-1);', 4000);
//                }
//                else {
//
//                    $("#error").fadeIn(1000, function () {
//
//                        $("#error").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; ' + data + ' !</div>');
//
//                        $("#btn-cat").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create New Cat');
//
//                    });
//
//                }
//
//            }
//        });
//        return false;
//    }
//    /* login submit */
//
//
//
//    /* validation */
//    $("#newtop-form").validate({
//        rules:
//                {
//                    cname: {
//                        required: true
//
//                    },
//                    cdes: {
//                        required: true
//
//                    },
//                },
//        messages:
//                {
//                    cname: {
//                        required: "please provide a title name"
//
//                    },
//                    cdes: "please enter a Topic description",
//                },
//        submitHandler: submitForm13
//    });
//    /* validation */
//    /* login submit */
//    function submitForm13()
//    {
//        var data = $("#newtop-form").serialize();
//
//        $.ajax({
//            type: 'POST',
//            url: 'top_proce.php',
//            data: data,
//            beforeSend: function ()
//            {
//                $("#error").fadeOut();
//                $("#btn-top").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
//            },
//            success: function (data)
//            {
//                if (data == 1) {
//
//                    $("#error").fadeIn(1000, function ()
//                    {
//                        $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Sorry Topic already exist !</div>');
//                        $("#btn-top").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create  New Topic');
//
//                    });
//
//                }
//                else if (data == "topcreated")
//                {
//                    $("#btn-cat").html('<img src="btn-ajax-loader.gif" /> &nbsp; Creating ...');
//                    //setTimeout(' window.location.href = "forum.php"; ',4000);
//                    setTimeout('  window.history.go(-1);', 4000);
//
//                }
//                else {
//
//                    $("#error").fadeIn(1000, function () {
//
//                        $("#error").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; ' + data + ' !</div>');
//
//                        $("#btn-top").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create New Topic');
//
//                    });
//
//                }
//
//            }
//        });
//        return false;
//    }
//    /* login submit */
//
//    /* validation */
//    $("#com-form").validate({
//        rules:
//                {
//                    reply_content: {
//                        required: true,
//                    },
//                },
//        messages:
//                {
//                    reply_content: "please you cant send an empty post",
//                },
//        submitHandler: submitForm14
//    });
//    /* validation */
//
//
//    /* login submit */
//    function submitForm14()
//    {
//        var data = $("#com-form").serialize();
//
//        $.ajax({
//            type: 'POST',
//            url: 'comment_proce.php',
//            data: data,
//            beforeSend: function ()
//            {
//                $("#error").fadeOut();
//                $("#btn-reply").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
//            },
//            success: function (response)
//            {
//                if (response == "ok") {
//
//                    //$("#btn-reply").html('<img src="btn-ajax-loader.gif" /> &nbsp; Posting .....');
////						setTimeout(' window.location.href = "index"; ',4000);
//                    window.history.go(0);
//                }
//                else {
//
//                    $("#error").fadeIn(1000, function () {
//                        $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; ' + response + ' !</div>');
//                        $("#btn-reply").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Post');
//                    });
//                }
//            }
//        });
//        return false;
//    }
//
//    /* validation */
//    $("#contact-form").validate({
//        rules:
//                {
//                    fullname: {
//                        required: true,
//                        minlength: 3,
//                        maxlength: 15
//                    },
//                    email: {
//                        required: true,
//                        email: true
//                    },
//                    subject: {
//                        required: true,
//                    },
//                    message: {
//                        required: true
//                    },
//                },
//        messages:
//                {
//                    message: {
//                        required: "please provide a message"
//
//                    },
//                    subject: {
//                        required: "please retype your subject"
//
//                    },
//                    email: {
//                        required: "please enter your email"
//                    },
//                    fullname: "please enter your Full name",
//                },
//        submitHandler: submitForm15
//    });
//    /* validation */
//    /* login submit */
//    function submitForm15()
//    {
//        var data = $("#contact-form").serialize();
//
//        $.ajax({
//            type: 'POST',
//            url: 'PHPMailer-master/check.php',
//            data: data,
//            beforeSend: function ()
//            {
//                $("#error").fadeOut();
//                $("#btn-contact").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
//            },
//            success: function (data)
//            {
//                if (data === "Message Sent Successfully")
//                {
//                    $("#error").html('<div class="alert alert-success"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; ' + data + ' !</div>');
//                    setTimeout('  window.history.go(-1);', 4000);
//
//                }
//                else {
//
//                    $("#error").fadeIn(1000, function () {
//
//                        $("#error").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; ' + data + ' !</div>');
//
//                        $("#btn-contact").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; SHOOT MESSAGE');
//
//                    });
//
//                }
//
//            }
//        });
//        return false;
//    }
//    /* login submit */







});