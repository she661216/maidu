<?php

namespace app\store\controller\setting;
use app\store\model\Kanjia as KanjiaModel;
use app\store\controller\Controller;
/**
 * 清理缓存
 * Class Index
 * @package app\store\controller
 */
class Kanjia extends Controller
{
    public function index()
    {
        $model = new KanjiaModel;
        $detail = $model->getDetail(1);
        return $this->fetch('index', compact('detail'));
    }
    public function recharge()
    {
        $model = new KanjiaModel;
        $detail = $model->getDetail(2);
        return $this->fetch('recharge', compact('detail'));
    }
    public function edit()
    {
        // 模板详情
         $model =new KanjiaModel;
         $data = $this->postData('delivery');
     
        if ($model->edit($data)) {
            if($data['kanjia_id']==1){
                return $this->renderSuccess('设置成功', url('setting.kanjia/index'));
            }else{
                return $this->renderSuccess('设置成功', url('setting.kanjia/recharge'));
            }
            
        }
        $error = $model->getError() ?: '设置失败';
        return $this->renderError($error);
    }


}
