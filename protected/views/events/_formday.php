        <div class="row">
                                <div class="col-xs-12 col-sm-2">
                                      <?php echo $form->labelEx($days[$i],'[' . $i . ']date'); ?>

                                        
                                        <div class="form-group">
                                        <div class="input-group">
                                        <div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
                                   <?php               
                                    $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                    'model'=>$days[$i],
                                            'attribute'=>'[' . $i . ']date',
                                            'language' => 'es',
                                            'htmlOptions' => array('class'=>'form-control'),    
                                            'options'=>array(
                                            'showAnim'=>'slide',
                                            'autoSize'=>'true',                                    
                                            'defaultDate'=>Date('Y-m-d'),
                                            'dateFormat'=>'yy-mm-dd',                                            
                                            
                                            'selectOtherMonths'=>'true',
                                            'showAnim'=>'fold',
                                            'showButtonPanel'=>'true',
                                            
                                            'showOtherMonths'=>'true',
                                            'showOtherYears'=>'true',
                                            'changeMonth' => 'true',
                                            'changeYear' => 'true',
                                            'minDate'=>Date('Y-m-d'),                                            
                                    ),

                                ));
                                ?>
                                </div>
                                </div>
                                <?php echo $form->error($days[$i],'[' . $i . ']date'); ?>
                                </div>
                            
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
                                <div class="col-xs-12 col-sm-2">
                                    <?php echo $form->labelEx($days[$i],'[' . $i . ']fin_hour'); ?>
                                    <div class="form-group">
                                        <div class="input-group">
                                        <div class="input-group-addon"><span class="glyphicon glyphicon-time"></span></div>
                                    <?php echo $form->textField($days[$i],'[' . $i . ']fin_hour',array('class'=>'tiempo form-control')); ?>
                                    </div>
                                </div>
                                    <?php echo $form->error($days[$i],'[' . $i . ']fin_hour'); ?>
                                </div>
                            
                                <div class="col-xs-12 col-sm-3">
                                    <?php echo $form->labelEx($days[$i],'[' . $i . ']all_day'); ?>
                                    <?php
                                        $this->widget('application.extensions.SwitchToggleJD.SwitchToggleJD', array(
                                            'attribute' => '[' . $i . ']all_day',
                                            'model'=>$days[$i])
                                        );
                                        ?>
                                    <?php echo $form->error($days[$i],'[' . $i . ']all_day'); ?>
                                </div>
                            </div>
                            

                            <div class="row">
                                <div class="col-xs-12">
<?php echo $form->labelEx($days[$i],'[' . $i . ']name'); ?>
<?php echo $form->textArea($days[$i],'[' . $i . ']name',array('class'=>'form-control','rows'=>'3')); ?>
<?php echo $form->error($days[$i],'[' . $i . ']name'); ?>


                                </div>

                            </div>