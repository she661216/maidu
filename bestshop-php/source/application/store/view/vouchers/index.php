<div class="row-content am-cf">
	<div class="row">
		<div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
			<div class="widget am-cf">
				<div class="widget-head am-cf">
					<div class="widget-title am-cf">礼物卡列表</div>
					<div style='    margin-top: 20px;z-index:22' class="am-u-sm-24 am-u-md-24 am-u-lg-24">
						<div class="am-form-group">
							<button type="button" class="am-btn am-btn-primary" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0, width: 600, height: 340}">
								新增礼物卡
							</button>						
						</div>
					</div>
					<div class="widget-body am-fr">
						<div class="am-scrollable-horizontal am-u-sm-12">
							<table width="100%" class="am-table am-table-compact am-table-striped
                         tpl-table-black am-text-nowrap">
								<thead>
									<tr>
										<th>序号</th>
										<th>金额(元)</th>
										<th>卡密</th>
										<th>创建时间</th>
										<th>状态</th>
										<th>描述信息</th>
										<th>操作</th>
									</tr>
								</thead>
								<tbody>
								<?php $index = 1; if (!$list->isEmpty()): foreach ($list as $item): ?>
									<tr>
										<td class="am-text-middle">
										<?php echo $index++ ?>
										</td>
										<td class="am-text-middle">
											<?= $item['amount'] ?: '--' ?>
										</td>
										<td class="am-text-middle">
											<?= $item['key']?:'--' ?>
										</td>
										<td class="am-text-middle">
											<?= $item['create_time']?:'--' ?>
										</td>
										<td class="am-text-middle">
								  <?= ($item['state'] == '1')?'正常':'已删除'?>
										</td>
										<td class="am-text-middle">
											<?= $item['remark']?:'--' ?>
										</td>
										<td class="am-text-middle">
											<a href="javascript:;"  class="item-delete tpl-table-black-operation-del" data-id="<?= $item['vouchers_id'] ?>">
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
				<div class="am-modal-hd">新增礼物卡
					<a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
				</div>
				<div class="am-modal-bd">
					<form id='my-form1' action="/index.php?s=/store/vouchers/add" class="am-form">
						<fieldset>
							<div class="am-form-group">
								<label for="doc-vld-name">金额：</label>
								<input name='data[amount]' type="Number" id="doc-vld-name"  placeholder="输入金额" class="am-form-field" required/>
							</div>
							<div class="am-form-group">
								<label for="doc-vld-name">描述信息：</label>
								<textarea type="te" name='data[remark]' maxlength='100' id="doc-vld-name" minlength="3"    placeholder="输入100字以内描述信息" class="am-form-field"
								 required></textarea>
							</div>
							<div class="am-form-group">
								<label for="doc-vld-name">发放数量：</label>
								<input name='data[number]' type="Number" id="doc-vld-name" maxlength="2" placeholder="每次最多发放99张" class="am-form-field" required/>
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
				var url = "<?= url('vouchers/delete') ?>";
			$('.item-delete').delete('vouchers_id', url);
		});
	</script>