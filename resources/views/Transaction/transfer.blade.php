<x-master-layout>
    <div class="row">
        <div class="col-12 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <h3>Transfer</h3>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="row">
                        <form method="POST" action="{{route('Transfer')}}" enctype="multipart/form-data">
                            @csrf
                            @if(session()->has('error'))
                                <div class="alert alert-danger">
                                    {{ session()->get('error') }}
                                </div>
                            @endif
                            <div class="row mb-0 justify-content-center align-items-center">
                                <div class="col-10 col-md-6">
                                    <x-input id="wallet_id"
                                             type="text"
                                             name="wallet_id"
                                             :value="$wallet->id"
                                             class="form-control d-none"
                                             required  />
                                    <div class="row mb-3">
                                        <label for="amount" class="col-md-4 col-form-label text-md-end">{{ __('Amount') }}</label>
                                        <div class="col-md-6">
                                            <x-input id="amount"
                                                     type="text"
                                                     name="amount"
                                                     class="form-control"
                                                     placeholder="amount"
                                                     required  />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-10 col-md-6">
                                    <div class="row mb-3">
                                        <p class="text font-weight-bold mb-0">Name - {{$wallet->user->name}}</p>
                                        <p class="text-xs text-secondary mb-0">Email - {{$wallet->user->email}}</p>
                                        <p class="text-xs text-secondary mb-0">NRC - {{$wallet->user->profile->nrc}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-0 justify-content-center align-items-center">
                                <div class="col-3">
                                    <button type="submit" class="btn btn-primary btn-lg ">
                                        {{ __('Transfer') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-master-layout>

