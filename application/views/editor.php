<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" class="tip-bottom"><i class="icon-home"></i> 首页</a> <a href="#" class="current">编辑人员管理</a> </div>
    </div>
		<?php
		if($roles == 1){
	  ?>
		<div class="container-fluid">
			<br>
			<div class="buttons">
				<a data-toggle="modal" href="#modal-add-editor" class="btn btn-inverse btn-mini"><i class="icon-plus icon-white"></i> 新增编辑人员</a>

				<div class="modal hide" id="modal-add-editor">
					<form action="" method="post" name="addeditor" id="addeditor">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">×</button>
							<h3>新增编辑人员</h3>
						</div>
						<div class="modal-body">
							<p>登录账号: <input id="username" name="username" type="text" placeholder="建议用姓名" /></p>
							<p>登录密码: <input id="passwd" name="passwd" type="text" placeholder="登录密码" /></p>
							<p>账号状态: <input type="checkbox" name="status" id="status" checked value="1" />选中可用，不选中禁止登录</p>
							<p>手机号码: <input id="tel" name="tel" type="text" placeholder="手机号码方便联系" /></p>

							<p>负责栏目:</p>
							<p>

								<?php
									$menuA = array();
									foreach($menuslist as $menu){
										$menuA[$menu['id']] = $menu['menuname'];
										echo '<input type="checkbox" name="menus[]" value="'.$menu['id'].'" />'.$menu['menuname'].'&nbsp;&nbsp;';
									}
								?>


							</p>

						</div>
						<div class="modal-footer">
							<span class="operr"></span>
							<a href="#" class="btn" data-dismiss="modal">取消</a>
							<a href="#" id="add-editor-submit" class="btn btn-primary">保存</a>
						</div>
					</form>
				</div>

			</div>

			<div class="row-fluid">
				<div class="span12">
					<div class="widget-box">
						<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
							<h5>编辑人员列表</h5>
						</div>
						<div class="widget-content nopadding">
							<table class="table table-bordered data-table">
								<thead>
									<tr>
										<th width="30">ID</th>
										<th>姓名</th>
										<th>负责的栏目</th>
										<th>手机号</th>
										<th>登录次数</th>
										<th>角色</th>
										<th>状态</th>
										<th width="150">创建时间</th>
										<th>操作</th>
									</tr>
								</thead>
								<tbody>
									<?php
										foreach($editorlist as $mi=>$editor){
											$mmenusA    = explode(',', $editor['menus']);
											$menustr    = '';
											$thismenuA  = array(); 
											if($mmenusA){
												foreach($mmenusA as $mmenus){
													if($menuA[$mmenus]){
														$thismenuA[] = $menuA[$mmenus];
													}

												}
												$menustr    = implode('、', $thismenuA);
											}
											
											if($editor['roles'] == 1){
												$menustr    = '<span class="date badge badge-success">超级权限</span>';
											}
											
											echo '<tr class="gradeX">
													<td>'.$editor['id'].'</td>
													<td>'.$editor['username'].'</td>
													<td>'.$menustr.'</td>
													<td>'.$editor['tel'].'</td>
													<td>'.$editor['loginnum'].'</td>
													<td>'.($editor['roles'] == 1 ? '超级管理员':'编辑人员').'</td>
													<td>'.($editor['status'] == 1 ? '<span class="label label-success">可用</span>':'<span class="label label-important">禁用</span>').'</td>
													<td>'.($editor['roles'] != 1 ? $editor['createddt']:'--').'</td>
													<td>&nbsp;&nbsp;<a href="#modal-edit-editor-'.$editor['id'].'" data-toggle="modal" class="btn btn-primary btn-mini">编辑</a>' . 
													' <div class="modal hide menuedit" id="modal-edit-editor-'.$editor['id'].'">
														<form action="" method="post" name="editeditor-'.$editor['id'].'" id="editeditor-'.$editor['id'].'">
															<input type="hidden" name="id" value="'.$editor['id'].'" />
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal">×</button>
																<h3>编辑人员信息更新</h3>
															</div>
															<div class="modal-body">
																<p>登录账号: <input id="username" name="username" type="text" value="'.$editor['username'].'" /></p>
																<p>登录密码: <input id="passwd" name="passwd" type="text" value="" placeholder="留空为不修改密码" /></p>
																<p>账号状态: <input type="checkbox" name="status" id="status" '.($editor['status'] == 1 ? 'checked':'').' value="1" />选中可用</p>
																<p>联系方式: <input id="tel" name="tel" type="text" value="'.$editor['tel'].'" /></p>
																<p>负责栏目:</p>
																<p>';
																foreach($menuslist as $menu){
																	echo '<input type="checkbox" name="menus[]"'.(in_array($menu['id'], $mmenusA) ? ' checked' : '').' value="'.$menu['id'].'" />'.$menu['menuname'].'&nbsp;&nbsp;';
																}
											echo '				</p>

															</div>
															<div class="modal-footer">
																<span class="operr"></span>
																<a href="#" class="btn" data-dismiss="modal">取消</a>
																<a href="#" editorid="'.$editor['id'].'" class="edit-editor-submit btn btn-primary">更新</a>
															</div>
														</form>
													</div>' . 
													($editor['roles'] != 1 ? '<a href="#modal-del-editor" editorid="'.$editor['id'].'" class="del-editor-submit btn btn-danger btn-mini">删除</a>' : '')
													 . '</td></tr>';
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
