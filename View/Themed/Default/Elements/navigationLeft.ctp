<!-- sidebar menu -->

<?php 
    $menus = Configure::read('Users.menus');
    $role = $this->Session->read('Auth.User.Group.id');
    $menu = $menus[1]; 
?> 
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <h3>Menu</h3>
    <ul class="nav side-menu">
      <?php 
    foreach ($menu as $key => $value) { 
        $url = $this->Html->url($value, true);
        $link = $this->Html->link($key, $url);   
    ?>
        <li <?php echo isset($value['has_sub']) ? 'class="has_sub"' : ''; ?>> 
            <a href='<?php echo isset($value['has_sub']) ? 'javascript:void(0);' : $this->webroot.$value['url']; ?>'>
                <i class='fa fa-<?php echo $value['ico']?>'></i> 
                <span><?php echo $key?></span>
                <?php if(isset($value['has_sub'])) { ?>
                <span class="pull-right"><i class="fa fa-chevron-down"></i></span>
                <?php } ?>
            </a>
            <?php if(isset($value['has_sub'])) { ?>
            <ul class="nav child_menu">
                <?php foreach($value['has_sub'] as $sub_name => $sub_url) {?>
                <li><a href='<?php echo $this->webroot.$sub_url?>'><span><?php echo $sub_name?></span></a></li> 
                <?php } ?>
            </ul>
            <?php } ?>
        </li>
    <?php
        
    }
?> 
    </ul>
  </div>

</div>
<!-- /sidebar menu -->