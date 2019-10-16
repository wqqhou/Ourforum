<div class="ui stackable grid container" ng-controller="JoinCtrl">

	<div class="row">

		<div class="eight wide column centered">
			<div class="ui basic center aligned segment">
				<h2 class="ui header">
					加入 Selene！
				</h2>
			</div>

				<div class="ui segment large form">

					<div class="field" id="join-gender">
						<select class="ui dropdown join-choose" ng-model="joinGender">
							<option value="">選擇性別</option>
							<option value="1">男</option>
							<option value="0">女</option>
						</select>
					</div>

					<div class="field" id="join-birthday">
						<div class="ui right icon input">
							<i class="calendar outline grey icon"></i>
							<input type="text" class="join-choose" mask="2999-19-39" ng-model="joinBirthday" placeholder="生日">
						</div>
					</div>

					<div class="field" id="join-email">
						<div class="ui right icon input">
							<i class="mail grey icon"></i>
							<input type="text" class="join-choose" ng-model="joinEmail" placeholder="信箱">
						</div>
					</div>

					<div class="field" id="join-firstname">
						<div class="ui center icon input">
							<i class="user grey icon"></i>
							<input type="text" class="join-choose" ng-model="joinFirstname" placeholder="真實姓名">
						</div>
					</div>

					<div class="field" id="join-psw">
						<div class="ui center icon input">
							<i class="lock grey icon"></i>
							<input type="password" class="join-choose" ng-model="joinPassword" placeholder="密碼 6-20 英文及數字">
						</div>
					</div>
					<div class="field" id="join-ck_psw">
						<div class="ui center icon input">
							<i class="lock grey icon"></i>
							<input type="password" class="join-choose" ng-model="joinPasswordConfirm" placeholder="確認密碼">
						</div>
					</div>

					<div class="field">
						<div class="ui positive message">
							<div class="ui toggle checkbox">
							  <input type="checkbox" name="example" ng-model="joinTerms">
							  <label>我同意 Selene 會員條款 <a href="<?=base_url('terms')?>" target="_blank"><i class="ui external share grey icon"></i></a></label>
							</div>
						</div>
					</div>

					<div class="two ui buttons">
						<button class="ui nav-blue button notinverted" ng-click="join()">註冊！</button>
						<a class="ui darkgreen button notinverted" href="<?=base_url('login')?>">已有帳號？登入</a>
					</div>

				</div> <!-- END OF SEGMENT-->

		</div> <!-- END OF EIGHT WIDE COLUMN -->

	</div> <!-- END OF ROW -->

</div> <!-- END OF CONTAINER -->

<style type="text/css"> body { background: url('<?=base_url()?>assets/img/boy.png') no-repeat bottom 10px left 50px fixed; } </style>
