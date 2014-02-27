<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
#doc
#	classname:	Install
#	scope:		PUBLIC
#   基友帮社区
#	author : 土鳖  
#	Copyright (c) 2014 jiyoubang All rights reserved.
#/doc

class Install extends Install_Controller{
     function __construct(){
       parent::__construct();
       $this->load->library('myclass');
     }
     
     public function index(){
        $file=FCPATH.'install.lock';
        if(file_exists($file)){
           $this->myclass->notice('alert("系统已安装");window.location.href="'.site_url().'"');
        }else{
           $data["header"]=array(
					                	"title"=>"基友帮1111", 
					                	"description"=>"基友帮 搞笑 娱乐 扯蛋 发泄11111", 
					                	"keywords"=>"基友帮 搞笑 娱乐 扯蛋 发泄1111",
					                	"css"=>array(
				   	                              'css/base.css',
				   	                              'css/heads.css',
                                                  'css/default/install.css'
				   	                              ),
				   	                    "js"=>array(
				   	                              'js/jquery-1.9.1.min.js',
				                                  'js/default/install.js'
				                          )          
   	         				    );
           $this->load->view('install_views',$data);
        }
     }
     
     /**
	 * 检查数据库连接
	 */
     public function CheckDatabase(){
       	$dbhost = $_REQUEST["dbhost"];
		$dbport = $_REQUEST["dbport"];
		$dbname = $_REQUEST["dbname"];
		$dbuser = $_REQUEST["dbuser"];
		$dbpwd = $_REQUEST["dbpwd"];
		$conn = mysql_connect($dbhost.":".$dbport,$dbuser,$dbpwd);
		$db = mysql_select_db($dbname,$conn);
		if($db){
		    $this->resultinfo->success=true;
		    $this->resultinfo->msg="数据库连接成功！";
		    mysql_close($conn);
		} else{
		    $this->resultinfo->msg="数据库连接失败！";
		}
		echo json_encode($this->resultinfo);
     }
     
     
     public function InstallStep(){
     
        if($_POST){
            $dbhost = $this->input->post('dbhost');
			$dbport = $this->input->post('dbport');
			$dbname = $this->input->post('dbname');
			$dbuser = $this->input->post('dbuser');
			$dbpwd = $this->input->post('dbpwd')?$this->input->post('dbpwd'):'';
			$dbprefix = $this->input->post('dbprefix');
			$userid = $this->input->post('admin');
			$pwd = md5($this->input->post('pwd'));
			$email = $this->input->post('email');
			$sub_folder = '/'.$this->input->post('base_url').'/';
			$conn = mysql_connect($dbhost.':'.$dbport,$dbuser,$dbpwd);
		    if(mysql_select_db($dbname,$conn)){
				$sql=file_get_contents(FCPATH.'package/jiyoubang.sql');
				$sql=str_replace("jyb_",$dbprefix,$sql);
			    $explode=explode(";", $sql);
			    foreach ($explode as $key=>$value){
			       if(!empty($value)){
			          if(trim($value)){
			             mysql_query($value.";");
			          }
			       }
			    }
			    $ip=$this->myclass->get_ip();
			   	$insert= "INSERT INTO ".$dbprefix."users (group_type,gid,is_active,username,password,email,regtime,ip) VALUES ('0','1','1','".$userid."','".$pwd."','".$email."','".time()."','".$ip."')";
			   	mysql_query($insert);
			   	mysql_close($conn);
			   	$dbconfig = "<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');\n"
				."\$active_group = 'default';\n"
				."\$active_record = TRUE;\n"
				."\$db['default']['hostname'] = '".$dbhost."';\n"
				."\$db['default']['port'] = '".$dbport."';\n"
				."\$db['default']['username'] = '".$dbuser."';\n"
				."\$db['default']['password'] = '".$dbpwd."';\n"
				."\$db['default']['database'] = '".$dbname."';\n"
				."\$db['default']['dbdriver'] = 'mysql';\n"
				."\$db['default']['dbprefix'] = '".$dbprefix."';\n"
				."\$db['default']['pconnect'] = TRUE;\n"
				."\$db['default']['db_debug'] = TRUE;\n"
				."\$db['default']['cache_on'] = FALSE;\n"
				."\$db['default']['cachedir'] = 'app/cache';\n"
				."\$db['default']['char_set'] = 'utf8';\n"
				."\$db['default']['dbcollat'] = 'utf8_general_ci';\n"
				."\$db['default']['swap_pre'] = '';\n"
				."\$db['default']['autoinit'] = TRUE;\n"
				."\$db['default']['stricton'] = FALSE;";
				$file = FCPATH.'/application/config/database.php';
				file_put_contents($file,$dbconfig);
				//保存config文件
		        if($sub_folder){
					$this->config->update('myconfig','sub_folder', $sub_folder);
				}
				touch(FCPATH.'install.lock');
				// $data=array('0'=> "创建表".$dbname."成功，请稍后……<br/>");
			    // $data=array('1'=> "安装完成，正在保存配置文件，请稍后……");
			    // $data=array('2'=> "保存配置文件完成！");
			    // $data=array('3'=> "创建锁定安装文件install.lock成功");
                // $data=array('4'=> "安装startbbs成功！");
                $this->reusltinfo->success=true;
                $this->reusltinfo->msg=$dbname;
		    }else{
		       $this->reusltinfo->msg="数据库没有链接成功!";
		    }
			 $this->load->view('install_step',json_encode($this->reusltinfo));
        }
     
     }
     
     
     

}