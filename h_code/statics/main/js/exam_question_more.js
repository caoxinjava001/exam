function check_form(){
				var ischeckd=false, checkNum =0;;
				
				if(!CKEDITOR.instances["title"].getData()){
					$.jhh.cm.show_dialog({msg:"题干不能为空！",width:200,height:120});
					return false;
				};
				$("textarea[name*='answer']").each(function(i){
					
					if(!CKEDITOR.instances[$(this).attr("name")].getData()){
						ischeckd=true;
					}
				});
				if(ischeckd){
					$.jhh.cm.show_dialog({msg:"答案选项不能为空！",width:200,height:120});
					return false;
				}
				$("input['correct_answer[]']:checked").each(function(){
					checkNum++;
				});
				if(checkNum ==0){
					$.jhh.cm.show_dialog({msg:"正确答案不能为空",width:200,height:120});
			 		return false;
				}
				
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
			},
			add_select:function(){
				var str_t="",str_c="",self=this,curr_Index,str_c_answer="";
				//获取当前的选择最大值
				curr_Index=get_currIndex($("#q_m_t").find("span label:last").text());
				if(curr_Index=="G"){
					 $.jhh.cm.show_dialog({msg:"最多添加到F项",width:100,height:65});
					return false;					
				}
				
				str_t='<div  class="other tabs_t" style="cursor: pointer;"><a href="javascript:" style="cursor: pointer;" onclick="question_multiple._del_option(\''+curr_Index+'\')" class="xuanx_close">X</a><span>选项<label>'+curr_Index+'</label></span></div>';
				str_c='<div  class="nav2"><textarea name="answer['+curr_Index+']"></textarea></div>';
				
				//插入
				$("#q_m_t div:last").before(str_t);
				$("#q_m_c").append(str_c);
				
				$.jhh.tabs("q_m_t","q_m_c",{t_otherClass:"other",t_currentClass:"this",c_event:"click"});
				
				//创建编辑器
				self._create_edit({name:"answer["+curr_Index+"]",height:"100"});
				str_c_answer='<span class="marl15">'+curr_Index+'<input class="marl5" type="checkbox" name="correct_answer[]" value="'+curr_Index+'" /></span>';
				//添加正确答案选择
				$("#multiple_c_answer").append(str_c_answer);	
			},
			_create_edit:function(params){
				!CKEDITOR.instances[params.name]&&CKEDITOR.replace(params.name,
						{
					          skin: "kama", 
					          width:params.width?params.width:"550", 
					          height:params.height?params.height:"180"
					    });
						
						CKEDITOR.instances[params.name].on(params.events?params.events:"blur",function(e){
							$("[name='"+params.name+"']").text(e.editor.getData());
						});
			},
			_del_option:function(current_index){
				var last_label="",answer_lg=0;
				last_label=$("#q_m_t div.tabs_t:last").find("span label").text();
				if(last_label==current_index){
					
					$("#q_m_t div.tabs_t:last").remove();
					CKEDITOR.instances["answer["+current_index+"]"]&&CKEDITOR.instances["answer["+current_index+"]"].destroy();
					$("#q_m_c div.nav2:last").remove();
					$("#q_m_t div.tabs_t:last").trigger("click");
					
					$("#multiple_c_answer span:last").remove();
					
				}else{
					$.jhh.cm.show_dialog({msg:"请从后往前依次删除",width:200,height:120});
					return false;
				}
				
			}
			
	};
	$(function(){
		question_multiple._init();
	});
