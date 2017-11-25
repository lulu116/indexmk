$(document).ready(function () {

    $('#add-menus-submit').click(function () {
        var $menuname = $('#menuname').val();
        var $nums = parseInt($('#nums').val());
        if (!$menuname) {
            $('#menuname').focus();
            $('.operr').html('名称必填！');
            return false;
        }
        if (isNaN($nums) || parseInt($nums) < 1) {
            $('#nums').focus();
            $('.operr').html('信息条数请输入数字！');
            return false;
        }
        var $formdata = $("#addmenus").serialize();
        $(this).hide();
        $.ajax({
            url: 'addmenusubmit.do',
            async: false,
            type: "POST",
            dataType: "text",
            data: $formdata,
            success: function (data) {
                if (data == 'success') {
                    window.location.href = './menu.do';
                } else {
                    $('.loginr').html('未知错误，请刷新页面重新操作！');
                    return false;
                }
            }
        });


    });


    $('.edit-menus-submit').click(function () {
        var $menuid = $(this).attr('menuid');
        var $menuname = $('#editmenus-' + $menuid).find('#menuname').val();
        var $nums = parseInt($('#editmenus-' + $menuid).find('#nums').val());
        if (!$menuname) {
            $('#editmenus-' + $menuid).find('#menuname').focus();
            $('#editmenus-' + $menuid).find('.operr').html('名称必填！');
            return false;
        }
        if (isNaN($nums) || parseInt($nums) < 1) {
            $('#editmenus-' + $menuid).find('#nums').focus();
            $('#editmenus-' + $menuid).find('.operr').html('信息条数请输入数字！');
            return false;
        }
        var $formdata = $('#editmenus-' + $menuid).serialize();
        $(this).hide();
        $.ajax({
            url: 'editmenusubmit.do',
            async: false,
            type: "POST",
            dataType: "text",
            data: $formdata,
            success: function (data) {
                if (data == 'success') {
                    window.location.href = './menu.do';
                } else {
                    $('.loginr').html('未知错误，请刷新页面重新操作！');
                    return false;
                }
            }
        });
    });



    $('.del-menus-submit').click(function () {
        var $menuid = $(this).attr('menuid');
        if (!confirm("请注意，你在删除栏目所有相关信息，非常确定吗？")) {
            return;
        }
        $(this).hide();
        $.ajax({
            url: 'delmenusubmit.do',
            async: false,
            type: "POST",
            dataType: "text",
            data: {
                menuid: $menuid
            },
            success: function (data) {
                if (data == 'success') {
                    window.location.href = './menu.do';
                } else {
                    $('.loginr').html('未知错误，请刷新页面重新操作！');
                    return false;
                }
            }
        });
    });


    $('#add-editor-submit').click(function () {
        var $username = $('#username').val();
        var $passwd = $('#passwd').val();
        if (!$username) {
            $('#username').focus();
            $('.operr').html('登录账号必填！');
            return false;
        }
        if (!$passwd) {
            $('#passwd').focus();
            $('.operr').html('登录密码不能为空！');
            return false;
        }
        var $formdata = $("#addeditor").serialize();
        $(this).hide();
        $.ajax({
            url: 'addeditsubmit.do',
            async: false,
            type: "POST",
            dataType: "text",
            data: $formdata,
            success: function (data) {
                if (data == 'success') {
                    window.location.href = './editor.do';
                } else {
                    $('.loginr').html('未知错误，请刷新页面重新操作！');
                    return false;
                }
            }
        });


    });

    $('.edit-editor-submit').click(function () {
        var $editorid = $(this).attr('editorid');
        var $username = $('#editeditor-' + $editorid).find('#username').val();

        if (!$username) {
            $('#editeditor-' + $editorid).find('#username').focus();
            $('#editeditor-' + $editorid).find('.operr').html('登录账号必填！');
            return false;
        }
        var $formdata = $('#editeditor-' + $editorid).serialize();
        $(this).hide();
        $.ajax({
            url: 'editeditorsubmit.do',
            async: false,
            type: "POST",
            dataType: "text",
            data: $formdata,
            success: function (data) {
                if (data == 'success') {
                    window.location.href = './editor.do';
                } else {
                    $('.loginr').html('未知错误，请刷新页面重新操作！');
                    return false;
                }
            }
        });
    });


    $('.del-editor-submit').click(function () {
        var $editorid = $(this).attr('editorid');
        if (!confirm("请注意，你在删除编辑人员信息，非常确定吗？")) {
            return;
        }
        $(this).hide();
        $.ajax({
            url: 'deleditorsubmit.do',
            async: false,
            type: "POST",
            dataType: "text",
            data: {
                editorid: $editorid
            },
            success: function (data) {
                if (data == 'success') {
                    window.location.href = './editor.do';
                } else {
                    $('.loginr').html('未知错误，请刷新页面重新操作！');
                    return false;
                }
            }
        });
    });
	
	
	
	$('.personset-submit').click(function () {
        var $formdata = $('#personset').serialize();
        $(this).hide();
        $.ajax({
            url: 'personsubmit.do',
            async: false,
            type: "POST",
            dataType: "text",
            data: $formdata,
            success: function (data) {
                if (data == 'success') {
                    window.location.href = './personset.do';
                } else {
                    alert('未知错误，请刷新页面重新操作！');
                    return false;
                }
            }
        });
    });
	
	
	
	$('.create-index-submit').click(function () {
		var $menuid = $(this).attr('menuid');
        if (!confirm("你要生成新的首页并删除原始首页，非常确定吗？")) {
            return;
        }
        $(this).html('首页生成中...');
        $.ajax({
            url: 'mkindexsubmit.do',
            async: false,
            type: "POST",
            dataType: "text",
			data:{menuid:$menuid},
            success: function (data) {
				$('.create-index-submit').html('开始生成首页');
                if (data == 'success') {
                    $('.operr').html('操作成功，请访问！');
                } else {
                    $('.operr').html('未知错误，请刷新页面重新操作！');
                    return false;
                }
            }
        });
    });
	




});
