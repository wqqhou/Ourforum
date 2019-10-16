<div class="ui grid stackable container" ng-controller="ArticleListCtrl">

	<div class="three wide computer tablet only column">
		<div class="ui vertical fluid text menu" id="article-menu">
			<div class="item">
				<div class="ui left  icon input">
					<input type="text" placeholder="搜尋文章、看板" id="search-input" on-enter="search()" ng-model="keywords">
					<i class="search icon button"></i>
				</div>
			</div>

			<div ng-cloak class="menu" id="menu-list">
				<a id="menu-all" target="_self" class="item art-class" href="<?=base_url()?>a">全部</a>
				<a id="menu-{{ type.di_code }}" target="_self" class="item art-class" ng-href="<?php echo base_url() ?>a/{{ type.di_code }}" ng-repeat="type in typeList | filter: {di_sch: 0, di_name: keywords}" ng-bind="type.di_name"></a>
			</div>

			<div ng-cloak class="ui accordion">

				<div class="title">
					<i class="dropdown icon"></i>校園看板 ({{ (typeList | filter: {di_sch: 1, di_name: keywords}).length }})
				</div>

				<div class="content">
					<div class="menu" id="menu-list-school">
						<a id="menu-{{ type.di_code }}" target="_self" class="item art-class" ng-href="<?php echo base_url() ?>a/{{ type.di_code }}" ng-repeat="type in typeList | filter: {di_sch: 1, di_name: keywords}" ng-bind="type.di_name"></a>
					</div>
				</div>

			</div> <!-- end of accordion -->

		</div>

		<div class="ui horizontal link list">
		  <a class="item" href="<?php echo base_url('terms'); ?>">使用條款</a>
		  <a class="item">廣告</a>
		  <a class="item">聯絡我們</a>
		</div>

		<div class="ui basic segment" id="article_adv_adgeek_3">
		</div>

	</div>

	<div class="mobile only column basic segment">
		<div class="ui button grey" id="sidebar-dis-open">討論板</div>
		<div class="ui button grey" id="sidebar-school-open">校版列表</div>
	</div>

	<div class="ui basic segment form mobile only column">
		<div class="field">
			<input type="text" placeholder="搜尋文章" id="search-input" on-enter="search()" ng-model="keywords">
		</div>
	</div>
