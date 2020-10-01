<!-- Modal Loading -->
<div class="modal fade" id="modalLoading">
  <div class="text-center">
    <img src="<?php echo base_url()?>assets/image/loading.gif" width="600px" style="margin-top:200px">
  </div>
</div>

<!-- MODAL ERROR -->
<div class="modal fade" id="modalError" aria-hidden="true" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="text-center">
    <img src="<?php echo base_url()?>assets/image/error.gif" width="180px" style="margin-top:300px">
    <br>
    <div class="text-center" id="text-error" style="font-size: 22px; color: #9eff5c;"></div>
  </div>
</div>

<!-- MODAL SUCCESS -->
<div class="modal fade" id="modalSuccess" aria-hidden="true">
  <div class="text-center">
    <img src="<?php echo base_url()?>assets/image/loading.gif">
  </div>
</div>

<!-- MODAL Edit Profil User -->
<div class="modal fade" id="modalEditUser" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
      <div class="modal-content md-md">
        <div class="modal-header">              
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title">Edit User</h4>
        </div>  
          <form id="fromEditUser">
          <div class="modal-body">    
            <input type="hidden" name="idUserEdit" id="idUserEdit">
            <div class="row">
              <div class="col-md-12">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="namaEdit" id="namaEdit" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="usernameEdit" id="usernameEdit" required maxlength="10" disabled>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="passEdit" id="passEdit">
                  </div>
                </div>
                <div class="col-md-12" id="groupAlamat">
                  <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control" name="alamatEdit" id="alamatEdit">
                  </div>
                </div>
              </div>
            </div> 
                                
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary" >Simpan</button>
          </div>
        </form>
      </div>
  </div>
</div>