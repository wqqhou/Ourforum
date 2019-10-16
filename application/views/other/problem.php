<div class="ui thirteen wide column">

    <div class="ui stackable four column grid">
        <div class="seven wide column fluid">
            <div class="ui form">
                <div class="field">
                    <label>提報種類</label>
                    <select class="ui dropdown" id="type">
                        <option value="0">問題</option>
                        <option value="1">建議</option>
                    </select>
                </div>
                <div class="field">
                    <label>問題</label>
                    <div class="ui fluid icon input">
                        <input type="text" id="title" placeholder="下個標題...">
                    </div>
                </div>
                <div class="ui form">
                    <div class="field">
                        <label>描述問題</label>
                        <div contenteditable="plaintext-only" id="content" class="ui segment div-textarea"></div>
                    </div>
                </div>
            </div>
            <div class="ui segment one icon buttons">
                <button class="ui button nav-blue notinverted" id="feedback">提報</button>
                <h2><i class="file image outline icon" id="problem-select-pic"></i></h2>
            </div>
            <form id="problem-imgur" method="post" enctype="multipart/images">
                <input id="problem-choose-image" name="userImage" type="file" accept="image/*">
                <input type="submit" class="ui button blue" value="上傳" id="problem-upload">
            </form>
        </div>
        <div class="nine wide column fluid">
            <table class="ui very basic table">
                <thead>
                    <tr>
                        <th class="center aligned">提報類型</th>
                        <th>標題</th>
                        <th>管理員</th>
                        <th>詳細</th>
                    </tr>
                </thead>
                <tbody id="myfeedback"></tbody>
            </table>
        </div>
    </div>
</div>

<script>
    feedback();
</script>
