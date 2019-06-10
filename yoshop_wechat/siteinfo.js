/**
 * 配置文件
 */
module.exports = {
  name: "萤火小程序商城",
  siteroot: "http://localhost/", // 必填: api地址，结尾要带/
};

//接口汇总

//s=/api/wxapp/base&wxapp_id=10001&token=79cf095397029e3ed9e695e030f63b3d.获取小程序的navbar配置
//s=/api/index/page&wxapp_id=10001&token=79cf095397029e3ed9e695e030f63b3d.获取首页的产品、轮播图内容

//s=/api/category/lists&wxapp_id=10001&token=79cf095397029e3ed9e695e030f63b3d.获取分类的列表，子级的产品
//s=/api/goods/detail&wxapp_id=10001&token=79cf095397029e3ed9e695e030f63b3d&goods_id=1.获取产品的详情内容

//s=/api/cart/add。加入购物车
//s=/api/order/buyNow&wxapp_id=10001&token=79cf095397029e3ed9e695e030f63b3d&goods_id=1&goods_num=3&goods_sku_id=。立即购买页面的产品信息
//s=/api/cart/lists&wxapp_id=10001&token=79cf095397029e3ed9e695e030f63b3d。购物车列表

//s=/api/address/lists&wxapp_id=10001&token=79cf095397029e3ed9e695e030f63b3d。获取收货地址列表
//s=/api/address/detail&wxapp_id=10001&token=79cf095397029e3ed9e695e030f63b3d&address_id=1.收货地址详情
//?s=/api/address/edit 。收货地址编辑

//s=/api/order/buyNow。提交订单
//s=/api/user.order/lists&wxapp_id=10001&token=79cf095397029e3ed9e695e030f63b3d&dataType=payment。获取订单列表
//?s=/api/user.order/cancel 取消订单
//s=/api/user.order/pay  //付款


