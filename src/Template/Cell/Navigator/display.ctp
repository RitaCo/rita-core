			<div class="admin-sidebar-wrapper">
				<div  class="admin-navigator-container">		
					<ul id="sticker" class="ui-menu">
						<li>
							<a href="/admin">
								<div class="icon"><i class=" icon-homealt"></i></div>
								<div class="label"><span>داشبورد</span></div>
							</a>
						</li>

                        <?=  $this->element('RequirementsManager.Admin/menu');?>

                        <?=  $this->element('Rita/Users.Admin/menu');?>
                        <?=  $this->element('Rita/Accounting.Admin/menu');?>
                          <?php 
                            //$this->element('Rita/JobQueue.Admin\menu'); 
                            ?>
					</ul>
				</div>
			</div>	
				