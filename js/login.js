$(document).ready(function () {


    $('.loginsubmit').click(function () {
        var $username = $('#username').val();
        var $passwd = $('#passwd').val();
        if (!$username) {
            $('#username').focus();
            $('.loginr').html('账号必填！');
            return false;
        }

        if (!$passwd) {
            $('#passwd').focus();
            $('.loginr').html('密码必填！');
            return false;
        }

        $.ajax({
            url: 'loginsubmit.do',
            async: false,
            type: "POST",
            dataType: "text",
            data: {
                username: $username,
                passwd: $passwd
            },
            success: function (data) {
                if (data == 'no_data') {
                    $('.loginr').html('账号或密码必填！');
                    return false;
                }
                if (data == 'invail_username') {
                    $('.loginr').html('账号无效，请重新输入！');
                    $('#username').focus();
                    return false;
                }
                if (data == 'invail_passwd') {
                    $('.loginr').html('密码错误，请重新输入！');
                    $('#passwd').focus();
                    return false;
                }
                //登录成功，跳转到操作页面
                if (data == 'success') {
                    window.location.href = './personset.do';
                } else if (data == 'stop') {
					$('.loginr').html('账号禁止登录，请联系管理员！');
                    return false;
                } else {
                    $('.loginr').html('未知错误，请刷新页面重新操作！');
                    return false;
                }
            }
        });


    });


});
