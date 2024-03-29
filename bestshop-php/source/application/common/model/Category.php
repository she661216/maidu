<?php

namespace app\common\model;
use think\Request;
use think\Cache;

/**
 * 商品分类模型
 * Class Category
 * @package app\common\model
 */
class Category extends BaseModel
{
    protected $name = 'category';

    /**
     * 分类图片
     * @return \think\model\relation\HasOne
     */
    public function image()
    {
        return $this->hasOne('uploadFile', 'file_id', 'image_id');
    }

    /**
     * 所有分类
     * @return mixed
     */
    public static function getALL()
    {
        $model = new static;
        if (!Cache::get('category_' . $model::$wxapp_id)) {
            $data = $model->with(['image'])->order(['sort' => 'asc'])->select();
            $all = !empty($data) ? $data->toArray() : [];
            $tree = [];
            foreach ($all as $first) {
                if ($first['parent_id'] != 0) continue;
                $twoTree = [];
                foreach ($all as $two) {
                    if ($two['parent_id'] != $first['category_id']) continue;
                    $threeTree = [];
                    foreach ($all as $three)
                        $three['parent_id'] == $two['category_id']
                        && $threeTree[$three['category_id']] = $three;
                    !empty($threeTree) && $two['child'] = $threeTree;
                    $twoTree[$two['category_id']] = $two;
                }
                if (!empty($twoTree)) {//需要修改，显示的是2级子菜单
                    array_multisort(array_column($twoTree, 'sort'), SORT_ASC, $twoTree);
                    $first['child'] = $twoTree;
                }
                $tree[$first['category_id']] = $first;
            }
            Cache::set('category_' . $model::$wxapp_id, compact('all', 'tree'));
        }
        return Cache::get('category_' . $model::$wxapp_id);
    }

    /**
     * 获取所有分类
     * @return mixed
     */
    public static function getCacheAll()
    {
        return self::getALL()['all'];
    }

    /**
     * 获取所有分类(树状结构)
     * @return mixed
     */
    public static function getCacheTree()
    {
        return self::getALL()['tree'];
    }

    /**
     * 获取所有分类
     * @return mixed
     */
    public function getlist()
    {
        $list = $this->paginate(15, false, [
            'query' => Request::instance()->request()
        ]);
        return $list;
    }


     /**
     *同步商品分类
     * @return mixed
     */
    public  function add_all($list)
    {
        $w = self::$wxapp_id;
        $all = array();
        if(!empty($list)){

            foreach ($list as $v){

                $obj['uid'] = $v->uid;
                $obj['parent_id'] = $v->parentUid;
                $obj['name'] =$v->name;
                $obj['wxapp_id'] = $w;
                array_push($all,$obj);
            }
   
   
        $rest =    $this->where('category_id>=1')->delete();
               $res =  $this->saveAll($all);
               return $res;
        }
    }


}
