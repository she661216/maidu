<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-cf">设置充值优惠</div>
                </div>
                <div class="widget-body am-fr">
               
                    <div class="am-u-sm-12">
                    <form id="my-form" action="/index.php?s=/store/setting.kanjia/edit"  class="am-form tpl-form-line-form" method="post">
                    <div class="widget-body">
                        <fieldset>

                        <input type="hidden" class="tpl-form-input"  name="delivery[kanjia_id]"
                                           value="2" >
                            <div class="am-form-group" style='margin-left:100px'>                         
                                <label class="am-u-sm-1" style='width:130px'>最低充值金额</label>
                                <div class="am-u-sm-3 am-u-end" style='width:150px'>
                                    <input placeholder='输入金额：5(元)' type="Number" class="tpl-form-input" maxlength='5' name="delivery[in_amount]"
                                           value="<?= $detail[0]['in_amount']?:'' ?>" required>
                                </div>
                                <label class="am-u-sm-1" style='width:40px'>送</label>
                                <div class="am-u-sm-3 am-u-end" style='width:150px'>
                                    <input class='chance' placeholder='输入金额：5(元)' type="Number" class="tpl-form-input" maxlength='3' name="delivery[fee_amount]"
                                           value="<?= $detail[0]['fee_amount']?:'' ?>" required>
                                </div>
                            </div>
      
                          

                            <div class="am-form-group">
                                <div class="am-u-sm-9 am-u-sm-push-3 am-margin-top-lg">
                                    <button  type="submit" class="j-submit am-btn am-btn-secondary">提交
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

