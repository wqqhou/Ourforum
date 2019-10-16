
	<div class="ui left vertical inverted sidebar scrollbar-black labeled icon menu" ng-controller="ArticleListCtrl" id="sidebar-school">
		<a class="item" ng-href="<?=base_url('a')?>/{{ type.di_code }}" ng-repeat="type in typeList | filter: {di_sch: 1}" ng-bind="type.di_name"></a>
	</div>

	<div class="ui left vertical inverted sidebar scrollbar-black labeled icon menu" ng-controller="ArticleListCtrl" id="sidebar-dis">
		<a class="item" ng-href="<?=base_url('a')?>/{{ type.di_code }}" ng-repeat="type in typeList | filter: {di_sch: 0}" ng-bind="type.di_name"></a>
	</div>

<?php if ( $this->session->userdata('ts') ) { ?>

	<div class="ui left vertical inverted sidebar labeled menu" id="sidebar-menu">
		<a class="item" href="<?=base_url('account/profile')?>">
			我的名片
		</a>
		<a class="item" href="<?=base_url('account/friends')?>">
			我的涅友
		</a>
		<a class="item" href="<?=base_url('account/article')?>">
			我的文章
		</a>
		<a class="item" href="<?=base_url('friend')?>">
			今日涅友
		</a>
		<a class="item" href="<?=base_url('activity/siege')?>">
			攻城戰
		</a>
		<a class="item" href="<?=base_url('account/school')?>">
			進入校板
		</a>
		<a class="item" href="<?=base_url('other/problem')?>">
			回報問題
		</a>
		<a class="item" href="<?=base_url('activity/join')?>">
			涅活動
		</a>
		<a class="item" href="<?=base_url('other/shop')?>">
			涅商店
		</a>
		<a class="item" href="<?=base_url('other/teach')?>">
			涅知識
		</a>
		<a class="item" href="<?=base_url('logout')?>">
			登出
		</a>
	</div>


	<div class="ui sidebar inverted vertical menu scrollbar-black" id="sidebar-notice" ng-controller="NotificationCtrl">

		<a class="item notice" target="_self" ng-href="<?=base_url('account/query/notice/check')?>/{{ notice.tr_id }}"
			ng-repeat="notice in noticeList.article">
			<i class="comments icon"></i> 你追蹤的文章 「{{ notice.art_name }}」 有新的留言
		</a>

		<a class="item notice" target="_self" ng-href="<?=base_url('account/friends')?>"
			ng-if="noticeList.account.sms == '1'">
			<i class="comments icon"></i> 你有新訊息！
		</a>

	</div>
<?php } else { ?>
	<div class="ui top sidebar wide inverted segment overlay" id="notlogin-banner" style="background-color: #444;">
		<div class="ui center aligned page grid">
			<div class="one column row">
				<div class="sixteen wide column">
					<h3 class="ui header inverted">嗨！ 歡迎來到 Selene，讓我們一起開啟這段旅程吧！</h3>
				</div>
			</div>
			<div class="three column divided row">
				<div class="column">
					<a class="ui inverted notinverted" href="<?=base_url('join')?>"><i class="ui plus icon"></i> 我要加入</a>
				</div>
				<div class="column">
					<a class="ui inverted notinverted" href="<?=base_url('login')?>"><i class="ui send icon"></i> 登入</a>
				</div>
				<div class="column">
					<a class="ui inverted notinverted" href="<?=base_url('')?>"><i class="ui help icon"></i>查看介紹
				</div>
			</div>
		</div>
	</div>

<?php } ?>


	<div class="pusher">

		<div class="ui fixed nav-blue inverted menu grid">
			<div class="ui container">
				<a target="_self" href="<?=base_url()?>" class="header item">
					<img class="logo" src="<?=base_url()?>assets/img/logo.png">
				</a>

			<?php if ( $this->session->userdata('ts') ) { ?>

				<a id="sidebar-open" class="item"><i class="list layout icon"></i></a>

				<a ng-cloak id="notice-open" class="item" ng-show="noticeCount > 0" ng-controller="NotificationCtrl">
					<i class="alarm icon"></i>
					<div class="navbar-bottom ui red label" ng-bind="noticeCount"></div>
				</a>

				<a ng-cloak id="friend-open" class="item" href="<?=base_url('account/friends')?>"  ng-controller="NotificationCtrl" ng-show="noticeList.account.friend == '1'">
					<i class="user icon" style="color:#fbf579;"></i>
				</a>


				<a class="ui simple item right desktop-only" href="<?=base_url('account/profile')?>">
					<?php echo $this->session->userdata('name'); ?>
				</a>

			<?php } else { ?>

				<div class="right menu">
					<a class="item" href="<?=base_url()?>login/">登入</a>
					<a class="item" href="<?=base_url()?>join/">註冊</a>
				</div>

			<?php } ?>

			</div>
		</div>
