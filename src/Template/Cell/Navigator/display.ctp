			<div class="admin-sidebar-wrapper">
				<div  class="admin-navigator-container">		
					<ul id="sticker" class="ui-menu">
						<li>
							<a href="/admin">
								<div class="icon"><i class=" icon-homealt"></i></div>
								<div class="label"><span>داشبورد</span></div>
							</a>
						</li>
						<li>
							<a href="/admin/requirements">
								<div class="icon"><i class=" icon-news"></i></div>
								<div class="label"><span>نیازمندی ها</span></div>
							</a>
							<ul class="menu-submenu">
								<li>
									<a href="/admin/requirements/notices">
										<div class="icon"><i class="  icon-list-alt"></i></div>
										<div class="label"><span>آگهی ها</span></div>
									</a>
                                    <ul class="menu-submenu">
        								<li>
        									<a href="/admin/requirements/notices/recheck">
        										<div class="icon"><i class=" icon-programok"></i></div>
        										<div class="label"><span>آگهی‌های تازه/ویرایش شده</span></div>
        									</a>
        								</li>
                                    </ul>
								</li>
								<li>
									<a href="/admin/requirements/calendars">
										<div class="icon"><i class="fa fa-calendar"></i></div>
										<div class="label"><span>تقویم</span></div>
									</a>
								</li>
								<li>
									<a href="/admin/requirements/categories">
										<div class="icon"><i class=" icon-homealt"></i></div>
										<div class="label"><span>گروها</span></div>
									</a>
								</li>
								<li>
									<a href="/admin/requirements/plans">
										<div class="icon"><i class=" icon-pagesetup"></i></div>
										<div class="label"><span>پلن‌ها</span></div>
									</a>
								</li>
								<li>
									<a href="/admin/requirements/archives">
										<div class="icon"><i class="icon-stacks"></i></div>
										<div class="label"><span>آرشیو چاپی</span></div>
									</a>
								</li>						
							</ul>							
						</li>
						<li>
							<a href="/admin/userManger">
								<div class="icon"><i class=" fa fa-users"></i></div>
								<div class="label"><span>کاربران</span></div>
							</a>
							<ul class="menu-submenu">
								<li>
									<a href="/admin/userManger/users">
										<div class="icon"><i class=" fa fa-user"></i></div>
										<div class="label"><span>مدیریت اعضا</span></div>
									</a>
								</li>
								<li>
									<a href="/admin/userManger/roles">
										<div class="icon"><i class=" icon-news"></i></div>
										<div class="label"><span>مدیریت نقش‌ها</span></div>
									</a>
								</li>
								<li>
									<a href="/admin/users/settings">
										<div class="icon"><i class=" icon-homealt"></i></div>
										<div class="label"><span>تنظیمات</span></div>
									</a>
								</li>
						
							</ul>								
						</li>
                        <?=  $this->element('Rita/Accunting.Admin\menu'); ; ?>
						<li>
							<a href="/admin">
								<div class="icon"><i class=" icon-homealt"></i></div>
								<div class="label"><span>تنظیمات</span></div>
							</a>
						</li>
                          <?php 
                            //$this->element('Rita/JobQueue.Admin\menu'); 
                            ?>
					</ul>
				</div>
			</div>	
				