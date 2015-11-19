				<script type="text/javascript" src="<?php echo STATICS_PATH_JS ?>/exam_question_more.js"></script>	
				<link href="<?php echo STATICS_PATH;?>/css/new_st.css?v=2" type="text/css" rel="stylesheet"/>
							<input type='hidden' name="question_id_val" value='<?php echo $stem_list['id']; ?>'/>
                            <div class="pubinfor">
                                <div class="l_name">题干：</div>
                                <div class="c_tet"><textarea name="title" id="title"><?php echo @$datas['question_title'] ?></textarea></div>
                             
                            </div>
                            <div class="pubinfor">
                                <div class="l_name">选项：</div>
                                <div class="c_tet">
                                	<div id="q_m_t" class="c_tet_k">
                                    	<a href="javascript:" class="zjxx_r floatR" onclick="question_multiple.add_select()">增加选项</a>
                                    	<div class="this tabs_t" style="cursor: pointer;"><span>选项<label>A</label></span></div>
                                        <div class="other tabs_t" style="cursor: pointer;"><span>选项<label>B</label></span></div>
                                        <div class="other tabs_t" style="cursor: pointer;"><span>选项<label>C</label></span></div>
                                        <div class="other tabs_t" style="cursor: pointer;"><span>选项<label>D</label></span></div>
                                        <?php 
							                if(isset($detail['answer_name_array'])){
							                    foreach($detail['answer_name_array'] as $value){
							            ?>
							             <div class="other tabs_t">
							             <a href="javascript:" style="cursor: pointer;" onclick="question_multiple._del_option('<?php echo $value; ?>')" class="xuanx_close">X</a>
							             <span>选项<label><?php echo $value; ?></label></span>
							             </div>
							           <?php 
							                    }
							                }
							           ?> 
                                        <div class="tet_k_title_right"></div>
                                    </div>
                                    <div id="q_m_c" class="c_tet_con"  style="height:auto;">
                                        <div id="" class="nav1"> <textarea name="answer[A]"><?php echo isset($detail['answer_array']['A'])?$detail['answer_array']['A']:''; ?></textarea></div>
                                        <div id="" class="nav2" style='display: none;'><textarea name="answer[B]"><?php echo isset($detail['answer_array']['B'])?$detail['answer_array']['B']:''; ?></textarea></div>
                                        <div id="" class="nav2" style='display: none;'><textarea name="answer[C]"><?php echo isset($detail['answer_array']['C'])?$detail['answer_array']['C']:''; ?></textarea></div>
                                        <div id="" class="nav2" style='display: none;'><textarea name="answer[D]"><?php echo isset($detail['answer_array']['D'])?$detail['answer_array']['D']:''; ?></textarea></div>
                                         <?php 
							                if(isset($detail['answer_name_array'])){
							                    foreach($detail['answer_name_array'] as $value){
							            ?>
							             <div id="" class="nav2"><textarea name="answer[<?php echo $value; ?>]"><?php echo isset($detail['answer_array'][$value])?$detail['answer_array'][$value]:''; ?></textarea></div>
							           <?php 
							                    }
							                }
							           ?> 
                                       
                                    </div>
                                <!--<textarea>请输入选项内容</textarea>--></div>
                            </div>
                            <div class="pubinfor">
                                <div class="l_name">答案：</div>
                                <div id="multiple_c_answer" class="c_tet">
                                	<span class="marl15">A<input class="marl5" type="checkbox" name="correct_answer[]" value="A"  <?php if(@in_array('A', $datas['correct_answer_array'])) echo 'checked="checked"'; ?>/></span>
                                    <span class="marl15">B<input class="marl5" type="checkbox" name="correct_answer[]" value="B"  <?php if(@in_array('B', $datas['correct_answer_array'])) echo 'checked="checked"'; ?>/></span>
                                    <span class="marl15">C<input class="marl5" type="checkbox" name="correct_answer[]" value="C"  <?php if(@in_array('C', $datas['correct_answer_array'])) echo 'checked="checked"'; ?>/></span>
                                    <span class="marl15">D<input class="marl5" type="checkbox" name="correct_answer[]" value="D"  <?php if(@in_array('D', $datas['correct_answer_array'])) echo 'checked="checked"'; ?>/></span>
                                   <?php 
							                if(isset($detail['answer_name_array'])){
							                    foreach($detail['answer_name_array'] as $value){
							            ?>
						             <span class="marl15"><?php echo $value; ?><input class="marl5" type="checkbox" name="correct_answer[]" value="<?php echo $value; ?>" <?php if(@in_array($value, $datas['correct_answer_array'])) echo 'checked="checked"'; ?>/></span>
						           <?php 
						                    }
						                }
						           ?> 
                                </div>
                            </div>
                            <div class="pubinfor">
                                <div class="l_name">解析：</div>
                                <div class="c_tet">
                                	<textarea name="desc"><?php echo isset($detail['correct_desc'])?$detail['correct_desc']:''; ?></textarea>
                                </div>
                            </div>
                           <input type="submit" class="btn btn-blue" value="保存"  />
