<?php echo $this->Html->link('Add New User', array('action' => 'add'), array('class' => 'btn btn-success')); ?>

<div class="row"> 
  <div class="col-xs-12">
    <div class="x_panel tile">
      <div class="x_title">
        <h2>Users</h2>
        
        <div class="clearfix"></div>
      </div>
      <div class="x_content">  
        <?php echo $this->Session->flash(); ?>

<?php echo $this->Form->create('User', array('action' => 'index', 'class' => 'form-horizontal', 'type' => 'GET')); ?>
  <table cellpadding="0" cellspacing="0" class="table table-bordered">
    <tr>
    <td><?php echo $this->Form->input('username', array('placeholder' => 'Username', 'class' => 'form-control', 'label' => false, 'required' => false)); ?>  
    </td>
    <td><?php echo $this->Form->input('name', array('type' => 'text', 'placeholder' => 'Name', 'class' => 'form-control', 'label' => false, 'required' => false)); ?>  
    </td> 
    <td><?php echo $this->Form->input('email', array('placeholder' => 'Email', 'class' => 'form-control', 'label' => false, 'required' => false)); ?></td>
    <td><?php echo $this->Form->input('group_id', array('options' => $group, 'empty' => '-All Group-', 'class' => 'form-control', 'label' => false, 'required' => false)); ?></td>
     
    <td><?php echo $this->Form->submit('Search', array('type' => 'submit', 'name' => 'search', 'class' => 'btn btn-success pull-right')); ?></td> 
    </tr>
  </table>
<?php $this->end(); ?> 

        <div class="table-responsive">
               <table cellspacing="0" cellpadding="0" border="0" class=" table">
                  <thead>
                    <tr> 
                      <th><?php echo $this->Paginator->sort('username'); ?></th> 
                      <th><?php echo __('Full Name'); ?></th> 
                      <th><?php echo __('Phone No'); ?></th>
                      <th><?php echo __('Email'); ?></th>
                      <th><?php echo __('Role'); ?></th>
                      <th><?php echo __('Actions'); ?></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php  
        if(count($users))
          {
            $currentPage = empty($this->Paginator->params['paging']['User']['page']) ? 1 : $this->Paginator->params['paging']['User']['page'];
            $limit = $this->Paginator->params['paging']['User']['limit']; 
            $startSN = (($currentPage * $limit) + 1) - $limit;

        
        foreach ($users as $user){ ?>
          <tr> 
            <td><?php echo h($user['User']['username']); ?></td>
            <td> <?php echo h($user['User']['name']); ?> </td> 
            <td class="numeric"> <?php echo h($user['User']['mobile_number']); ?> </td>
            <td> <?php echo h($user['User']['email']); ?> </td> 
            <td> <?php echo h($user['Group']['name']); ?> </td> 
            <td class="actions">
            <?php echo $this->Html->link('<i class="fa fa-search"></i>', array('action' => 'view', $user['User']['id']), array("class" => "btn btn-success btn-sm", "escape" => false, "alt" => "View Detail", "title" => "View Detail")); ?>
              <?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', $user['User']['id']), array("class" => "btn btn-warning btn-sm", "escape" => false, "alt" => "Edit Detail", "title" => "Edit Detail")); ?> 
              <?php 

              echo $this->Form->postLink('<i class="fa fa-trash-o"></i>', array('action' => 'delete', $user['User']['id']), array("class" => "btn btn-danger btn-sm", "escape" => false, "alt" => "Delete Record", "title" => "Delete Record"), __('Are you sure you want to delete # %s?', $user['User']['id'])); 
              ?>
            </td>
          </tr>
        <?php } 
          }
          else{
          ?>
          <tr><td colspan='6' align='center'><?php echo NO_RECORD; ?></td></tr>
          <?php
          } 
           ?>
                </tbody>
            </table> 
              <p>
        <?php
        echo $this->Paginator->counter(array(
        'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total')
        ));
        ?>  
        </p>  
                  <ul class="pagination">
      <?php
        echo $this->Paginator->prev('&laquo;', array('tag' => 'li', 'escape' => false), '<a href="#">&laquo;</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
        echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentLink' => true, 'currentClass' => 'active', 'currentTag' => 'a'));
        echo $this->Paginator->next('&raquo;', array('tag' => 'li', 'escape' => false), '<a href="#">&raquo;</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
      ?>
      </ul>
                 
             </div>

      </div>
    </div>
  </div> 
</div>
