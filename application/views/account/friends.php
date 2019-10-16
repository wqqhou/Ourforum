		<div class="ui thirteen wide column fluid" ng-init="friends()">

			<div ng-cloak class="ui success message" id="no-more-friends" ng-if="noFriends">
				<p>醒醒吧！你沒有涅友</p>
			</div>

			<div ng-cloak class="ui negative message" id="fail-loading-friends" ng-if="failLoading">
				<p>載入失敗QQ</p>
			</div>


			<div ng-cloak class="ui basic segment" ng-show="friendsList">
				<div class="ui toggle checkbox">
					<input type="checkbox" id="friendsUnread" ng-model="friendsUnread" ng-true-value="1" ng-false-value="undefined">
					<label for="friendsUnread" class="pointer">只顯示有未讀訊息的好友</label>
				</div>

			</div>

			<!-- 涅友列表 -->
			<div ng-cloak class="ui basic segment stackable four column doubling grid" id="friends-list">

				<div class="column" ng-repeat="friend in friendsList | filter: {sms: friendsUnread}">
					<div class="ui card fluid">
						<a class="ui" target="_self" ng-href="<?=base_url('account/friends')?>/{{ friend.friends }}">
							<div class="image-square image radius-4" style="background-image: url({{( friend.pic.startsWith('userimg') ? 'https://selene.tw/'+friend.pic : friend.pic  )}})"></div>
						</a>
						<div class="floating ui red label" ng-if="friend.sms == 1">1</div>
						<div class="content">
							<a class="header center aligned" ng-href="<?=base_url('account/friends')?>/{{ friend.friends }}">
								{{ ( friend.firstname !== null ? friend.firstname : ( friend.gender == 1 ? "男" : "女" ) ) }}
							</a>
						</div>
					</div>
				</div>

			</div>

		</div>

	</div> <!-- end of container -->
