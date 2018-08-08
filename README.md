# tempim

#### 项目介绍
php仿tempim网页图片占位符

向网页占位符工具 temp.im 致敬

查看了 temp.im 的github，git克隆到本地竟然占用了1.1G
想到php可以用gd库动态生成图片，写了本程序

#### 调用方式
HTTP get

#### 使用说明
get传递参数

|  名称   |   必填  |   说明 | 
|:---:|:---|---:|
|w  |  否 | 图片宽度，默认100|
|h  |  否  |图片高度，默认100|
|bc |  否  |背景颜色，16进制，默认灰|
|fc |  否  |文字颜色，16进制，默认黑|

#### 演示地址
https://www.51015.cn/demo/tempim

https://www.51015.cn/demo/tempim/?w=500&h=300&bc=34AADC&fc=fff