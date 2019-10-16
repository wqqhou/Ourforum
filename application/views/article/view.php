<style>
.hltMenu {
    position: absolute;
    display: none;
    z-index: 100;
    background-color: #000;
    border-radius: 5px;
    color: #fff;
    font-size: 14px;
}
.hltMenu.hltMenu--active {
    display: inline-block;
}
.hltMenu .hltMenu-arrowClip {
    position: absolute;
    bottom: -9px;
    left: 50%;
    clip: rect(10px 20px 20px 0);
    margin-left: -10px;
}
.hltMenu .hltMenu-arrowClip .hltMenu-arrow {
    display: block;
    width: 10px;
    height: 10px;
    background-color: #262625;
    transform: rotate(45deg) scale(.5);
}
.hltMenu-inner ul {
    display: -webkit-flex;
    display: -moz-flex;
    display: -ms-flex;
    display: -o-flex;
    display: flex;
    -webkit-flex-direction: row;
    -moz-flex-direction: row;
    -ms-flex-direction: row;
    -o-flex-direction: row;
    flex-direction: row;
    -webkit-flex-wrap: nowrap;
    -moz-flex-wrap: nowrap;
    -ms-flex-wrap: nowrap;
    -o-flex-wrap: nowrap;
    flex-wrap: nowrap;
    list-style-type: none;
    margin: 0px;
    padding: 0px;
}
.hltMenu-inner ul li:not(:last-child) {
    padding-right: 3px;
}

button {
    border: 0;
    background: transparent;
    color: #fff;
    text-decoration: none;
    outline: none;
    padding: 9px;
}
</style>

