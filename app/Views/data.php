<link rel="stylesheet" href="/assets/css/style2.css">

<nav class="navbar-data navbar-default">
  <div class="container-fluid">

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a style="font-weight: 600"><?php echo $this->array["bdd_name"] ?></a></li>
        <li><a <?php echo "href='".BASE_URL."/data?table=".$this->array["table_name"]."&bdd=".$this->array["bdd_name"]."'" ?>><i class="glyphicon glyphicon-stats icon-size"></i> Data</a></li>
        <li><a <?php echo "href='".BASE_URL."/tableInfos?table=".$this->array["table_name"]."&bdd=".$this->array["bdd_name"]."'" ?>><i class="glyphicon glyphicon-list icon-size"></i> Structure</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container-content2">

<h5><?php echo $this->array["bdd_name"]." > ".$this->array["table_name"] ?></h5>
<input type="hidden" value="<?php echo $this->array["table_name"] ?>" id="table_name">
<input type="hidden" value="<?php echo $this->array["bdd_name"] ?>" id="bdd_name">

<div class="row" style="margin-top:20px;">
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
                        <?php
                        if (isset($this->array["data"][0]))
                            foreach ($this->array["data"][0] as $field => $key) {
                            if (!is_int($field))
                                echo "<th>".$field."</th>";
                            } ?>
                        <th style="width: 120px"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($this->array["data"] as $field => $key) { ?>
                        <tr role="row" class="odd">
                            <?php echo '<td data-id='.$key[0].'><input type="checkbox"></td>' ?>
                             <?php foreach ($key as $data => $dataKey) { 
                                if (!is_int($data))
                                    echo '<td class="info-color sorting_1"><p>'.$dataKey.'</p></td>'; 
                                } ?>
                            <td class="text-center">
                                <button class="no-button" title="Editer">
                                    <i class="zmdi zmdi-edit"></i></button>
                                <button class="no-button" title="Supprimer"><i
                                            class="zmdi zmdi-delete"></i>
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
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
