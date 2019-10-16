<!DOCTYPE html>
<html>
<title></title>
<head>
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="text">
			    <p><?php echo $firstname ?> 同學您好：</p>
				<p>請透過以下連結重設您的 Selene 密碼</p>
                <p><a href="<?=base_url()?>join/request/password/<?=$fp_enable?>/auth"><?=base_url()?>join/request/password/<?=$fp_enable?>/auth</a></p>
                <p>如果你未曾申請重設密碼，請忽略這封信。</p>
				<p>連結只在4小時內有效。</p>
                <p><span class="italic">塞拉涅</span></p>
            </div>
        </div>
    </div>
</body>
</html>
