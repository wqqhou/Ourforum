	<div class="ui grid stackable container" ng-controller="AccountCtrl">
	    <div class="three wide computer tablet only column">
	        <div class="ui vertical text menu">
				<div class="item">
					<div class="menu">
	                    <a id="menu-all" class="item" href="<?=base_url('account/profile')?>"><h5 class="ui header"><i class="payment icon"></i>名片</h5></a>
	                    <a id="menu-all" class="item" href="<?=base_url('account/friends')?>"><h5 class="ui header"><i class="users icon"></i>涅友</h5></a>
	                    <a id="menu-all" class="item" href="<?=base_url('account/article')?>"><h5 class="ui header"><i class="bookmark icon"></i>文章</h5></a>
	                    <a id="menu-all" class="item" href="<?=base_url('account/archive')?>"><h5 class="ui header"><i class="tags icon"></i>收藏</h5></a>
	                    <a id="menu-all" class="item" href="<?=base_url('account/items')?>"><h5 class="ui header"><i class="inbox icon"></i>物品</h5></a>
	                    <a id="menu-all" class="item" href="<?=base_url('account/warning')?>"><h5 class="ui header"><i class="warning sign icon"></i>警告</h5></a>
	                </div>
				</div>
	        </div>

			<div id="account_adv_adgeek_0">
			</div>
	    </div>

		<div class="three wide mobile only column" id="menu-list-account">

			<div class="ui selection fluid dropdown">
				<input type="hidden" onchange="window.location.href = '<?php echo base_url(); ?>' + $(this).val()">
				<i class="dropdown icon"></i>
				<div class="default text"><i class="user icon"></i>我</div>
				<div class="menu">
					<div class="item" data-value="account/profile">名片</div>
					<div class="item" data-value="account/friends">涅友</div>
					<div class="item" data-value="account/article">文章</div>
					<div class="item" data-value="account/archive">收藏</div>
					<div class="item" data-value="account/items">物品</div>
					<div class="item" data-value="account/warning">警告</div>
				</div>
			</div>

		</div>
