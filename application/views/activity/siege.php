    <div class="ui thirteen wide column">

        <div class="ui segment basic">

            <!-- 該校生命資訊 -->
            <div class="ui two statistics">
                <div class="statistic">
                    <div class="value" id="blood">
                        <i class="child icon small horizontal"></i>
                    </div>
                    <div class="label">我校血量</div>
                </div>

                <div class="statistic">
                    <div class="value">
                        <i class="protect icon small horizontal"></i> +0
                    </div>
                    <div class="label">額外防禦</div>
                </div>
            </div>
            <hr />

            <div class="ui small  icon  buttons fluid" id="open-attack">

			</div>

            <div class="ui top attached tabular menu" id="siege-attack-record">
                <a class="item active" data-tab="self_attack_records">個人攻擊紀錄</a>
            </div>

            <div class="ui bottom attached active tab segment" data-tab="self_attack_records" id="self_attack_records"></div>

        </div>

    </div>

    <!-- Profile Short Second -->
	<div class="ui small modal transition" id="siege-choose-modal">
	    <i class="close icon"></i>
	    <div class="header">
	        開始發動攻擊
	    </div>
	    <div class="content">
	        <div class="ui form">
				<div class="ui grid">
					<div class="stackable column align centered">
                        <div class="ui basic segment center aligned">
                            <div class="ui search input" id="siege-search-school">
                                <input type="text" class="prompt" id="siege-school-keywords" placeholder="學校關鍵字..">
                                <button class="ui icon button" id="siege-school-search">
                                    <i class="search icon"></i>
                                </button>
                            </div>
                        </div>
                        <!-- 學校區域 -->
                        <div id="siege-tabs-container">
                            <div class="ui top attached tabular menu" id="siege-area-option">
                                <a class="item active" data-tab="north">北區</a>
                                <a class="item" data-tab="center">中區</a>
                                <a class="item" data-tab="south">南區</a>
                                <a class="item" data-tab="east">東區</a>
                            </div>
                            <div class="ui bottom attached active tab segment" data-tab="north">
                                <div class="ui relaxed divided list siege_school_list" id="siege-school-north"></div>
                            </div>
                            <div class="ui bottom attached tab segment" data-tab="center">
                                <div class="ui relaxed divided list siege_school_list" id="siege-school-center"></div>
                            </div>
                            <div class="ui bottom attached tab segment" data-tab="south">
                                <div class="ui relaxed divided list siege_school_list" id="siege-school-south"></div>
                            </div>
                            <div class="ui bottom attached tab segment" data-tab="east">
                                <div class="ui relaxed divided list siege_school_list" id="siege-school-east"></div>
                            </div>
                        </div>
					</div>
				</div>
	        </div>
	    </div>
	    <div class="actions">
	        <div class="ui button lightblack notinverted cancel">取消</div>
	    </div>
	</div>

    <!-- Confirm Attack Modal -->
    <div class="ui basic modal" id="siege-confirm-attack">
        <i class="close icon"></i>
        <div class="header" id="confirm-school-name"></div>
        <div class="image content">
            <div class="image">
                <i class="lightning icon"></i>
            </div>
            <div class="description">
                <p>
                    <ul>
                        <li>每日可攻擊一所尚存活的學校</li>
                        <li>每次攻擊該校血量減 1</li>
                        <li>不可攻擊自己的學校</li>
                        <li>不會顯示他校剩餘血量</li>
                        <li>每次季賽將有神秘獎勵</li>
                    </ul>
                </p>
            </div>
        </div>
        <div class="actions">
            <div class="two fluid ui inverted buttons">
                <div class="ui cancel lightblack notinverted button">
                    <i class="remove icon"></i>
                    放他一馬
                </div>
                <div class="ui ok darkred notinverted button" id="confirm_attack">
                    <i class="checkmark icon"></i>
                    攻擊吧
                </div>
            </div>
        </div>
    </div>

    <script>
        loadSiege();
        $('.icon.message').transition('flash');
        $('.menu .item').tab();
    </script>
