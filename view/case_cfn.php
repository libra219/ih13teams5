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
                                <!-- <div class="alert alert-info alert-dismissable">
                                    <!- - <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> - ->
                                    <h4>マッチングあり！</h4>
                                    <p class="lead_">○○案件の車輌と同一です。</p>
                                    </p>
                                </div> -->
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <h3 class="panel-title">案件内容（買い注文、売り注文）</h3>
                                </div>
                                <div class="panel-body">
                                    <form novalidate="" role="form" class="form-horizontal">
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
                                                    <input type="text" value="<?=$select_data['vehicle_model']?>" required="" placeholder="" id="subject" class="form-control" name="vehicle_model">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">車両名</label>
                                                    <div class="col-md-10">
                                                    <input type="text"  value="<?=$select_data['vehicle_name']?>" required="" placeholder="" id="subject" class="form-control" name="vehicle_name">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">メーカー名</label>
                                                    <div class="col-md-10">
                                                    <input type="text" value="<?=$select_data['manufacturer']?>" required="" placeholder="" id="subject" class="form-control" name="manufacturer">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">色</label>
                                                    <div class="col-md-10">
                                                    <input type="text" value="<?=$select_data['vehicle_color']?>" required="" placeholder="" id="subject" class="form-control" name="vehicle_color">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">年式</label>
                                                    <div class="col-md-10">
                                                    <input type="text" value="<?=$select_data['vehicle_year']?>" required="" placeholder="" id="subject" class="form-control" name="vehicle_year">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">走行距離</label>
                                                    <div class="col-md-10">
                                                    <input type="text" value="<?=$select_data['mileage']?>" required="" placeholder="" id="subject" class="form-control" name="mileage">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">ミッション</label>
                                                    <div class="col-md-10 ">

                                                    <input type="text" value="<?=$select_data['transmission']?>" required="" placeholder="" id="subject" class="form-control" name="transmission">
                                                    
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">修復歴</label>
                                                    <div class="col-md-10 ">
                                                        <input type="text" value="<?=$select_data['restration']?>" required="" placeholder="" id="subject" class="form-control" name="restration" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">車検</label>
                                                    <div class="col-md-10 ">
                                                        <input type="date" value="<?=$select_data['inspection']?>" required="" placeholder="" id="subject" class="form-control" name="inspection" >
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
                                                        <input type="number" value="<?=$select_data['budget'] ?>" required="" placeholder="" id="subject" class="form-control" name="budget">
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
                                                            <input type="date" value="<?=$select_data['biddoc_end']?>" required="" placeholder="2099/99/99" id="subject" class="form-control" name="biddoc_end">
                                                            
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="checkbox">
                                                                <input type="checkbox" id="flat-checkbox-0" name="biddoc" value="ok" <?php echo ($select_data['biddoc']) ? 'checked' : '' ; ?>>
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
                                                            <input type="date" value="<?=$select_data['inspeciondoc_end']?>" required="" placeholder="" id="subject" class="form-control" name="inspeciondoc_end">
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="checkbox">
                                                                <input type="checkbox" id="flat-checkbox-1" name="inspeciondoc" value="ok" <?php echo ($select_data['inspeciondoc']) ? 'checked' : '' ; ?>>
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
                                                            <input type="date" value="<?=$select_data['liabilityinsu_end']?>" required="" placeholder="2099/99/99" id="subject" class="form-control" name="liabilityinsu_end">
                                                            
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="checkbox">
                                                                <input type="checkbox" id="flat-checkbox-2" name="liabilityinsu"  value="ok" <?php echo ($select_data['liabilityinsu']) ? 'checked' : '' ; ?>>
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
                                                            <input type="date" value="<?=$select_data['taxcert_end']?>" required="" placeholder="2099/99/99" id="subject" class="form-control" name="taxcert_end">
                                                            
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="checkbox">
                                                                <input type="checkbox" id="flat-checkbox-3" name="taxcert"  value="ok" <?php echo ($select_data['taxcert']) ? 'checked' : '' ; ?>>
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
                                                            <input type="date" value="<?=$select_data['sealcert_end']?>" required="" placeholder="2099/99/99" id="subject" class="form-control" name="sealcert_end">
                                                            
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="checkbox">
                                                                <input type="checkbox" id="flat-checkbox-4" name="sealcert" value="ok" <?php echo ($select_data['sealcert']) ? 'checked' : '' ; ?> >
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
                                                            <input type="date" value="<?=$select_data['warrant_end']?>" required="" placeholder="2099/99/99" id="subject" class="form-control" name="warrant_end">
                                                            
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="checkbox">
                                                                <input type="checkbox" id="flat-checkbox-5" name="warrant" value="ok" <?php echo ($select_data['warrant']) ? 'checked' : '' ; ?> >
                                                                <label for="flat-checkbox-5">chack</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="form-group">
                                                    <div class="col-md-1">
                                                            <div class="checkbox">
                                                                <input type="checkbox" id="flat-checkbox-1">
                                                                <label for="flat-checkbox-1">納品済み</label>
                                                            </div>
                                                        </div>
                                                    <label class="col-md-1 control-label">書類名</label>
                                                    <div class="col-md-10">
                                                        
                                                        <div class="col-md-9">
                                                            <input type="text" required="" placeholder="オークション落札票" id="subject" class="form-control" name="title">
                                                        </div>
                                                        <div class="">
                                                                <label class="col-md-1 control-label">納期日</label>
                                                            </div>
                                                        <div class="col-md-2 has-feedback">
                                                            <input type="text" required="" placeholder="2099/99/99" id="subject" class="form-control" name="title">
                                                            
                                                        </div>
                                                        
                                                    </div>
                                                </div> -->
                                                <!-- <div class="form-group">
                                                    <label class="col-md-2 control-label"></label>
                                                    <div class="col-md-10">
                                                        
                                                        <div class="col-md-12">
                                                            <div class="checkbox">
                                                                    <button class="btn btn-success" type="button"><i class="fas fa-plus"></i>&nbsp;書類の追加</button>
                                                                    
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                 -->
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <div class="col-md-offset-2 col-md-9">
                                                <button class="btn btn-primary" type="submit" formaction="./case_stock.php" name="select_id" value="<?=$select_data['id']?>">仕入/出荷登録</button>
                                                <button class="btn btn-warning" type="submit" formaction="./case_cfn_check.php">内容修正</button>
                                                <button class="btn btn-default" type="submit">受注残</button>
                                            </div>
                                            <div class="col-md-1">
                                                <button class="btn btn-danger" type="submit" formaction="./case_del.php?" name="del_id" value="<?=$select_data['id']?>">案件の削除</button>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-offset-11 col-md-1">
                                                <button class="btn btn-default">引継ぎ</button>
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
