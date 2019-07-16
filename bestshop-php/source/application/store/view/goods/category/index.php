<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-cf">商品分类</div>
                </div>
                <div class="widget-body am-fr">
                    <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                        <div class="am-form-group">
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                    <div class="am-btn am-btn-default am-btn-success am-radius"
                                       >
                                        <span class="am-icon-plus"></span> 同步商品分类
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="am-u-sm-12">
                        <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black ">
                            <thead>
                            <tr>
                                <th>序号</th>
                                <th>分类ID</th>
                                <th>分类名称</th>
                                <th>同步时间</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (!empty($list)): foreach ($list as $k => $first):  ?>
                                <tr>
                                    <td class="am-text-middle"><?= $k ?></td>
                                    <td class="am-text-middle"><?= $first['uid'] ?></td>
                                    <td class="am-text-middle"><?= $first['name'] ?></td>
                                    <td class="am-text-middle"><?= $first['create_time'] ?></td>
                                </tr>                            
                            <?php endforeach; else: ?>
                                <tr>
                                    <td colspan="5" class="am-text-center">暂无记录</td>
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
        
        var url = "<?= url('goods.category/add') ?>";

        $('.am-btn-default').click(function () {
                var param = {};
                layer.confirm('确定要同步吗？', function (index) {
                    $.post(url, {}, function (result) {
                        result.code === 1 ? $.show_success(result.msg, result.url)
                            : $.show_error(result.msg);
                    });
                    layer.close(index);
                });
            });
    });
</script>

