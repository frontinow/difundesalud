<div class="col-xs-12 col-sm-2">
                                    <?php echo $form->labelEx($days[$i],'[' . $i . ']ini_hour'); ?>
                                    <div class="form-group">
                                        <div class="input-group">
                                        <div class="input-group-addon"><span class="glyphicon glyphicon-time"></span></div>                   
                                    <?php echo $form->textField($days[$i],'[' . $i . ']ini_hour',array('class'=>'tiempo form-control')); ?>                  
                                    </div>
                                </div>
                                    <?php echo $form->error($days[$i],'[' . $i . ']ini_hour'); ?>
                                </div> 