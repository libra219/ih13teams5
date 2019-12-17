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
                                                    <input type="text" value="<?=$get_data['vehicle_model']?>" required="" placeholder="" id="subject" class="form-control" name="vehicle_model" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">車両名</label>
                                                    <div class="col-md-10">
                                                    <input type="text" value="<?=$get_data['vehicle_name']?>" required="" placeholder="" id="subject" class="form-control" name="vehicle_name" readonly>
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
                                                        <input type="text" value="<?=$get_data['restration']?>" required="" placeholder="" id="subject" class="form-control" name="restration" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">車検</label>
                                                    <div class="col-md-10 ">
                                                        <input type="text" value="<?=$get_data['inspection']?>" required="" placeholder="" id="subject" class="form-control" name="inspection" readonly>
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
                                                        <input type="text" value="<?=$get_data['budget'] ?>"  required="" placeholder="" id="subject" class="form-control" name="budget" readonly>
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
                                                        <div class="col-md-2 has-feedback">
                                                            <input type="text" value="<?=$get_data['biddoc_end'] ?>"  required="" placeholder="2099/99/99" id="subject" class="form-control" name="biddoc_end" readonly>
                                                            <!-- <span class=" glyphicon glyphicon-calendar  form-control-feedback"></span> -->
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="checkbox">
                                                                <input type="checkbox" id="flat-checkbox-0" name="biddoc" <?php echo ($get_data['biddoc']) ? 'checked' : '' ; ?> readonly>
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
                                                        <div class="col-md-2 has-feedback">
                                                            <input type="text" value="<?=$get_data['inspeciondoc_end'] ?>" required="" placeholder="2099/99/99" id="subject" class="form-control" name="inspeciondoc_end" readonly>
                                                            <!-- <span class=" glyphicon glyphicon-calendar  form-control-feedback"></span> -->
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="checkbox">
                                                                <input type="checkbox" id="flat-checkbox-1" name="inspeciondoc" <?php echo ($get_data['inspeciondoc']) ? 'checked' : '' ; ?> readonly>
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
                                                        <div class="col-md-2 has-feedback">
                                                            <input type="text" value="<?=$get_data['liabilityinsu_end'] ?>" required="" placeholder="2099/99/99" id="subject" class="form-control" name="liabilityinsu_end" readonly>
                                                            <!-- <span class=" glyphicon glyphicon-calendar  form-control-feedback"></span> -->
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="checkbox">
                                                                <input type="checkbox" id="flat-checkbox-2" name="liabilityinsu" <?php echo ($get_data['liabilityinsu']) ? 'checked' : '' ; ?> readonly>
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
                                                        <div class="col-md-2 has-feedback">
                                                            <input type="text" value="<?=$get_data['taxcert_end'] ?>" required="" placeholder="2099/99/99" id="subject" class="form-control" name="taxcert_end" readonly>
                                                            <!-- <span class=" glyphicon glyphicon-calendar  form-control-feedback"></span> -->
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="checkbox">
                                                                <input type="checkbox" id="flat-checkbox-3" name="taxcert" <?php echo ($get_data['taxcert']) ? 'checked' : '' ; ?> readonly>
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
                                                        <div class="col-md-2 has-feedback">
                                                            <input type="text" value="<?=$get_data['sealcert_end'] ?>" required="" placeholder="2099/99/99" id="subject" class="form-control" name="sealcert_end" readonly>
                                                            <!-- <span class=" glyphicon glyphicon-calendar  form-control-feedback"></span> -->
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="checkbox">
                                                                <input type="checkbox" id="flat-checkbox-4" name="sealcert" <?php echo ($get_data['sealcert']) ? 'checked' : '' ; ?> readonly>
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
                                                        <div class="col-md-2 has-feedback">
                                                            <input type="text" value="<?=$get_data['warrant_end'] ?>" required="" placeholder="2099/99/99" id="subject" class="form-control" name="warrant_end" readonly>
                                                            <!-- <span class=" glyphicon glyphicon-calendar  form-control-feedback"></span> -->
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="checkbox">
                                                                <input type="checkbox" id="flat-checkbox-5" name="warrant" <?php echo ($get_data['warrant']) ? 'checked' : '' ; ?> readonly>
                                                                <label for="flat-checkbox-5">chack</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <div class="col-md-offset-2 col-md-10">
                                                <button class="btn btn-primary" type="submit" name="submit" value="<?=$select_data['id']?>">修正登録</button>
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
