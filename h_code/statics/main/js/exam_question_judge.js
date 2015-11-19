function check_form(){
			var ischeckd=false;
			var title_val = CKEDITOR.instances["title"].getData();
			if(!title_val){
				$.jhh.cm.show_dialog({msg:"题干不能为空！",width:200,height:120});
				return false;
			};
			
}


function get_currIndex(prev_index){
	var indexStr="";
	if(prev_index){
		switch (prev_index) {
		case "A":
			indexStr="B";
			break;
		case "B":
			indexStr="C";
			break;
		case "C":
			indexStr="D";
			break;
		case "D":
			indexStr="E";
			break;
		case "E":
			indexStr="F";
			break;
		case "F":
			indexStr="G";
			break;
		case "G":
			indexStr="H";
			break;
		case "H":
			indexStr="I";
			break;
		case "I":
			indexStr="J";
			break;
		case "J":
			indexStr="K";
			break;
		case "K":
			indexStr="L";
			break;
		default:
			indexStr=text;
			break;
		}
	}
	return indexStr;
}

//渲染单选textarea
question_multiple={
		_init:function(){
			var self=this,t_name;
			$("textarea[name]").each(function(){
				t_name=$(this).attr("name");
				!CKEDITOR.instances[t_name]&&CKEDITOR.replace(t_name,
				{
			          skin: "kama", 
			          width:"550", 
			          height:"100"
			    });
			});
			$.jhh.tabs("q_m_t","q_m_c",{t_otherClass:"other",t_currentClass:"this",c_event:"click"});
		}
};
$(function(){
	question_multiple._init();
});

