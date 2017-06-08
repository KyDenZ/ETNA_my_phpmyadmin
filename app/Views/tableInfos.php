<h5><?php echo $this->array["bdd_name"]." > ".$this->array["table_name"] ?></h5>
<input type="hidden" value="<?php echo $this->array["table_name"] ?>" id="table_name">

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
                        <th>Nom</th>
                        <th>Type</th>
                        <th>Attributs</th>
                        <th>NULL</th>
                        <th>Default</th>
                        <th style="width: 120px"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($this->array["fields"] as $field) { ?>
                        <tr role="row" class="odd">
                            <?php echo '<td data-id='.$field[0].'><input type="checkbox"></td>' ?>
                            <?php echo '<td class="info-color sorting_1" ><p>'.$field[0].'</p></td>' ?>
                            <?php echo '<td class="info-color sorting_1" ><p>'.explode(' ', $field[1])[0].'</p></td>' ?>
                            <?php $attr = isset(explode(' ', $field[1])[1]) ?  explode(' ', $field[1])[1] : "";
                            echo '<td class="info-color sorting_1" ><p>'.$attr.'</p></td>' ?>
                            <?php echo '<td class="info-color sorting_1" ><p>'.$field[2].'</p></td>' ?>
                            <?php echo '<td class="info-color sorting_1" ><p>'.$field[4].'</p></td>' ?>
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
                    <i class="zmdi zmdi-edit"></i>
                </div>
            </div>
        </div>
    </div>
