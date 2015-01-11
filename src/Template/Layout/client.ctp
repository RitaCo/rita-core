<?php
    $this->extend('/Layout/default');


    
$this->start('user-nav');
?>
<div class="container">
<div  id="client-navigator">
    

                <?php
                    //use \Cake\Event\EventManager;
                    //use \Cake\Event\Event;
                    $this->dispatchEvent('Client.Toolbar');
    
                ?>               
    
    
 </div>
 <br />
 </div>
<?= $this->end(); ?>
 
<?= $this->fetch('content'); 