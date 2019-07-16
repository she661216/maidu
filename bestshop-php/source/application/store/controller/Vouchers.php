<?php

namespace app\store\controller;

use app\common\model\Vouchers as VouchersModel;

/**
 * 优惠券管理
 * Class Voucherss
 * @package app\store\controller
 */
class Vouchers extends Controller
{
   
    public function index()
    {
         $model = new VouchersModel;
         $list = $model->getList();
         return $this->fetch('index', compact('list'));

    }
    public function add()
    {
        $model = new VouchersModel;
        $data = $this->postData('data');
        if($model->add_vouchers($data)){
            return $this->renderSuccess('添加成功');
        }else{
            return $this->renderError('添加失败');
        }
    }

    public function delete($vouchers_id)
    {
        if(!$vouchers_id){
            return $this->renderError('兑换券id有误');
        }
        $model = VouchersModel::get($vouchers_id);
        if (!$model->remove()) {
            return $this->renderError('删除失败');
        }
        return $this->renderSuccess('删除成功');
    }


}
