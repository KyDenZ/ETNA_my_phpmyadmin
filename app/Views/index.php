<h1>Dashboard</h1>
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="content-box white danger-bg">
            <div class="head clearfix">
                <h5 class="content-title pull-left white">Base de données</h5>
            </div>
            <div class="content">
                <p class="text-uppercase zero-m"><?php echo $this->array["count"]["databases"] ?></p>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="content-box white warning-bg">
            <div class="head clearfix">
                <h5 class="content-title pull-left white">Utilisateurs</h5>
            </div>
            <div class="content">
                <p class="text-uppercase zero-m"><?php echo $this->array["count"]["users"] ?></p>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="content-box white success-bg">
            <div class="head clearfix">
                <h5 class="content-title pull-left white">Taille occupé</h5>
            </div>
            <div class="content">
                <p class="text-uppercase zero-m"><?php echo $this->array["count"]["sizeBdd"] ?> Mb</p>
            </div>
        </div>
    </div>
</div>
<div class="row" style="margin-top:20px;">
    <div class="col-md-8 col-sm-12">
        <div class="data-info">
            <div id="table1_wrapper" class="dataTables_wrapper no-footer">
                <div class="toolbar tool1">
                    <h5 class="zero-m">Liste des bases de données</h5>
                </div>
                <div class="pull-right white btn-add" data-toggle="modal" data-target="#modal-add-database"><i
                            class="zmdi zmdi-plus"></i></div>
                <table id="table1"
                       class="display datatable table-striped table dataTable no-footer dtr-inline table-hover"
                       role="grid">
                    <thead>
                    <tr role="row">
                        <th>Nom de la base</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($this->array["dataBase"] as $dataBases) { ?>
                        <tr role="row" class="odd">
                            <td class="info-color sorting_1"><strong><?php echo $dataBases[0] ?></strong></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-12">
        <div class="content-box">
            <div class="head clearfix">
                <h5 class="content-title pull-left size-title" style="max-height: 34px;">Infos</h5>
            </div>
            <div class="content">
                <p class="text-medium">Version PHP : <?php echo $this->array["version"]["version_php"] ?> </p>
                <p class="text-medium">Version Apache : <?php echo $this->array["version"]["version_apache"] ?></p>
                <p class="text-medium">Version MySQL : <?php echo $this->array["version"]["version_mysql"] ?></p>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="modal-add-database" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <form method="POST" action="<?php echo BASE_URL ?>/createDatabase">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Créer une nouvelle base de données</h4>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="nameBdd" placeholder="NEW BDD">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" name="newbdd-submit" value="createDatabase">Créer
                    </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

