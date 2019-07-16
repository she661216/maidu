<?php

namespace app\common\model;

/**
 * 配送模板区域及运费模型
 * Class DeliveryRule
 * @package app\store\model
 */
class DeliveryRule extends BaseModel
{
    protected $name = 'delivery_rule';
    protected $updateTime = false;
    public static function detail($delivery_id)
    {
        return self::get($delivery_id, ['rule']);
    }
    public function edit($data) {
        if (empty($data['first_fee']) || empty($data['name'])) {
            $this->error = '参数错误';
            return false;
        }
        if ($this->where(['delivery_id'=>$data['delivery_id']])->update($data)) {
            return true;
        }
        return false;
    }
    public function getDetail() {
        
        return $this->where(['delivery_id'=>1])->select();
        
    }
}
