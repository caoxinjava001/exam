				<script type="text/javascript" src="<?php echo STATICS_PATH_JS ?>/jhh-common.js"></script>	
				<script type="text/javascript" src="<?php echo STATICS_PATH_JS ?>/exam_question_judge.js"></script>	
				<link href="<?php echo STATICS_PATH;?>/css/new_st.css?v=2" type="text/css" rel="stylesheet"/>
                            <!--`<div class="pubinfor" style='line-height: 26px;overflow: hidden;padding-bottom: 10px;clear: both;'>a-->
							<input type='hidden' name="question_id_val" value='<?php echo $stem_list['id']; ?>'/>
                            <div class="pubinfor">
                                <div class="l_name" >题干：</div>
                                <div class="c_tet" style=''><textarea name="title" id="title"><?php echo isset($datas['question_title'])?$datas['question_title']:'' ?></textarea></div>
                             
                            </div>
                            <div class="pubinfor" style="margin-right:60px;">
                                <div class="l_name">答案：</div>
                                <div id="multiple_c_answer" class="c_tet">
                                <?php if(isset($datas['correct_answer'])){ ?>
                                	<span class="marl15">A<input class="marl5" type="radio" name="correct_answer[]" value="A"  <?php if(@$datas['correct_answer'] == 'A') echo 'checked="checked"'; ?>/></span>
                                    <span class="marl15">B<input class="marl5" type="radio" name="correct_answer[]" value="B"  <?php if(@$datas['correct_answer'] == 'B') echo 'checked="checked"'; ?>/></span>
                                   <?php 
							                if(isset($detail['answer_name_array'])){
							                    foreach($detail['answer_name_array'] as $value){
							            ?>
						             <span class="marl15"><?php echo $value; ?><input class="marl5" type="radio" name="correct_answer[]" value="<?php echo $value; ?>" <?php if(@$datas['correct_answer'] == $value) echo 'checked="checked"'; ?>/></span>
						           <?php 
						                    }
						                }
						           ?> 
						           <?php }else{ ?>
						           <span class="marl15">正确<input class="marl5" type="radio" name="correct_answer[]" value="A"  checked="checked"/></span>
                                    <span class="marl15">错误<input class="marl5" type="radio" name="correct_answer[]" value="B"  /></span>
						           <?php } ?>
                                </div>
                            </div>
                            <div class="pubinfor">
                                <div class="l_name">解析：</div>
                                <div class="c_tet">
                                	<textarea name="desc"><?php echo isset($detail['correct_desc'])?$detail['correct_desc']:''; ?></textarea>
                                </div>
                            </div>
                           <input type="submit" class="btn btn-blue" value="保存"  />

