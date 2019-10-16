    <div class="ui thirteen wide column" id="display_article" ng-init="article();joinArticle()">

		<div class="ui top attached tabular menu">
			<a class="item active" data-tab="first">發布</a>
			<a class="item" data-tab="second">參與</a>
		</div>
		<div class="ui bottom attached tab segment active" data-tab="first">
			<table ng-cloak class="ui selectable very basic table" ng-if="articleList">
				<thead>
					<tr>
						<th class="six wide">主題</th>
						<th class="two wide">板塊</th>
						<th class="two wide">發布時間</th>
						<th class="two wide">更新時間</th>
						<th class="one wide"><i class="heart red icon"></i></th>
						<th class="one wide"><i class="comments grey icon"></i></th>
						<th class="two wide">修改建議</th>
					</tr>
				</thead>
				<tbody>
					<tr class="pointer" ng-repeat="article in articleList" ng-click="goto( article.di_code + '/' + article.id )">
						<td>{{ article.art_name }}</td>
						<td>{{ article.di_name }}</td>
						<td>{{ article.time.substring(0, 10) }}</td>
						<td>{{ article.updated_at.substring(0, 10) }}</td>
						<td>{{ article.like_count }}</td>
						<td>{{ article.reply_count }}</td>
						<td>{{ article.response_count }}</td>
					</tr>
				</tbody>
			</table>

			<div infinite-scroll="article()" infinite-scroll-distance="0" infinite-scroll-disabled="noArticle || !scroll_switch_article"></div>

			<div ng-cloak class="ui success message" ng-if="noArticle">
				<p>沒有更多發布的文章了。快去與大家分享你的趣事吧！</p>
			</div>
			<div ng-cloak class="ui negative message" ng-if="failLoading">
				<p>載入失敗</p>
			</div>

		</div>
		<div class="ui bottom attached tab segment" data-tab="second">
			<table ng-cloak class="ui selectable very basic table" ng-if="joinArticleList">
				<thead>
					<tr>
						<th class="six wide">主題</th>
						<th class="two wide">板塊</th>
						<th class="two wide">發布時間</th>
						<th class="two wide">更新時間</th>
						<th class="one wide"><i class="heart red icon"></i></th>
						<th class="one wide"><i class="comments grey icon"></i></th>
						<th class="two wide">修改建議</th>
					</tr>
				</thead>
				<tbody>
					<tr class="pointer" ng-repeat="article in joinArticleList" ng-click="goto( article.di_code + '/' + article.id )">
						<td>{{ article.art_name }}</td>
						<td>{{ article.di_name }}</td>
						<td>{{ article.time.substring(0, 10) }}</td>
						<td>{{ article.updated_at.substring(0, 10) }}</td>
						<td>{{ article.like_count }}</td>
						<td>{{ article.reply_count }}</td>
						<td>{{ article.response_count }}</td>
					</tr>
				</tbody>
			</table>

			<div infinite-scroll="joinArticle()" infinite-scroll-distance="0" infinite-scroll-disabled="noArticle || !scroll_switch_join_article"></div>

			<div ng-cloak class="ui success message" ng-if="noArticle">
				<p>沒有更多參與的文章了。快去與大家分享你的趣事吧！</p>
			</div>
			<div ng-cloak class="ui negative message" ng-if="failLoading">
				<p>載入失敗</p>
			</div>
		</div>
    </div>
