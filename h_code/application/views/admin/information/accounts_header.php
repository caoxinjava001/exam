<div class="wid_head">
	<ul>
		<li class="this"  id="a1" onclick="changeClass('1','updatePassword')"><span style="_width:7%;" class="radiustop3">密码修改</span></li>
		<li class="other" id="a2" onclick="changeClass('2','address')"><span style="_width:8%;" class="radiustop3">个性地址</span></li>
		<li class="other" id="a3" onclick="changeClass('3','bindingMobile')"><span style="_width:9%;" class="radiustop3">手机绑定</span></li>
		<li class="other" id="a4" onclick="changeClass('4','bindingEmail')"><span style="_width:10%;" class="radiustop3">修改邮箱</span></li>
		<!-- <li class="other" id="a5" onclick="changeClass('5','bindingOther')"><span style="_width:15%;" class="radiustop3">第三方绑定</span></li> -->
		<li class="other" id="a6" onclick="changeClass('6','shopAuth')"><span style="_width:24%;" class="radiustop3">店铺权限设置</span></li>
	</ul>
</div><!--wid_head-->
<script>
	function changeClass(id,str){
		window.location.href = "<?php echo $this->config->item('base_url').$this->uri->rsegment(1);?>"+'/'+str;
		
	}
	$(function($)//用window的onload事件，窗体加载完毕的时候
	{
		var str = "<?php echo $this->uri->rsegment(2)?>";
		$(".wid_head ul li").attr('class',"other");
		switch(str)
		{
		case "updatePassword":
			$("#a1").attr('class',"this");
		  break;
		case "address":
			$("#a2").attr('class',"this");
		  break;
		case "bindingMobile":
			$("#a3").attr('class',"this");
			break;
		case "bindingEmail":
			$("#a4").attr('class',"this");
			break;
		case "bindingOther":
			$("#a5").attr('class',"this");
			break;
		case "shopAuth":
			$("#a6").attr('class',"this");
			break;
		default:
			$("#a1").attr('class',"this");
		}
	});
</script>