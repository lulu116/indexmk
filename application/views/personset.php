<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="./menu.do" title="回到首页" class="tip-bottom"><i class="icon-home"></i> 首页</a> <a href="#" class="current">个人设置</a> </div>
</div>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span6">
	<div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>个人信息设置</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="#" method="post" class="form-horizontal" id="personset">
		  <input type="hidden" name="id" value="<?php echo $personinfo['id'];?>">
            <div class="control-group">
              <label class="control-label">登录账号 :</label>
              <div class="controls">
                <?php echo $personinfo['username'];?>
              </div>
            </div>
           
            <div class="control-group">
              <label class="control-label">登录密码 :</label>
              <div class="controls">
                <input type="text" name="passwd" id="passwd" value=""  class="span11" placeholder="留空为不修改"  />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">手机号码 :</label>
              <div class="controls">
                <input type="text" class="span11" name="tel" id="tel" value="<?php echo $personinfo['tel'];?>" placeholder="方便联系" />
              </div>
            </div>
           
            <div class="form-actions">
              <button type="button" class="btn btn-success personset-submit">保存</button>
            </div>
          </form>
        </div>
      </div>
	  </div>
	  </div>
	  </div>
	  </div>