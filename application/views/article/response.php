
    <style>
        .ce-block__content, .ce-toolbar__content {
            max-width: 100%;
        }
        .row {
            margin-top: 70px;
        }
        .segment {
            margin-bottom: 40px !important;
        } 
    </style>
    <div class="ui grid stackable container" ng-controller="PostArticleCtrl" ng-init="id='<?php echo $article['responseId'];?>'">

		<div class="row">
			<div class="ui sixteen wide column">
                <div class="ui raised segment">
                    <h2 class="ui header">
                        <i class="share icon"></i>
                        <div class="content">
                            <?php echo $article['articleTitle']?>
                        </div>
                    </h2>
                    <div class="ui grid">
                        <div class="fourteen wide column">
                            <p>
                                <mark><?php echo $article['responseContent']?></mark>
                            </p>
                        </div>
                        <div class="two wide column">
                           <i class="large like icon"></i><span class="ng-binding"><?php echo $article['likeCount']?></span>
                        </div>
                    </div>
                </div>
	            <div class="ui form">
	                <div class="field" id="newpost-edit-content">
                        <h3 class="ui header">修改</h3>
                        <div id="editorjs" ng-model="postContent"></div>
	                </div>
                    <div class="field">
                        <h3 class="ui header">理由</h3>
                        <textarea ng-model="reasonContent"></textarea>
	                </div>
	                <button type="button" id="post-save" class="ui button nav-blue notinverted" ng-click="newresponse()">發佈</button>
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
