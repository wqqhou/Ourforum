<div class="ui grid stackable  container">
    <div class="three wide computer tablet only column">
        <div class="ui vertical text menu">
            <div class="item">
                <div class="menu">
                    <a id="menu-all" class="item" href="<?=base_url('other/shop')?>"><h5 class="ui header"><i class="shop icon"></i>涅商店</h5></a>
                    <a id="menu-all" class="item" href="<?=base_url('other/teach')?>"><h5 class="ui header"><i class="student icon"></i>涅知識</h5></a>
                    <a id="menu-all" class="item" href="<?=base_url('other/problem')?>"><h5 class="ui header"><i class="bug icon"></i>回報問題</h5></a>
                </div>
            </div>
        </div>
    </div>

    <div class="three wide mobile only column">
        <div class="ui selection fluid dropdown" id="menu-list-other">
            <input type="hidden" onchange="window.location.href = '<?php echo base_url(); ?>' + $(this).val()">
            <i class="dropdown icon"></i>
            <div class="default text"><i class="info circle icon"></i>其他</div>
            <div class="menu">
                <div class="item" data-value="other/shop">涅商店</div>
                <div class="item" data-value="other/teach">涅知識</div>
                <div class="item" data-value="other/problem">回報問題</div>
            </div>
        </div>
    </div>
