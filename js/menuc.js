$(document).ready(function () {

    $('#add-menucontent-submit').click(function () {
        var $ctitle 	= $('#ctitle').val();
        var $ordernum 	= parseInt($('#ordernum').val());
        if (!$ctitle) {
            $('#ctitle').focus();
            $('.operr').html('标题必填！');
            return false;
        }
        if (isNaN($ordernum) || parseInt($ordernum) < 1) {
            $('#ordernum').focus();
            $('.operr').html('排序请输入数字！');
            return false;
        }
        var $formdata = $("#addmenucontent").serialize();
        $(this).hide();
        $.ajax({
            url: 'addmenuinfo.do',
            async: false,
            type: "POST",
            dataType: "text",
            data: $formdata,
            success: function (data) {
                if (data == 'success') {
                    window.location.href = './menulist.do?menuid=' + $('#menuid').val();
                } else {
                    $('.loginr').html('未知错误，请刷新页面重新操作！');
                    return false;
                }
            }
        });


    });
	
	
	
	$('.del-menuc-submit').click(function () {
        var $menuid = $('#menuid').val();
		var $id 	= $(this).attr('id');
		
        if (!confirm("你正在删除信息，不可逆，非常确定吗？")) {
            return;
        }
        $(this).hide();
        $.ajax({
            url: 'delmenucsubmit.do',
            async: false,
            type: "POST",
            dataType: "text",
            data: {
                menuid: $menuid, id: $id
            },
            success: function (data) {
                if (data == 'success') {
                    window.location.reload();
                } else {
                    $('.loginr').html('未知错误，请刷新页面重新操作！');
                    return false;
                }
            }
        });
    });
	


	




});
