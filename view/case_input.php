<!DOCTYPE html>
<html lang="ja">
    <head>
    <?php
include './../view/head.html';
        ?>
    </head>
    <body>
        <!--nav-->
        <nav role="navigation" class="navbar navbar-custom">
        <?php
include './../view/navigation.html';
        ?>
        </nav>
        <!--header-->
        <div class="container-fluid">
        <!--documents-->
            <div class="row row-offcanvas row-offcanvas-left">
            <div class="col-xs-6 col-sm-3 sidebar-offcanvas" role="navigation">
            <?php
include './../view/nav_list.html';
?>
            </div>
            <div class="col-xs-12 col-sm-9 content">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a> Panel Title</h3>
                    </div>
                    
                    <div class="panel-body">
                        <div class="content-row">
                                <?php if (false): ?>
                                <div class="alert alert-warning alert-dismissable">
                                    <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> -->
                                    <h4>与信限度額到達してます！</h4>
                                    <p class="lead_">むりぽ</p>
                                    </p>
                                </div>
                                <?php endif; ?>
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">新規案件</h3>
                                </div>
                                <div class="panel-body">
                                    <form action="./case_input.php" novalidate="" role="form" class="form-horizontal">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">案件名</label>
                                            <div class="col-md-10">
                                            <input type="text" required="" placeholder="Title" id="title" class="form-control" name="title">
                                            <div class="radio col-md-3">
                                                <input type="radio" id="flat-radio-1" name="form">
                                                <label for="flat-radio-1">買注文</label>
                                            </div>
                                            <div class="radio col-md-3">
                                                <input type="radio" id="flat-radio-2" name="form">
                                                <label for="flat-radio-2">売注文</label>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        </div>
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">顧客情報</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">企業検索</label>
                                                    
                                                    <div class="col-md-10">
                                                        <select name="selecter_basic" class="selecter_1">
                                                            <optgroup label="Group One">
                                                                <option value="1">One</option>
                                                                <option value="2">Two</option>
                                                                <option value="3">Three</option>
                                                            </optgroup>
                                                            <optgroup label="Group One">
                                                                <option value="4">Four</option>
                                                                <option value="5">Five</option>
                                                                <option value="6">Six</option>
                                                                <option value="7">Seven</option>
                                                            </optgroup>
                                                            <optgroup label="Group Three">
                                                                <option value="8">Eight</option>
                                                                <option value="9">Nine</option>
                                                                <option value="10">Ten</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">企業名</label>
                                                    <div class="col-md-10">
                                                    <input type="text" required="" placeholder="株式会社" id="subject" class="form-control" name="title" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">代表者名</label>
                                                    <div class="col-md-10">
                                                    <input type="text" required="" placeholder="名前" id="subject" class="form-control" name="title" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">担当者名</label>
                                                    <div class="col-md-10">
                                                    <input type="text" required="" placeholder="名前" id="subject" class="form-control" name="title">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">電話番号</label>
                                                    <div class="col-md-10">
                                                    <input type="text" required="" placeholder="09012345678" id="subject" class="form-control" name="title">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">メールアドレス</label>
                                                    <div class="col-md-10">
                                                    <input type="text" required="" placeholder="a@g.c" id="subject" class="form-control" name="title">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">住所</label>
                                                    <div class="col-md-1">
                                                        <select name="pref_name" class="selecter_1">
                                                            <option value="" selected>都道府県</option>
                                                            <option value="北海道">北海道</option>
                                                            <option value="青森県">青森県</option>
                                                            <option value="岩手県">岩手県</option>
                                                            <option value="宮城県">宮城県</option>
                                                            <option value="秋田県">秋田県</option>
                                                            <option value="山形県">山形県</option>
                                                            <option value="福島県">福島県</option>
                                                            <option value="茨城県">茨城県</option>
                                                            <option value="栃木県">栃木県</option>
                                                            <option value="群馬県">群馬県</option>
                                                            <option value="埼玉県">埼玉県</option>
                                                            <option value="千葉県">千葉県</option>
                                                            <option value="東京都">東京都</option>
                                                            <option value="神奈川県">神奈川県</option>
                                                            <option value="新潟県">新潟県</option>
                                                            <option value="富山県">富山県</option>
                                                            <option value="石川県">石川県</option>
                                                            <option value="福井県">福井県</option>
                                                            <option value="山梨県">山梨県</option>
                                                            <option value="長野県">長野県</option>
                                                            <option value="岐阜県">岐阜県</option>
                                                            <option value="静岡県">静岡県</option>
                                                            <option value="愛知県">愛知県</option>
                                                            <option value="三重県">三重県</option>
                                                            <option value="滋賀県">滋賀県</option>
                                                            <option value="京都府">京都府</option>
                                                            <option value="大阪府">大阪府</option>
                                                            <option value="兵庫県">兵庫県</option>
                                                            <option value="奈良県">奈良県</option>
                                                            <option value="和歌山県">和歌山県</option>
                                                            <option value="鳥取県">鳥取県</option>
                                                            <option value="島根県">島根県</option>
                                                            <option value="岡山県">岡山県</option>
                                                            <option value="広島県">広島県</option>
                                                            <option value="山口県">山口県</option>
                                                            <option value="徳島県">徳島県</option>
                                                            <option value="香川県">香川県</option>
                                                            <option value="愛媛県">愛媛県</option>
                                                            <option value="高知県">高知県</option>
                                                            <option value="福岡県">福岡県</option>
                                                            <option value="佐賀県">佐賀県</option>
                                                            <option value="長崎県">長崎県</option>
                                                            <option value="熊本県">熊本県</option>
                                                            <option value="大分県">大分県</option>
                                                            <option value="宮崎県">宮崎県</option>
                                                            <option value="鹿児島県">鹿児島県</option>
                                                            <option value="沖縄県">沖縄県</option>
                                                        </select> 
                                                    </div>
                                                    <div class="col-md-9">
                                                    <input type="text" required="" placeholder="住所" id="subject" class="form-control" name="title">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label" for="description">その他特記事項</label>
                                                    <div class="col-md-10">
                                                    <textarea required="" class="form-control" placeholder="Description" rows="3" cols="30" id="description" name="description"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">車両情報</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label"></label>
                                                    
                                                    <div class="col-md-10">
                                                        <select name="selecter_basic" class="selecter_1">
                                                            <optgroup label="Group One">
                                                                <option value="1">One</option>
                                                                <option value="2">Two</option>
                                                                <option value="3">Three</option>
                                                            </optgroup>
                                                            <optgroup label="Group One">
                                                                <option value="4">Four</option>
                                                                <option value="5">Five</option>
                                                                <option value="6">Six</option>
                                                                <option value="7">Seven</option>
                                                            </optgroup>
                                                            <optgroup label="Group Three">
                                                                <option value="8">Eight</option>
                                                                <option value="9">Nine</option>
                                                                <option value="10">Ten</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">車輌型式</label>
                                                    <div class="col-md-10">
                                                    <input type="text" required="" placeholder="XXXXXXXXXXXXXXXXX" id="subject" class="form-control" name="title">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">車輌名</label>
                                                    <div class="col-md-10">
                                                    <input type="text" required="" placeholder="プリウス" id="subject" class="form-control" name="title">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">色</label>
                                                    <div class="col-md-10">
                                                    <input type="text" required="" placeholder="グレー" id="subject" class="form-control" name="title">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">年式</label>
                                                    <div class="col-md-10">
                                                    <input type="text" required="" placeholder="H30" id="subject" class="form-control" name="title">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">走行距離</label>
                                                    <div class="col-md-10">
                                                    <input type="text" required="" placeholder="999km" id="subject" class="form-control" name="title">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">ミッション</label>
                                                    <div class="col-md-10 ">
                                                    <input type="text" required="" placeholder="ミッション" id="subject" class="form-control" name="title">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">予算</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">金額</label>
                                                    <div class="col-md-10 input-group">
                                                        <span class="input-group-addon">￥</span>
                                                        <input type="text" required="" placeholder="999,999" id="subject" class="form-control" name="title">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <div class="col-md-offset-2 col-md-10">
                                            <button class="btn btn-info" type="submit">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div><!-- panel body -->
                </div>
            </div><!-- content -->
        </div>
        </div>
        <?php
include './../view/footer.html';
        ?>
    </body>
</html>
