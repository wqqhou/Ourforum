<div class="ui thirteen wide column center aligned">

    <div class="ui people shape choosecard">
        <div class="sides">
            <div class="side">
                <div class="ui card">
                    <div class="image">
                        <img src="//i.imgur.com/VULqN6x.png">
                    </div>
                </div>
            </div>
            <div class="side active">
                <div class="ui card">
                    <div class="image">
                        <img src="//i.imgur.com/oYo6zNr.png">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ui people shape choosecard">
        <div class="sides">
            <div class="side">
                <div class="ui card">
                    <div class="image">
                        <img src="//i.imgur.com/7IdL2mj.png">
                    </div>
                </div>
            </div>
            <div class="side active">
                <div class="ui card">
                    <div class="image">
                        <img src="//i.imgur.com/oYo6zNr.png">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ui people shape choosecard">
        <div class="sides">
            <div class="side">
                <div class="ui card">
                    <div class="image">
                        <img src="//i.imgur.com/0QMHM8p.png">
                    </div>
                </div>
            </div>
            <div class="side active">
                <div class="ui card">
                    <div class="image">
                        <img src="//i.imgur.com/oYo6zNr.png">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ui people shape choosecard">
        <div class="sides">
            <div class="side">
                <div class="ui card">
                    <div class="image">
                        <img src="//i.imgur.com/ZAyfyPF.png">
                    </div>
                </div>
            </div>
            <div class="side active">
                <div class="ui card">
                    <div class="image">
                        <img src="//i.imgur.com/oYo6zNr.png">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ui people shape choosecard">
        <div class="sides">
            <div class="side">
                <div class="ui card">
                    <div class="image">
                        <img src="//i.imgur.com/LelGZ8v.png">
                    </div>
                </div>
            </div>
            <div class="side active">
                <div class="ui card">
                    <div class="image">
                        <img src="//i.imgur.com/oYo6zNr.png">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ui people shape choosecard">
        <div class="sides">
            <div class="side">
                <div class="ui card">
                    <div class="image">
                        <img src="//i.imgur.com/F2DGjpK.png">
                    </div>
                </div>
            </div>
            <div class="side active">
                <div class="ui card">
                    <div class="image">
                        <img src="//i.imgur.com/oYo6zNr.png">
                    </div>
                </div>
            </div>
        </div>
    </div>

</div> <!-- end of container -->

<script>
    $(".choosecard").click(function(){
        $(this).shape('flip over').addClass("hola");
        $('.choosecard').transition('fade down');
        setTimeout(function(){
            window.location.href = '<?=base_url('friend')?>';
        }, 800);
    });
</script>
