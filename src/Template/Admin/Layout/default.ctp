<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <?= $this->Html->charset() ?>
    <meta name="referrer" content="default">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?= $this->Rita->pageTitle('ریتا'); ?>
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
					<?= (!\Cake\Core\Plugin::loaded('Rita/Users')) ?: $this->element('Rita/Users.box-login-info'); ?>
				</div>
			</div>
		</header>
		
		
		<section class="admin-body-wrapper">
            <?= $this->element('Rita/Core.Navigator/main-left'); ?>	
			
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
					
					<section id="<?= $this->getLayoutID(); ?>" class="content-body">
                        <?= $this->fetch('content') ?>
					</section>
				</div>

				<div class="admin-footer-wrapper">
					<span>ویرایش : ۳.۰.۱۰</span>
				</div>
	
			</div>
			
		</section>

	</div>
</div>
</body>
</html>
