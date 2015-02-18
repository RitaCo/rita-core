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

    <?= $this->Rita->loadingCSS() ?>
    <?= $this->Rita->loadingJS() ?>
        

	
		
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
  		            <div class="freebox"></div>
					<?= $this->element('Rita/Users.box-login-info'); ?>
				</div>
			</div>
		</header>
		
		
		<section class="admin-body-wrapper">
            <?= $this->element('Rita/Core.Admin/Navigator/main-left'); ?>	
			
			<div class="admin-content-wrapper">
			
				<div id="content">
					<section class="content-header">
						<div class="info">
                            <span class="action-title"><?= $this->fetch('title'); ?></span>
                            <span class="action-note"><?= $this->fetch('note'); ?></span>
                        </div>
						<div class="actions">
                            <?php
                                if ($this->exists('Page.Action')){
                                    echo '<div class="btn-group">';
                                    echo $this->fetch('Page.Action');
                                    echo '</div>';
                                 } 
                            ?>
                        </div>
					</section>
					
					<section class="content-flash"><?= $this->Flash->render() ?></section>
					
					<section class="content-body">
        <?= $this->fetch('content') ?>
					</section>
				</div>

				<div class="admin-footer-wrapper">
					<span>ویرایش : ۳.۰.۱</span>
				</div>
	
			</div>
			
		</section>

	</div>
</div>
</body>
</html>
