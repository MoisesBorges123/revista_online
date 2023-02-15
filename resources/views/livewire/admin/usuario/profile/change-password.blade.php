<div>
    <form wire:submit.prevent="changePassword" method="POST">
  
        <div class="row mb-3">
          <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Senha Atual</label>
          <div class="col-md-8 col-lg-9">
            <input name="current_password" wire:model.defer="current_password" type="password" class="form-control" id="currentPassword">
          </div>
        </div>

        <div class="row mb-3">
          <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Nova Senha</label>
          <div class="col-md-8 col-lg-9">
            <input name="newpassword" type="password" class="form-control"  wire:model.defer="password" id="newPassword">
          </div>
        </div>

        <div class="row mb-3">
          <label for="confirm_password" class="col-md-4 col-lg-3 col-form-label">Confirmar Nova Senha</label>
          <div class="col-md-8 col-lg-9">
            <input name="confirm_password" type="password" class="form-control" wire:model.defer="confirm_password" id="confirm_password">
          </div>
        </div>

        <div class="text-center">
          <button type="submit" class="btn btn-warning">Alterar Senha</button>
        </div>
      </form>
</div>