<div ng-cloak class="ui grid stackable container" id="article_container" ng-controller="ArticleListCtrl" ng-init="loadArticle(<?php echo $type['di_numb'] ?>, <?php echo $aid; ?>);<?php if (!$this->session->userdata('ts') ) echo 'notLoginHolder();'; ?>">
	<div class="hltMenu">
		<div class="hltMenu-inner">
			<ul>
				<li><button ng-click="response()">引用</button></li>
			</ul>
		</div>
		<div class="hltMenu-arrowClip">
			<span class="hltMenu-arrow"></span>
		</div>
	</div>

	<div class="row" ng-show="!ispublic">
		<div class="ui sixteen wide column">
			<div class="ui olive message">不公開的文章，趕快加入好玩又有趣的 Selene 吧！</div>
		</div>
	</div>

	<div class="row" ng-show="article">
		<div class="ui sixteen wide column">
			<h2 id="article_title" ng-bind="article.result.art_name"></h2>
			<span id="article_type">
				<a class="ui nav-blue notinverted large top right attached label" ng-bind="article.result.di_name" ng-href="<?=base_url('a')?>/{{ article.result.di_code }}" target="_self"></a>
			</span>
		</div>
	</div>

	<div class="row" ng-show="article">
		<div class="ui four wide column">
			<div class="ui medium">
				<div class="ui feed">
				    <div class="event">
				        <div class="label article_author" id="article_gender">
							<i class="ui circular {{ article.result.gender | gender }} icon"></i>
						</div>
				        <div class="content">
				            <div class="summary">
				                <a class="user" id="article_author" ng-bind="article.result.author"></a>
				            </div>
				            <div class="meta">
				                <a class="like" id="article_time" ng-bind="article.result.time"></a>
				            </div>
				        </div>
				    </div>
				</div>
			</div>
		</div>

		<div class="ui ten wide column">
			<div class="content">
				<div class="header">
					<div id="editorjs" ng-bind-html="content"></div>
					<div class="ui grey fluid text-italic" id="article_signature" ng-show="article.result.signature">{{ article.result.signature }}</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row" ng-show="article">
		<div class="ui segment basic sixteen wide column center aligned">
			<div class="inline field">
				<div class="ui right pointing black label" id="article_likecount">{{ articleLikeCount }}</div>
				<div class="ui {{ ( articleIsLike ) ? 'islike-pink-bg' : 'basic' }}  button" id="article_like" ng-click="doLike()">
					喜歡
				</div>
				<div class="ui {{ ( articleIsArchive )? 'isarchive-green-bg' : 'basic'; }} button" id="article_archive" ng-click="doArchive()">
					{{ ( articleIsArchive ) ? '取消收藏' : '加入收藏'; }}
				</div>

			<?php if ( $this->session->userdata('ts') ) { ?>
				<div class="ui basic buttons">
					<div class="ui button" id="article_reply_button">回覆</div>
					<div id="aa" class="ui floating dropdown icon button" ng-show="(article.result.ismypost == '1') ? true : false">
						<i class="dropdown icon"></i>
						<div class="menu">
							<a class="item" target="_self" ng-href="<?=base_url('a')?>/{{ article.result.di_code }}/{{ article.result.id }}/edit" ng-show="(article.result.ismypost == '1') ? true : false"><i class="edit icon"></i> 編輯文章</a>
							<a class="item" ng-click="removeArticle()" ng-show="(article.result.ismypost == '1') ? true : false"><i class="delete icon"></i> 刪除</a>
						</div>
					</div>
				</div>
			<?php } ?>

			</div>
		</div>
	</div>

	<h4 class="ui horizontal divider header" name="suggest">
		<i class="comments icon"></i>其他人怎麼看？
	</h4>	

	<div class="row">
		<div class="ui secondary segment basic sixteen wide column">
			<div class="ui comments" ng-repeat="res in article.response" style="margin-bottom: 50px;">
				<div class="comment">
					<a class="avatar">
						<i ng-if="res.gender == '1'" class="ui circular large nav-blue notinverted man icon"></i>
						<i ng-if="res.gender == '0'" class="ui circular large nav-blue notinverted woman icon"></i>
					</a>
					<div class="content">
					<a class="author">{{ res.firstname }}</a>
					<div class="text">原文：<br /><mark>{{ res.content }}</mark></div>
					<div class="text" ng-bind-html="'修改：'+(res.reply)"></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row" ng-show="article">
		<div class="ui sixteen wide column">

			<div class="description" id="article_reply">

			<?php if ( $this->session->userdata('ts') ) { ?>
				<!-- 回應輸入 -->
				<div class="ui segments">
					<div class="ui basic secondary segment">
						<div class="ui small black header">
							<span><?php echo $this->session->userdata('name'); ?></span>
						</div>

						<div class="div-textarea" contenteditable="plaintext-only" placeholder="說點什麼吧..." id="reply-content" ng-model="replyContent"></div>

						<div class="ui two mini buttom attached buttons">
			                <button class="ui button darkgreen notinverted" id="reply-select-pic"><i class="file image outline icon"></i></button>
			                <button class="ui button nav-blue notinverted" ng-click="doReply()"><i class="send icon"></i></button>
			            </div>

					</div>

				</div>

				<!-- 剛剛的回覆 -->
				<div class="ui segments" ng-repeat="reply in recentReplyList" ng-show="recentReplyList">
					<div class="ui basic secondary segment">

						<h4 class="ui header">
							<i class="ui circular tiny {{ reply.reply_gender | gender }} icon"></i>
							<div class="content">{{ reply.reply_author }}
								<div class="sub header">

								</div>
							</div>
						</h4>

						<p class="reply-content" ng-bind-html="reply.content | formatter"></p>
					</div>

					<div class="ui secondary segment right aligned segmentfooter" ng-show="reply.reply_del == 0">
						{{ reply.reply_time | relativeTime }}
					</div>
				</div>
			<?php } ?>

				<!-- 熱門回覆 -->
				<div class="ui segments" id="rf-{{$index+1}}" ng-repeat="reply in replyList | filter:{ hot:1 }">
					<div class="ui hot-layer-2 segment" ng-show="reply.reply_del == 0">

						<h4 class="ui header">
							<i class="ui circular tiny {{ reply.reply_gender | gender }} icon"></i>
							<div class="content">{{ reply.reply_author }}
								<div class="sub header">
									<span class="ui horizontal replybtn">熱門回覆 <i class="ui bookmark brown icon" ng-show="article.yuanPO.indexOf(reply.id) != -1"></i>
								</div>
							</div>
						</h4>

						<div class="ui {{ (article.my_reply.indexOf(reply.id) != -1 ) ? 'my-reply' : 'lightblue' }} top right attached label reply_like_btn" isrlike="{{ (article.reply_liked.indexOf(reply.id) != -1 ) ? 'true' : 'false' }}" replyid="{{ reply.id }}">
							<i class="{{ (article.reply_liked.indexOf(reply.id) != -1 ) ? 'islike-pink' : 'empty' }} heart large icon"></i><span class="reply_likecount">{{ reply.reply_like_count }}</span>
						</div>
						<p class="reply-content" ng-bind-html="reply.content | formatter"></p>
					</div>

					<div class="ui hot-layer-2 segment right aligned segmentfooter" ng-show="reply.reply_del == 0">
						<a class="ui horizontal label" ng-show="(article.my_reply.indexOf(reply.id) != -1 )" ng-click="removeReply(reply.id)">刪除</a> {{ reply.reply_time | relativeTime }}</a>
					</div>
				</div>

				<div class="ui horizontal divider" ng-show="replyList.length">回覆</div>

				<!-- 回覆 -->
				<div class="ui segments" id="rf-{{$index+1}}" ng-repeat="reply in replyList | filter:{ hot:0 }">
					<div class="ui {{ (article.my_reply.indexOf(reply.id) != -1 ) ? 'my-reply' : 'basic secondary' }} segment" ng-show="reply.reply_del == 0">

						<h4 class="ui header">
							<i class="ui circular tiny {{ reply.reply_gender | gender }} icon"></i>
							<div class="content">{{ reply.reply_author }}
								<div class="sub header">
									<span class="ui horizontal grey basic replybtn">{{ $index+1 }}F</span> <i class="ui bookmark brown icon" ng-show="article.yuanPO.indexOf(reply.id) != -1"></i>
								</div>
							</div>
						</h4>

						<div class="ui {{ (article.my_reply.indexOf(reply.id) != -1 ) ? 'my-reply' : 'lightblue' }} top right attached label reply_like_btn" isrlike="{{ (article.reply_liked.indexOf(reply.id) != -1 ) ? 'true' : 'false' }}" replyid="{{ reply.id }}">
							<i class="{{ (article.reply_liked.indexOf(reply.id) != -1 ) ? 'islike-pink' : 'empty' }} heart large icon"></i><span class="reply_likecount">{{ reply.reply_like_count }}</span>
						</div>
						<p class="reply-content" ng-bind-html="reply.content | formatter"></p>
					</div>

					<div class="ui basic secondary disabled segment" ng-show="reply.reply_del == 1">
						<div class="ui small black header">
							<a class="ui horizontal grey basic label replybtn" href="#rf-{{ $index+1 }}">{{ $index+1 }}F</a> <i>消失的無影無蹤</i>
						</div>
					</div>

					<div class="ui {{ (article.my_reply.indexOf(reply.id) != -1 ) ? 'my-reply' : 'secondary' }} segment right aligned segmentfooter" ng-show="reply.reply_del == 0">

						<div class="ui simple left dropdown">
							<div class="text">{{ reply.reply_time | relativeTime }}</div>
							<i class="dropdown icon large"></i>
							<div class="menu">
								<a class="item" ng-if="(article.my_reply.indexOf(reply.id) != -1 )" ng-click="removeReply(reply.id)">刪除</a>
								<a class="item" ng-click="reportReply(reply.id)">檢舉</a>
							</div>
						</div>

					</div>
				</div>

				<div infinite-scroll="loadReply()" infinite-scroll-distance="0" infinite-scroll-disabled="noMoreReply || !scroll_switch_reply" ng-show="article"></div>

				<div class="ui orange basic fluid button" ng-click="loadReply( article.result.type , article.result.id); $(this).remove();" ng-hide="noMoreReply">
					<p>載入更多回應</p>
				</div>
			</div>
		</div>
	</div>

