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
                    
                    <div class="panel-body">
                        <div class="content-row">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title">仕入・出荷内容（買い注文、売り注文）</h3>
                                </div>
                                <div class="panel-body">
                                    <form action="./stocking_check.html" novalidate role="form" class="form-horizontal">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">案件名</label>
                                            <div class="col-md-10">
                                            <!-- <input type="text" required="" placeholder="Title" id="title" class="form-control" name="title"> -->
                                                <div class="well">案件名</div>
                                            </div>
                                            <label class="col-md-2 control-label">企業名</label>
                                            <div class="col-md-10">
                                            <!-- <input type="text" required="" placeholder="Title" id="title" class="form-control" name="title"> -->
                                                <div class="well">〇〇社</div>
                                            </div>
                                        </div>
                                       
                                        
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">仕入車両情報</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">車両検索</label>
                                                    
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
                                                    <input type="text" required="" placeholder="" id="subject" class="form-control" name="title">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">色</label>
                                                    <div class="col-md-10">
                                                    <input type="text" required="" placeholder="" id="subject" class="form-control" name="title">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">年式</label>
                                                    <div class="col-md-10">
                                                    <input type="text" required="" placeholder="" id="subject" class="form-control" name="title">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">走行距離</label>
                                                    <div class="col-md-10">
                                                    <input type="text" required="" placeholder="" id="subject" class="form-control" name="title">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">ミッション</label>
                                                    <div class="col-md-10 ">

                                                    <input type="text" required="" placeholder="" id="subject" class="form-control" name="title">
                                                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">金額</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">単価</label>
                                                    <div class="col-md-10">
                                                        <input type="text" required="" placeholder="" id="subject" class="form-control" name="title">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">落札手数料</label>
                                                    <div class="col-md-10">
                                                        <input type="text" required="" placeholder="" id="subject" class="form-control" name="title">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">消費税</label>
                                                    <div class="col-md-10">
                                                        <input type="text" required="" placeholder="" id="subject" class="form-control" name="title">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">手続き手数料</label>
                                                    <div class="col-md-10">
                                                        <input type="text" required="" placeholder="" id="subject" class="form-control" name="title">
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">日付</label>
                                                    <div class="col-md-10">
                                                        <input type="text" required="" placeholder="" id="subject" class="form-control" name="title">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                         <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">書類</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">書類名</label>
                                                    <div class="col-md-10">
                                                        
                                                        <div class="col-md-8">
                                                            <input type="text" required="" placeholder="オークション落札票" id="subject" class="form-control" name="title">
                                                        </div>
                                                        <div class="">
                                                                <label class="col-md-1 control-label">納期日</label>
                                                            </div>
                                                        <div class="col-md-2 has-feedback">
                                                            <input type="text" required="" placeholder="2099/99/99" id="subject" class="form-control" name="title">
                                                            <span class=" glyphicon glyphicon-calendar  form-control-feedback"></span>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="checkbox">
                                                                <input type="checkbox" id="flat-checkbox-1">
                                                                <label for="flat-checkbox-1">chack</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">書類名</label>
                                                    <div class="col-md-10">
                                                        
                                                        <div class="col-md-8">
                                                            <input type="text" required="" placeholder="検査書" id="subject" class="form-control" name="title">
                                                        </div>
                                                        <div class="">
                                                                <label class="col-md-1 control-label">納期日</label>
                                                            </div>
                                                        <div class="col-md-2 has-feedback">
                                                            <input type="text" required="" placeholder="2099/99/99" id="subject" class="form-control" name="title">
                                                            <span class=" glyphicon glyphicon-calendar  form-control-feedback"></span>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="checkbox">
                                                                <input type="checkbox" id="flat-checkbox-1">
                                                                <label for="flat-checkbox-1">chack</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">書類名</label>
                                                    <div class="col-md-10">
                                                        
                                                        <div class="col-md-8">
                                                            <input type="text" required="" placeholder="自動車損害賠償責任保険（自賠責）" id="subject" class="form-control" name="title">
                                                        </div>
                                                        <div class="">
                                                                <label class="col-md-1 control-label">納期日</label>
                                                            </div>
                                                        <div class="col-md-2 has-feedback">
                                                            <input type="text" required="" placeholder="2099/99/99" id="subject" class="form-control" name="title">
                                                            <span class=" glyphicon glyphicon-calendar  form-control-feedback"></span>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="checkbox">
                                                                <input type="checkbox" id="flat-checkbox-1">
                                                                <label for="flat-checkbox-1">chack</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">書類名</label>
                                                    <div class="col-md-10">
                                                        
                                                        <div class="col-md-8">
                                                            <input type="text" required="" placeholder="証継続検査用自動車税納税証明書（納税証明書）" id="subject" class="form-control" name="title">
                                                        </div>
                                                        <div class="">
                                                                <label class="col-md-1 control-label">納期日</label>
                                                            </div>
                                                        <div class="col-md-2 has-feedback">
                                                            <input type="text" required="" placeholder="2099/99/99" id="subject" class="form-control" name="title">
                                                            <span class=" glyphicon glyphicon-calendar  form-control-feedback"></span>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="checkbox">
                                                                <input type="checkbox" id="flat-checkbox-1">
                                                                <label for="flat-checkbox-1">chack</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">書類名</label>
                                                    <div class="col-md-10">
                                                        
                                                        <div class="col-md-8">
                                                            <input type="text" required="" placeholder="印鑑証明書" id="subject" class="form-control" name="title">
                                                        </div>
                                                        <div class="">
                                                                <label class="col-md-1 control-label">納期日</label>
                                                            </div>
                                                        <div class="col-md-2 has-feedback">
                                                            <input type="text" required="" placeholder="2099/99/99" id="subject" class="form-control" name="title">
                                                            <span class=" glyphicon glyphicon-calendar  form-control-feedback"></span>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="checkbox">
                                                                <input type="checkbox" id="flat-checkbox-1">
                                                                <label for="flat-checkbox-1">chack</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">書類名</label>
                                                    <div class="col-md-10">
                                                        
                                                        <div class="col-md-8">
                                                            <input type="text" required="" placeholder="委任状" id="subject" class="form-control" name="title">
                                                        </div>
                                                        <div class="">
                                                                <label class="col-md-1 control-label">納期日</label>
                                                            </div>
                                                        <div class="col-md-2 has-feedback">
                                                            <input type="text" required="" placeholder="2099/99/99" id="subject" class="form-control" name="title">
                                                            <span class=" glyphicon glyphicon-calendar  form-control-feedback"></span>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="checkbox">
                                                                <input type="checkbox" id="flat-checkbox-1">
                                                                <label for="flat-checkbox-1">chack</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label"></label>
                                                    <div class="col-md-10">
                                                        
                                                        <div class="col-md-12">
                                                            <div class="checkbox">
                                                                    <button class="btn btn-success" type="button"><i class="fas fa-plus"></i>&nbsp;書類の追加</button>
                                                                    
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <div class="col-md-offset-2 col-md-10">
                                                <button class="btn btn-primary" type="submit">登録</button>
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
include './footer.html';
        ?>

    </body>
</html>