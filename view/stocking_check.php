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
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title">仕入・出荷内容</h3>
                                </div>
                                <div class="panel-body">
                                    <form action="./stocking_check.php" novalidate role="form" class="form-horizontal">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">案件名</label>
                                            <div class="col-md-10">
                                            <!-- <input type="text" required="" placeholder="Title" id="title" class="form-control" name="title"> -->
                                                <div class="well"><?=$select_data['name']?></div>
                                            </div>
                                            <label class="col-md-2 control-label">企業名</label>
                                            <div class="col-md-10">
                                            <!-- <input type="text" required="" placeholder="Title" id="title" class="form-control" name="title"> -->
                                                <div class="well"><?=$select_data['company']?></div>
                                            </div>
                                        </div>
                                       
                                        
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">車両情報<label style="margin-left: auto; margin-right: auto;">▼</label></h3>
                                                
                                            </div>
                                            <div class="panel-body">
                                                
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">車輌型式</label>
                                                    <div class="col-md-10">
                                                    <input type="text" value="<?=$get_data['vehicle_model']?>" required="" placeholder="" id="subject" class="form-control" name="vehicle_model" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">車両名</label>
                                                    <div class="col-md-10">
                                                    <input type="text"  value="<?=$get_data['vehicle_name']?>" required="" placeholder="" id="subject" class="form-control" name="vehicle_name" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">メーカー名</label>
                                                    <div class="col-md-10">
                                                    <input type="text" value="<?=$get_data['manufacturer']?>" required="" placeholder="" id="subject" class="form-control" name="manufacturer" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">色</label>
                                                    <div class="col-md-10">
                                                    <input type="text" value="<?=$get_data['vehicle_color']?>" required="" placeholder="" id="subject" class="form-control" name="vehicle_color" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">年式</label>
                                                    <div class="col-md-10">
                                                    <input type="text" value="<?=$get_data['vehicle_year']?>" required="" placeholder="" id="subject" class="form-control" name="vehicle_year" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">走行距離</label>
                                                    <div class="col-md-10">
                                                    <input type="text" value="<?=$get_data['mileage']?>" required="" placeholder="" id="subject" class="form-control" name="mileage" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">ミッション</label>
                                                    <div class="col-md-10 ">
                                                    <input type="text" value="<?=$get_data['transmission']?>" required="" placeholder="" id="subject" class="form-control" name="transmission" readonly>
                                                    
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">修復歴</label>
                                                    <div class="col-md-10 ">
                                                        <input type="text" value="<?=$get_data['restration']?>" required="" placeholder="" id="subject" class="form-control" name="restration"  readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">車検</label>
                                                    <div class="col-md-10 ">
                                                        <input type="date" value="<?=$get_data['inspection']?>" required="" placeholder="" id="subject" class="form-control" name="inspection"  readonly>
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
                                                        <input type="number" value="<?=$get_data['bid']?>" required="" placeholder="" id="subject" class="form-control" name="bid" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">落札手数料</label>
                                                    <div class="col-md-10">
                                                        <input type="number" value="<?=$get_data['bidfee']?>" required="" placeholder="" id="subject" class="form-control" name="bidfee" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">消費税</label>
                                                    <div class="col-md-10">
                                                        <input type="number" value="<?=$get_data['fee']?>" required="" placeholder="" id="subject" class="form-control" name="fee" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">手続き手数料</label>
                                                    <div class="col-md-10">
                                                        <input type="number" value="<?=$get_data['expensess']?>" required="" placeholder="" id="subject" class="form-control" name="expensess" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">仕入先</label>
                                                    <div class="col-md-10">
                                                        <input type="text" value="<?=$get_data['supplier']?>" required="" placeholder="" id="subject" class="form-control" name="supplier" readonly>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">日付</label>
                                                    <div class="col-md-10">
                                                        <input type="date" value="<?=$get_data['getdate']?>" required="" placeholder="" id="subject" class="form-control" name="getdate" readonly>
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
                                                            <div class="well">オークション落札票</div>
                                                        </div>
                                                        <div class="">
                                                                <label class="col-md-1 control-label">納期日</label>
                                                            </div>
                                                        <div class="col-md-2">
                                                            <input type="date" value="<?=$get_data['biddoc_end']?>" required="" placeholder="2099/99/99" id="subject" class="form-control" name="biddoc_end" readonly>
                                                            
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="checkbox">
                                                                <input type="checkbox" id="flat-checkbox-0" name="biddoc" value="ok" <?php echo ($get_data['biddoc']) ? 'checked' : '' ; ?> readonly>
                                                                <label for="flat-checkbox-0">chack</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">書類名</label>
                                                    <div class="col-md-10">
                                                        
                                                        <div class="col-md-8">
                                                        <div class="well">検査書</div>
                                                        </div>
                                                        <div class="">
                                                                <label class="col-md-1 control-label">納期日</label>
                                                            </div>
                                                        <div class="col-md-2">
                                                            <input type="date" value="<?=$get_data['inspeciondoc_end']?>" required="" placeholder="" id="subject" class="form-control" name="inspeciondoc_end" readonly>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="checkbox">
                                                                <input type="checkbox" id="flat-checkbox-1" name="inspeciondoc" value="ok" <?php echo ($get_data['inspeciondoc']) ? 'checked' : '' ; ?> readonly>
                                                                <label for="flat-checkbox-1">chack</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">書類名</label>
                                                    <div class="col-md-10">
                                                        
                                                        <div class="col-md-8">
                                                        <div class="well">自動車損害賠償責任保険（自賠責）</div>
                                                        </div>
                                                        <div class="">
                                                                <label class="col-md-1 control-label">納期日</label>
                                                            </div>
                                                        <div class="col-md-2">
                                                            <input type="date" value="<?=$get_data['liabilityinsu_end']?>" required="" placeholder="2099/99/99" id="subject" class="form-control" name="liabilityinsu_end" readonly>
                                                            
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="checkbox">
                                                                <input type="checkbox" id="flat-checkbox-2" name="liabilityinsu"  value="ok" <?php echo ($get_data['liabilityinsu']) ? 'checked' : '' ; ?> readonly>
                                                                <label for="flat-checkbox-2">chack</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">書類名</label>
                                                    <div class="col-md-10">
                                                        
                                                        <div class="col-md-8">
                                                            <div class="well">証継続検査用自動車税納税証明書（納税証明書）</div>
                                                        </div>
                                                        <div class="">
                                                                <label class="col-md-1 control-label">納期日</label>
                                                            </div>
                                                        <div class="col-md-2">
                                                            <input type="date" value="<?=$get_data['taxcert_end']?>" required="" placeholder="2099/99/99" id="subject" class="form-control" name="taxcert_end" readonly>
                                                            
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="checkbox">
                                                                <input type="checkbox" id="flat-checkbox-3" name="taxcert"  value="ok" <?php echo ($get_data['taxcert']) ? 'checked' : '' ; ?> readonly>
                                                                <label for="flat-checkbox-3">chack</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">書類名</label>
                                                    <div class="col-md-10">
                                                        
                                                        <div class="col-md-8">
                                                        <div class="well">印鑑証明書</div>
                                                        </div>
                                                        <div class="">
                                                                <label class="col-md-1 control-label">納期日</label>
                                                            </div>
                                                        <div class="col-md-2">
                                                            <input type="date" value="<?=$get_data['sealcert_end']?>" required="" placeholder="2099/99/99" id="subject" class="form-control" name="sealcert_end" readonly>
                                                            
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="checkbox">
                                                                <input type="checkbox" id="flat-checkbox-4" name="sealcert" value="ok" <?php echo ($get_data['sealcert']) ? 'checked' : '' ; ?>  readonly>
                                                                <label for="flat-checkbox-4">chack</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">書類名</label>
                                                    <div class="col-md-10">
                                                        
                                                        <div class="col-md-8">
                                                        <div class="well">委任状</div>
                                                        </div>
                                                        <div class="">
                                                                <label class="col-md-1 control-label">納期日</label>
                                                            </div>
                                                        <div class="col-md-2">
                                                            <input type="date" value="<?=$get_data['warrant_end']?>" required="" placeholder="2099/99/99" id="subject" class="form-control" name="warrant_end" readonly>
                                                            
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="checkbox">
                                                                <input type="checkbox" id="flat-checkbox-5" name="warrant" value="ok" <?php echo ($get_data['warrant']) ? 'checked' : '' ; ?>  readonly>
                                                                <label for="flat-checkbox-5">chack</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="col-md-offset-2 col-md-10">
                                                <button class="btn btn-primary" type="submit" name="submit" value="submit">登録</button>
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
