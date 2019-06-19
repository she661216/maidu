<div class="row-content am-cf">
	<div class="row">
		<div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
			<div class="widget am-cf">
				<div class="widget-head am-cf">
					<div class="widget-title am-cf">优惠券列表</div>
					<div style='    margin-top: 20px;z-index:22' class="am-u-sm-24 am-u-md-24 am-u-lg-24">
						<div class="am-form-group">
							<button type="button" class="am-btn am-btn-primary" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0, width: 600, height: 440}">
								新增优惠券
							</button>						
						</div>
					</div>
					<div class="widget-body am-fr">
						<div class="am-scrollable-horizontal am-u-sm-12">
							<table width="100%" class="am-table am-table-compact am-table-striped
                         tpl-table-black am-text-nowrap">
								<thead>
									<tr>
										<th>名称</th>
										<th>金额</th>
										<th>会员等级</th>
										<th>状态</th>
										<th>过期时间</th>
										<th>描述信息</th>
										<th>操作</th>
									</tr>
								</thead>
								<tbody>
								<?php if (!$list->isEmpty()): foreach ($list as $item): ?>
									<tr>
										<td class="am-text-middle">
											<?= $item['coupon_name'] ?: '--' ?>
										</td>
										<td class="am-text-middle">
											<?= $item['amount'] ?: '--' ?>
										</td>
										<td class="am-text-middle">
											<?= $item['level']?:'--' ?>
										</td>
										<td class="am-text-middle">
								<?= ($item['state'] == '1')?'未领取':(($item['state'] == '2')?'未使用':'已使用')?>
										</td>
										<td class="am-text-middle">
											<?= date('Y-m-s h:i:s',$item['over_time'])?:'--' ?>
										</td>
										<td class="am-text-middle">
											<?= $item['remark']?:'--' ?>
										</td>
										<td class="am-text-middle">
											<a href="javascript:;" style='display:<?= $item['state'] == '1 ' ?'inline-block ': 'none' ?>' class="item-delete tpl-table-black-operation-del" data-id="<?= $item['coupon_id'] ?>">
												<i class="am-icon-trash"></i>删除
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
				<div class="am-modal-hd">新增优惠券
					<a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
				</div>
				<div class="am-modal-bd">
					<form id='my-form1' action="/index.php?s=/store/coupon/add" class="am-form">
						<fieldset>
							<div class="am-form-group">
								<label for="doc-vld-name">名称：</label>
								<input name='data[coupon_name]' type="text" id="doc-vld-name" minlength="3" maxlength='15' placeholder="输入3-15长度名称" class="am-form-field" required/>
							</div>

						
							<div class="am-form-group">
								<label for="doc-vld-name">金额：</label>
								<input name='data[amount]' type="Number" id="doc-vld-name"  placeholder="输入金额" class="am-form-field" required/>
							</div>
							<div class="am-form-group">
								<label for="doc-vld-name">过期时间：</label>
								<input type="text" name='data[over_time]' class="am-form-field" placeholder="日历组件" data-am-datepicker readonly required />
							</div>
							<div class="am-form-group">
								<label for="doc-vld-name">描述信息：</label>
								<textarea type="te" name='data[remark]' maxlength='100' id="doc-vld-name" minlength="3"    placeholder="输入100字以内描述信息" class="am-form-field"
								 required></textarea>
							</div>
							<div class="am-form-group">
								<label for="doc-select-1">会员等级：</label>
								<select name='data[level]' id="doc-select-1" required style='    width: 80%;    float: left;    margin-bottom: 15px;'>
									<option value="白银卡">白银卡</option>
									<option value="金卡">金卡</option>
									<option value="砖石">砖石</option>
								</select>
								<span class="am-form-caret"></span>
							</div>
							<div class="am-form-group">
								<label for="doc-vld-name">发放数量：</label>
								<input name='data[number]' type="Number" id="doc-vld-name"  placeholder="发放数量" class="am-form-field" required/>
							</div>



							<button class="am-btn am-btn-secondary" type="submit">提交</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div>



	</div>
	<script>
		$(function() {

			/**
			 * 表单验证提交
			 * @type {*}
			 */
			$('#my-form1').superForm();

				// 删除元素
				var url = "<?= url('coupon/delete') ?>";
			$('.item-delete').delete('coupon_id', url);
		});
	</script>