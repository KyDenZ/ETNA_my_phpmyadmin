<link rel="stylesheet" href="/assets/css/style2.css">

<nav class="navbar-data navbar-default">
  <div class="container-fluid">

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a style="font-weight: 600"><?php echo $this->array["dbname_title"] ?></a></li>
        <li><a <?php echo "href='".BASE_URL."/data?dbname=".$this->array["dbname_title"]."&table=".$this->array["dbname_title"]."'" ?>>Data</a></li>
        <li><a <?php echo "href='".BASE_URL."/tables?dbname=".$this->array["dbname_title"]."'" ?>>Structure</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container-content2">
<input type="hidden" value="<?php echo $this->array["dbname_title"] ?>" id="dbname">

<div class="row" style="margin-top:20px;">
    <div class="col-md-8 col-sm-12">
        <div class="data-info">
            <div id="table1_wrapper" class="dataTables_wrapper no-footer">
                <div class="pull-right white btn-add" data-toggle="modal" data-target="#modal-add-database"><i
                            class="zmdi zmdi-plus"></i></div>
                <table id="table1"
                       class="display datatable table-striped table dataTable no-footer dtr-inline table-hover"
                       role="grid">
                    <thead>
                    <tr role="row">
                        <th style="width: 20px"><input type="checkbox" onclick="checkAllInTable()"></th>
                        <th>Table</th>
                        <th style="width: 120px"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($this->array["tables"] as $tables) { ?>
                        <tr role="row" class="odd">
                            <?php echo '<td data-id='.$tables[0].'><input type="checkbox"></td>' ?>
                            <?php echo '<td class="info-color sorting_1" ><a href="'.BASE_URL.'/tableInfos?table='.$tables[0].'&bdd='.$this->array["dbname_title"].'">'.$tables[0].'</a></td>' ?>
                            <td class="text-center">
                                <button class="no-button" title="Comparer">
                                    <i class="zmdi zmdi-compare btn-options"></i></button>
                                <button class="no-button" title="Télécharger"><i
                                            class="zmdi zmdi-download btn-options"></i>
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="action-table">
        <div class="title-action">
            Actions
        </div>
        <div class="actions-action">
            <div class="row">
                <div class="col-md-6 text-center icon-action" onclick="deleteField()">
                    <i class="zmdi zmdi-delete"></i>
                </div>
                <div class="col-md-6 text-center icon-action" onclick="editField()">
                    <i class="zmdi zmdi-edit" id="edit"></i>
                    <i class="zmdi zmdi-check" id="check" style="display: none"></i>
                </div>
            </div>
        </div>
    </div>
    </div>

<div class="modal fade" id="modal-add-database">
<div class="modal-dialog">
<form method="POST" action="<?php echo BASE_URL ?>/createTable">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title">Créer la table : <input type="text" name="nameTable" /></td></h4>
    </div>
    <div class="modal-body">
      <table class="table table-striped">
          <thead>
          </thead>
          <tbody class="table">
              <tr>
                  <td>Nom</td>
                  <td>Type</td>
                  <td>Valeur par défaut</td>
                  <td>Null</td>
              </tr>
              <tr>
              <input type="hidden" value="<?php echo $this->array["dbname_title"] ?>" name="dbname">
                  <td><input type="text" name="nameStruct" /></td>
                  <td><select name="type" id="choice">
                    <option value="INT">INT</option>
                    <option value="VARCHAR">VARCHAR</option></select></td>
                    <option value="LONGTEXT">LONGTEXT</option></select></td>
                  <td><input type="text" name="defaultValue"/></td>
                   <td><input type="checkbox" name="null"/></td>
              </tr>
          </tbody>
      </table>
    </div>
    <div class="modal-footer">
    <button type="submit" class="btn btn-success" name="newTable-submit" value="createDatabase">Créer</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div><!-- /.modal-content -->
  </form>
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
