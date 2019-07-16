<div class="row-content am-cf">

	<div class="row">
		<div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
			<div class="widget am-cf">
				<div class="widget-head am-cf">
					<div class="widget-title am-cf">秒杀活动列表</div>
					<div style='    margin-top: 20px;z-index:22' class="am-u-sm-24 am-u-md-24 am-u-lg-24">
						<div class="am-form-group">
							<button type="button" class="am-btn am-btn-primary" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0, width: 600, height: 740}">
								新增秒杀活动
							</button>
						</div>
					</div>
					<div class="widget-body am-fr">
						<div class="am-scrollable-horizontal am-u-sm-12">
							<table width="100%" class="am-table am-table-compact am-table-striped
                         tpl-table-black am-text-nowrap">
								<thead>
									<tr>
										<th>活动名称</th>
										<th>商品名称</th>
										<th>库存</th>
										<th>描述信息</th>
										<th>创建时间</th>
										<th>状态</th>
										<th>操作</th>
									</tr>
								</thead>
								<tbody>
									<?php if (!$list->isEmpty()): foreach ($list as $item): ?>
									<tr>
										<td class="am-text-middle">
											<?= $item['games_name'] ?: '--' ?>
										</td>
										<td class="am-text-middle">
											<?= $item['goods_name'] ?: '--' ?>
										</td>
										<td class="am-text-middle">
											<?= $item['num']?:'--' ?>
										</td>

										<td class="am-text-middle">
											<?= $item['remark']?:'--' ?>
										</td>
										<td class="am-text-middle">
										<?= $item['create_time'] ?: '--' ?>
										</td>
										<td class="am-text-middle">
										<?= $item['state']==1 ?'已上架': '已下架' ?>
										</td>
										<td class="am-text-middle">
										<a href="javascript:;"  class="item-update tpl-table-black-operation-del"
											 data-state="<?= $item['state']==1?2:1 ?>" data-id="<?= $item['game_id'] ?>">
												<i class="am-icon-trash"></i><?= ($item['state'] == '1')?'下架':'上架'?>
											
											</a>
											<a href="javascript:;"  class="item-delete tpl-table-black-operation-del" data-id="<?= $item['game_id'] ?>">
												<i class="am-icon-trash">删除</i>
											
											</a>
											<!-- <a data-am-modal="{target: '#doc-modal-2', closeViaDimmer: 0, width: 600, height: 440}" href="javascript:;" style='display:<?= $item['state'] == '1 ' ?'inline-block ': 'none
											 ' ?>' class="item-edit tpl-table-black-operation-del" data-id="<?= $item['game_id'] ?>">
												<i class="am-icon-edit"></i>编辑										
											</a> -->
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
				<div class="am-modal-hd">新增秒杀活动
					<a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
				</div>
				<div class="am-modal-bd">
					<form id='my-form1' action="/index.php?s=/store/games.games_ms/add" class="am-form">
						<fieldset>
							<div class="am-form-group">
								<label for="doc-vld-name">活动名称：</label>
								<input name='data[games_name]' type="text" id="doc-vld-name" minlength="3" maxlength='15' placeholder="输入3-15长度名称" class="am-form-field"
								 required/>
							</div>


							<div class="am-form-group">
								<label for="doc-vld-name">库存：</label>
								<input name='data[num]' type="Number" id="doc-vld-name" placeholder="输入金额" class="am-form-field" required/>
							</div>
							<div class="am-form-group">
								<label for="doc-vld-name">描述信息：</label>
								<textarea type="te" name='data[remark]' maxlength='100' id="doc-vld-name" minlength="3" placeholder="输入100字以内描述信息" class="am-form-field"
								 required></textarea>
							</div>
							<div class="am-form-group">
							<input name='data[goods_name]' type="hidden" id='goods_name' value="<?= $goods_list[0]['name'] ?>" class="am-form-field" required/>
								<label for="doc-select-1">选择商品：</label>
								<select name='data[goods_id]'  id="doc-goods_name" required style='    width: 80%;    float: left;    margin-bottom: 15px;'>
								<?php foreach ($goods_list as $item): ?>
									<option value="<?= $item['goods_id'] ?>"><?= $item['name'] ?></option>
                              <?php endforeach; ?>
								</select>
								<span class="am-form-caret"></span>
							</div>

							<div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label">详情编辑： </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <!-- 加载编辑器的容器 -->
                                    <textarea style='width:466px;height:300px;' id="container" name="data[detail]" type="text/plain"></textarea>
                                </div>
							</div>



							<button style='margin-top:15px' class="am-btn am-btn-secondary" type="submit">提交</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div>





	</div>

</div>
<link rel="stylesheet" href="assets/store/plugins/umeditor/themes/default/css/umeditor.css">
<script src="assets/store/plugins/umeditor/umeditor.config.js"></script>
<script src="assets/store/plugins/umeditor/umeditor.min.js"></script>
	<script>



		$(function() {

		        // 富文本编辑器
				UM.getEditor('container');

	//选择商品
	$("#doc-goods_name").on('change',function(){
            var kinds=$("#doc-goods_name option:selected").text();
			$("#goods_name").val(kinds)
			})

					/**
			 * 表单验证提交
			 * @type {*}
			 */
			$('#my-form1').superForm();

			// 删除元素
	var url1 = "<?= url('games.games_ms/delete') ?>";
			$('.item-delete').delete('game_id', url1);


	var url = "<?= url('games.games_ms/update') ?>";
            $('.item-update').click(function () {
                var param = {};
                param['game_id'] = $(this).attr('data-id');
                param['state'] = $(this).attr('data-state');
                layer.confirm('确定要上架/下架吗？', function (index) {
                    $.post(url, param, function (result) {
                        result.code === 1 ? $.show_success(result.msg, result.url)
                            : $.show_error(result.msg);
                    });
                    layer.close(index);
                });
            });



		});
	</script>