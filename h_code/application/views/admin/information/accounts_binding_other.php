<link href="<?php echo STATICS_PATH_CSS;?>account_settings.css" type="text/css" rel="stylesheet" />
<!--右侧-->
        <div id="right_1">
        	<ul id="column1" class="column">
            	<li id="widget_4">
                    <div class="where_page"><a href="#">圣康金融云平台</a><b>></b><a href="#">机构</a><b>></b><a href="#">信息管理</a><b>></b><span>账号设置</span></div>
                </li>
                
                <li id="widget_3">
                	<?php 
                		$this->load->view('information/accounts_header');	
                	?>
                    <div class="wid_con">
                    	<div id="b5" class="nav1">
                        	<div class="threebd_con">
                            	<h4>绑定账号，将内容同步更新到其他平台</h4>
                                <div class="bd_list">
                                	<dl>
                                    	<dt class="sinalogo">logo</dt>
                                        <dd>
                                        	<p>新浪微博</p>
                                            <p>
                                            	<a class="bd_yes" style="display:block;" href="javascript:void(0)">立即绑定></a>
                                            	<a class="bd_no" style="display:none;" href="javascript:void(0)">取消绑定></a>
                                            </p>
                                        </dd>
                                    </dl>
                                    <dl>
                                    	<dt class="Qzone">logo</dt>
                                        <dd>
                                        	<p>QQ空间</p>
                                            <p>
                                            	<a class="bd_yes" style="display:none;" href="javascript:void(0)">立即绑定></a>
                                            	<a class="bd_no" style="display:block;" href="javascript:void(0)">取消绑定></a>
                                            </p>
                                        </dd>
                                    </dl>
                                </div>
                                
                            </div><!--threebd_con-->
                                
                        </div>
                        
                       
                    </div><!--wid_con-->
                </li>
            </ul>
            
        </div><!--#right_1-->