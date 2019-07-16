<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-cf">设置砍价金额和概率</div>
                </div>
                <div class="widget-body am-fr">
               
                    <div class="am-u-sm-12">
                    <div class="widget-title am-cf" style='margin-bottom:20px;'>配置规则提示：所配置的概率总和必须为100%</div>
                    <form id="my-form" action="/index.php?s=/store/setting.kanjia/edit"  class="am-form tpl-form-line-form" method="post">
                    <div class="widget-body">
                        <fieldset>

                        <input type="hidden" class="tpl-form-input"  name="delivery[kanjia_id]"
                                           value="1" >
                            <div class="am-form-group">                         
                                <label class="am-u-sm-2 form-require">选项一</label>
                                <div class="am-u-sm-3 am-u-end">
                                    <input placeholder='输入金额：5(元)' type="Number" class="tpl-form-input" maxlength='5' name="delivery[amount1]"
                                           value="<?= $detail[0]['amount1']?:'' ?>" required>
                                </div>
                                <div class="am-u-sm-3 am-u-end">
                                    <input class='chance' placeholder='输入概率：10(%)' type="Number" class="tpl-form-input" maxlength='3' name="delivery[chance1]"
                                           value="<?= $detail[0]['chance1']?:'' ?>" required>
                                </div>
                            </div>
      
                            <div class="am-form-group">                         
                            <label class="am-u-sm-2 ">选项二</label>
                            <div class="am-u-sm-3 am-u-end">
                                    <input placeholder='输入金额：5(元)' type="Number" class="tpl-form-input" maxlength='5' name="delivery[amount2]"
                                           value="<?= $detail[0]['amount2']?:'' ?>" >
                                </div>
                                <div class="am-u-sm-3 am-u-end">
                                    <input class='chance' placeholder='输入概率：10(%)' type="Number" class="tpl-form-input" maxlength='2' name="delivery[chance2]"
                                           value="<?= $detail[0]['chance2']?:'' ?>" >
                                </div>
                            </div>

                            <div class="am-form-group">                         
                            <label class="am-u-sm-2 ">选项三</label>
                            <div class="am-u-sm-3 am-u-end">
                                    <input placeholder='输入金额：5(元)' type="Number" class="tpl-form-input" maxlength='5' name="delivery[amount3]"
                                           value="<?= $detail[0]['amount3']?:'' ?>" >
                                </div>
                                <div class="am-u-sm-3 am-u-end">
                                    <input class='chance' placeholder='输入概率：10(%)' type="Number" class="tpl-form-input" maxlength='2' name="delivery[chance3]"
                                           value="<?= $detail[0]['chance3']?:'' ?>" >
                                </div>
                            </div>


                            <div class="am-form-group">                         
                            <label class="am-u-sm-2 ">选项四</label>
                            <div class="am-u-sm-3 am-u-end">
                                    <input placeholder='输入金额：5(元)' type="Number" class="tpl-form-input" maxlength='5' name="delivery[amount4]"
                                           value="<?= $detail[0]['amount4']?:'' ?>" >
                                </div>
                                <div class="am-u-sm-3 am-u-end">
                                    <input class='chance' placeholder='输入概率：10(%)' type="Number" class="tpl-form-input" maxlength='2' name="delivery[chance4]"
                                           value="<?= $detail[0]['chance4']?:'' ?>" >
                                </div>
                            </div>


                            <div class="am-form-group">                         
                            <label class="am-u-sm-3 ">选项五</label>
                            <div class="am-u-sm-3 am-u-end">
                                    <input placeholder='输入金额：5(元)' type="Number" class="tpl-form-input" maxlength='5' name="delivery[amount5]"
                                           value="<?= $detail[0]['amount5']?:'' ?>" >
                                </div>
                                <div class="am-u-sm-3 am-u-end">
                                    <input class='chance' placeholder='输入概率：10(%)' type="Number" class="tpl-form-input" maxlength='2' name="delivery[chance5]"
                                           value="<?= $detail[0]['chance5']?:'' ?>" >
                                </div>
                            </div>

                            <div class="am-form-group">
                                <div class="am-u-sm-9 am-u-sm-push-3 am-margin-top-lg">
                                    <button id='submit' type="button" class="j-submit am-btn am-btn-secondary">提交
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
         $("#submit").click(function(){

             var sum = 0;
         $(".chance").each(function(){
             if($(this).val()){
                sum = sum +  parseInt($(this).val())
             }
         })
            if(sum == 100){
            $('#my-form').submit();
         }else{
            layer.msg('概率总和必须为100');
         }
    
         })
        
      

    });
</script>

