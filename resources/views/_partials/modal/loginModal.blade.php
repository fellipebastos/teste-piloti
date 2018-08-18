<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="modalLoginForm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body pt-0">
                <p class="h1 text-center">Login</p>
                <p class="h5 text-center text-muted mb-4">Informe seus dados para entrar.</p>

                <div class="row justify-content-center">
                    <div class="col-md-10">
                        @include('_partials.form.loginForm')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>