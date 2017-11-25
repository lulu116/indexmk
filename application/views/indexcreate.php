<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" class="tip-bottom"><i class="icon-home"></i> 首页</a> <a href="#" class="current">重新生成首页</a> </div>
    </div>
		<?php
		if($roles == 1){
	  ?>
		<div class="container-fluid">
			<br>

			
			<div class="alert alert-error alert-block">
			<h4 class="alert-heading">重要提示!!</h4>
			生成操作将直接覆盖原始首页内容，请确保内容的正确性并慎重操作！！！
			</div>
			
			
			<a href="#" menuid="<?php echo $_GET['menuid'];?>" class="create-index-submit btn btn-primary">开始生成首页</a>
			
			<A href="<?php echo base_url();?>index.html" target="_blank" class="operr"></A>
			

			
		</div>
		<?php } ?>
</div>
