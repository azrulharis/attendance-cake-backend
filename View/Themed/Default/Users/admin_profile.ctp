<?php
$this->request->data['User']['old_password'] = '';
$this->request->data['User']['password'] = '';
		
?><!-- BEGIN PAGE HEADER-->
<h1 class="page-header"><?php echo __('User Profile'); ?> </h1>
<div style="margin-bottom:15px;margin-top:10px;" class="btn-group btn-breadcrumb" id="bc1">
    <?php echo $this->Html->link('<i class="fa fa-home"></i>', array('plugin' => false, 'controller' => 'users','action' => 'dashboard'),array('style'=>'background:#000000;','escape'=>false,'class'=>'btn btn-default')); ?>
     <?php echo $this->Html->link(__('User'), array('plugin' => false, 'controller' => 'users','action' => 'index'),array('escape'=>false,'class'=>'btn btn-default')); ?>
    <a class="btn btn-default active" href="javascript::void();" style="display: block;"><div>Profile</div></a> 
    <a class="" href="#"><div></div></a> 
 </div>
<!-- END PAGE HEADER-->
<!-- Flash Message -->
<?php echo $this->Session->flash(); ?>
<!-- Flash Message -->			
<!-- BEGIN PAGE CONTENT-->
<div class="row profile">
    <div class="col-md-12">
        <!--BEGIN TABS-->
        <div class="tabbable tabbable-custom tabbable-full-width">
            <ul class="nav nav-tabs newtab">
                <li class="active">
                    <a href="#tab_1_1" data-toggle="tab">
                    Overview </a>
                </li>
                <li>
                    <a href="#tab_1_3" data-toggle="tab">
                    Account </a>
                </li>
                
            </ul>
            <?php extract($users['User']); ?>
            <div class="tab-content prof-tab">
                <div class="tab-pane active" id="tab_1_1">
                    <div class="row">
                        <div class="col-md-3">
                            <ul class="list-unstyled profile-nav">
                                <li class="profilpic">
                                <?php
                                
                                if(!empty($image) && file_exists(USER_ORIGINAL_IMAGE_PATH.$image))
                                        $result = $image;
                                     else
                                        $result = "Default.jpg";
										
                                 echo $this->Html->image('Users/Original/'.$result, array('alt' => 'Photo','class'=>'img-responsive','title'=>'')) ?>
                                    <?php echo  $this->Html->link('edit', 
                                        array('controller' => 'users', 'action' => 'edit', $this->Session->read('Auth.User.id'), 'plugin' => false), array('escape' => false,'class'=>'profile-edit')) ?>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-9">
                            <div class="">
                                <div class="col-md-8 profile-info">
                                <?php $name = $firstname." ".$lastname; ?>
                                    <h1><?php echo $name ?></h1>
                                    <p>
                                         <?php echo $about_us ?>
                                    </p>
                                    <p>
                                        <a href="javascript:void(0);">
                                        <?php echo $email ?> </a>
                                    </p>
                                    <ul class="list-inline"> 
                                        <li>
                                            <i class="fa fa-calendar"></i> <?php echo date('d M,Y',strtotime($dob)) ?>
                                        </li>
                                        <li>
                                            <i class="fa fa-star"></i> <?php echo $users['Group']['name'] ?>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>
                            <!--end row-->
                            
                        </div>
                    </div>
                </div>
                <!--tab_1_2-->
                <div class="tab-pane" id="tab_1_3">
                    <div class="row profile-account">
                        <div class="col-md-3">
                            <ul class="ver-inline-menu varb tabbable margin-bottom-10">
                                <li class="active first">
                                    <a data-toggle="tab" href="#tab_1-1">
                                    <i class="fa fa-cog"></i> Personal info </a>
                                    <span class="after">
                                    </span>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab_2-2">
                                    <i class="fa fa-picture-o"></i> Change Image </a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab_3-3">
                                    <i class="fa fa-lock"></i> Change Password </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-9">
                            <div class="tab-content padingr">
                                <div id="tab_1-1" class="tab-pane active">
                                    <?php echo $this->Form->create('User', array('action'=>'profile','novalidate'=>true)); 
                                            echo $this->Form->hidden('id');
                                            ?>
                                        <div class="form-group">
                                            <?php  echo $this->Form->input('firstname', array('class'=> 'form-control', 'placeholder' => 'First Name','label'=> array('class' => 'control-label','text' => 'First Name'),'div'=>false)); ?>	
                                        </div>
                                        <div class="form-group">
                                            <?php  echo $this->Form->input('lastname', array('class'=> 'form-control', 'placeholder' => 'Last Name','label'=> array('class' => 'control-label','text' => 'Last Name'),'div'=>false)); ?>	
                                        </div>
                                        <div class="form-group">
                                            <?php  echo $this->Form->input('mobile_number', array('class'=> 'form-control', 'placeholder' => 'Mobile Number','label'=> array('class' => 'control-label','text' => 'Mobile Number'),'div'=>false)); ?>	
                                        </div>
                                        <div class="form-group">
                                            <?php  echo $this->Form->input('email', array('class'=> 'form-control', 'placeholder' => 'Email','label'=> array('class' => 'control-label','text' => 'Email'),'div'=>false)); ?>	
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Date Of Birth</label>
                                            <div class='input-group date  date-picker' id="datetimepicker">
                    <?php echo $this->Form->input('User.dob', array('type'=> 'text' , 'class'=> 'form-control', 'placeholder' => 'Date of Birth','label'=> false , 'div' => false,'hiddenField'=>false)); ?>
                    <span class="input-group-addon"><span class="fa fa-calendar glyphicon glyphicon-calendar"></span></span>
                </div>
                                            
                                        </div>
                                        <div class="form-group">
                                            <?php  echo $this->Form->input('about_us', array('class'=> 'form-control', 'placeholder' => 'About Us','label'=> array('class' => 'control-label','text' => 'About Us','type' => 'textarea','rows' => 3),'div'=>false)); ?>	
                                        </div>
                                        <div class="margiv-top-10">
                                      <?php echo $this->Form->button('<i class="fa fa-check"></i>Save',array('escape' => false,'class' => 'btn')); ?>
                                        </div>
                                    <?php echo $this->Form->end(); ?>
                                </div>
                                <div id="tab_2-2" class="tab-pane">
                                    
                                    <?php echo $this->Form->create('User', array('action'=>'profile','type' => 'file')); 
                                            echo $this->Form->hidden('id');
                                            ?>
                                        <div class="form-group">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                              
                                                <div class="fileinput-preview fileinput-exists thumbnail picup" style="max-width: 200px; max-height: 200px;">
                                                   <?php
                                                    
                                                     if(!empty($this->data['User']['image']) && file_exists(USER_ORIGINAL_IMAGE_PATH.$image))
                                                        {
                                                            $result =  $this->data['User']['image'];
                                                        }
                                                     else
                                                        $result = "Default.jpg";
                                                
                                                echo $this->Html->image('/img/Users/Original/'.$result, array('alt' => 'photo')); ?>
                                                </div>
                                                <div>
                                                    
                                                    <?php echo $this->Form->input('User.image', array('label' => array('class'=>'control-label'),'type' => 'file','required'=>false,'div'=>false)); ?>
                                                    <!--<a href="#" class="btn fileinput-exists" data-dismiss="fileinput">
                                                    Remove </a>-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="margin-top-10">
                                            <?php echo $this->Form->button('<i class="fa fa-check"></i>Save',array('escape' => false,'class' => 'btn g')); ?>
                                        </div>
                                    <?php echo $this->Form->end(); ?>
                                </div>
                                <div id="tab_3-3" class="tab-pane">
                                    <?php 
                                        echo $this->Form->create('User', array('action'=>'reset_password','novalidate'=>true)); 
                                        echo $this->Form->hidden('id');
                                    ?>
                                        <div class="form-group">
                                            <?php  echo $this->Form->input('old_password', array('class'=> 'form-control','type'=>'password', 'placeholder' => 'Current Password','label'=> array('class' => 'control-label','text' => 'Current Password','type' => 'password'),'div'=>false)); ?>	
                                        </div>
                                        <div class="form-group">
                                            <?php  echo $this->Form->input('password', array('class'=> 'form-control', 'placeholder' => 'Password','label'=> array('class' => 'control-label','text' => 'New Password','type' => 'password'),'div'=>false)); ?>	
                                        </div>
                                        <div class="form-group">
                                            <?php  echo $this->Form->input('confirm_password', array('class'=> 'form-control','type'=>'password', 'placeholder' => 'Confirm Password','label'=> array('class' => 'control-label','text' => 'Re-type New Password','type' => 'password'),'div'=>false)); ?>	
                                        </div>
                                        <div class="margin-top-10">
                                            <?php echo $this->Form->button('Change Password',array('escape' => false,'class' => 'btn')); ?>
                                        </div>
                                    <?php echo $this->Form->end(); ?>
                                </div>
                                
                            </div>
                        </div>
                        <!--end col-md-9-->
                    </div>
                </div>
                <!--end tab-pane-->
            </div>
        </div>
        <!--END TABS-->
    </div>
</div>
<!-- END PAGE CONTENT-->

