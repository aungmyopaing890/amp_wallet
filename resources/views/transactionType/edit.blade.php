<x-master-layout>
    <div class="row my-4 h-100">
        <div class="col-12 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <h3>Currency</h3>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="row">
                        <form method="POST" action="{{route('transactionType.update',$transactionType) }}">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                        <div class="col-md-6">
                                            <x-input id="name"
                                                     type="name"
                                                     name="name"
                                                     :value="$transactionType->name"
                                                     class="form-control"
                                                     placeholder="name"
                                                     required  />
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
                                                     :value="$transactionType->description"
                                                     class="form-control"
                                                     placeholder="Description"
                                                     required  />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Charge Percentage') }}</label>
                                        <div class="col-md-6">
                                            <x-input id="charge_percentage"
                                                     type="number"
                                                     name="charge_percentage"
                                                     :value="$transactionType->charge_percentage"
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
                                                            <input type="radio" name="currency_id" id="option1" value="{{ $c->id }}" {{ $transactionType->currency_id == $c->id ? "checked" : "" }}> {{ $c->name }}
                                                        </label>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-12 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
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

