    <style>
        .ce-block__content, .ce-toolbar__content {
            max-width: 100%;
        }
    </style>
    <div class="ui grid stackable container" ng-controller="PostArticleCtrl" ng-init="typeCode='<?=$article['di_code']?>'; aid='<?=$article['id']?>'; geteditpost();">

		<div class="row">
			<div class="ui sixteen wide column">
				<h1 class="ui icon header">編輯文章 | <?=$article['di_name']?>板</h1>
			</div>
		</div>

        <div class="row">
            <div class="ui sixteen wide column">
                <div class="ui form">
                    <div class="ui form">
                        <div class="field" id="newpost-edit-title">
                            <h3 class="ui header">標題</h3>
                            <input id="post-title" wordslimit="30" type="text"  ng-model="postTitle" ng-init="postTitle='<?=$article['art_name']?>'">
							<p ng-show="postTitle.length > 0">字數限制 <span ng-bind="postTitle.length"></span>/30</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
			<div class="ui sixteen wide column">
	            <div class="ui form">
	                <div class="field" id="newpost-edit-content">
                        <h3 class="ui header">內容</h3>
                        <div id="editorjs" ng-model="postContent"></div>
                        <pre id="output"></pre>
	                    <h2><i class="file image outline icon" id="newpost-select-pic"></i></h2>
	                </div>
	                <button type="button" id="post-save"  class="ui button nav-blue notinverted" ng-click="editpost()">更新</button>
	            </div>
                <form ng-cloak id="newpost-imgur" method="post" enctype="multipart/images">
                    <input id="newpost-choose-image" name="userImage" type="file" accept="image/*">
                    <input type="submit" class="ui button blue" value="上傳" id="newpost-upload">
                </form>
			</div>
        </div>
	</div>

    <!-- Newpost Rules Modal -->
    <div class="ui basic modal" id="newpost-rules-modal">
        <div class="header">
            發文規章
        </div>
        <div class="image content">
            <div class="image">
                <i class="child icon"></i>
            </div>
            <div class="description">
                <ul class="list">
                    <li>嚴禁在 Selene 發佈辱罵、恐嚇、性別歧視、危害社會、使人名譽損失或蓄意引起筆戰之言論</li>
                    <li>同意 Selene 有權將您發佈的文章、回覆分享或刪除</li>
                    <li>Selene 是匿名的社交網站，您在文章或回覆內主動公開個人身分與聯絡資料時，將受到停權的處分</li>
                    <li>請遵守中華民國法律，不可以是違反善良風俗的文字</li>
                    <li>文章內容及言論為使用者個人意見，不代表 Selene 立場</li>
                </ul>
            </div>
        </div>
        <div class="actions">
            <div class="two fluid ui inverted buttons">
                <div class="ui darkred notinverted button" id="newpost-no">
                    <i class="remove icon"></i>
                    我無法接受
                </div>
                <div class="ui nav-blue notinverted button" id="newpost-yes">
                    <i class="checkmark icon"></i>
                    我會遵守
                </div>
            </div>
        </div>
    </div>

    <script src='https://cdn.jsdelivr.net/npm/@editorjs/header@latest'></script>
    <script src='https://cdn.jsdelivr.net/npm/@editorjs/simple-image@latest'></script>
    <script src='https://cdn.jsdelivr.net/npm/@editorjs/list@latest'></script>
    <script src='https://cdn.jsdelivr.net/npm/@editorjs/embed@latest'></script>
    <script src='https://cdn.jsdelivr.net/npm/@editorjs/marker@latest'></script>
    <script src='https://cdn.jsdelivr.net/npm/@editorjs/checklist@latest'></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/delimiter@latest"></script>

    <script>
        // showRulesModal();
        var postContent = "";
    </script>
