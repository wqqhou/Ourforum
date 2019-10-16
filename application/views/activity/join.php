    <div class="ui thirteen wide column">

        <?php
        if (is_array($activity_item)) {
            foreach ($activity_item as $item){
        ?>
                <div class="ui divided items">
                    <div class="item">
                        <div class="image">
                            <img src="<?=$item['g_cover']?>">
                        </div>
                        <div class="content">
                            <div class="ui default floating message">
                                <p><?=nl2br($item['g_content'])?></p>
                                <div class="ui list">
                                    <div class="item">
                                        <i class="bookmark icon"></i>
                                        <div class="content">
                                            <?=$item['g_name']?>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <i class="idea icon"></i>
                                        <div class="content">
                                            凡參加可得 <?=$item['g_get']?> 枚硬幣
                                        </div>
                                    </div>
                                    <div class="item">
                                        <i class="trophy icon"></i>
                                        <div class="content">
                                            <?=$item['g_extra']?>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <i class="user icon"></i>
                                        <div class="content">
                                            剩餘名額：<?=$item['g_limit'] - $item['total']?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="extra">
                                <a href="<?=base_url('activity/join').'/'.$item['g_id']?>">
                                    <div class="ui right floated notinverted nav-blue button join-now">
                                        立刻參與
                                        <i class="right chevron icon"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
            <?php
            }
        }
        else{
            echo '
                <div class="ui success message">
                    <p>現在沒有可參加的活動 QQ</p>
                </div>
            ';
        }
        ?>
