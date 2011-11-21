<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/classified_style.css" />
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
		$this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				$menu_job_main,
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
    <!--left-part start-->
    <div id="left-part">
    	<!--buttons start-->
        <div class="buttons">
        	<?php echo CHtml::link(CHtml::image("images/classified/bt-needjob.gif", "我要求職", array('class' => 'img-left')), array('job/create', 'pid'=>2)); ?>
        	<?php echo CHtml::link(CHtml::image("images/classified/bt-needp.gif", "我要請人"), array('job/create', 'pid'=>1)); ?>
        </div>	
				<?php if(isset($this->breadcrumbs)):?>
					<?php $this->widget('zii.widgets.CBreadcrumbs', array(
						'links'=>$this->breadcrumbs,
						'separator' => '&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;',
						'homeLink' => false,
					)); ?><!-- breadcrumbs -->
				<?php endif?>
        <!--guide end-->
        <!--buttons end-->
				<?php echo $content; ?>
        <!--day-lists end-->
        <!--job-ads start-->
        <div class="job-ads">
        	<div class="arrow-left"><a href="#">&nbsp;</a></div>
            <p><a href="#"><img src="images/classified/bn-job1.gif" alt="易登網" /></a></p>
            <p><img src="images/classified/bn-job-model.gif" alt="job-ad" /></p>
            <p><img src="images/classified/bn-job-model.gif" alt="job-ad" /></p>
            <p><img src="images/classified/bn-job-model.gif" alt="job-ad" /></p>
            <div class="arrow-right"><a href="#">&nbsp;</a></div>
            <div style="clear:both;"></div>
        </div>	
        <!--job-ads end-->
        <!--chongdian start-->
        <div class="chongdian">
        	<div class="menu">
            	<div class="right"><img src="images/classified/bn-chongdian.gif" /></div>
            	<a href="#">職場充電</a>
            </div>
            <ul>
            	<li><a href="#">雙贏的溝通技巧</a> <img src="images/classified/icon-photo.gif" alt="photo" /></li>
                <li><a href="#">影響式溝通技巧</a> <img src="images/classified/icon-photo.gif" alt="photo" /></li>
                <li><a href="#">人際風格與有效溝通技巧訓練</a> <img src="images/classified/icon-photo.gif" alt="photo" /></li>
                <li><a href="#">高效的管理溝通技巧</a> <img src="images/classified/icon-photo.gif" alt="photo" /></li>
                <li><a href="#">客戶心理學和客戶溝通技巧</a> <img src="images/classified/icon-photo.gif" alt="photo" /></li>
                <li><a href="#">影響式溝通技巧</a> <img src="images/classified/icon-photo.gif" alt="photo" /></li>
                <li><a href="#">人際風格與有效溝通技巧訓練</a> <img src="images/classified/icon-photo.gif" alt="photo" /></li>
                <li><a href="#">高效的管理溝通技巧</a> <img src="images/classified/icon-photo.gif" alt="photo" /></li>
                <li><a href="#">客戶心理學和客戶溝通技巧</a> <img src="images/classified/icon-photo.gif" alt="photo" /></li>
            </ul>
            <ul class="ul-border">
            	<li><a href="#">雙贏的溝通技巧</a> <img src="images/classified/icon-photo.gif" alt="photo" /></li>
                <li><a href="#">影響式溝通技巧</a> <img src="images/classified/icon-photo.gif" alt="photo" /></li>
                <li><a href="#">人際風格與有效溝通技巧訓練</a> <img src="images/classified/icon-photo.gif" alt="photo" /></li>
                <li><a href="#">高效的管理溝通技巧</a> <img src="images/classified/icon-photo.gif" alt="photo" /></li>
                <li><a href="#">客戶心理學和客戶溝通技巧</a> <img src="images/classified/icon-photo.gif" alt="photo" /></li>
                <li><a href="#">影響式溝通技巧</a> <img src="images/classified/icon-photo.gif" alt="photo" /></li>
                <li><a href="#">人際風格與有效溝通技巧訓練</a> <img src="images/classified/icon-photo.gif" alt="photo" /></li>
                <li><a href="#">高效的管理溝通技巧</a> <img src="images/classified/icon-photo.gif" alt="photo" /></li>
                <li><a href="#">客戶心理學和客戶溝通技巧</a> <img src="images/classified/icon-photo.gif" alt="photo" /></li>
            </ul>
            <div class="clear"></div>
        </div>
        <!--chongdian end-->
    </div>
    <!--left-part end-->
    <!--right-part start-->
    <div id="right-part">
        <div class="key">
            <a href="#">全職</a> &nbsp;<a href="#">兼職</a> &nbsp;<a href="#">餐館</a> &nbsp;<a href="#">美容</a> &nbsp;<a href="#">保姆</a>
        </div>
        <div class="j-joy">
            <div class="menu-r">
                <div class="more"><a href="#">&nbsp;</a></div>
                <div class="joy-title"><a href="#">開心職場</a></div>
            </div>
            <dl>
                <dt><a href="#">加薪的理由...</a></dt>
                <dd>"你必须给我加薪！"一个人对他的老板说，"现在有三家公司找我呢。""是吗？"老板问他，"是哪三家公司找你？""电力...<span class="green12"><a href="#">查看詳細</a></span></dd>
            </dl>
        </div>
        <div class="job-board">
            <div class="menu-r">
                <div class="more"><a href="#">&nbsp;</a></div>
                <a href="#">工作即時貼</a>
            </div>
            <p><a href="#">曼哈頓中城旺店請手法按摩好年輕按摩師一名另招學員學成留店請電718-503-4797</a></p>
            <p><a href="#">曼哈頓中城旺店請手法按摩好年輕按摩師一名另招學員學成留店請電718-503-4797</a></p>
            <p><a href="#">曼哈頓中城旺店請手法按摩好年輕按摩師一名另招學員學成留店請電718-503-4797</a></p>
            <textarea class="textarea">一句話找工作</textarea>
            <input type="text" value="請輸入驗證碼" class="input-form" />
            <div class="code"><img src="images/classified/code.gif" alt="驗證碼" /></div>
            <div class="clear"></div>
            <div class="bt-send"><input type="image" src="images/classified/bt-fabu.gif" name="即時發佈信息" /></div>
        </div>
        <div>
        	<img src="images/classified/ad.gif" width="300" height="250" alt="ad" />
        </div>
        <div class="hudong">
        	<div class="menu-r">
            	<div class="more"><a href="#">&nbsp;</a></div>
                <a href="#">互動專區</a>
            </div>
            <div class="hd-group">
            	<p class="h-title">我找到工作了！</p>
                <p class="h-by">by Anna</p>
            </div>
            <div class="hd-group">
            	<p class="h-title">我找到工作了！</p>
                <p class="h-by">by Anna</p>
            </div>
        </div>
        <div class="bn-ad"><a href="#"><img src="images/classified/bn-go.gif" alt="到此一逛，總有驚喜！" /></a></div>
        <div class="job-info">
        	<div class="menu-r">
            	<div class="more"><a href="#">&nbsp;</a></div>
                <a href="#">職場資訊</a>
            </div>
            <ul>
            	<li><a href="#">英国规定　五岁以下孩子也要运动</a></li>
                <li><a href="#">苹果股价有望早于Google达到600美元</a></li>
                <li><a href="#">思豪戀破局／李泳漢怒：楊思琦還我李家清白</a></li>
                <li><a href="#">英国规定　五岁以下孩子也要运动</a></li>
            </ul>
        </div>
    </div>
    <!--right-part end-->
</div>
<!--wrap end-->
</body>
</html>
