<div class="row-content am-cf">
	<div class="row">
		<div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
			<div class="widget am-cf">
				<div class="widget-head am-cf">
					<div class="widget-title am-cf">后台用户列表</div>
					<div style='    margin-top: 20px;z-index:22' class="am-u-sm-24 am-u-md-24 am-u-lg-24">
						<div class="am-form-group">
							<button type="button" class="am-btn am-btn-primary" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0, width: 600, height: 340}">
								新增用户
							</button>
							<button type="button" class="am-btn am-btn-primary" data-am-modal="{target: '#doc-modal-2', closeViaDimmer: 0, width: 600, height: 180}">
								角色权限编辑
							</button>

						</div>
					</div>
					<div class="widget-body am-fr">
						<div class="am-scrollable-horizontal am-u-sm-12">
							<table width="100%" class="am-table am-table-compact am-table-striped
                         tpl-table-black am-text-nowrap">
								<thead>
									<tr>
										<th>用户名</th>
										<th>创建时间</th>
										<th>角色</th>
										<th>操作</th>
									</tr>
								</thead>
								<tbody>
									<?php if (!$list->isEmpty()): foreach ($list as $item): ?>
									<tr>
										<td class="am-text-middle">
											<?= $item['user_name'] ?: '--' ?>
										</td>
										<td class="am-text-middle">
											<?= $item['create_time'] ?: '--' ?>
										</td>
										<td class="am-text-middle">
											<?= $item['role_id']?>
										</td>
										<td class="am-text-middle">

											<a href="javascript:;" class="item-delete tpl-table-black-operation-del" data-id="<?= $item['store_user_id'] ?>">
												<i class="am-icon-trash"></i> 删除
											</a>
										</td>
									</tr>
									<?php endforeach; else: ?>
									<tr>
										<td colspan="8" class="am-text-center">暂无记录</td>
									</tr>
									<?php endif; ?>
								</tbody>
							</table>
						</div>
						<div class="am-u-lg-12 am-cf">
							<div class="am-fr">
								<?= $list->render() ?>
							</div>
							<div class="am-fr pagination-total am-margin-right">
								<div class="am-vertical-align-middle">总记录：
									<?= $list->total() ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>



		<div class="am-modal am-modal-no-btn" tabindex="-1" id="doc-modal-1">
			<div class="am-modal-dialog">
				<div class="am-modal-hd">新增后台用户
					<a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
				</div>
				<div class="am-modal-bd">
					<form action="" class="am-form">
						<fieldset>
							<div class="am-form-group">
								<label for="doc-vld-name">用户名：</label>
								<input type="text" id="doc-vld-name" minlength="3" placeholder="输入用户名" class="am-form-field" required/>
							</div>

							<div class="am-form-group">
								<label for="doc-select-1">角色：</label>
								<select id="doc-select-1" required style='    width: 80%;    float: left;    margin-bottom: 15px;'>
									<option value="0">普通角色</option>
									<option value="1">管理员</option>
								</select>
								<span class="am-form-caret"></span>
							</div>

							<div class="am-form-group">
								<label for="doc-vld-name">密码：</label>
								<input type="text" id="doc-vld-name" minlength="3" placeholder="输入密码" class="am-form-field" required/>
							</div>
							<div class="am-form-group">
								<label for="doc-vld-name">确认密码：</label>
								<input type="text" id="doc-vld-name" minlength="3" placeholder="输入确认密码" class="am-form-field" required/>
							</div>

							<button class="am-btn am-btn-secondary" type="submit">提交</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div>



		<div class="am-modal am-modal-no-btn" tabindex="-1" id="doc-modal-2">
			<div class="am-modal-dialog">
				<div class="am-modal-hd">普通角色权限编辑
					<a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
				</div>
				<div class="am-modal-bd">
					<form action="" class="am-form">
						<fieldset>
						
            <div class="am-form-group">
      <label class="am-checkbox-inline">
        <input type="checkbox" value="1" name="docVlCb" minchecked="2" maxchecked="4" required> 门店配置
      </label>
      <label class="am-checkbox-inline">
        <input type="checkbox" value="2" name="docVlCb"> 优惠券管理
      </label>
      <label class="am-checkbox-inline" >
        <input type="checkbox" value="3" name="docVlCb"> 报表分析
      </label>
      <label class="am-checkbox-inline" >
        <input type="checkbox" value="4" name="docVlCb"> 活动管理
      </label>
      <br>
      <label class="am-checkbox-inline" >
        <input type="checkbox" value="5" name="docVlCb"> 产品管理
      </label>
      <label class="am-checkbox-inline" >
        <input type="checkbox" value="5" name="docVlCb"> 订单管理
      </label>
    </div>

    <br>
							<button class="am-btn am-btn-secondary" type="submit">提交</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div>


	</div>
	<script>
		$(function() {

		});
	</script>