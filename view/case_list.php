<!DOCTYPE html>
<html lang="ja">
    <head>
    <?php
include './head.html';
        ?>
    </head>
    <body>
        <!--nav-->
        <nav role="navigation" class="navbar navbar-custom">
        <?php
include './navigation.html';
        ?>
        </nav>
        <!--header-->
        <div class="container-fluid">
        <!--documents-->
            <div class="row row-offcanvas row-offcanvas-left">
            <div class="col-xs-6 col-sm-3 sidebar-offcanvas" role="navigation">
<?php
include './nav_list.html';
?>
            </div>
            <div class="col-xs-12 col-sm-9 content">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a> Panel Title</h3>
                    </div>
                    
                    <nav class="navbar navbar-default" role="navigation">
                        <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-content-row-navbar-collapse-5">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#">Bootflat</a>
                            </div>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-content-row-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <a href="./case_input.html" class="btn btn-danger navbar-btn">新規案件</a>
                            </ul>
                            </li>
                            </ul>
                            <form class="navbar-form navbar-right" role="search">
                                <div class="form-search search-only">
                                    <i class="search-icon glyphicon glyphicon-search"></i>
                                    <input type="text" class="form-control search-query">
                                </div>
                                <div class="radio">
                                    <input type="radio" id="flat-radio-1" name="form">
                                    <label for="flat-radio-1">買注文</label>
                                </div>
                                <div class="radio">
                                    <input type="radio" id="flat-radio-2" name="form">
                                    <label for="flat-radio-2">売注文</label>
                                </div>
                                <div class="radio">
                                    <input type="radio" id="flat-radio-3" name="form">
                                    <label for="flat-radio-3">車種</label>
                                </div>
                                <div class="radio">
                                    <input type="radio" id="flat-radio-4" name="form">
                                    <label for="flat-radio-4">企業</label>
                                </div>
                                <div class="radio">
                                    <input type="radio" id="flat-radio-5" name="form">
                                    <label for="flat-radio-5">default</label>
                                </div>
                                <div class="radio">
                                    <input type="radio" id="flat-radio-6" name="form">
                                    <label for="flat-radio-6">default</label>
                                </div>
                            </form>
                            </div>
                            <!-- /.navbar-collapse -->
                        </div>
                        <!-- /.container-fluid -->
                    </nav>
                    <div class="panel-body">
                        <div class="content-row">
                            <div class="list-group">
                                <a href="./case_cfn.html" class="list-group-item list-group-item-success">買い注文</a>
                                <a href="#" class="list-group-item list-group-item-warning">売り注文</a>
                                <a href="#" class="list-group-item list-group-item-success">買い注文</a>
                                <a href="#" class="list-group-item list-group-item-warning">売り注文</a>
                                <a href="#" class="list-group-item list-group-item-success">
                                    <h4 class="list-group-item-heading">案件名</h4>
                                    <p class="list-group-item-text">詳細内容</p>
                                </a>
                                <a href="#" class="list-group-item list-group-item-success">
                                    <h4 class="list-group-item-heading">案件名</h4>
                                    <p class="list-group-item-text">詳細内容</p>
                                </a>
                                <a href="#" class="list-group-item list-group-item-warning">
                                    <h4 class="list-group-item-heading">案件名</h4>
                                    <p class="list-group-item-text">詳細内容</p>
                                </a>
                                <a href="#" class="list-group-item list-group-item-primary">ほかの色</a>
                                <a href="#" class="list-group-item list-group-item-info">ほかの色</a>
                                <a href="#" class="list-group-item list-group-item-danger">ほかの色</a>
                                <a href="#" class="list-group-item ">ほかの色</a>
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
include './footer.html';
        ?>
    </body>
</html>