<div class="ui stackable grid container" ng-controller="JoinCtrl">

	<div class="row">

		<div class="eight wide column centered">
			<div class="ui basic segment">
				<h2 class="ui center aligned header">
					嗨！歡迎回來
				</h2>
			</div>

			<div class="ui segment large form">
				<div class="field">
					<div class="ui center icon input">
						<i class="user grey icon"></i>
						<input type="text" id="login-email" placeholder="校園信箱 / 短帳號" ng-model="loginEmail">
					</div>
				</div>
				<div class="field">
					<div class="ui center icon input">
						<i class="lock grey icon"></i>
						<input type="password" id="login-password" placeholder="密碼" ng-model="loginPassword">
					</div>
				</div>

				<div class="two ui buttons">
					<button class="ui nav-blue button notinverted" id="login-confirm">登入</button>
					<a class="ui darkgreen button notinverted" href="<?=base_url('join')?>">沒有帳號？註冊</a>
				</div>

				<div ng-cloak class="ui accordion">

					<div class="title">
						<i class="dropdown icon"></i> 遇到困難了嗎？
					</div>

					<div class="content">
						<div class="menu">
							<div id="login-forget" class="item href-hover-dark">忘記密碼</div>
							<div id="login-resend" class="item href-hover-dark">還沒收到啟用信</div>
							<a href="https://www.facebook.com/messages/selene.fans" target="_blank" class="item">聯絡塞拉涅</a>
						</div>
					</div>

				</div> <!-- end of accordion -->

			</div>

		</div>

	</div>

	<!-- Resend Email Modal -->
	<div class="ui small modal" id="login-resend-modal">
		<i class="close icon"></i>
		<div class="header">
			還沒收到啟用信嗎？
		</div>
		<div class="content">
			<div class="ui mini form">
				<div class="field">
					<div class="ui center icon input">
						<i class="user grey icon"></i>
						<input type="text" id="login-resend-email" placeholder="註冊時填寫的校園信箱" ng-model="loginEmail">
					</div>
					<p>{{ resendError }}</p>
				</div>
			</div>

		</div>
		<div class="actions">
			<div class="ui nav-blue notinverted button" id="login-resend-confirm" ng-click="resendEnable()">重寄</div>
			<div class="ui darkred notinverted button modal-cancel">取消</div>
		</div>
	</div>

	<!-- Forget Password Modal -->
	<div class="ui modal" id="login-forget-modal">
		<i class="close icon"></i>
		<div class="header">
			忘記密碼了嗎？與您的帳號重逢吧！
		</div>

		<div class="content">

			<div class="ui mini form">
				<div class="ui positive message">
					<p>告訴我們你的資料，我們會協助你與帳號重逢的！</p>
				</div>

				<div class="field" id="join-school">
					<select class="ui search dropdown join-choose" id="join-school-value" ng-model="loginSchool">
						<option value="">搜尋學校</option>
						<option value="{{ school.id }}" ng-repeat="school in schoolList">{{ school.title }}</option>
					</select>
				</div>

				<div class="field" id="join-gender">
					<select class="ui dropdown join-choose" ng-model="loginGender">
						<option value="">選擇性別</option>
						<option value="1">男孩</option>
						<option value="0">女孩</option>
					</select>
				</div>

				<div class="field" id="join-dept">
					<select class="ui search dropdown join-choose" ng-model="loginDept">
						<option value="">搜尋系所</option>
						<option value="{{ dept.id }}" ng-repeat="dept in deptList">{{ dept.title }}</option>
					</select>
				</div>

				<div class="field" id="join-email">
					<div class="ui right icon input">
						<i class="mail grey icon"></i>
						<input type="text" class="join-choose" ng-model="loginEmail" placeholder="校園信箱" required>
					</div>
				</div>
				<li ng-repeat="error in resetError">{{ error }}</li>

			</div>
		</div>

		<div class="actions">
			<div class="ui nav-blue notinverted button" id="login-forget-confirm" ng-show="loginEmail.length > 0" ng-click="resetPassword()">確定</div>
			<div class="ui darkred notinverted button modal-cancel">取消</div>
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
