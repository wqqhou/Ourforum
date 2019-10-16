<div class="ui grid stackable  container">
    <div class="three wide computer tablet only column">
        <div class="ui vertical text menu">
            <div class="item">
                <div class="menu">
                    <a id="menu-all" class="item" href="<?=base_url('activity/siege')?>"><h5 class="ui header"><i class="lightning icon"></i>攻城戰</h5></a>
                    <a id="menu-all" class="item" href="<?=base_url('activity/join')?>"><h5 class="ui header"><i class="unordered list icon"></i>競賽參與</h5></a>
                    <a id="menu-all" class="item" href="<?=base_url('activity/vote')?>"><h5 class="ui header"><i class="star half empty icon"></i>競賽投票</h5></a>
                    <a id="menu-all" class="item" href="<?=base_url('activity/result')?>"><h5 class="ui header"><i class="trophy icon"></i>競賽結果</h5></a>
                </div>
            </div>
        </div>
    </div>

    <div class="three wide mobile only column">
        <div class="ui selection fluid dropdown" id="menu-list-activity">
            <input type="hidden" onchange="window.location.href = '<?php echo base_url(); ?>' + $(this).val()">
            <i class="dropdown icon"></i>
            <div class="default text"><i class="announcement icon"></i>活動</div>
            <div class="menu">
                <div class="item" data-value="activity/siege">攻城戰</div>
                <div class="item" data-value="activity/join">競賽參與</div>
                <div class="item" data-value="activity/vote">競賽投票</div>
                <div class="item" data-value="activity/result">競賽結果</div>
            </div>
        </div>
    </div>
