
    <style>
        .ce-block__content, .ce-toolbar__content {
            max-width: 100%;
        }
    </style>
    <div class="ui grid stackable container" ng-controller="PostArticleCtrl" ng-init="postType='<?php echo $type['di_numb']; ?>'; typeCode='<?php echo $type['di_code']; ?>';">

		<div class="row">
			<div class="ui sixteen wide column">
				<h1 class="ui icon header">文章將發佈到 - <?=$type['di_name']; ?>板</h1>
			</div>
		</div>

        <div class="row">
            <div class="ui eight wide column">
                <div class="ui form">
                    <div class="field {{ postTitle.length > 30 ? 'error' : '' }}" id="newpost-edit-title">
                        <h3 class="ui header">標題</h3>
                        <input id="post-title" type="text" ng-model="postTitle">
                        <p ng-show="postTitle.length > 0">字數限制 <span ng-bind="postTitle.length"></span>/30</p>
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
	                </div>
                    <div class="field">
                        <h3 class="ui header">參考資料</h3>
                        <textarea ng-model="referContent" ng-init="referContent = referContentTemp" ng-change="tempStorageRefer(this)"></textarea>
	                </div>
                    <div class="field">
	                    <div class="ui toggle checkbox">
	                        <input type="checkbox" ng-model="postSign">
	                        <label for="post-secret">使用簽名檔</label>
	                    </div>
	                </div>
					<div class="field">
	                    <div class="ui toggle checkbox">
	                        <input type="checkbox" id="post-secret" ng-model="postPublic">
	                        <label for="post-secret">隱密文章</label>
	                    </div>
	                </div>
	                <button type="button" id="post-save" class="ui button nav-blue notinverted" ng-click="newpost()">發佈</button>
	            </div>
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
    <script src='https://cdn.jsdelivr.net/npm/@editorjs/list@latest'></script>
    <script src='https://cdn.jsdelivr.net/npm/@editorjs/embed@latest'></script>
    <script src='https://cdn.jsdelivr.net/npm/@editorjs/marker@latest'></script>
    <script src='https://cdn.jsdelivr.net/npm/@editorjs/checklist@latest'></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/delimiter@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/image@latest"></script>
    <script>
        showRulesModal();
		var postContent = "";
        const editor = new EditorJS({
            holderId: 'editorjs',
            tools: {
                delimiter: Delimiter,
                header: {
                    class: Header
                },
                list: {
                    class: List
                },
                embed: {
                    class: Embed,
                    config: {
                        services: {
                            youtube: true
                        }
                    }
                },
                image: {
                    class: ImageTool,
                    config: {
                        endpoints: {
                            byFile: 'http://localhost/selene/other/ajax_upload_imgur',
                            byUrl: 'http://localhost/selene/other/ajax_url_upload_imgur'
                        }
                    }
                },
                Marker: {
                    class: Marker,
                    shortcut: 'CMD+SHIFT+M',
                },
                checklist: {
                    class: Checklist,
                    inlineToolbar: true,
                }
            },
            onChange: function() {
                editor.save().then( savedData => {
                    postContent = JSON.stringify(savedData);
                });
            },
            placeholder: '輸入些什麼...'
        });
	</script>
