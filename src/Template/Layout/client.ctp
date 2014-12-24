<?php
    $this->extend('/Layout/default');


    

?>
<div class="ui-panel-border">
    <div class="panel-body padding-none ">
          <div class="ui-toolbar border-none">
            <div class="toolbar-band">
                <?php
                    //use \Cake\Event\EventManager;
                    //use \Cake\Event\Event;
                    $this->dispatchEvent('Client.Toolbar');                   
    
                ?>               
            </div>
      </div>
    
    </div>
 </div>
<br />
 
<?= $this->fetch('content'); ?>