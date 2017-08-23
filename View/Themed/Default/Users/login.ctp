<div>
  <div class="login_wrapper">
    <div class="animate form login_form">
      <section class="login_content">
          <?php 
            echo $this->Form->create('User', array(
              'url' => array(
                'controller' => 'users',
                'action' => 'login'
              ),
              'class' => 'form-signin login-form','novalidate'=>true ));
          ?>
          <h1>Login Form</h1>
          <?php echo $this->Session->flash(); ?> 
          <div>
            <?php echo $this->Form->input('User.username', array('class'=> 'form-control placeholder-no-fix','autocomplete' => 'off', 
          'placeholder'=>"Username",'div' => false, 'label' => false )); ?>
          </div>
          <div>
            <?php echo $this->Form->password('User.password', array('class'=> 'form-control placeholder-no-fix','autocomplete' => 'off', 
          'placeholder'=>"Password",'div' => false, 'label' => false )); ?>
          </div>
          <div>
            <?php echo $this->Form->button('Login <i class="fa fa fa-arrow-circle-o-right"></i>', array('class'=> 'btn default', 'escape' => false)); ?>
            <a class="reset_pass" href="#">Lost your password?</a>
          </div>

          <div class="clearfix"></div> 
          <div class="separator">
            <p class="change_link">New to site? 
              <?php echo $this->Html->link('Register', array('controller'=>'users', 'action' => 'add','plugin'=>false), array('escape'=>false));?>
            </p> 
            <div class="clearfix"></div> 
            <div>
              <h1><?php echo $this->Html->link($this->Html->image(Configure::read('Site.logo'),array('alt' => 'logo','title'=>Configure::read('Site.title'),'style'=>'max-width:148px;max-height:33px;')),array('controller'=>'users','action' => 'login','plugin'=>false),
      array('escape'=>false));?></h1>
              <p><?php echo Configure::read('Site.copyright'); ?></p>
            </div>
          </div>
        </form>
      </section>
    </div> 
  </div>
</div>