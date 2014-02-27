<?php 

/**
 *  The base controller which is used by the Front and the Admin controllers
 */
class Base_Controller extends CI_Controller{
    
	public function __construct(){
       parent::__construct();
    }
    
    /*
     * css、js文件加载函数
     */
    public function loadskin($array){
    	
    }
}

/**
 * 
 * 前台页面基类
 * @author Administrator
 *
 */
class User_Controller extends Base_Controller{
   
	public function __construct(){
	  
		parent::__construct();
	   	//载入前台模板
		$this->load->set_front_theme($this->config->item('themes'));
	    //判断是否安装
	    $file=FCPATH.'install.lock';
	    if(!is_file($file)){
	    
	        redirect(site_url('install'));
	    }
	    
	}
}

/**
 * 
 * 管理后台基类
 * @author Administrator
 *
 */
class Admin_Controller extends Base_Controller{
    
	public function __construct(){
	   parent::__construct();
	  
	  
	   
	}
}

/**
 * 
 * 安装页
 * @author Administrator
 *
 */
class Install_Controller extends Base_Controller{
    
	public function __construct(){
	   parent::__construct();
	   //载入前台模板
	   $this->load->set_front_theme('default');
	}
	
}
