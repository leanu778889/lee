<?php
if (!defined("HDPHP_PATH"))exit('No direct script access allowed');
//更多配置请查看hdphp/Config/config.php
return array(
    "CHECK_FILE_CASE"               => 1,           //windows区分大小写
    /********************************数据库********************************/
    "DB_DRIVER"                     => "mysqli",    //数据库驱动
    "DB_HOST"                       => "127.0.0.1", //数据库连接主机  如127.0.0.1
    "DB_PORT"                       => 3306,        //数据库连接端口
    "DB_USER"                       => "root",      //数据库用户名
    "DB_PASSWORD"                   => "123456",          //数据库密码
    "DB_DATABASE"                   => "shop",          //数据库名称
    "DB_PREFIX"                     => "lee_",          //表前缀
//    "DB_FIELD_CACHE"                => 1,           //字段缓存  新版将废弃
    "DB_BACKUP"                     => ROOT_PATH . "backup/".time(), //数据库备份目录
    /********************************表单TOKEN令牌********************************/
    "RBAC_AUTH_KEY"                 => "uid",      //用户SESSION名
);
?>
