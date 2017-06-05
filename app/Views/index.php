<h1>Dashboard</h1>
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="content-box white danger-bg">
            <div class="head clearfix">
                <h5 class="content-title pull-left white">Base de données</h5>
            </div>
            <div class="content">
                <p class="text-uppercase zero-m">0</p>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="content-box white warning-bg">
            <div class="head clearfix">
                <h5 class="content-title pull-left white">Utilisateurs</h5>
            </div>
            <div class="content">
                <p class="text-uppercase zero-m">0</p>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="content-box white success-bg">
            <div class="head clearfix">
                <h5 class="content-title pull-left white">Taille occupé</h5>
            </div>
            <div class="content">
                <p class="text-uppercase zero-m">0</p>
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
                <div class="pull-right white btn-add" data-toggle="modal" data-target="#modal-add-database"><i class="zmdi zmdi-plus"></i></div>
                <table id="table1" class="display datatable table-striped table dataTable no-footer dtr-inline table-hover"
                       role="grid">
                    <thead>
                    <tr role="row">
                        <th>Nom de la base</th>
                        <th>Nombre de table</th>
                        <th style="width: 120px"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr role="row" class="odd" >
                        <td class="info-color sorting_1"><strong>ok</strong></td>
                        <td class="info-color sorting_1">0</td>
                        <td class="text-center">
                            <button class="no-button" title="Comparer">
                                <i class="zmdi zmdi-compare btn-options"></i></button>
                            <button class="no-button" title="Télécharger"><i class="zmdi zmdi-download btn-options"></i>
                            </button>
                        </td>
                    </tr>
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
                <p class="text-medium">Version PHP : </p>
                <p class="text-medium">Version Apache : </p>
                <p class="text-medium">Version MySQL : </p>
                <p class="text-medium">.....</p>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="modal-add-database" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ajouter une base de données</h4>
      </div>
      <div class="modal-body">
        <p>text test</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>