<?php

namespace app\store\controller\goods;

use app\store\controller\Controller;
use app\store\model\Category as CategoryModel;

/**
 * 商品分类
 * Class Category
 * @package app\store\controller\goods
 */
class Category extends Controller
{
    /**
     * 商品分类列表
     * @return mixed
     */
    public function index()
    {
     
        $model = new CategoryModel;
        $list = $model->getlist();
        return $this->fetch('index', compact('list'));
    }

    /**
     * 删除商品分类
     * @param $category_id
     * @return array
     * @throws \think\exception\DbException
     */
    public function delete($category_id)
    {
        $model = CategoryModel::get($category_id);
        if (!$model->remove($category_id)) {
            $error = $model->getError() ?: '删除失败';
            return $this->renderError($error);
        }
        return $this->renderSuccess('删除成功');
    }

    /**
     * 同步商品分类
     * @return array|mixed
     */
    public function add()
    {

        $data = array('appId'=>'D623576AFE673FC7F01AD2A651741F90');
        $res =  doRequest('https://area11-win.pospal.cn:443/pospal-api2/openapi/v1/productOpenApi/queryProductCategoryPages',$data,'103040383648534894');

        $result = json_decode($res);
        $list = $result->data->result;

        if(!empty($list)){
            $model = new CategoryModel;
   
            // 新增记录
            if ($model->add_all($list)) {
                return $this->renderSuccess('同步成功', url('goods.category/index'));
            }
            $error = $model->getError() ?: '同步失败';
            return $this->renderError($error);
        }
   
    }

    /**
     * 编辑配送模板
     * @param $category_id
     * @return array|mixed
     * @throws \think\exception\DbException
     */
    public function edit($category_id)
    {
        // 模板详情
        $model = CategoryModel::get($category_id, ['image']);
        if (!$this->request->isAjax()) {
            // 获取所有地区
            $list = $model->getCacheTree();
            return $this->fetch('edit', compact('model', 'list'));
        }
        // 更新记录
        if ($model->edit($this->postData('category'))) {
            return $this->renderSuccess('更新成功', url('goods.category/index'));
        }
        $error = $model->getError() ?: '更新失败';
        return $this->renderError($error);
    }

}
