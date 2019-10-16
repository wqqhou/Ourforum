<div class="ui stackable grid container" ng-controller="JoinCtrl" ng-init="resetKey='<?php echo $key; ?>'">

	<div class="row">

		<div class="eight wide column centered">
			<div class="ui basic segment">
				<h2 class="ui center aligned header">
					設定一組新的密碼吧！
				</h2>
			</div>

			<div class="ui segment large form">
				<div class="field">
					<div class="ui center icon input">
						<i class="lock grey icon"></i>
						<input type="password" id="forget-password" placeholder="新密碼" ng-model="newPassword">
					</div>
				</div>
				<div class="field">
					<div class="ui center icon input">
						<i class="lock grey icon"></i>
						<input type="password" id="forget-ckpassword" placeholder="新密碼確認" ng-model="newPasswordConfirm">
					</div>
				</div>
				<button class="fluid ui button nav-blue notinverted" id="forget-set-newpassword" ng-click="doResetPassword()">確定修改</button>

			</div>

            <div class="ui success message">
                更改後請妥善保管您的密碼，不隨意給予他人，並定期更換。
            </div>
			<div class="ui error message" ng-if="resetError">
				<li ng-repeat="error in resetError">{{ error }}</li>
			</div>

		</div>

	</div>



<style type="text/css">
	body {
		/*background-color: #DADADA;*/
		background: url('<?=base_url()?>assets/img/boy.png') no-repeat bottom 10px left 50px;
	}
	.image {
		margin-top: -100px;
	}
</style>
