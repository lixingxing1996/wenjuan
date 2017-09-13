<?php
namespace app\admin\controller;

use app\admin\controller\Base;

use think\Db;
// 类继承自公共的类
class Index extends Base
{


	protected function _initialize()
    {
        parent::_initialize();
    }

    public function index()
    {

    	$version = Db::query('SELECT VERSION() AS ver');
    	$config  = [
            'url'             => $_SERVER['HTTP_HOST'],
            'document_root'   => $_SERVER['DOCUMENT_ROOT'],
            'server_os'       => PHP_OS,
            'server_port'     => $_SERVER['SERVER_PORT'],
            'server_soft'     => $_SERVER['SERVER_SOFTWARE'],
            'php_version'     => PHP_VERSION,
            'php_sapi'		  => php_sapi_name(),
            'mysql_version'   => $version[0]['ver'],
            'max_upload_size' => ini_get('upload_max_filesize'),
            'time'			  => date("Y-m-d h:i"),
            'browse_info'	  => browse_info(),
            'think_version'   => THINK_VERSION
        ];
    // dump($config);	
    	// 展开视图
    	return $this->fetch('index/index',['config'=>$config]);
        
    }
}
