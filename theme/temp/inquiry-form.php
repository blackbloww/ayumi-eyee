[mwform_hidden name="recaptcha-v3"]
[mwform_error keys="recaptcha-v3"]

<div class="title">
    <p>お問い合わせは電話またはメールフォームからお願いいたします。</p>
</div>
<div class="form">
    <div class="row requied">
        <div class="group-text">
            <span>必須</span>
            <p>会社名（組織名）</p>
        </div>
        <div class="input">
            <label for="">
                [mwform_text name="会社名"]
            </label>
        </div>
    </div>
    <div class="row short requied">
        <div class="group-text">
            <span>必須</span>
            <p>ご担当者名</p>
        </div>
        <div class="input">
            <label for="">
                [mwform_text name="ご担当者名"]
            </label>
        </div>
    </div>
    <div class="row short requied">
        <div class="group-text">
            <span>必須</span>
            <p>ご連絡先電話番号</p>
        </div>
        <div class="input">
            <label for="">
                [mwform_text name="ご連絡先電話番号"]
            </label>
        </div>
    </div>
    <div class="row requied">
        <div class="group-text">
            <span>必須</span>
            <p>メールアドレス</p>
        </div>
        <div class="input">
            <label for="">
                [mwform_text name="メールアドレス"]
            </label>
        </div>
    </div>
    <div class="row">
        <div class="group-text">
            <span>任意</span>
            <p>ご住所（所在地）</p>
        </div>
        <div class="input">
            <label for="">
                [mwform_text name="ご住所"]
            </label>
        </div>
    </div>
    <div class="row requied">
        <div class="group-text">
            <span>必須</span>
            <p>ご依頼内容<br />
                <small>※複数チェック可</small></p>
        </div>
        <div class="input checkbox">
            [mwform_checkbox name="ご依頼内容" children="一度相談したい,詳しい説明をして欲しい,その他"]
        </div>
    </div>
    <div class="row text">
        <div class="group-text">
            <span>任意</span>
            <p>ご依頼内容詳細</p>
        </div>
        <div class="input">
            [mwform_textarea name="ご依頼内容詳細"]
        </div>
    </div>
</div>
<div class="list-btn">
    [mwform_bback value="back" class="btn btn-back"]<span>修正</span><span class="bg-btn"></span>[/mwform_bback]
    [mwform_bconfirm value="confirm" class="btn"]<span>確認する</span><span class="bg-btn"></span>[/mwform_bconfirm]
    [mwform_bsubmit value="send" class="btn"]<span>送信</span><span class="bg-btn"></span>[/mwform_bsubmit]
</div>