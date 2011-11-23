<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<!--wrap start-->
<div id="wrap">
	<!--nav start-->
    <div id="nav">
    	<div class="date"><?php echo date("Y年m月d日"); ?></div>
        <div class="nav-menu">
		<?php
		$menu_job_main = array('label'=>'開心職場', 'url'=>array('/job/index'), );
		if(isset(Yii::app()->params['show_job_main_menu'])) {
			$menu_job_main['active'] = true;
		}

		$menu_microjob = array('label'=>Yii::t('jobs', 'Micro jobs'), 'url'=>array('/microjob/index'), );
		if(isset(Yii::app()->params['show_micro_jobs_menu'])) {
			$menu_microjob['active'] = true;
		}
		$this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				$menu_job_main,
				$menu_microjob,
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
        </div>
        <div class="search">
					<?php echo CHtml::imageButton("images/classified/bt-search.gif"); ?>
        	<input type="text" name="搜索你感興趣的工作" value="搜索你感興趣的工作" class="input-form" />
        </div>	
    </div>
	<!--nav end-->    
	<?php echo $content; ?>
        </div>	
<!--wrap end-->
</body>
</html>
