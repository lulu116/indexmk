<!DOCTYPE html>
<html lang="en">

<head>
    <title>首页后台管理登录</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="css/login.css" />
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href='http://fonts.useso.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

</head>

<body>
    <div id="loginbox">
        <form id="loginform" class="form-vertical">
            <div class="control-group normal_text">
                <h3><img src="img/logo.png" alt="Logo" /></h3>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_lg"><i class="icon-user"></i></span><input type="text" name="username" id="username" placeholder="账号" />
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" name="passwd" id="passwd" placeholder="密码" />
                    </div>
                </div>
            </div>
            <div class="form-actions">

                <span class="pull-right">
                <em class="H loginr"></em>&nbsp;&nbsp;&nbsp;&nbsp;<a type="submit" href="###" class="btn btn-success loginsubmit" /> 登录</a></span>
            </div>
        </form>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/login.js"></script>
</body>

</html>
