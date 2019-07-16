<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-cf">用户列表</div>
                </div>
                <div class="widget-body am-fr">
                    <div class="am-scrollable-horizontal am-u-sm-12">
                        <table width="100%" class="am-table am-table-compact am-table-striped
                         tpl-table-black am-text-nowrap">
                            <thead>
                            <tr>
                                <th>用户ID</th>
                                <th>微信头像</th>
                                <th>微信昵称</th>
                                <th>地址</th>
                                <th>余额（元）</th>
                                <th>积分</th>
                                <th>状态</th>
                                <th>注册时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (!$list->isEmpty()): foreach ($list as $item): ?>
                                <tr>
                                    <td class="am-text-middle"><?= $item['user_id'] ?></td>
                                    <td class="am-text-middle">
                                        <a href="<?= $item['avatarUrl'] ?>" title="点击查看大图" target="_blank">
                                            <img src="<?= $item['avatarUrl'] ?>" width="72" height="72" alt="">
                                        </a>
                                    </td>
                                    <td class="am-text-middle"><?= $item['nickName'] ?></td>
                             
                                    <td class="am-text-middle"><?= $item['province'].'-'.$item['city'] ?: '--' ?></td>
                                    <td class="am-text-middle"><?= $item['amount'] ?></td>
                                    <td class="am-text-middle"><?= $item['score'] ?></td>
                                    <td class="am-text-middle">	  <?= ($item['state'] == '1')?'正常':'停用'?></td>
                                    <td class="am-text-middle"><?= $item['create_time'] ?></td>
                                    <td class="am-text-middle">
									<a href="javascript:;"  class="item-delete tpl-table-black-operation-del" data-state="<?= $item['state']==1?2:1 ?>" data-id="<?= $item['user_id'] ?>">
								     	<i class="am-icon-trash"></i> <?= ($item['state'] == '1')?'停用':'启用'?>
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
                        <div class="am-fr"><?= $list->render() ?> </div>
                        <div class="am-fr pagination-total am-margin-right">
                            <div class="am-vertical-align-middle">总记录：<?= $list->total() ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
	// 停用、启用元素
    var url = "<?= url('user/update') ?>";
            
            $('.item-delete').click(function () {
                var param = {};
                param['user_id'] = $(this).attr('data-id');
                param['state'] = $(this).attr('data-state');
                layer.confirm('确定要停用/启用吗？', function (index) {
                    $.post(url, param, function (result) {
                        result.code === 1 ? $.show_success(result.msg, result.url)
                            : $.show_error(result.msg);
                    });
                    layer.close(index);
                });
            });

    });
</script>

