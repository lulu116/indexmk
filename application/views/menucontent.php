<link rel="stylesheet" href="<?php echo base_url(); ?>/public/scripts/ueditor/themes/default/css/ueditor.css" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>/public/scripts/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/public/scripts/ueditor/ueditor.all.js"></script>
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" class="tip-bottom"><i class="icon-home"></i> 内容管理</a> <a href="#" class="current"><?php echo $menuinfo['menuname'];?></a> </div>
    </div>
    <div class="container-fluid">
        <br>
		
        <div class="buttons">
            <a data-toggle="modal" href="#modal-add-menus" class="btn btn-inverse btn-mini"><i class="icon-plus icon-white"></i> 添加信息</a>
            <div class="modal hide" id="modal-add-menus">
                <form action="" method="post" name="addmenucontent" id="addmenucontent">
				<input type="hidden" name="menuid" id="menuid" value="<?php echo $menuinfo['id'];?>" />
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h3>添加栏目信息</h3>
                    </div>
                    <div class="modal-body">
                        <p>信息标题: <input id="ctitle" 	name="ctitle" type="text" placeholder="内容标题" /></p>
						<p>内容排序: <input id="ordernum" 	name="ordernum" type="text"  placeholder="数字越小越靠前" /></p>
						<p>内容状态: <input type="checkbox" name="status" id="status" checked value="1" />选中可用，不选中不会出现在首页中</p>
						
						<?php 
							$itemA = array_filter(explode(',', $menuinfo['menuitems']));
							if(in_array('link', $itemA)){
								echo '<p>链接地址: <input id="link" name="link" type="text" placeholder="点击内容时跳转地址" /></p>';
							}

							if(in_array('pic', $itemA)){
								echo '<p>上传图片: <input id="pic" name="pic" type="hidden" /><img src="" class="menucimg" />
									<input type="button" class="btn" id="myEditorImage" onclick="upImage();" value="上传图片"/></p>';
							}
							
							if(in_array('info', $itemA)){
								echo '<p>摘要内容: <textarea id="info" name="info" class="span4"></textarea></p>';
							}
							
						?>
                    </div>
                    <div class="modal-footer">
                        <span class="operr"></span>
                        <a href="#" class="btn" data-dismiss="modal">取消</a>
                        <a href="#" id="add-menucontent-submit" class="btn btn-primary">保存</a>
                    </div>
                </form>
            </div>

        </div>

        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>栏目列表</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th width="50">排序</th>
                                    <th>内容标题</th>
									
									<?php
										if(in_array('pic', $itemA)){
											echo '<th width="120">图片</th>';
										}
										
										if(in_array('link', $itemA)){
											echo '<th style="max-width:200px;">链接地址</th>';
										}

										if(in_array('info', $itemA)){
											echo '<th>摘要内容</th>';
										}
										
									?>
									<th width="50">状态</th>
                                    <th width="150">操作时间</th>
									<th width="150">操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($menuclist as $mi=>$menuc){
                                        $menuc_extA = unserialize($menuc['menucontent']);
                                        echo '<tr class="gradeX"><td>'.$menuc['ordernum'].'</td>',
											 '<td>'.$menuc['ctitle']. '</td>';
										if(in_array('pic', $itemA)){
											echo '<td>'.($menuc_extA['pic'] ? ('<img src="'.$menuc_extA['pic'].'" class="menucimg" style="display:inline-block" />') : '').'</td>'; 
										}
										
										if(in_array('link', $itemA)){
											echo '<td><A href="'.$menuc_extA['link'].'" target="_blank">'.$menuc_extA['link'].'</A></td>';
										}

										if(in_array('info', $itemA)){
											echo '<td>'.$menuc_extA['info'].'</td>';
										}
										echo 	'<td>'.($menuc['status'] == 1 ? '<span class="label label-success">公开</span>':'<span class="label label-important">隐藏</span>').'</td>';
										echo	'<td>'.date('Y-m-d H:i', $menuc['createdt']).'</td>';
										echo	'<td>&nbsp;&nbsp;<a href="./menulist.do?menuid='.$menuinfo['id'].'&menucid='.$menuc['id'].'&action=editc" class="btn btn-primary btn-mini">编辑</a>' . 
												'&nbsp;&nbsp;<a href="#modal-del-menuc" id="'.$menuc['id'].'" class="del-menuc-submit btn btn-danger btn-mini">删除</a></td></tr>';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script language="javascript">
		var ue = new UE.ui.Editor();
		ue.render('descrip');
		//单独上传图片的
		var myEditorImage;
		var d;
		myEditorImage= new UE.ui.Editor();
		function upImage(){
			d = myEditorImage.getDialog("insertimage");
			d.render();
			d.open();
		}
		myEditorImage.render('myEditorImage');  
		myEditorImage.ready(function(){  
			myEditorImage.setDisabled();  
			myEditorImage.hide();
			myEditorImage.addListener('beforeInsertImage',function(t, arg){  
				$("#pic").val(arg[0].src);
				$('.menucimg').attr('src', arg[0].src);
				$('.menucimg').show();
			});
		});
	</script>
	