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
        <form class="form-horizontal" action="sys/userUpdate.php" method="POST">
          <div class="form-group">
            <label for="email" class="col-sm-2 control-label">E-mail</label>
            <div class="col-sm-10">
              <input type="email" name="email" class="form-control" id="email" placeholder="<?=$user->email?>" value="<?=$user->email?>">
            </div>
          </div>
          <div class="btn-group" data-toggle="buttons">
            <label class="btn btn-primary active">
              <input type="radio" name="eNotifs" autocomplete="off" value="1" checked> E-mail notifications ON
            </label>
            <label class="btn btn-primary">
              <input type="radio" name="eNotifs" autocomplete="off" value="0"> E-mail notifications OFF
            </label>
          </div>
          <div class="form-group">
            <label for="chatId" class="col-sm-2 control-label">Telegram chat ID</label>
            <div class="col-sm-10">
              <input type="text" name="chatId" class="form-control" id="chatId" placeholder="<?=$user->chatId?>" value="<?=$user->chatId?>">
            </div>
          </div>
          <div class="btn-group" data-toggle="buttons">
            <label class="btn btn-primary active">
              <input type="radio" name="tNotifs" autocomplete="off" value="1" checked> Telegram notifications ON
            </label>
            <label class="btn btn-primary">
              <input type="radio" name="tNotifs" autocomplete="off" value="0"> Telegram notifications OFF
            </label>
          </div>
          <div class="form-group">
            <label for="ipp" class="col-sm-2 control-label">Items per page</label>
            <div class="col-sm-10">
              <input type="text" name="ipp" class="form-control" id="ipp" placeholder="IPP" value="<?=$user->ipp?>">
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