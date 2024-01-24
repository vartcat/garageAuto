<div class="" id="">
    <div class="">
        <div class="">
            <div class="">
                <h4 class="">Employés</h4>
                <button type="button" class="" data-dismiss="modal">&times;</button>
            </div>
            <div class="">
                <form class="" action="" id="userForm" method="post">
                    <input type="hidden" name="edit_mode" id="edit_mode" value="0" readonly>
                    <input type="hidden" name="id" id="id" value="" readonly>
                    <div class="container">
                        <label for="name" class="">Prénom (*)</label>
                        <input type="text" class="form-control" name="first_name" id="first_name" required>
                    </div>
                    <div class="container">
                        <label for="lastname" class="">Nom (*)</label>
                        <input type="text" class="form-control" name="last_name" id="last_name" required>
                    </div>
                    <div class="container">
                        <label for="email" class="">Email (*)</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="container">
                        <label for="password" class="">Mot de passe (*)</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                </form>
                <div class="" role="alert" style="display:none;">
                    <p>Error</p>
                    <button type="button" class="" aria-label="Close" onclick="$('.alert').hide()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="User.save(this);">Sauvegarder</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>