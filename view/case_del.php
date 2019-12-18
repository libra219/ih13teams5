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
                                <div class="alert alert-danger alert-dismissable">
                                        <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> -->
                                        <h4>案件を削除します！</h4>
                                        <p class="lead_">よろしいですか？</p>
                                        </p>
                                    </div>
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">案件</h3>
                                </div>
                                <div class="panel-body">
                                    <form action="./case_del.php" novalidate="" role="form" class="form-horizontal">
                                        
                                        <div class="form-group">
                                            <h4>案件名</h4>
                                            <input type="text" value="<?=$select_data['name']?>" required="" placeholder="" id="subject" class="form-control" name="name">
                                            <input type="hidden" value="<?=$select_data['id']?>" name="del_id">
                                        </div>

                                        <div class="form-group">
                                            <h4>よろしければ削除してください。</h4>
                                            <button class="btn btn-danger" type="submit" name="submit" value="<?=$select_data['id']?>">案件の削除</button>
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
