<?php

namespace app\store\controller;

use app\store\model\Category;
use app\store\model\Delivery;
use app\store\model\Goods as GoodsModel;

/**
 * 商品管理控制器
 * Class Goods
 * @package app\store\controller
 */
class Goods extends Controller
{
    /**
     * 商品列表(出售中)
     * @return mixed
     * @throws \think\exception\DbException
     */
    public function index()
    {
        $model = new GoodsModel;
        $list = $model->getList();
        return $this->fetch('index', compact('list'));
    }

    /**
     * 添加商品
     * @return array|mixed
     */
    public function add()
    {  
        $data = array('appId'=>'D623576AFE673FC7F01AD2A651741F90');
        $res =  doRequest('https://area11-win.pospal.cn:443/pospal-api2/openapi/v1/productOpenApi/queryProductPages',$data,'103040383648534894');

        $result = json_decode($res);
        $list = $result->data->result;
        $postBackParameter = $result->data->postBackParameter;
       
        if($result->data->pageSize >= 100){
            $data['postBackParameter'] =  array('parameterType'=>$postBackParameter->parameterType,'parameterValue'=>$postBackParameter->parameterValue);
            $res2 =  doRequest('https://area11-win.pospal.cn:443/pospal-api2/openapi/v1/productOpenApi/queryProductPages',$data,'103040383648534894');
            $result2 = json_decode($res2);
            $list2 = $result2->data->result;
        }
  
         $list =   array_merge($list,$list2);

        if(!empty($list)){
            $model = new GoodsModel;
   
            // 新增记录
            if ($model->add_all($list)) {
                return $this->renderSuccess('同步成功', url('goods/index'));
            }
            $error = $model->getError() ?: '同步失败';
            return $this->renderError($error);
        }
    }

    /**
     * 删除商品
     * @param $goods_id
     * @return array
     * @throws \think\exception\DbException
     */
    public function delete($goods_id)
    {
        $model = GoodsModel::get($goods_id);
        if (!$model->remove()) {
            return $this->renderError('删除失败');
        }
        return $this->renderSuccess('删除成功');
    }

    /**
     * 商品编辑
     * @param $goods_id
     * @return array|mixed
     * @throws \think\exception\DbException
     */
    public function edit($goods_id)
    {
        // 商品详情
        $model = GoodsModel::detail($goods_id);
        if (!$this->request->isAjax()) {
            // 商品分类
            $catgory = Category::getCacheTree();
            // 配送模板
            $delivery = Delivery::getAll();
            // 多规格信息
            $specData = 'null';
            if ($model['spec_type'] == 20)
                $specData = json_encode($model->getManySpecData($model['spec_rel'], $model['spec']));
            return $this->fetch('edit', compact('model', 'catgory', 'delivery', 'specData'));
        }
        // 更新记录
        if ($model->edit($this->postData('goods'))) {
            return $this->renderSuccess('更新成功', url('goods/index'));
        }
        $error = $model->getError() ?: '更新失败';
        return $this->renderError($error);
    }

}