<?php if ( $this->session->userdata('ts') ) { ?>
	<form id="reply-imgur" method="post" enctype="multipart/images">
		<input id="reply-choose-image" name="userImage" type="file" accept="image/*">
		<input type="submit" class="ui button blue" value="上傳" id="reply-upload">
	</form>

	<!-- 檢舉輸入框 -->
	<div class="ui small modal" id="article-report">
		<i class="close icon"></i>
		<div class="header">
			檢舉文章
		</div>
		<div class="content">
			<div class="ui form">
				<div class="field">
					<label>文章標題</label>
					<p>{{ article.result.art_name }}</p>
				</div>

				<div class="field">
					<textarea ng-model="articleReportDesc" maxlength="100" placeholder="ex. 辱罵、恐嚇其他人、性別歧視、洩露身分。賽拉涅提醒你，惡意檢舉別人或檢舉理由不明確，是會視情況暫時停止使用或刪除帳號的喔！"></textarea>
					<p>{{ articleReportError }}</p>
				</div>
			</div>
		</div>
		<div class="actions">
			<div class="ui cancel lightblack notinverted button">沒事</div>
			<div class="ui darkred notinverted button" ng-click="articleReport()">檢舉</div>
		</div>
	</div>
<?php } ?>

</div>

<!-- function bar -->
<div ng-cloak class="ui four attached black buttons" id="reply-bar" ng-controller="ArticleListCtrl" >
	<?php if ( $this->session->userdata('ts') ) { ?>
	<div class="ui button" id="reply"><i class="comment icon"></i></div>
	<div class="ui button" id="report"><i class="thumbs down icon"></i></div>
	<?php } ?>
	<div class="ui button scroll-to-bottom"><i class="arrow circle down icon"></i></div>
	<div class="ui button scroll-to-top" ><i class="arrow circle up icon"></i></div>
