<div class="thirteen wide stackable grid column">
    <div class="ui main text">
        <h1 class="ui header segment basic center aligned icon"><i id="topic-icon" class="circular right quote icon"></i> <span id="discuss-topic"><?php echo $type['di_name']; ?></span></h1>

        <?php if ( $this->uri->segment(2,0) ) { ?>
        <div class="ui small icon buttons segment fluid" id="article-bar">
            <a class="ui button basic green" href="<?php echo base_url(). 'a/' .$this->uri->segment(2) . '/';?>newpost"><i class="edit icon"></i> 發表文章</a>
            <a class="ui button basic grey" onclick="hot('<?php echo $this->uri->segment(2, 0); ?>', '<?php echo $type['di_name']; ?>')" id="article-bar-hot"><i class="comments outline icon"></i> 熱門文章</a>
        </div>
        <?php } ?>

        <div id="display_article">

            <table class="ui selectable very basic table">
                <thead>
                    <tr>
                        <th class="one wide"><i class="heart red icon"></i></th>
                        <th class="one wide"><i class="comments grey icon"></i></th>
                        <th class="seven wide"><i class="bookmark icon"></i></th>
                        <th class="five wide"></th>
                        <th class="two wide"></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>

            <div class="ui active inline loader centered" id="loading-article"></div>

            <div class="ui warning message" id="no-more-article" hidden>
                <p>沒有更多文章了</p>
            </div>
            <div class="ui negative message" id="fail-loading-article" hidden>
                <p>載入失敗</p>
            </div>
        </div>
    </div>
</div>

<div class="ui large modal scrolling" id="article_modal">
    <i class="close icon"></i>
    <div class="header" id="article_title"></div>
    <div class="image content">
        <div class="ui medium image">
            <div class="ui segment" id="article_author"></div>
            <div class="ui basic segment" id="article_time"></div>
            <div id="article_type"></div>
        </div>
        <div class="description fluid" id="article_content_container">
            <div class="ui header" id="article_adv">
                <div class="fb-like" data-href="https://www.facebook.com/selene.fans" data-layout="standard" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>
                <!-- advertisement -->
            </div>
            <div class="ui basic" id="article_content"></div>
            <div class="ui grey fluid text-italic" id="article_signature"></div>

        </div>
    </div>
    <div class="actions">
        <div class="inline field">
            <div class="ui right pointing red basic label" id="article_likecount">3</div>
            <div class="ui red basic button" id="article_like">
                喜歡
            </div>
            <div class="ui green basic button" id="article_archive">
                加入收藏
            </div>
        </div>
    </div>
    <div class="content">
        <div class="description" id="article_reply"></div>
    </div>
</div>

</div>  <!-- end of ui grid (container) -->

<!-- 功能選單 -->
<div class="ui four attached black buttons" id="reply-bar" hidden>
<div class="ui button" id="reply"><i class="comment icon"></i></div>
<div class="ui button" id="report"><i class="thumbs down icon"></i></div>
<div class="ui button scroll-to-bottom-onmodal"><i class="arrow circle down icon"></i></div>
<div class="ui button scroll-to-top-onmodal"><i class="arrow circle up icon"></i></div>
</div>

<!-- 回覆輸入框 -->
<div class="ui six wide column fluid" id="reply-container" hidden>
<div class="ui stackable three column grid">
    <div class="column right floated">
        <div class="ui secondary segment">
            <div class="ui form">
                <div class="field">
                    <div class="ui toggle checkbox">
                        <input type="checkbox" id="anonymous">
                        <label for="anonymous">匿名</label>
                    </div>
                </div>
                <div class="field">
                    <textarea class="content" id="reply-content"></textarea>
                    <div class="ui two bottom attached buttons">
                        <div class="ui button blue" id="reply-send"><i class="send icon"></i></div>
                        <div class="ui button grey" id="reply-close"><i class="angle down icon"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- 檢舉輸入框 -->
