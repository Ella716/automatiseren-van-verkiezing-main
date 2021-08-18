<!-- Add burgers-->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><b>Nieuwe kiezer toevoegen</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="voters_add.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="IDnummer" class="col-sm-3 control-label">IDnummer</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="id_num" name="id_num" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastname" class="col-sm-3 control-label">Achternaam</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="lastname" name="lastname" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="firstname" class="col-sm-3 control-label">Voornaam</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="firstname" name="firstname" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="date" class="col-sm-3 control-label">GeboorteDatum</label>

                    <div class="col-sm-9">
                      <input type="date" class="form-control" id="geb_dat" name="geb_dat" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="gebplaats" class="col-sm-3 control-label">GeboortePlaats</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="geb_plaats" name="geb_plaats" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="sex" class="col-sm-3 control-label">Geslacht</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="geslacht" name="geslacht" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="venue" class="col-sm-3 control-label">District</label>

                    <div class="col-sm-9">
                      <select name="district" class="browser-default custom-select  col-sm-12">
      									<option value="">district</option>
      									<option value="1">Brokopondo</option>
      									<option value="2">Commewijne</option>
      									<option value="3">Coronie</option>
      									<option value="4">Marowijne</option>
      									<option value="5">Nickerie</option>
      									<option value="6">Para</option>
      									<option value="7">Paramaribo</option>
      									<option value="8">Saramacca</option>
      									<option value="9">Sipaliwini</option>
      									<option value="10">Wanica</option>
      								</select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Add Kandidaten -->
<div class="modal fade" id="addkan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><b>Nieuwe kandidaat toevoegen</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="kandidaten_add.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="lastname" class="col-sm-3 control-label">Achternaam</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="lastname" name="lastname" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="firstname" class="col-sm-3 control-label">Voornaam</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="firstname" name="firstname" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="party" class="col-sm-3 control-label">Partij</label>

                    <div class="col-sm-9">
                      <select name="partij" class="browser-default custom-select  col-sm-12">
      									<option value="">partij</option>
      									<option value="1">Algemene Bevrijdings- en Ontwikkelingspartij</option>
      									<option value="2">Nationale Democratische Partij</option>
      									<option value="3">Nationale Partij Suriname</option>
      									<option value="4">Pertjajah Luhur</option>
      									<option value="5">STREI!</option>
      									<option value="6">Vooruitstrevende Hervormings Partij</option>
      								</select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="venue" class="col-sm-3 control-label">District</label>

                    <div class="col-sm-9">
                      <select name="district" class="browser-default custom-select  col-sm-12">
      									<option value="">district</option>
      									<option value="1">Brokopondo</option>
      									<option value="2">Commewijne</option>
      									<option value="3">Coronie</option>
      									<option value="4">Marowijne</option>
      									<option value="5">Nickerie</option>
      									<option value="6">Para</option>
      									<option value="7">Paramaribo</option>
      									<option value="8">Saramacca</option>
      									<option value="9">Sipaliwini</option>
      									<option value="10">Wanica</option>
      								</select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-flat" name="sum"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div>
