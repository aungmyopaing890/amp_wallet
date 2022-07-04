<x-master-layout>
    <div class="row">
        <div class="col-12 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <h3>Service</h3>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="row">
                        <form method="POST" action="" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-10 col-md-6">
                                    <div class="row mb-3">
                                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Wallet ID') }}</label>
                                        <div class="col-md-6">
                                            <x-input id="wallet_id"
                                                     type="name"
                                                     name="wallet_id"
                                                     :value="old('wallet_id')"
                                                     class="form-control"
                                                     placeholder="wallet id"
                                                     required  />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-0 justify-content-center align-items-center">
                                <div class="col-3">
                                    <button type="submit" class="btn btn-primary btn-lg ">
                                        {{ __('Add') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('#wallet_id').data('actval',$('#wallet_id').val());
        });

    </script>
</x-master-layout>