<div class="ui six wide column fluid" id="report-container" hidden>
<div class="ui stackable three column grid">
    <div class="column right floated">
        <div class="ui secondary segment">
            <div class="ui form">
                <div class="field">
                    <label>請具體描述檢舉原因</label>
                    <textarea class="content"></textarea>
                    <div class="ui two bottom attached buttons">
                        <div class="ui button blue"><i class="send icon"></i></div>
                        <div class="ui button grey" id="report-close"><i class="angle down icon"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>

$("#reply-bar").hide();

$("#reply-close").click(function(){
$("#reply-container").transition('fade').transition('hide');
$("#function-bar").transition('fade').transition('show');
});

$("#report-close").click(function(){
$("#report-container").transition('fade').transition('hide');
$("#function-bar").transition('fade').transition('show');
});

$("#reply").click(function(){
$("#reply-container").transition('fade').transition('show');
$("#function-bar").transition('fade').transition('hide');
$(".content").focus();
});

$("#report").click(function(){
$("#report-container").transition('fade').transition('show');
$("#function-bar").transition('fade').transition('hide');
$(".content").focus();
});

$("#reply").click(function(){

});


$('#article_modal').modal('setting', {
closable	: true,
duration	: 300
});

var art_id;
var art_type;

loadMenu();

function loadMenu() {

$.ajax({
    async: false,
    dataType: 'json',
    url: '<?php echo base_url() ?>assets/statics/article/type',
    error: function (xhr) {},
    success: function (response) {

        typeList = $.parseJSON(JSON.stringify(response));

        $.each(typeList.result, function(i) {

            if ( typeList.result[i].di_sch == 0 ) {
                $('#menu-list').append('<a id="menu-'+ typeList.result[i].di_code +'" class="item" href="<?=base_url()?>a/'+typeList.result[i].di_code+'">'+typeList.result[i].di_name+'</a>');
                $('#menu-list-mobile .menu').append('<div class="item" data-value="'+typeList.result[i].di_code+'">'+typeList.result[i].di_name+'</div>');

            }

        });

    }


});
}


function loadArticle(type, aid) {

$.ajax({
    async: false,
    type: 'post',
    dataType: 'json',
    url: '<?php echo base_url() ?>a/query/article',
    data: {
        type: type,
        aid: aid
    },
    error: function (xhr) {},
    success: function (response) {

        var response = $.parseJSON(JSON.stringify(response));
        if (response.status == false) {
            errorMsg();
        }
        else {

            if (response.ispublic == false) {
                notloginMsg();
            }
            else {
                yuanPO_array = response.yuanPO;
                replyliked_array = response.reply_liked;

                $('#article_title').html(response.result.art_name);
                $('#article_author').html(gender(response.result.gender)+' '+response.result.author);
                $('#article_time').html('<h5>'+response.result.time+'</h5>');
                $('#article_content').html(formatter(response.result.content));
                $('#article_signature').html(response.result.signature);
                $('#article_likecount').html(response.result.like_count);
                $('#article_type').html('<a class="ui red label" href="<?php echo base_url(); ?>a/'+ response.result.di_code +'"> '+response.result.di_name+'</a>');
                switch (response.islike) {
                    case true:
                        $('#article_like').attr('class', 'ui red button').attr('islike', 'true').attr('aid', response.result.id).attr('atype', response.result.type);
                        break;

                    case false:
                    default:
                        $('#article_like').attr('class', 'ui red basic button').attr('islike', 'false').attr('aid', response.result.id).attr('atype', response.result.type);
                        break;

                    case "notlogin":
                        $('#article_like').attr('class', 'ui red basic button').attr('islike', 'notlogin');
                        break;
                }

                switch (response.isarchive) {
                    case true:
                        $('#article_archive').attr('class', 'ui green button').attr('isarchive', 'true').attr('aid', response.result.id).attr('atype', response.result.type).html('取消收藏');
                        break;

                    case false:
                    default:
                        $('#article_archive').attr('class', 'ui green basic button').attr('isarchive', 'false').attr('aid', response.result.id).attr('atype', response.result.type);
                        break;

                    case "notlogin":
                        $('#article_archive').attr('class', 'ui green basic button').attr('isarchive', 'notlogin');
                        break;
                }

                $('#article_modal').modal({
                    onHide: function(){
                        window.history.pushState("", "", "<?php echo base_url().'a/' .$this->uri->segment(2)?>");
                        $('#article_content').html('');
                        $('#article_reply').html('');
                        $("#reply-bar").hide();
                        $('#article_archive').html('加入收藏');
                        // reply_count = 0;
                    },
                    onShow: function(){

                        reply_count = 0;
                        reply_f_count = 0;
                        loadReply(type, aid);
                        $("#reply-bar").show();
                        window.history.pushState("", "", "<?php echo base_url(); ?>a/"+ response.result.di_code + '/' + aid);

                    }
                }).modal('show');
                art_id 	 = response.result.id;
                art_type = response.result.type;
            }

        }
    }
});

}


