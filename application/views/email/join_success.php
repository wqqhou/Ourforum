<!DOCTYPE html>
<html>
<title>歡迎你的加入 - Selene</title>
<head>
    <style media="screen">
        .container {
            width: 500px;
            height: 250px;
            padding: 20px;
            border-radius: 7px;
            background-image: repeating-linear-gradient(135deg, #F29B91 0px, #F09290 30px, transparent 30px, transparent 50px, #83B3DB 50px, #84ADCB 80px, transparent 80px, transparent 100px);
        }
        .right {
            position: absolute;
            top: 240px;
            left: 460px;
        }
        .firstname {
            font-weight: 600;
        }
        .content {
            width: 500px;
            height: 250px;
            background-color: rgba(255, 255, 255, .9);
            margin-top: -7px;
            margin-left: -7px;
            padding: 7px;
        }
        .italic {
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="text">
                <p><span class="firstname"><?php echo $firstname ?></span>同學您好：</p>
                <p>恭喜您成功加入 Selene！ 請點擊 <a href="<?=base_url()?>join/success/enable/<?=$enable?>"><?=base_url()?>join/success/enable/<?=$enable?></a> 啟用您的帳號</p>
                <p>可以透過 Selene 來分享生活趣事及認識新朋友</p>
                <p>但也請大家遵守各項規則，維持 Selene 美好的環境！</p>
                <p>如果不曾註冊，請您忽略這封信</p>
                <p class="right">- <span class="italic">塞拉涅</span></p>
            </div>
        </div>
    </div>
</body>
</html>
