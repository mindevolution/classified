<?php
$this->menu = array(
    array('label' => 'Create Job', 'url' => array('create')),
    array('label' => 'Manage Job', 'url' => array('admin')),
);

$areas_menu = array(
    // set the all area menu category
    array(
	'label' => '全部地區',
	'url' => array('job/index'),
	'active' => isset($_GET['aid']) ? false : true, // set to active when select all
    ),
);
foreach ($areas as $id => $name) {
	$areas_menu[] = array(
	    'label' => $name,
	    'url' => array('job/index/', 'aid' => $id),
	);
}
?>
<!--left-part start-->
<div id="left-part">
	<!--buttons start-->
        <div class="buttons">
		<?php echo CHtml::link(CHtml::image("images/classified/bt-needjob.gif", "我要求職", array('class' => 'img-left')), array('job/create', 'pid' => 2)); ?>
		<?php echo CHtml::link(CHtml::image("images/classified/bt-needp.gif", "我要請人"), array('job/create', 'pid' => 1)); ?>
        </div>	
	<?php if (isset($this->breadcrumbs)): ?>
		<?php
		$this->widget('zii.widgets.CBreadcrumbs', array(
		    'links' => $this->breadcrumbs,
		    'separator' => '&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;',
		    'homeLink' => false,
		));
		?><!-- breadcrumbs -->
	<?php endif ?>
	<!--guide end-->
	<!--buttons end-->
	<div class="area">
		<?php
		// display the area filter menu
		$this->beginWidget('zii.widgets.CPortlet', array(
//		'title' => 'Operations',
		));
		$this->widget('zii.widgets.CMenu', array(
		    'items' => $areas_menu,
		    'htmlOptions' => array('class' => 'select-area'),
		));
		$this->endWidget();
		?>
		<div style="clear:both;"></div>
	</div>

	<?php
	$this->widget('zii.widgets.CListView', array(
	    'dataProvider' => $dataProvider,
	    'itemView' => '_view',
	    'template' => "{items}{pager}",
	    'pager' => array(
		'header' => '', //text before it
		'firstPageLabel' => '第一页', //overwrite firstPage lable
		'lastPageLabel' => '最后一页', //overwrite lastPage lable
		'nextPageLabel' => '下一頁', //overwrite nextPage lable
		'prevPageLabel' => '上一頁', //overwrite prePage lable
	    ),
	));
	?>

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
	<?php echo $this->renderPartial('right/interactive_and_info'); ?>
</div>
<!--right-part end-->