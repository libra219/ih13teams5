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
                    
                    <nav class="navbar navbar-inverse" role="navigation">
                        <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-content-row-navbar-collapse-5">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#">仕入れ・出荷</a>
                            </div>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-content-row-navbar-collapse-1">
                            
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
                            <?php foreach ($select_data as $key => $value) :?>
                                <a href="./stocking_input.php?select=<?=$value['id']?>" class="list-group-item list-group-item-<?php echo ($value['trade']) ? 'warning' : 'success' ;?>">
                                    <h4 class="list-group-item-heading"><?=$value['name']?></h4>
                                    <p class="list-group-item-text"></p>
                                </a>
                            <?php endforeach;?>
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