function loadReply(reply_type, reply_aid) {

$.ajax({
    type: 'post',
    dataType: 'json',
    url: '<?php echo base_url() ?>a/query/reply',
    data: {
        reply_type: reply_type,
        reply_aid: reply_aid,
        reply_offset: reply_count
    },
    error: function (xhr) {
        $('#article_reply').append('<div class="ui red message" id="no-more-reply"><p>載入回應失敗。</p></div>');
    },
    success: function (response) {


        var response = $.parseJSON(JSON.stringify(response));
        if (response.status != true) { }
        else {

            $.each(response.result, function(i) {

                reply_f_count+=1

                function isYuanPO () {

                    var yuanPO = $.grep(yuanPO_array, function(r){ return r.reply_id == response.result[i].id ; });

                    if (yuanPO.length == 1) {
                        return ' <a class="ui yellow empty circular label"></a>';
                    } else { return ''; }

                }
                function replyIsLiked () {

                    if (replyliked_array == "notlogin") {
                        return	'<div class="ui basic red top right attached label" class="reply_like_btn" replyid="'+ response.result[i].id +'" isrlike="notlogin" aid="'+reply_aid+'" type="'+reply_type+'">' +
                                    '<i class="empty heart icon"></i><span class="reply_likecount">'+ response.result[i].reply_like_count + '</span>' +
                                '</div>';
                    }
                    else {
                        var reply_liked = $.grep(replyliked_array, function(r){ return r.reply_id == response.result[i].id ; });

                        if (reply_liked.length == 1) {
                            return	'<div class="ui red top right attached label reply_like_btn" replyid="'+ response.result[i].id +'" isrlike="true" aid="'+reply_aid+'" type="'+reply_type+'">' +
                                        '<i class="heart icon"></i><span class="reply_likecount">'+ response.result[i].reply_like_count + '</span>' +
                                    '</div>';
                        } else {
                            return	'<div class="ui basic red top right attached label reply_like_btn" replyid="'+ response.result[i].id +'" isrlike="false" aid="'+reply_aid+'" type="'+reply_type+'">' +
                                        '<i class="empty heart icon"></i><span class="reply_likecount">'+ response.result[i].reply_like_count + '</span>' +
                                    '</div>';
                        }
                    }

                }

                if ( response.result[i].reply_del == "0" ) {

                    $('#article_reply').append('<div class="ui segments" id="rf-'+ reply_f_count +'">'+
                                                    '<div class="ui basic secondary segment">'+
                                                        '<div class="ui small black header">'+
                                                            '<a class="ui horizontal grey basic label replybtn" href="#rf-'+ reply_f_count +'">'+ reply_f_count +'F</a>' + gender(response.result[i].reply_gender)  + response.result[i].reply_author + isYuanPO() +
                                                        '</div>'+ replyIsLiked() +
                                                            '<p>' + formatter(response.result[i].content) +'</p>'+
                                                    '</div>'+
                                                '<div class="ui secondary segment right aligned segmentfooter">'+
                                                    relativeTime(response.result[i].reply_time) +
                                                '</div></div>');
                }
                else {

                    $('#article_reply').append('<div class="ui segments" id="rf-'+ reply_f_count +'">'+
                                                    '<div class="ui basic disabled secondary segment">'+
                                                        '<div class="ui small black header">'+
                                                            '<a class="ui horizontal grey basic label replybtn" href="#rf-'+ reply_f_count +'">'+ reply_f_count +'F</a>' + '一則遭遇刪除的回覆' +
                                                        '</div>'+
                                                            '<i>消失的無影無蹤</i>'+
                                                    '</div></div>');
                }

            });

            if ( response.result.length < 20) {
                $('.load_more_reply').hide();
            }
            else {
                $('#article_reply').append('<div class="ui orange basic fluid button load_more_reply" onclick="loadReply('+reply_type+', '+reply_aid+'); $(this).remove();"><p>載入更多回應</p></div>');

            }

            reply_count = Number(reply_count) + 20;
        }
    }
});
}


