<link rel="stylesheet" href="<?php echo base_url(); ?>/public/scripts/ueditor/themes/default/css/ueditor.css" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>/public/scripts/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/public/scripts/ueditor/ueditor.all.js"></script>
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" class="tip-bottom"><i class="icon-home"></i> 内容管理</a> <a href="./menulist.do?menuid=<?php echo $menuinfo['id'];?>" class="current"><?php echo $menuinfo['menuname'];?></a> <A href="#">内容编辑</A></div>
    </div>
	
	
    <div class="container-fluid">
	
	<div class="row-fluid">
    <div class="span6">
	<div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5><?php echo $menuinfo['menuname'];?> 信息编辑</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="#" method="post" class="form-horizontal" name="addmenucontent" id="addmenucontent">
		  <input type="hidden" name="id" id="id" value="<?php echo $menucinfoA['id'];?>">
		  <input type="hidden" name="menuid" id="menuid" value="<?php echo $menucinfoA['menuid'];?>">
            <div class="control-group">
              <label class="control-label">内容标题 :</label>
              <div class="controls">
                <input id="ctitle" 	name="ctitle" type="text" value="<?php echo $menucinfoA['ctitle'];?>" placeholder="内容标题" />
              </div>
            </div>
           
            <div class="control-group">
              <label class="control-label">内容排序 :</label>
              <div class="controls">
                <input id="ordernum" 	name="ordernum" type="text" value="<?php echo $menucinfoA['ordernum'];?>"  placeholder="数字越小越靠前" />
              </div>
            </div>
					
			<div class="control-group">
              <label class="control-label">内容状态 :</label>
              <div class="controls">
				<input type="checkbox" name="status" id="status" <?php echo $menucinfoA['status'] == 1 ? 'checked' : '';?> value="1" />选中可用，不选中不会出现在首页中
              </div>
            </div>
			
			
			<?php 
				$itemA = array_filter(explode(',', $menuinfo['menuitems']));
				$extinfoA = unserialize($menucinfoA['menucontent']);
				if(in_array('link', $itemA)){
					echo '<div class="control-group">
						  <label class="control-label">链接地址: </label>
						  <div class="controls"><input id="link" name="link" type="text" value="'.$extinfoA['link'].'" placeholder="点击内容时跳转地址" /> </div>
						</div>';
				}

				if(in_array('pic', $itemA)){
					echo '<div class="control-group">
						  <label class="control-label">上传图片: </label>
						  <div class="controls"><input id="pic" name="pic" type="hidden" value="'.$extinfoA['pic'].'" /><img src="'.$extinfoA['pic'].'" class="menucimg" '.($extinfoA['pic'] ? 'style="display:inline-block"':'').' />
						<input type="button" class="btn" id="myEditorImage" onclick="upImage();" value="上传图片"/></div>
						</div>';
				}
				
				if(in_array('info', $itemA)){
					echo '<div class="control-group">
						  <label class="control-label">内容摘要: </label>
						  <div class="controls"><textarea id="info" name="info" class="span11">'.$extinfoA['info'].'</textarea></div>
						</div>';
				}
			?>
            <div class="form-actions">
			<span class="operr"></span>
              <button type="button" class="btn btn-success" id="add-menucontent-submit">保存</button>
            </div>
          </form>
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
	