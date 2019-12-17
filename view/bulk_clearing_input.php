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
                        <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span
                                    class="fa fa-angle-double-left" data-toggle="offcanvas"
                                    title="Maximize Panel"></span></a> Panel Title</h3>
                    </div>

                    <div class="panel-body">

                        <div class="content-row">
                        <?php if($count != null){?>   
                        <div class="alert alert-success alert-dismissable">
                                        <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> -->
                                        <h4>一括請求登締め日登録完了</h4>
                                        <p><?php  echo $count?> 件の案件に請求を行いました</p>
                                        
                            </div>
                            <?php }?>

                            <div class="alert alert-success alert-dismissable">
                                <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> -->
                                <h4>一括消し込み登締め日登録完了</h4>
                                <p class="lead_">Textmessage</p>
                                <p></p>
                            </div>
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">消し込み締め日入力蘭</h3>
                                </div>
                                <!-- 一括入力欄 -->
                                <div class="panel-body">
                                    <form action="bulk_clearing.php" method="post">
                                        <div class="col-md-6">
                                            <input type="date" class="form-control" name="bulk_date" value="<?php echo $bulk_date; ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="time" class="form-control" name="bulk_time" step='3600' value="<?php echo $bulk_time; ?>">
                                        </div>

                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-info" type="submit" name='confirm_button'
                                        value="confirm">案件の確認</button>
                                </div>
                                </form>
                             
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">消し込み可能な案件一覧</h3>
                                    </div>
                                    <div class="panel-body">
                                        <form action="bulk_clearing.php" method="post">
                                            <div class="list-group">

                                                <?php foreach ($select_data as $key => $value) :?>
                                                <a href="./case_cfn.php?select=<?=$value['id']?>"
                                                    class="list-group-item list-group-item-<?php echo ($value['trade']) ? 'warning' : 'success' ;?>">
                                                    <h4 class="list-group-item-heading"><?=$value['name']?></h4>
                                                    <p class="list-group-item-text">詳細内容</p>
                                                </a>
                                                <?php endforeach;?>

                                                <a href="#" class="list-group-item list-group-item-primary">ほかの色</a>
                                                <a href="#" class="list-group-item list-group-item-info">ほかの色</a>
                                                <a href="#" class="list-group-item list-group-item-danger">ほかの色</a>
                                                <a href="#" class="list-group-item ">ほかの色</a>

                                            </div>

                                    </div>
     
                                    <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">入金がまだの案件</h3>
                                    </div>
                                    <div class="panel-body">
                                        <form action="bulk_clearing.php" method="post">
                                            <div class="list-group">

                                                <?php foreach ($select_data as $key => $value) :?>
                                                <a href="./case_cfn.php?select=<?=$value['id']?>"
                                                    class="list-group-item list-group-item-<?php echo ($value['trade']) ? 'warning' : 'success' ;?>">
                                                    <h4 class="list-group-item-heading"><?=$value['name']?></h4>
                                                    <p class="list-group-item-text">詳細内容</p>
                                                </a>
                                                <?php endforeach;?>

                                                <a href="#" class="list-group-item list-group-item-primary">ほかの色</a>
                                                <a href="#" class="list-group-item list-group-item-info">ほかの色</a>
                                                <a href="#" class="list-group-item list-group-item-danger">ほかの色</a>
                                                <a href="#" class="list-group-item ">ほかの色</a>

                                            </div>

                                    </div>
                                    <div class="modal-footer">

<button class="btn btn-info" type="submit" name="bulk_button"
    value="bulk">一括処理</button>
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