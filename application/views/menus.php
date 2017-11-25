<div id="content">

    <div id="content-header">
        <div id="breadcrumb"> <a href="#" class="tip-bottom"><i class="icon-home"></i> 首页</a> <a href="#" class="current">首页栏目管理</a> </div>
    </div>
	<?php
	if($roles == 1){
  ?>
    <div class="container-fluid">
        <br>
		
        <div class="buttons">
            <a data-toggle="modal" href="#modal-add-menus" class="btn btn-inverse btn-mini"><i class="icon-plus icon-white"></i> 新增栏目</a>

            <div class="modal hide" id="modal-add-menus">
                <form action="" method="post" name="addmenus" id="addmenus">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h3>新增栏目</h3>
                    </div>
                    <div class="modal-body">
                        <p>栏目名称: <input id="menuname" name="menuname" type="text" placeholder="最好能体现位置" /></p>
                        <p>信息条数: <input id="nums" name="nums" type="text" placeholder="提示编辑人员有效信息数" /></p>
                        <p>栏目状态: <input type="checkbox" name="status" id="status" checked value="1" />选中可用</p>

                        <p>内容元素:
                            <input type="checkbox" name="menuitems[]" value="title" checked disabled />标题必选&nbsp;&nbsp;
                            <input type="checkbox" name="menuitems[]" value="link" id="link" /><label for="link">链接地址&nbsp;&nbsp;</label>
                            <input type="checkbox" name="menuitems[]" value="pic" id="pic" /><label for="pic">图片&nbsp;&nbsp;</label>
                            <input type="checkbox" name="menuitems[]" value="info" id="info" /><label for="info">摘要</label>
                        </p>

                    </div>
                    <div class="modal-footer">
                        <span class="operr"></span>
                        <a href="#" class="btn" data-dismiss="modal">取消</a>
                        <a href="#" id="add-menus-submit" class="btn btn-primary">保存</a>
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
                                    <th width="50">ID</th>
                                    <th>栏目名称</th>
                                    <th>内容编辑人员</th>
                                    <th>信息数量</th>
                                    <th>状态</th>
                                    <th width="150">创建时间</th>
									<th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($menuslist as $mi=>$menu){
                                        $editorstr   	= '';
                                        $thiseditorA  	= array(); 
                                        if($editorlist){
                                            foreach($editorlist as $editor){
                                                if(strstr(',' . $editor['menus'] . ',', (string)$menu['id'])){
                                                    $thiseditorA[] = $editor['username'];
                                                }
                                            }
                                            $editorstr    = implode('、', $thiseditorA);
                                        }
                                        
										
                                        echo '<tr class="gradeX">
                                                <td>'.$menu['id'].'</td>
                                                <td>'.$menu['menuname'].'</td>
                                                <td>'.$editorstr.'</td>
                                                <td>'.$menu['nums'].'</td>
                                                <td>'.($menu['status'] == 1 ? '<span class="label label-success">公开</span>':'<span class="label label-important">关闭</span>').'</td>
                                                <td>'.$menu['createddt'].'</td>
												<td>&nbsp;&nbsp;<a href="#modal-edit-menus-'.$menu['id'].'" data-toggle="modal" class="btn btn-primary btn-mini">编辑</a>' . 
                                                ' <div class="modal hide menuedit" id="modal-edit-menus-'.$menu['id'].'">
                                                    <form action="" method="post" name="editmenus-'.$menu['id'].'" id="editmenus-'.$menu['id'].'">
                                                        <input type="hidden" name="id" value="'.$menu['id'].'" />
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">×</button>
                                                            <h3>更新栏目信息</h3>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>栏目名称: <input id="menuname" name="menuname" type="text" value="'.$menu['menuname'].'" /></p>
                                                            <p>信息条数: <input id="nums" name="nums" type="text" value="'.$menu['nums'].'" /></p>
                                                            <p>栏目状态: <input type="checkbox" name="status" id="status" '.($menu['status'] == 1 ? 'checked':'').' value="1" />选中可用</p>

                                                            <p>内容元素:
                                                                <input type="checkbox" name="menuitems[]" value="title" checked disabled />标题必选&nbsp;&nbsp;
                                                                <input type="checkbox" name="menuitems[]" value="link" id="link" '.(strstr($menu['menuitems'], 'link')? 'checked':'').' /><label for="link">链接地址&nbsp;&nbsp;</label>
                                                                <input type="checkbox" name="menuitems[]" value="pic" id="pic" '.(strstr($menu['menuitems'], 'pic')? 'checked':'').'/><label for="pic">图片&nbsp;&nbsp;</label>
                                                                <input type="checkbox" name="menuitems[]" value="info" id="info" '.(strstr($menu['menuitems'], 'info')? 'checked':'').' /><label for="info">摘要</label>
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <span class="operr"></span>
                                                            <a href="#" class="btn" data-dismiss="modal">取消</a>
                                                            <a href="#" menuid="'.$menu['id'].'" class="edit-menus-submit btn btn-primary">更新</a>
                                                        </div>
                                                    </form>
                                                </div>' . 
                                                '<a href="#modal-del-menus" menuid="'.$menu['id'].'" class="del-menus-submit btn btn-danger btn-mini">删除</a>' . '</td>
                                             </tr>';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<?php } ?>
</div>
