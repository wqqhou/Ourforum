
<div class="ui thirteen wide column">

    <div class="ui tablet attached steps">
        <div class="active step">
            <i class="calendar outline icon"></i>
            <div class="content">
                <div class="title">開始報名</div>
                <div class="description"><?=$activity_info['g_date']?></div>
            </div>
        </div>
        <div class="step">
            <i class="calendar outline icon"></i>
            <div class="content">
                <div class="title">開始投票</div>
                <div class="description"><?=$activity_info['g_king_start']?></div>
            </div>
        </div>
        <div class="step">
            <i class="calendar outline icon"></i>
            <div class="content">
                <div class="title">截止投票</div>
                <div class="description"><?=$activity_info['g_end']?></div>
            </div>
        </div>
    </div>

    <div class="ui segment">
        <div class="ui divided items">
            <div class="item">
                <div class="ui medium image">
                    <img src="<?=$activity_info['g_cover']?>">
                </div>
                <div class="content">
                    <div class="ui success floating message">
                        <p><?=nl2br($activity_info['g_content'])?></p>
                    </div>
                    <div class="ui list">
                        <div class="item">
                            <i class="bookmark icon"></i>
                            <div class="content">
                                <?=$activity_info['g_name']?>
                            </div>
                        </div>
                        <div class="item">
                            <i class="idea icon"></i>
                            <div class="content">
                                凡參加可得 <?=$activity_info['g_get']?> 枚硬幣
                            </div>
                        </div>
                        <div class="item">
                            <i class="trophy icon"></i>
                            <div class="content">
                                <?=$activity_info['g_extra']?>
                            </div>
                        </div>
                        <div class="item">
                            <i class="user icon"></i>
                            <div class="content">
                                剩餘名額：<?=$activity_info['g_limit'] - $activity_info['total']?>
                            </div>
                        </div>
                    </div>
                    <div class="extra">
                        <?php
                            echo ($activity_info['isjoin'] == 0 ? '<div class="ui right floated notinverted nav-blue button join-now">立刻參與<i class="right chevron icon"></i></div>' : '<div class="ui right floated blue button disabled">報名完成<i class="right chevron icon"></i></div>');
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Join Modal -->
    <div class="ui modal">
        <i class="close icon"></i>
        <div class="header">參與<?=$activity_info['g_name']?></div>
        <div class="image content">
            <div class="ui medium image">
                <img src="<?=$activity_info['g_cover']?>">
            </div>
            <div class="description">

                    <div class="ui form">
                        <div class="three fields">
                            <div class="field">
                                <label>1. 作品名稱</label>
                                <input type="text" id="join-info-topic" placeholder="1-15 中英文數字">
                            </div>
                            <div class="field">
                                <label>2. 我的藝名</label>
                                <input type="text" id="join-info-name" placeholder="1-15 中英文數字">
                            </div>
                            <div class="field">
                                <label>3. 選擇作品</label>
                                <button class="ui icon button" id="join-info-choose"><i class="cloud icon"></i></button>
                                <form id="uploadForm" method="post" enctype="multipart/images">
                                    <input id="join-info-choose-file" name="userImage" type="file" accept="image/x-png, image/gif, image/jpeg">
                                    <input type="submit" class="ui button notinverted nav-blue" value="上傳" id="join-info-upload">
                                </form>

                            </div>
                        </div>
                    </div>
                    <div id="join-info-view"></div>

            </div>
        </div>

        <div class="actions">
            <div class="ui button lightblack notinverted cancel" id="join-info-cancel">下次</div>
            <div class="ui button nav-blue notinverted" id="join-info-confirm">我要參與</div>
        </div>

    </div>
</div>

<script>

    $("#join-info-confirm").click(function(){
        if ($("#join-info-topic").val() && $("#join-info-name").val() && join_info_image) {
            $.ajax({
                dataType: 'json',
                type: 'POST',
                data: {
                    join_info_topic : $("#join-info-topic").val(),
                    join_info_name  : $("#join-info-name").val(),
                    join_info_works : join_info_image,
                    join_info_item  : "<?=$this->uri->segment(3)?>",
                },
                url: '//localhost/selene_ci/activity/join/confirm',
                error: function (xhr) {
                    errorMsg();
                },
                success: function (response) {

                    var response = $.parseJSON(JSON.stringify(response));
        			if (response.status == true) {
                        Messenger().post({
                    		message: "報名成功！",
                    		type: "success",
                    		showCloseButton: true,
                    		hideAfter: 3
                    	});
                        $("#join-info-topic, #join-info-name").val('');
                        $("#join-info-view").remove();
                        $("#join-info-remove").hide();
                        $("#join-info-choose").show();
                        $("#join-info-cancel").click();
                        $(".join-now").addClass('disabled').removeClass('brown').addClass('blue');
                        $(".join-now").html('報名完成<i class="right chevron icon"></i>');
                    }
                    else{
                        Messenger().post({
                    		message: "參加此競賽失敗！",
                    		type: "error",
                    		showCloseButton: true,
                    		hideAfter: 3
                    	});
                    }
                }
            });
        }
        else{
            Messenger().post({
                message: "請填寫所有欄位",
                type: "error",
                showCloseButton: true,
                hideAfter: 3
            });
        }
    });

</script>
