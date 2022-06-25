<x-master-layout>
    <div class="row">
        <div class="col-12 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <h3>Transaction Type </h3>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="row">
                        <form method="POST" action="{{route('transactionType.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                        <div class="col-md-6">
                                            <x-input id="name"
                                                     type="name"
                                                     name="name"
                                                     :value="old('name')"
                                                     class="form-control"
                                                     placeholder="name"
                                                     required  />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Charge Percentage') }}</label>
                                        <div class="col-md-6">
                                            <x-input id="charge_percentage"
                                                     type="number"
                                                     name="charge_percentage"
                                                     :value="old('charge_percentage')"
                                                     class="form-control"
                                                     placeholder="charge percentage"
                                                     required  />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="currency_id" class="col-md-4 col-form-label text-md-end">{{ __('Select Currency') }}</label>
                                        <div class="col-md-6">
                                            <div class="">
                                                <div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
                                                    @foreach($currencies as $c)
                                                        <label class="btn btn-outline-secondary">
                                                            <input type="radio" name="currency_id" id="option1" value="{{ $c->id }}" {{ old('currency_id') == $c->id ? "checked" : "" }}> {{ $c->name }}
                                                        </label>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>
                                        <div class="col-md-6">
                                            <x-input id="description"
                                                     type="text"
                                                     name="description"
                                                     :value="old('description')"
                                                     class="form-control"
                                                     placeholder="description"
                                                     required  />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-12 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Add') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">name</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Charge Percentage</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Currency</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Description</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($transactionTypes as $transactionType)
                                        <tr>
                                            <td>
                                                <p class="text-xs mb-0">{{$transactionType->id}}</p>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{$transactionType->name}}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs mb-0">{{$transactionType->charge_percentage}}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs mb-0">{{$transactionType->currency->name}}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs mb-0">{{$transactionType->description}}</p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <form action="{{ route('transactionType.destroy',$transactionType->id)}}" class="d-inline-block" method="post">
                                                    @csrf
                                                    @method("delete")
                                                    <button class="btn btn-outline-danger btn-sm">
                                                        <i class="feather-trash-2 fa-3x"></i>
                                                    </button>
                                                </form>
                                                <a href="{{route('transactionType.edit',$transactionType->id)}}" class="text-decoration-none"><i class="feather-edit text-primary fa-2x"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-master-layout>

