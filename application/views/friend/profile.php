        <div class="ui thirteen wide column">

			<div id="account_adv_adgeek_1">
			</div>

            <div class="ui segment bg2">
                <div class="ui cards centered">
                    <div class="card">
                        <div class=" image">
							<img src="<?php echo ( substr($profile['pic'], 0, 7) == 'userimg' ) ? 'https://selene.tw/'.$profile['pic'] : $profile['pic']; ?>">
                        </div>

                        <div class="content">
                            <span class="header center aligned"><?php echo ( $profile['gender'] == 1 ) ? "男" : "女"; ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="ui small three icon buttons fluid">
 				<?php if ( !$is_sent ) { ?>
                	<button class="ui button nav-blue notinverted" id="invite-friends"><i class="add user icon"></i> 送出交友邀請</button>
                    <button class="ui button darkred notinverted" id="report-friends"><i class="warning circle icon"></i> 檢舉</button>
                <?php } else { ?>
					<button class="ui button blue basic disabled"><i class="check icon"></i> 交友邀請已送出</button>
				<?php } ?>

            </div>

            <div class="ui segment">
                <table class="ui very basic table">
                    <tbody>

                        <tr>
                            <td class="table-th">性別</td>
                            <td><?php echo ( $profile['gender'] == 1 ) ? "男" : "女"; ?></td>
                        </tr>

                        <tr>
                            <td class="table-th">人格特質</td>
                            <td>
								<?php echo $profile['introduction']; ?>
                            </td>
                        </tr>

                        <tr>
                            <td class="table-th">興趣專長</td>
                            <td>
								<?php echo $profile['specialty']; ?>
                            </td>
                        </tr>

                        <tr>
                            <td class="table-th">簽名檔</td>
                            <td>
								<?php echo $profile['signature']; ?>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>

		<!-- 交友邀請 modal -->
	    <div class="ui modal" id="add-friend-modal">
	        <i class="close icon"></i>
	        <div class="header">
	            送出交友邀請
	        </div>
	        <div class="ui image content">
	            <div class="description">
					<ul class="ui list">
						<li>別害怕對方沒加你/妳而尷尬，因為對方不會知道你曾送出邀請</li>
						<li>待雙方都送出邀請，便會成為朋友</li>
						<li>請尊重對方隱私，未經同意請勿截圖/轉載涅友頭貼及個資</li>
						<li>Selene 覺得不應以外貌來決定交友</li>
						<li>直到今日結束前都會是同一位涅友</li>
	            	</ul>
				</div>
	        </div>
	        <div class="actions">
	            <div class="ui nav-blue notinverted right button" id="ok">
	                確定
	            </div>
	            <div class="ui lightblack notinverted right button" id="consider">
	                再考慮
	            </div>
	        </div>
	    </div>

	    <!-- 填寫招呼語 modal -->
	    <div class="ui small modal" id="greet-modal">
	        <i class="close icon"></i>
	        <div class="header">
	            輸入一句招呼語吧！ (雙方同意才會看到)
	        </div>
	        <div class="content">
	            <div class="ui form">
	                <div class="field">
	                    <textarea id="invite-friends-msg" placeholder="你好啊！ 我也喜歡看電影耶！ 你都看什麼類型居多啊？ 我覺得港片跟西洋的動作片都不錯！"></textarea>
	                </div>
	            </div>
	        </div>
	        <div class="actions">
	            <div class="ui nav-blue notinverted button" id="invite-friends-send">送出</div>
	            <div class="ui cancel lightblack notinverted button">考慮</div>
	        </div>
	    </div>

	    <!-- 檢舉 modal -->
	    <div class="ui small modal" id="report-modal">
	        <i class="close icon"></i>
	        <div class="header">
	            檢舉使用者照片/資料
	        </div>
	        <div class="content">
	            <div class="ui form">
	                <div class="field">
	                    <textarea ng-model="friendReportDesc" maxlength="100" placeholder="ex. 大頭貼未露出正面、洩漏通訊方式...。賽拉涅提醒你，惡意檢舉別人或檢舉理由不明確，是會視情況暫時停止使用或刪除帳號的喔！"></textarea>
						<p>{{ friendReportError }}</p>
	                </div>
	            </div>
	        </div>
	        <div class="actions">
	            <div class="ui cancel lightblack notinverted button">沒事</div>
	            <div class="ui darkred notinverted button" ng-click="friendReport()">檢舉</div>
	        </div>
	    </div>

    </div> <!-- end of container -->

    <script>
        $("#invite-friends").click(function(){
            $("#add-friend-modal").modal('show');
        });
        $("#consider").click(function(){
            $("#add-friend-modal").modal('hide');
        });
        $("#ok").click(function(){
            $("#add-friend-modal").modal('hide');
            $("#greet-modal").modal('show');
        });
        $("#report-friends").click(function(){
            $("#report-modal").modal('show');
        });

        $(".shape").click(function(){
            $('.shape').shape('flip over');
        });
    </script>
