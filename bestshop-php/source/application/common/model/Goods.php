<?php

namespace app\common\model;

use think\Request;

/**
 * 商品模型
 * Class Goods
 * @package app\common\model
 */
class Goods extends BaseModel
{
    protected $name = 'goods';
    protected $append = ['goods_sales'];


         /**
     *同步商品分类
     * @return mixed
     */
    public  function add_all($list)
    {
        $w = self::$wxapp_id;
        $all = array();
        $obj = array();
        if(!empty($list)){
      
            foreach ($list as $v){
                if(property_exists($v, 'attribute4')){
                    $obj['attribute4'] = $v->attribute4;
                }
           
                if(property_exists($v, 'attribute3')){
                    $obj['attribute3'] = $v->attribute3;
                }
                if(property_exists($v, 'attribute2')){
                    $obj['attribute2'] = $v->attribute2;
                }
                if(property_exists($v, 'attribute1')){
                    $obj['attribute1'] = $v->attribute1;
                }
           
                $obj['stock'] = $v->stock;
                $obj['pinyin'] = $v->pinyin;
                $obj['customerPrice'] = $v->customerPrice ;
                $obj['description'] = $v->description ;
                $obj['isCustomerDiscount'] = $v->isCustomerDiscount;
                $obj['uid'] = $v->uid ;
                $obj['categoryUid'] = $v->categoryUid;
                $obj['name'] = $v->name;
                $obj['barcode'] = $v->barcode ;
                $obj['buyPrice'] = $v->buyPrice ;
                $obj['sellPrice'] = $v->sellPrice;
                $obj['sellPrice'] = $v->sellPrice;
                $obj['wxapp_id'] = $w;
        
                array_push($all,$obj);
            }
   
        $rest =    $this->where('goods_id>=1')->delete();
               $res =  $this->saveAll($all);
               return $res;
        }
    }



    /**
     * 计算显示销量 (初始销量 + 实际销量)
     * @param $value
     * @param $data
     * @return mixed
     */
    public function getGoodsSalesAttr($value, $data)
    {
        return $data['sales_initial'] + $data['sales_actual'];
    }

    /**
     * 关联商品分类表
     * @return \think\model\relation\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('Category');
    }

    /**
     * 关联商品规格表
     * @return \think\model\relation\HasMany
     */
    public function spec()
    {
        return $this->hasMany('GoodsSpec');
    }

    /**
     * 关联商品规格关系表
     * @return \think\model\relation\BelongsToMany
     */
    public function specRel()
    {
        return $this->belongsToMany('SpecValue', 'GoodsSpecRel');
    }

    /**
     * 关联商品图片表
     * @return \think\model\relation\HasMany
     */
    public function image()
    {
        return $this->hasMany('GoodsImage')->order(['id' => 'asc']);
    }

    /**
     * 关联运费模板表
     * @return \think\model\relation\BelongsTo
     */
    public function delivery()
    {
        return $this->BelongsTo('Delivery');
    }

    /**
     * 计费方式
     * @param $value
     * @return mixed
     */
    public function getGoodsStatusAttr($value)
    {
        $status = [10 => '上架', 20 => '下架'];
        return ['text' => $status[$value], 'value' => $value];
    }

    /**
     * 获取规格信息
     * @param \think\Collection $spec_rel
     * @param \think\Collection $skuData
     * @return array
     */
    public function getManySpecData($spec_rel, $skuData)
    {
        // spec_attr
        $specAttrData = [];
        foreach ($spec_rel->toArray() as $item) {
            if (!isset($specAttrData[$item['spec_id']])) {
                $specAttrData[$item['spec_id']] = [
                    'group_id' => $item['spec']['spec_id'],
                    'group_name' => $item['spec']['spec_name'],
                    'spec_items' => [],
                ];
            }
            $specAttrData[$item['spec_id']]['spec_items'][] = [
                'item_id' => $item['spec_value_id'],
                'spec_value' => $item['spec_value'],
            ];
        }

        // spec_list
        $specListData = [];
        foreach ($skuData->toArray() as $item) {
            $specListData[] = [
                'goods_spec_id' => $item['goods_spec_id'],
                'spec_sku_id' => $item['spec_sku_id'],
                'rows' => [],
                'form' => [
                    'goods_no' => $item['goods_no'],
                    'goods_price' => $item['goods_price'],
                    'goods_weight' => $item['goods_weight'],
                    'line_price' => $item['line_price'],
                    'stock_num' => $item['stock_num'],
                ],
            ];
        }
        return ['spec_attr' => array_values($specAttrData), 'spec_list' => $specListData];
    }

    /**
     * 获取商品列表
     * @param int $status
     * @param int $category_id
     * @param string $search
     * @param string $sortType
     * @param bool $sortPrice
     * @return \think\Paginator
     * @throws \think\exception\DbException
     */
    public function getList($status = null, $category_id = 0, $search = '', $sortType = 'all', $sortPrice = false)
    {
     
        // 执行查询
        $list = $this->paginate(15, false, [
                'query' => Request::instance()->request()
            ]);
        return $list;
    }

    /**
     * 获取商品详情
     * @param $goods_id
     * @return null|static
     * @throws \think\exception\DbException
     */
    public static function detail($goods_id)
    {
        return self::get($goods_id, ['category', 'image.file', 'spec', 'spec_rel.spec', 'delivery.rule']);
    }

    /**
     * 猜您喜欢 (临时方法以后作废)
     * @return false|\PDOStatement|string|\think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getBestList()
    {
        return $this->with(['spec', 'category', 'image.file'])
            ->where('is_delete', '=', 0)
            ->where('goods_status', '=', 10)
            ->order(['sales_initial' => 'desc', 'goods_sort' => 'asc'])
            ->limit(10)
            ->select();
    }

    /**
     * 新品推荐 (临时方法以后作废)
     * @return false|\PDOStatement|string|\think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getNewList()
    {
        return $this->with(['spec', 'category', 'image.file'])
            ->where('is_delete', '=', 0)
            ->where('goods_status', '=', 10)
            ->order(['goods_id' => 'desc', 'goods_sort' => 'asc'])
            ->select();
    }

    /**
     * 商品多规格信息
     * @param $goods_sku_id
     * @return array|bool
     */
    public function getGoodsSku($goods_sku_id)
    {
        $goodsSkuData = array_column($this['spec']->toArray(), null, 'spec_sku_id');
        if (!isset($goodsSkuData[$goods_sku_id])) {
            return false;
        }
        $goods_sku = $goodsSkuData[$goods_sku_id];
        // 多规格文字内容
        $goods_sku['goods_attr'] = '';
        if ($this['spec_type'] == 20) {
            $attrs = explode('_', $goods_sku['spec_sku_id']);
            $spec_rel = array_column($this['spec_rel']->toArray(), null, 'spec_value_id');
            foreach ($attrs as $specValueId) {
                $goods_sku['goods_attr'] .= $spec_rel[$specValueId]['spec']['spec_name'] . ':'
                    . $spec_rel[$specValueId]['spec_value'] . '; ';
            }
        }
        return $goods_sku;
    }

}