loadmore();

var val = 20;
var reply_count = 0;
var reply_f_count = 0;
var scroll_switch = true;

$(window).scroll(function () {
if($(document).height() <= $(window).scrollTop() + $(window).height() && scroll_switch) {
    scroll_switch = false;
    setTimeout(function() {
        loadmore();
    }, 300);
}
});


function loadmore() {
$.ajax({
    type: 'post',
    dataType: 'json',
    url: '<?php echo base_url().'a/' .$this->uri->segment(2)?>/query',
    data: {
        offset:val
    },
    error: function (xhr) {
        $('#fail-loading-article').show();
        $('#loading-article').hide();
    },
    success: function (response) {

        var response = $.parseJSON(JSON.stringify(response));
        if (response.status != true) {
            scroll_switch = false;
            $('#no-more-article').show();
            $('#loading-article').hide();
        }
        else {
            scroll_switch = true;

            $.each(response.result, function(i) {

                $('#display_article>table').append('<tr onclick="loadArticle('+ response.result[i].type + ', ' + response.result[i].id + ')"><td>'+ response.result[i].like_count +'</td>'+
                                                 '<td>' + response.result[i].reply_count +'</td>'+
                                                 '<td>' + response.result[i].art_name + '</td>'+
                                                 '<td>' + gender(response.result[i].gender) + response.result[i].author +'</td>'+
                                                 '<td>' + relativeTime(response.result[i].time) +'</td>'+
                                                 '</tr>');
            });
            val = Number(val) + 20;
        }
    }
});
}

$("#reply-send").click(function(){
$.ajax({
    url: '<?php echo base_url(); ?>a/query/article_reply',
    data: {
        content : $("#reply-content").val(),
        art_id  : art_id,
        art_type : art_type,
        anon : $('#anonymous').is(':checked'),
    },
    dataType: 'json',
    type: 'POST',
    error: function(xhr) {
        Messenger().post({
            message: "賽拉涅壞掉了，重新整理看看？",
            type: "error",
            showCloseButton: true,
            hideAfter: 3
        });
    },
    success: function(response) {

        var response = $.parseJSON(JSON.stringify(response));
        if (response.status == true) {
            Messenger().post({
                message: "回覆完成！",
                type: "info",
                showCloseButton: true,
                hideAfter: 3
            });
        }
        else{
            if (response.login == false) {
                Messenger().post({
                    message: "趕快加入好玩又有趣的 Selene 吧！",
                    type: "success",
                    showCloseButton: true,
                    hideAfter: 3
                });
            }
            else{
                Messenger().post({
                    message: "回覆失敗！",
                    type: "error",
                    showCloseButton: true,
                    hideAfter: 3
                });
            }
        }
    }
});
});

</script>
