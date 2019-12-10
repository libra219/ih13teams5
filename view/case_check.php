<!DOCTYPE html>
<html lang="ja">
    <head>
    <?php
include './view/head.html';
        ?>
    </head>
    <body>
        <!--nav-->
        <nav role="navigation" class="navbar navbar-custom">
        <?php
include './view/navigation.html';
        ?>
        </nav>
        <!--header-->
        <div class="container-fluid">
        <!--documents-->
            <div class="row row-offcanvas row-offcanvas-left">
            <div class="col-xs-6 col-sm-3 sidebar-offcanvas" role="navigation">
            <?php
include './view/nav_list.html';
?>
            </div>
            <div class="col-xs-12 col-sm-9 content">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a> Panel Title</h3>
                    </div>
                    
                    <div class="panel-body">
                        <div class="content-row">
                            <div class="alert alert-warning alert-dismissable">
                                <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> -->
                                <h4>内容確認！</h4>
                                <p class="lead_">以下の内容で登録します。ご確認ください。</p>
                                </p>
                            </div>
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">新規案件</h3>
                                </div>
                                <div class="panel-body">
                                    
                                    <form action="" novalidate="" role="form" class="form-horizontal">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">案件名</label>
                                            <div class="col-md-10">
                                            <input type="text" required="" placeholder="Title" id="title" class="form-control" name="title" disabled>
                                            <div class="radio col-md-3">
                                                <input type="radio" id="flat-radio-1" name="form" checked disabled>
                                                <label for="flat-radio-1">買注文</label>
                                            </div>
                                            <div class="radio col-md-3">
                                                <input type="radio" id="flat-radio-2" name="form" disabled>
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
                                                    <label class="col-md-2 control-label">企業名</label>
                                                    <div class="col-md-10">
                                                    <input type="text" required="" placeholder="株式会社" id="subject" class="form-control" name="title" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">代表者名</label>
                                                    <div class="col-md-10">
                                                    <input type="text" required="" placeholder="名前" id="subject" class="form-control" name="title" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">担当者名</label>
                                                    <div class="col-md-10">
                                                    <input type="text" required="" placeholder="名前" id="subject" class="form-control" name="title"disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">電話番号</label>
                                                    <div class="col-md-10">
                                                    <input type="text" required="" placeholder="09012345678" id="subject" class="form-control" name="title" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">メールアドレス</label>
                                                    <div class="col-md-10">
                                                    <input type="text" required="" placeholder="a@g.c" id="subject" class="form-control" name="title" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">住所</label>
                                                    <div class="col-md-10">
                                                    <input type="text" required="" placeholder="住所" id="subject" class="form-control" name="title" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label" for="description">その他特記事項</label>
                                                    <div class="col-md-10">
                                                    <textarea required="" class="form-control" placeholder="Description" rows="3" cols="30" id="description" name="description" disabled></textarea>
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
                                                    <label class="col-md-2 control-label">車輌型式</label>
                                                    <div class="col-md-10">
                                                    <input type="text" required="" placeholder="" id="subject" class="form-control" name="title" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">車両名</label>
                                                    <div class="col-md-10">
                                                    <input type="text" required="" placeholder="" id="subject" class="form-control" name="title" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">色</label>
                                                    <div class="col-md-10">
                                                    <input type="text" required="" placeholder="" id="subject" class="form-control" name="title" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">年式</label>
                                                    <div class="col-md-10">
                                                    <input type="text" required="" placeholder="" id="subject" class="form-control" name="title" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">走行距離</label>
                                                    <div class="col-md-10">
                                                    <input type="text" required="" placeholder="" id="subject" class="form-control" name="title" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">ミッション</label>
                                                    <div class="col-md-10">
                                                    <input type="text" required="" placeholder="" id="subject" class="form-control" name="title" disabled>
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
                                                    <input type="text" required="" placeholder="" id="subject" class="form-control" name="title" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <div class="col-md-offset-2 col-md-10">
                                            <button class="btn btn-info" type="submit">登録</button>
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
include './view/footer.html';
        ?>
    </body>
</html>
