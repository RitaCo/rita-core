<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'ریتا : ';
?>
<!DOCTYPE html>
<html dir="rtl">
<head>
	<?= $this->Html->charset() ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
		<?= $cakeDescription ?>:
		<?= $this->fetch('title') ?>
	</title>
	<?= $this->Html->meta('icon') ?>

	<?= $this->Rita->css() ?>
	<?= $this->Html->script([
		'jquery-2.1.1',
		'jquery.sticky',
		'Admin'
	]) ?>

	<?= $this->fetch('meta') ?>
	<?= $this->fetch('css') ?>
	<?= $this->fetch('script') ?>
</head>
<body>
<div class="rita-viewport">
	<div class="admin-container sidebar-hide">

		<header class="admin-header-wrapper">
			<div id="admin-header">
				<div id="logo">
					<?= $this->Html->image('rita-logo-w.png'); ?> <span>۳</span>
				</div>
				<div class="options" >
  		            <div class="freebox">
                    &nbsp;
                        
                    </div>
					<div class="loginbox">
                        <div><?= $this->Html->image('avator1.png'); ?></div>
                        <span>خوش آمدید</span>
                    </div>
				</div>
			</div>
		</header>
		
		
		<section class="admin-body-wrapper">
			<?= $this->cell('Rita.Navigator'); ?>	
			
			<div class="admin-content-wrapper">
			
				<div id="content">
					<section class="content-header">
						<div class="info">
                            <span class="action-title"><?= $this->fetch('title'); ?></span>
                            <span class="action-note"><?= $this->fetch('note'); ?></span>
                        </div>
						<div class="actions"></div>
					</section>
					
					<section class="content-flash"><?= $this->Flash->render() ?></section>
					
					<section class="content-body">
						<?= $this->fetch('content') ?>
					</section>
				</div>

				<div class="admin-footer-wrapper">
					<span>نسخه پیش نمایش : اول</span>
				</div>
	
			</div>
			
		</section>

	</div>
</div>
</body>
</html>
