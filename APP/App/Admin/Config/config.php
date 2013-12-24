<?php
if (!defined("HDPHP_PATH"))exit('No direct script access allowed');
//更多配置请查看hdphp/Config/config.php
return array(
    "RBAC_SUPER_ADMIN"                 => "admin",      //用户SESSION名
    "THUMB_TYPE"                    => 5,  //生成方式,
    "THUMB_PATH"                    => ROOT_PATH."upload/".date('Ym',time()),          //缩略图路径
    "THUMB_SIZE"                    => "60,60,220,220,460,460,1000,1000",          //缩略图路径
    "WATER_ON"                      => 0,           //开关
    "UPLOAD_IMG_RESIZE_ON"          => 0,           //上传图片缩放处理,超过以下值系统进行缩放

);
?>