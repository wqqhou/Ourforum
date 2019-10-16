    <div class="ui thirteen wide column fluid" ng-init="items();">

		<div ng-cloak class="ui success message" ng-if="noItems">
			<p>還沒有物品，參加活動或購買可取得！</p>
		</div>
		<div ng-cloak class="ui negative message" ng-if="failLoading">
			<p>載入失敗</p>
		</div>

        <div ng-cloak class="ui stackable four column doubling grid" id="items-list">

			<div class="column" ng-repeat="item in itemsList">
				<div class="ui card centered card fluid" ng-click="loadItemDetail( $index )">
					<a class="ui" href="#" target="_self">
						<div class="image-square image radius-4" style="background-image: url(//static.selene.tw/assets/img/badge/{{ item.sh_img }})">
						</div>
					</a>
					<div class="content">
						<a class="header center aligned" href="#" target="_self" ng-bind="item.sh_name" ></a>
					</div>
				</div>
			</div>

		</div>

		<!-- Modal -->
		<div class="ui basic modal" id="item-detail-modal">
			<div class="ui icon header"> {{ itemModal.sh_name }} </div>
			<div class="content">
				<div class="image">
					<img class="ui centered small image" ng-src="//static.selene.tw/assets/img/badge/{{ itemModal.sh_img }}"/>
				</div>
				<div class="description">
					<p align="center">{{ itemModal.sh_content }}</p>
				</div>
			</div>
			<div class="actions">
				<div class="ui basic green ok button">確定</div>
			</div>
		</div>

    </div>
