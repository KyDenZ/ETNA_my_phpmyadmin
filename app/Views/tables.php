<h3><?php echo $this->array["dbname_title"] ?></h3>
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
                            <?php echo '<td class="info-color sorting_1" ><a href="'.BASE_URL.'/tableInfos?table='.$tables[0].'">'.$tables[0].'</a></td>' ?>
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
                <div class="col-md-6 text-center icon-action" onclick="deleteElement()">
                    <i class="zmdi zmdi-delete"></i>
                </div>
                <div class="col-md-6 text-center icon-action" onclick="editElement()">
                    <i class="zmdi zmdi-edit"></i>
                </div>
            </div>
        </div>
    </div>
