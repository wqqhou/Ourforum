		<div class="ui thirteen wide column">

			<div class="ui segment bg1">
				<div class="ui special cards centered">

					<div class="card">
						<div class="blurring dimmable image">
							<div class="ui dimmer">
								<div class="content">
									<div class="center">
										<div class="ui inverted button change-pic">更換大頭貼</div>
									</div>
								</div>
							</div>
							<img src="<?= ($profile['pic'] != NULL ? ( substr($profile['pic'], 0, 7) == 'userimg' ) ? 'https://selene.tw/'.$profile['pic'] : $profile['pic'] : ($profile['gender'] == '1' ? "//i.imgur.com/cvZYCXb.png" : "http://i.imgur.com/MFPRIEs.png") ) ?>">

						</div>

						<div class="content">
							<span class="header center aligned"><?php echo $profile['firstname']; ?> <button class="ui icon button basic change-pic"><i class="photo icon"></i></button></span>
						</div>

					</div>

				</div>

			</div>

			<div class="ui small five icon buttons fluid">
				<button class="ui button nav-blue notinverted disabled" id="profile-save"><i class="save icon"></i> 儲存</button>

				<?php
					if (is_null($profile['d_acc'])) {
						echo '<button class="ui button basic grey" id="profile-short"><i class="cut icon"></i> 建立短帳號</button>';
					}
					else{
						echo '<button class="ui button basic grey disabled">'.$profile['d_acc'].'</button>';
					}
				?>
				<button class="ui button basic grey" id="profile-edit-password"><i class="lock icon"></i> 修改密碼</button>
				<button class="ui button basic grey" id="profile-edit-email"><i class="envelope icon"></i> 修改電子郵件</button>
				<button class="ui button basic grey" id="profile-hide"><i class="hide icon"></i> 隱藏姓名 <span>(<?php echo ($profile['nameIsHide'] == 1) ? "隱藏" : "顯示"; ?>)</span></button>
			</div>

			<?php
				// 停抽涅友狀態出現提示訊息
				if ($profile['stop'] == 1 || $profile['wrn'] == 1) {
					echo '
						<div class="ui attached warning message">
							<i class="warning sign icon"></i>
							<strong class="ui red">目前為停止配對涅友</strong> (增加自介及興趣專長，經審核後即可啟用配對涅友功能)
						</div>
					';
				}
			?>

			<div class="ui segment">
				<table class="ui very basic table">
				    <tbody>

				        <tr>
				            <td class="table-th">金幣</td>
				            <td><?php echo $profile['coin']; ?></td>
				        </tr>

				        <tr>
				            <td class="table-th">人格特質</td>
				            <td>
				                <div class="ui form" id="profile-edit-introduction">
				                    <div class="field">
				                        <textarea wordslimit="1000" placeholder="盡情的介紹你/妳的個性及特色，讓大家能從中近一步的認識你/妳。"><?php echo $profile['introduction']; ?></textarea>
				                    </div>
				                </div>
								<div class="ui olive message" hidden>
									<div class="header">關於人格特質</div>
									<ul class="list">
										<li>請詳細的說明你的人格特質</li>
										<li>字數限制 <span></span>/1000</li>
									</ul>
								</div>
				            </td>
				        </tr>

				        <tr>
				            <td class="table-th">興趣專長</td>
				            <td>
				                <div class="ui form" id="profile-edit-specialty">
				                    <div class="field">
				                        <textarea wordslimit="1000" placeholder="興趣專長不一定要得到大家認同，所以請把你的各種特殊才能都輸入上來吧！"><?php echo $profile['specialty']; ?></textarea>
				                    </div>
				                </div>
								<div class="ui olive message" hidden>
									<div class="header">關於興趣專長</div>
									<ul class="list">
										<li>請詳細的說明你的興趣與專長</li>
										<li>字數限制 <span></span>/1000</li>
									</ul>
								</div>
				            </td>
				        </tr>

						<tr>
							<td class="table-th">隱私設定</td>
							<td>
							<label>只接受好友的私訊</label>&nbsp;&nbsp;&nbsp;
								<div class="ui toggle checkbox">
									<input type="checkbox" id="profile-edit-receMessage" onChange="rece_message_edit()" ng-checked="<?php echo $profile['rece_message'];?>">
									<label>接受任何人的私訊</label>
								</div>
							</td>
						</tr>

				        <tr>
				            <td class="table-th">簽名檔</td>
				            <td>
				                <div class="ui form" id="profile-edit-signature">
				                    <div class="field">
				                        <textarea wordslimit="100" placeholder="座右銘或是經典語錄。"><?php echo $profile['signature']; ?></textarea>
				                    </div>
				                </div>
								<div class="ui olive message" hidden>
									<div class="header">關於簽名檔</div>
									<ul class="list">
										<li>簽名檔是公開的</li>
										<li>字數限制 <span></span>/100</li>
									</ul>
								</div>
				            </td>
				        </tr>

				    </tbody>
				</table>
			</div>

		</div>

	</div> <!-- end of container -->

	<!-- Change Picture -->
	<div class="ui basic modal" id="change-pic-modal">
		<i class="close icon"></i>
		<div class="header">
			更換大頭貼
		</div>
		<div class="image content">
			<div class="image">
				<i class="child icon"></i>
			</div>
			<div class="description">
				<ul class="list">
					<li>清晰露出五官的正面生活照片</li>
					<li>沒有人想跟動漫人物/卡通人物/明星/花草/風景交朋友</li>
					<li>照片中只能有你自己，不可以是合照</li>
					<li>請遵守中華民國法律，不可以是違反善良風俗的照片</li>
					<li>檔案限制: 2MB</li>
				</ul>
			</div>
		</div>
		<div class="actions">
			<div class="two fluid ui inverted buttons">
				<div class="ui lightblack notinverted button" id="change-pic-no">
					<i class="remove icon"></i>
					等等再換
				</div>
				<div class="ui nav-blue notinverted button" id="change-pic-yes">
					<i class="checkmark icon"></i>
					我要更換
				</div>
			</div>
			<form id="change-pic-form" method="post" enctype="multipart/images">
				<input id="change-pic-choose-image" name="userImage" type="file" accept="image/*" style="display:none;">
			</form>
		</div>
	</div>

	<!-- Hide Name -->
	<div class="ui basic modal" id="hide-name-modal">
		<i class="close icon"></i>
		<div class="header">
			隱藏姓名
		</div>
		<div class="image content">
			<div class="image">
				<i class="hide icon"></i>
			</div>
			<div class="description">
				<ul class="list">
					<li>此功能會將您的姓名隱藏</li>
					<li>隱藏姓名的功能，可控制您在對方的好友名單內、本日涅友，是否顯示本名</li>
					<li>如果開啟，僅會顯示「男孩」或「女孩」</li>
					<li>此功能僅有隱藏姓名，學校及系所仍會顯示</li>
				</ul>
			</div>
		</div>
		<div class="actions">
			<div class="two fluid ui inverted buttons">
				<div class="ui darkgreen notinverted button" id="hide-name-hide">
					<i class="remove icon"></i>
					隱藏
				</div>
				<div class="ui nav-blue notinverted button" id="hide-name-unhide">
					<i class="checkmark icon"></i>
					顯示
				</div>
			</div>
		</div>
	</div>

	<!-- Profile Short -->
	<div class="ui basic modal" id="profile-short-modal">
		<i class="close icon"></i>
		<div class="header">
			建立短帳號
		</div>
		<div class="image content">
			<div class="image">
				<i class="compress icon"></i>
			</div>
			<div class="description">
				<ul class="list">
					<li>自訂您常用的帳號</li>
					<li>設定短帳號後亦可使用校園信箱登入</li>
					<li>帳號長度介於4-16的英文及數字</li>
				</ul>
			</div>
		</div>
		<div class="actions">
			<div class="two fluid ui inverted buttons">
				<div class="ui lightblack notinverted button modal-cancel">
					<i class="remove icon"></i>
					稍等
				</div>
				<div class="ui green basic inverted button" id="profile-short-setup">
					<i class="checkmark icon"></i>
					繼續
				</div>
			</div>
		</div>
	</div>

	<!-- Profile Short Second -->
	<div class="ui small modal transition" id="profile-short-second-modal">
	    <i class="close icon"></i>
	    <div class="header">
	        建立短帳號
	    </div>
	    <div class="content">
	        <div class="ui form">
				<div class="ui grid">
					<div class="seven stackable column align centered">
						<div class="field">
			                <label>自訂的帳號</label>
							<div class="ui input focus">
								<input type="email" class="profile-short" id="profile-short-username" maxlength="16" placeholder="4-16 碼英文及數字">
							</div>
			            </div>
						<div class="field">
			                <label>密碼認證</label>
							<div class="ui input focus">
								<input type="password" class="profile-short" id="profile-short-password" placeholder="輸入密碼確保您是本人">
							</div>
			            </div>
					</div>
				</div>

	        </div>
	    </div>
	    <div class="actions">
	        <div class="ui button modal-cancel">取消</div>
	        <div class="ui green button" id="profile-shortened">縮短吧！</div>
	    </div>
	</div>

	<!-- Profile Edit Password -->
	<div class="ui basic modal" id="profile-edit-password-modal">
		<i class="close icon"></i>
		<div class="header">
			修改密碼
		</div>
		<div class="image content">
			<div class="image">
				<i class="lock icon"></i>
			</div>
			<div class="description">
				<ul class="list">
					<li>定期更換新的密碼</li>
					<li>密碼長度介於 6-20 的英文及數字</li>
					<li>更改後請牢記新密碼</li>
				</ul>
			</div>
		</div>
		<div class="actions">
			<div class="two fluid ui inverted buttons">
				<div class="ui lightblack notinverted button modal-cancel">
					<i class="remove icon"></i>
					稍等
				</div>
				<div class="ui nav-blue notinverted button" id="profile-edit-password-setup">
					<i class="checkmark icon"></i>
					繼續
				</div>
			</div>
		</div>
	</div>

	<!-- Profile Edit Password Second -->
	<div class="ui small modal transition" id="profile-edit-password-second-modal">
	    <i class="close icon"></i>
	    <div class="header">
	        修改密碼
	    </div>
	    <div class="content">
	        <div class="ui form">
				<div class="ui grid">
					<div class="seven stackable column align centered">
						<div class="field">
			                <label>新密碼</label>
							<div class="ui input focus">
								<input type="password" id="profile-edit-password-password" maxlength="20" placeholder="6-20 碼英文及數字">
							</div>
			            </div>
						<div class="field">
			                <label>新密碼確認</label>
							<div class="ui input focus">
								<input type="password" id="profile-edit-password-ck-password" maxlength="20">
							</div>
			            </div>
						<div class="field">
			                <label>目前密碼</label>
							<div class="ui input focus">
								<input type="password" id="profile-edit-password-old-password" maxlength="20" placeholder="輸入密碼確保您是本人">
							</div>
			            </div>
					</div>
				</div>

	        </div>
	    </div>
	    <div class="actions">
	        <div class="ui cancel lightblack notinverted button">取消</div>
	        <div class="ui nav-blue notinverted button" id="profile-edited">確定更改</div>
	    </div>
	</div>


	<!-- Profile Edit Email -->
	<div class="ui small modal transition" id="profile-edit-email-modal">
	    <i class="close icon"></i>
	    <div class="header">
	        修改電子郵件
	    </div>
	    <div class="content">
	        <div class="ui form">
				<div class="ui grid">
					<div class="seven stackable column align centered">
						<div class="field">
			                <label>目前密碼</label>
							<div class="ui input focus">
								<input type="password" id="profile-edit-email-curr-password" maxlength="20" placeholder="輸入密碼確保您是本人">
							</div>
			            </div>
						<div class="field">
			                <label>欲更換電子郵件</label>
							<div class="ui input focus">
								<input type="email" id="profile-edit-email-email" maxlength="100">
							</div>
			            </div>
					</div>
				</div>

	        </div>
	    </div>
	    <div class="actions">
	        <div class="ui cancel lightblack notinverted button">取消</div>
	        <div class="ui nav-blue notinverted button" id="profile-email-edited">確定更改</div>
	    </div>
	</div>

	<script>

		$('.form textarea').focus(function(){

			var _msg = $(this).parents().eq(2).find('.message');

			$(_msg).transition('fade down').transition('show');
			$(_msg).find('span').html($(this).val().length);

			$(this).on('change keyup paste', function() {

				$('#profile-save').removeClass('disabled');
				$(_msg).find('span').html($(this).val().length);

				if ( $(this).val().length > $(this).attr('wordslimit') || $(this).val().length == 0 ) {
					$(this).parent().addClass('error');
					$('#profile-save').addClass('disabled');
				}
				else {
					$(this).parent().removeClass('error');
					$('#profile-save').removeClass('disabled').removeClass('basic');
				}

			});

			$(this).focusout(function() {
				$(_msg).transition('fade down').transition('hide');
			});

		});

		$("#profile-edit-email").click(function(){
			$("#profile-edit-email-modal").modal('show');
		});

		$("#profile-edit-password").click(function(){
			$("#profile-edit-password-modal").modal('show');
		});

		$("#profile-edit-password-setup").click(function(){
			$("#profile-edit-password-second-modal").modal('show');
		});

	</script>
