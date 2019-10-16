    <div class="ui thirteen wide column">

        <div class="ui stackable three column grid">

        <?php foreach ($shop_item as $item): ?>

                <div class="column">
                    <div class="ui card fluid">
                        <div class="content">
                            <div class="header"><?=$item['sh_name']?></div>
                        </div>
                        <div class="content">
                            <div class="ui small feed">
                                <div class="event">
                                    <div class="content">
                                        <div class="summary">
                                            <?=$item['sh_content']?>
                                        </div>
                                    </div>
                                </div>

                                <div class="event">
                                    <div class="content">

										<a class="ui" href="#" target="_self">
											<div class="image-square image radius-4" style="background-image: url(<?='https://s3.amazonaws.com/static.selene.tw/assets/img/badge/'.$item['sh_img']?>)">
											</div>
										</a>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="extra content center aligned">
                            <button class="ui button nav-blue notinverted buy">購買</button>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

            </div>


        <!-- 確認購買 Modal -->
        <!-- <div class="ui basic modal">
            <i class="close icon"></i>
            <div class="header">
                神鹿勳章 - 確認購買
            </div>
            <div class="image content">
                <div class="image">
                    <img src="//selene.tw/assets/img/badge/goddeer.svg" alt="" />
                </div>
                <div class="description">
                    <p>
                        參加塞拉涅盃歌唱賽並獲得最多票數之同學，才有權擁有的神鹿徽章。
                    </p>
                </div>
            </div>
            <div class="actions">
                <div class="two fluid ui inverted buttons">
                    <div class="ui red basic inverted button">
                        <i class="remove icon"></i>否
                    </div>
                    <div class="ui green inverted button">
                        <i class="checkmark icon"></i>確定購買
                    </div>
                </div>
            </div>
        </div> -->

    </div>

    <script>
        // $('.ui.basic.modal').modal('show');
        $(".buy").click(function(){
            Messenger().post({
                message: "這是非賣品，日後會推出其他商品唷～",
                type: "info",
                showCloseButton: true,
                hideAfter: 3
            });
        });
    </script>
