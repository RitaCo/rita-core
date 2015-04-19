<?php

$afterEvent = $this->dispatchEvent('rita.admin.menu');

$menus = $afterEvent->result;


?>

			<div class="admin-sidebar-wrapper">
				<div  class="admin-navigator-container">		
					<ul id="sticker" class="ui-menu">
						<li>
							<a href="/admin">
								<div class="icon"><i class=" icon-homealt"></i></div>
								<div class="label"><span>پیشخوان</span></div>
							</a>
						</li>

						<li>
							<a href="#">
								<div class="icon"><i class=" icon-stacks"></i></div>
								<div class="label"><span>محتوا</span></div>
							</a>
                            <ul class="menu-submenu">
                                <?php 
                                 foreach($menus['content'] as $menu){
                                    echo $this->element($menu);
                                 }
                                ?>

                            </ul>
						</li>
						<li>
							<a href="#">
								<div class="icon"><i class="icon-webpage"></i></div>
								<div class="label"><span>افزونه ها</span></div>
							</a>
                            <ul class="menu-submenu">
                            
                                <?php 
                                 foreach($menus['addons'] as $menu){
                                    echo $this->element($menu);
                                 }
                                ?>

                            </ul>
						</li>                                                  
					</ul>
				</div>
			</div>	
				