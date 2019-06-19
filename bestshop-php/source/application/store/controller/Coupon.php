<?php

namespace app\store\controller;

use app\common\model\Coupon as CouponModel;

/**
 * 优惠券管理
 * Class Coupon
 * @package app\store\controller
 */
class Coupon extends Controller
{
   
    public function index()
    {
         $model = new CouponModel;
         $list = $model->getList();
         return $this->fetch('index', compact('list'));

    }
    public function add()
    {
        $model = new CouponModel;
        $data = $this->postData('data');
        if($model->add_coupon($data)){
            return $this->renderSuccess('添加成功');
        }else{
            return $this->renderError('添加失败');
        }
    }

    public function delete($coupon_id)
    {
        if(!$coupon_id){
            return $this->renderError('优惠券id有误');
        }
        $model = CouponModel::get($coupon_id);
        if (!$model->remove()) {
            return $this->renderError('删除失败');
        }
        return $this->renderSuccess('删除成功');
    }


}
