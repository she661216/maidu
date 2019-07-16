<?php
/**
 * 后台菜单配置
 *    'home' => [
 *       'name' => '首页',                // 菜单名称
 *       'icon' => 'icon-home',          // 图标 (class)
 *       'index' => 'index/index',         // 链接
 *     ],
 */
return [
    'index' => [
        'name' => '首页',
        'icon' => 'icon-home',
        'index' => 'index/index',
    ],
    'goods' => [
        'name' => '商品管理',
        'icon' => 'icon-goods',
        'index' => 'goods/index',
        'submenu' => [
            [
                'name' => '商品列表',
                'index' => 'goods/index',
                'uris' => [
                    'goods/index',
                    'goods/add',
                    'goods/edit'
                ],
            ],
            [
                'name' => '商品分类',
                'index' => 'goods.category/index',
                'uris' => [
                    'goods.category/index',
                    'goods.category/add',
                    'goods.category/edit',
                ],
            ]
        ],
    ],
    'order' => [
        'name' => '订单管理',
        'icon' => 'icon-order',
        'index' => 'order/delivery_list',
        'submenu' => [
            [
                'name' => '待发货',
                'index' => 'order/delivery_list',
            ],
            [
                'name' => '待收货',
                'index' => 'order/receipt_list',
            ],
            [
                'name' => '待付款',
                'index' => 'order/pay_list',
            ],
            [
                'name' => '已完成',
                'index' => 'order/complete_list',

            ],
            [
                'name' => '已取消',
                'index' => 'order/cancel_list',
            ],
            [
                'name' => '全部订单',
                'index' => 'order/all_list',
            ],
        ]
    ],
    'user' => [
        'name' => '会员管理',
        'icon' => 'icon-user',
        'index' => 'user/index',
    ],
    'Coupon' => [
        'name' => '优惠券管理' ,
        'icon' => 'icon-rise',
        'index' => 'coupon/index',
    ],
    'Vouchers' => [
        'name' => '礼物卡管理' ,
        'icon' => 'icon-star',
        'index' => 'vouchers/index',
    ],
    'storUser' => [
        'name' => '后台账户管理',
        'icon' => 'icon-marketing',
        'index' => 'store.user/tabel',
        'submenu' => [],
    ],
      'games' => [
         'name' => '活动管理',
         'icon' => 'icon-wxapp',
         'color' => '#36b313',
         'index' =>'games.games_ms/index',
         'submenu' => [
             [
                 'name' => '秒杀',
                 'index' => 'games.games_ms/index',
             ],
             [
                'name' => '限时优惠',
                'index' => 'games.games_yh/index',
            ],
          
            [
                'name' => '砍价',
                'index' => 'games.games_kj/index',
            ],
          
            [
                'name' => '组合特惠',
                'index' => 'games.games_zh/index',
            ]
           
         ],
     ], 
//     'plugins' => [
//         'name' => '应用中心',
//         'icon' => 'icon-application',
//         'is_svg' => true,   // 多色图标
// //        'index' => 'plugins/index',
//     ],
    'wxapp' => [
        'name' => '设置',
        'display'=>'none',
        'icon' => 'icon-setting',
        'index' => 'wxapp.page/home',
        'submenu' => [
            // [
            //     'name' => '商城设置',
            //     'index' => 'setting/store',
            // ],
            [
                'name' => '轮播图设计',
                'index' => 'wxapp.page/home'
            ],
            [
                'name' => '砍价设置',
                'index' => 'setting.kanjia/index',
            ],
            [
                'name' => '充值优惠设置',
                'index' => 'setting.kanjia/recharge',
            ],
             [
                 'name' => '运费设置',
                 'index' => 'setting.delivery/index',
                'uris' => [
                 'setting.delivery/index',
                 'setting.delivery/add',
                     'setting.delivery/edit',
                 ],
             ],
            // [
            //     'name' => '交易设置',
            //     'index' => 'setting/trade',
            // ],
           
            // [
            //     'name' => '短信通知',
            //     'index' => 'setting/sms'
            // ],
            // [
            //     'name' => '上传设置',
            //     'index' => 'setting/storage',
            // ],
            // [
            //     'name' => '其他',
            //     'active' => true,
            //     'submenu' => [
            //         [
            //             'name' => '清理缓存',
            //             'index' => 'setting.cache/clear'
            //         ],
            //         [
            //             'name' => '环境检测',
            //             'index' => 'setting.science/index'
            //         ],
            //     ]
            // ]
        ],
    ],
    'setting' => [
        'name' => '设置',
        'icon' => 'icon-setting',
        'index' => 'wxapp.page/home',
        'submenu' => [
            // [
            //     'name' => '商城设置',
            //     'index' => 'setting/store',
            // ],
            [
                'name' => '轮播图设计',
                'index' => 'wxapp.page/home'
            ],
            [
                'name' => '砍价设置',
                'index' => 'setting.kanjia/index',
            ],
            [
                'name' => '充值优惠设置',
                'index' => 'setting.kanjia/recharge',
            ],
             [
                 'name' => '运费设置',
                 'index' => 'setting.delivery/index',
                 'uris' => [
                     'setting.delivery/index',
                     'setting.delivery/add',
                     'setting.delivery/edit',
                 ],
             ],
            // [
            //     'name' => '交易设置',
            //     'index' => 'setting/trade',
            // ],
            // [
            //     'name' => '短信通知',
            //     'index' => 'setting/sms'
            // ],
            // [
            //     'name' => '上传设置',
            //     'index' => 'setting/storage',
            // ],
            // [
            //     'name' => '其他',
            //     'active' => true,
            //     'submenu' => [
            //         [
            //             'name' => '清理缓存',
            //             'index' => 'setting.cache/clear'
            //         ],
            //         [
            //             'name' => '环境检测',
            //             'index' => 'setting.science/index'
            //         ],
            //     ]
            // ]
        ],
    ],
];
