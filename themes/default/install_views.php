<!DOCTYPE html>
<html>
<head>
<?php $this->load->view('header_meta_views');?>
	<body>
	  <?php $this->load->view('header');?>
		<div class="main w1024">
		   <div class="content">
			    <ul class="menu">
			       <li><a href=''>安装步骤</a></li>
			       <li><a href=''>权限检测</a></li>
			       <li><a href=''>数据库配置</a></li>
			       <li><a href=''>管理员配置</a></li>
			       <li><a href=''>安装完成</a></li>
			    </ul>  
	        </div>
	        <div class="sidebar">
		            <div class="cell">数据库配置</div>
		            <div class="inner">
			            <div class="control-group">
				            <label class="control-label">数据库主机</label>
				            <div class="controls">
				            <input id="txtHost" name="dbhost" type="text" value="localhost" />
			            </div>
			            </div>
			           <div class="control-group">
			              <label>数据库端口</label>
			              <div class="controls">
			              <input id="txtPort" name="dbport" type="text" value="3306" />
			            </div>
			            </div>
			           <div class="control-group">
			           
			              <label>数据库用户</label>
			              <div class="controls">
			              <input id="txtUser" name="dbuser" type="text" value="" />
			            </div>
			             </div>
			           <div class="control-group">
			         
			            	<label>数据库密码</label>
			            	  <div class="controls">
			            	<input id="txtPassword" name="dbpwd" type="text" value="" />
			            </div>
			             </div>
			            <div class="control-group">
			            
			            	<label>数据库名称</label>
			            	<div class="controls">
		                    <input id="txtName" name="dbname" type="text" value="startbbs" />
			            </div>
			             </div>
			            <div class="control-group">
			            
			            	<label>数据表前缀</label>
			            	<div class="controls">
			            	<input id="txtPrefix" name="dbprefix" type="text" value="sb_" />
			            </div>
			             </div>
			            <div class="">
			               <a href="javascript:void(0)" id="dataTest"><span>测试连接</span></a>
			            </div>
                	</div>
	                <div class="cell">管理员信息配置</div>
	                 <div class="inner">
		                 <div class="control-group">
		                 	 <label class="control-label">用户名</label>
		                 	 <div class="controls">
		                 	 <input id="txtAdmin" class="txtInput" name="admin" type="text" value="admin" />
		                  </div>
		                  </div>
		                 <div class="control-group">
		                  	<label>密码</label>
		                  	<div class="controls">
		                  	<input id="txtPwd" name="pwd" type="text" value="startbbs" />
		                  </div>
		                  </div>
		                 <div class="control-group">
		                    <label>管理员邮箱</label>
		                    <div class="controls">
		                    <input id="txtEmail" name="email" type="text" value="startbbs@126.com" />
		                  </div>
		                  </div>
		                 <div class="control-group">
		                  	<label>安装目录</label>
		                  	<div class="controls">
		                  	<input id="txtUrl" name="base_url" type="text" value="" />
		                  </div>
		                  </div>
		                 <div class="">
		                      <a id="btnSubmit" href="javascript:void()" ><span>点此安装</span></a>
		                  </div>
	                </div>
	            </div>
        </div>
	</body>
</html>