</div>


<?php if ( $this->session->userdata('ts') ) { ?>
<form id="reply-imgur" method="post" enctype="multipart/images">
	<input id="reply-choose-image" name="userImage" type="file" accept="image/*">
	<input type="submit" class="ui button blue" value="上傳" id="reply-upload">
</form>

<?php } ?>

<script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>

<script>

	$("#report-send").click(function(){
		article_report(<?=$this->uri->segment(3)?>);
	});

	document.body.addEventListener('mouseup', e => {
		const hltMenu = document.getElementsByClassName('hltMenu')[0];
		
		if (window.getSelection().toString().length > 0 && e.target.tagName !== 'BUTTON' && !e.target.className.includes('hlt')) {
			
			var count = 0;
			e.path.find(function (ele) {
				if (ele.id == "editorjs") {
					count++;
				}
			});

			if (count == 0) {
				return false;
			}


			const selectedText = window.getSelection();
			const textCoordinates = selectedText.getRangeAt(0).getBoundingClientRect();
			hltMenu.classList.toggle('hltMenu--active');
			hltMenu.style.top =`${textCoordinates.top - hltMenu.getBoundingClientRect().height - 8 + window.scrollY}px`;
			hltMenu.style.left =`${textCoordinates.left + textCoordinates.width / 2 - hltMenu.getBoundingClientRect().width / 2}px`;
		}
		}, false);

		window.addEventListener('mousedown', e => {
		if (e.target.tagName !== 'BUTTON') {
			document.getElementsByClassName('hltMenu')[0].classList.remove('hltMenu--active');
		} else {
			e.preventDefault();
		}
	}, false);
</script>
