<script type="text/javascript" src="<?php echo STATICS_PATH_JS;?>jquery.embed.js"></script>
<link href="<?php echo STATICS_PATH_CSS;?>head_modify.css" type="text/css" rel="stylesheet" />
<!--右侧-->
<div id="right_1">
	<ul id="column1" class="column">
		<li id="widget_4">
			<div class="where_page">
				<a href="#">圣康金融云平台</a><b>></b><a href="#">机构</a><b>></b><a href="#">信息管理</a><b>></b><span>修改头像</span>
			</div>
		</li>
		<li id="widget_1" class="widget">
			<div class="wid_head">
				<h4>修改头像</h4>
			</div>
			<!--wid_head-->
			<div class="wid_con" id="avatarWrapper">
				
			</div>
			<!--wid_con-->
		</li>
	</ul>

</div>
<!--#right_1-->
<script type="text/javascript">
function uploadComplete(t,s){
	if(t == 'ok'){
		window.location.href = "<?php echo base_url('information_detail/index')?>";
	}
}
var App = window.App || {};
App.swfCall = function(json) {
	console.log(json);
}

$('#avatarWrapper').avatar(
	{src: "<?php echo STATICS_PATH_JS."swf/AvatarEditor.swf";?>", expressInstall: "<?php echo STATICS_PATH_JS."swf/expressInstall.swf"?>"},
	{photoUrl: "<?php if(isset($pic)){echo $pic;}else{echo STATICS_PATH_JS."swf/default.jpg";} ?>", saveUrl: "<?php echo base_url('information_detail/head_modify')?>"}
);

</script>