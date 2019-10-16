		<div class="ui thirteen wide column">

			<div class="ui segment bg1">
				<div class="ui cards centered">

					<div class="ui card">
						<a class="image">
							<img src="<?php echo ( substr($friends['pic'], 0, 7) == 'userimg' ) ? 'https://selene.tw/'.$friends['pic'] : $friends['pic']; ?>">
						</a>
						<div class="content">
							<a class="header center aligned"><?php echo ( $friends['nameIsHide'] == 1 ) ? ( ( $friends['gender'] == 1 )  ? "男" : "女" ) : $friends['firstname']; ?></a>
						</div>
					</div>

				</div>

			</div>

			<div class="ui small  icon  buttons fluid">
				<a class="ui button notinverted nav-blue" href="<?=base_url('account/friends')?>/<?php echo $friends['rndcode'] ?>/talk"><i class="mail icon"></i> 寫訊息</a>
				<button class="ui button notinverted darkred" id="delfriend"><i class="remove user icon"></i> 黑名單</button>
			</div>

			<div class="ui segment">
				<table class="ui very basic table">
				    <tbody>

				        <tr>
				            <td class="table-th">人格特質</td>
				            <td>
				                <div class="ui form">
				                    <div class="field">
										<?php echo $friends['introduction']; ?>
				                    </div>
				                </div>
				            </td>
				        </tr>

				        <tr>
				            <td class="table-th">興趣專長</td>
				            <td>
				                <div class="ui form">
				                    <div class="field">
				                        <?php echo $friends['specialty']; ?>
				                    </div>
				                </div>
				            </td>
				        </tr>

				        <tr>
				            <td class="table-th">簽名檔</td>
				            <td>
				                <div class="ui form">
				                    <div class="field">
				                        <?php echo $friends['signature']; ?>
				                    </div>
				                </div>
				            </td>
				        </tr>

				    </tbody>
				</table>
			</div>

		</div>

	</div> <!-- end of container -->

	<!-- Tear Up Modal -->
	<div class="ui basic modal" id="delfriend-modal">
		<i class="close icon"></i>
		<div class="header">
			真的要絕交嗎？
		</div>
		<div class="image content">
			<div class="image">
				<i class="frown icon"></i>
			</div>
			<div class="description">
				<p>
					<ul>
						<li>一旦絕交後將不再是涅友</li>
						<li>絕交後不會通知對方</li>
						<li>所有聊天記錄將一併刪除</li>
					</ul>
				</p>
			</div>
		</div>
		<div class="actions">
			<div class="two fluid ui inverted buttons">
				<div class="ui nav-blue notinverted button deny">
					<i class="remove icon"></i>
					否，我捨不得
				</div>
				<div class="ui darkred notinverted button approve">
					<i class="checkmark icon" id="confirm-delfriend"></i>
					是，我決定好了
				</div>
			</div>
		</div>
	</div>

	<!-- Final Tear Up Modal -->
	<div class="ui basic modal" id="final-delfriend-modal">
		<i class="close icon"></i>
		<div class="header">
			最後一次確認了！
		</div>
		<div class="image content">
			<div class="image">
				<i class="frown icon"></i>
			</div>
			<div class="description">
				<p>
					<ul>
						<li>一旦絕交後將不再是涅友</li>
						<li>絕交後不會通知對方</li>
						<li>所有聊天記錄將一併刪除</li>
					</ul>
				</p>
			</div>
		</div>
		<div class="actions">
			<div class="two fluid ui inverted buttons">
				<div class="ui red basic inverted button deny">
					<i class="remove icon"></i>
					否，再想想
				</div>
				<div class="ui green basic inverted button approve">
					<i class="checkmark icon" id="final-confirm-delfriend"></i>
					是，請別阻止我
				</div>
			</div>
		</div>
	</div>

	<script>
		$("#delfriend").click(function(){
			$("#delfriend-modal").modal({
				closable  : false,
				onDeny : function(){
					closable  : true;
				},
				onApprove : function() {
					$("#final-delfriend-modal").modal({
						closable  : false,
						onDeny : function(){
							closable  : true;
						},
						onApprove : function() {
							location.href = '<?=base_url()?>account/friends/<?=$this->uri->segment(3)?>/remove';
						}
					}).modal('show');
				}
			}).modal('show');
		});


	</script>
