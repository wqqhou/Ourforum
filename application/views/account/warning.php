    <div class="ui thirteen wide column" ng-init="warning()">

		<div ng-cloak class="ui negative message" ng-if="failLoading">
			<p>載入失敗</p>
		</div>

        <div ng-cloak class="ui top attached tabular menu">
            <a class="item active" data-tab="warning">未解除</a>
            <a class="item" data-tab="record">歷史紀錄</a>
        </div>

        <div ng-cloak class="ui bottom attached tab basic active" data-tab="warning">
            <table class="ui red table">
                <thead>
                    <th class="four wide">違規項目</th>
                    <th class="four wide">解除方法</th>
                    <th class="four wide">處罰項目</th>
					<th class="two wide">裁定時間</tr>
                </thead>
                <tbody>
					<tr ng-repeat="warning in warningList | filter: { wrn_solve: 0 }">
						<td>{{ warning.wrn_title }}</td>
						<td>{{ warning.wrn_content }}</td>
						<td>{{ warning.wrn_enc }}</td>
						<td>{{ warning.wrn_time | relativeTime }}</td>
					</tr>
				</tbody>
            </table>
        </div>

        <div class="ui bottom attached tab basic" data-tab="record">
            <table class="ui green table">
                <thead>
                    <th class="four wide">違規項目</th>
                    <th class="four wide">解除方法</th>
                    <th class="four wide">處罰項目</th>
					<th class="two wide">裁定時間</tr>
                </thead>
                <tbody>
					<tr ng-repeat="warning in warningList | filter: { wrn_solve: 1 }">
						<td>{{ warning.wrn_title }}</td>
						<td>{{ warning.wrn_content }}</td>
						<td>{{ warning.wrn_enc }}</td>
						<td>{{ warning.wrn_time | relativeTime }}</td>
					</tr>
				</tbody>
            </table>
        </div>

    </div>
