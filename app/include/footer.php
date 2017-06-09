</div>

</div>
<!-- /#wrapper -->

<!-- Modal -->
<div id="modal-sql" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <form method="POST" action="<?php echo BASE_URL ?>/sql">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Requete SQL</h4>
                </div>
                <div class="content">
                        <div class="form-group text-center">
                            <textarea rows="8" id="requestSQL" style="width: 70%;margin:auto;margin-top:20px;"></textarea>
                        </div>
                 </div>
                 <div id="rslt-sql"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="sqlRequest()" name="submit-sql">Créer
                    </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/assets/js/javascript.js"></script>

<script>
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>
</body>
</html>