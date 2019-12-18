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
                                <a href="./deposit.php" class="btn btn-success  navbar-btn">入金</a>
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
                        <form method="GET" action="./deposit_check.php">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">得意先</th>
                                    <th scope="col">売掛金</th>
                                    <th scope="col">日付</th>
                                    <th scope="col">振込</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($select_data as $key => $value) :?>
                                <tr>
                                    <td><?=$value['abbreviation']?></td>
                                    <td><?=number_format($value['amount'])?></td>
                                    <td><?=$value['depositday']?></td>
                                    <td>
                                        <input type="checkbox" class="category" name="id[]" value="<?=$value['id']?>">
                                    </td>
                                </tr>
                                <?php endforeach;?>
                            </table>
                            <input type="checkbox" id="category_all" class="icheckbox_flat" style="position: relative"/>
                            <button type="button submit" class="btn btn-primary">消込</button>
                        </form>
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
