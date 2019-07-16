<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-cf">设置运费模板</div>
                </div>
                <div class="widget-body am-fr">
               
                    <div class="am-u-sm-12">
                    <form id="my-form" action="/index.php?s=/store/setting.delivery/edit"  class="am-form tpl-form-line-form" method="post">
                    <div class="widget-body">
                        <fieldset>

                        <input type="hidden" class="tpl-form-input"  name="delivery[delivery_id]"
                                           value="1" >
                            <div class="am-form-group">
                         
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">模版名称</label>
                                <div class="am-u-sm-9 am-u-end">
                                    <input type="text" class="tpl-form-input" maxlength='15' name="delivery[name]"
                                           value="<?= $detail[0]['name'] ?>" required>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">运费</label>
                                <div class="am-u-sm-9 am-u-end">
                                    <input type="Number" class="tpl-form-input" name="delivery[first_fee]"
                                           value="<?= $detail[0]['first_fee'] ?>" required>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label">满多少免运费</label>
                                <div class="am-u-sm-9 am-u-end">
                                    <input type="Number" class="tpl-form-input" name="delivery[amount]"
                                           value="<?= $detail[0]['amount'] ?>" >
                                </div>
                            </div>
                            <div class="am-form-group">
                                <div class="am-u-sm-9 am-u-sm-push-3 am-margin-top-lg">
                                    <button type="submit" class="j-submit am-btn am-btn-secondary">提交
                                    </button>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
 /**
         * 表单验证提交
         * @type {*}
         */
        $('#my-form').superForm();
      

    });
</script>

