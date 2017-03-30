<div class="modal fade" id="userSettings" tabindex="-1" role="dialog" aria-labelledby="titleLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <form method="post" action="sys/ajax.php">
          <input type="hidden" name="act" value="logout">
          <button style="float: right; right: 30px; position: relative;" class="btn btn-large btn-primary" type="submit">Logout</button>
        </form>
        <h4 class="modal-title" id="titleLabel"><?=$user->login?>/Settings</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
          <div class="form-group">
            <label for="ipp" class="col-sm-2 control-label">Items per page</label>
            <div class="col-sm-10">
              <input type="text" name="ipp" class="form-control" id="ipp" placeholder="IPP">
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Save changes" />
      </div>
        </form>
    </div>
  </div>
</div>