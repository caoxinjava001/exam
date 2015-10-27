<link href="<?php echo STATICS_PATH_CSS;?>account_settings.css" type="text/css" rel="stylesheet" />
<link href="<?php echo STATICS_PATH_CSS;?>ui/jquery-ui-custom.min.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo STATICS_PATH_JS;?>ui/jquery-ui.custom.min.js"></script>
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
                    	<div id="b6" class="nav1">
                        	<div class="dpqxsz_con">
                        	<?php if(isset($datas)){ foreach($datas as $k=>$v){?>
                        		<div class="sz_list">
                                	<h4><?php if($v['type'] == EXAM_TYPE){echo "试卷";} if($v['type'] == LESSSION_TYPE){echo "课程";} if($v['type'] == INFORMATION_TYPE){echo "资料";} ?><span>设置我发布的<?php if($v['type'] == EXAM_TYPE){echo "试卷";} if($v['type'] == LESSSION_TYPE){echo "课程";} if($v['type'] == INFORMATION_TYPE){echo "资料";} ?>谁可以看到</span></h4>
                                    <div class="choice">
                                        <input type="radio"  <?php if($v['operatorId'] == ALL_PERSON) echo "checked";?> value="<?php echo ALL_PERSON;?>" parentv="<?php if($v['type'] == EXAM_TYPE){echo EXAM_TYPE;} if($v['type'] == LESSSION_TYPE){echo LESSSION_TYPE;} if($v['type'] == INFORMATION_TYPE){echo INFORMATION_TYPE;} ?>" name="orderby<?php echo $k?>" />
                                        <span>所有人</span>
                                    </div>
                                    <div class="choice">
                                        <input type="radio"  <?php if($v['operatorId'] == MY_FANS) echo "checked";?> value="<?php echo MY_FANS;?>" parentv="<?php if($v['type'] == EXAM_TYPE){echo EXAM_TYPE;} if($v['type'] == LESSSION_TYPE){echo LESSSION_TYPE;} if($v['type'] == INFORMATION_TYPE){echo INFORMATION_TYPE;} ?>" name="orderby<?php echo $k?>" />
                                        <span>我的粉丝</span>
                                    </div>
                                    <div class="choice">
                                        <input type="radio"  <?php if($v['operatorId'] == STUDENT) echo "checked";?> value="<?php echo STUDENT;?>" parentv="<?php if($v['type'] == EXAM_TYPE){echo EXAM_TYPE;} if($v['type'] == LESSSION_TYPE){echo LESSSION_TYPE;} if($v['type'] == INFORMATION_TYPE){echo INFORMATION_TYPE;} ?>" name="orderby<?php echo $k?>" />
                                        <span>机构自己的学员</span>
                                    </div>
                                </div>
                        	<?php }
                        	}?>
                         
                            </div><!--dpqxsz_con-->
                        </div>
                        
                       
                    </div><!--wid_con-->
                </li>
            </ul>
            
        </div><!--#right_1-->
<script >
/*单选按钮事件*/
$("input:radio").click(function(e){
	var operatorId = $(this).val();
	var type = $(this).attr("parentv");
	var orgId = 1;
	var params={
			type:"post",
			url:"<?php echo $this->config->item('base_url')?>"+"information_accounts/setStorePermission/",
			data:{
				type:type,
				operatorId:operatorId,
				orgId:orgId
			}
	};

	_util.ajax(params,function(data){
	//处理业务逻辑
		$( "<div>"+data.msg+"</div>" ).dialog({
			resizable: false,
			height:140,
			modal: true,
			draggable:false,
			buttons: {
				"关闭": function() {
					$( this ).dialog( "close" );
				}
			}
		});
		
	});
});


</script>