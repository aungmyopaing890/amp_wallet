<x-master-layout>
    <div class="row">
        <div class="col-12 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <h3>Transaction Limit </h3>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="row">
                        <form method="POST" action="{{route('transactionLimit.update',$transactionLimit) }}">
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
                                                     :value="$transactionLimit->name"
                                                     class="form-control"
                                                     placeholder="name"
                                                     required  />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="daily_amount" class="col-md-4 col-form-label text-md-end">{{ __('Daily amount') }}</label>
                                        <div class="col-md-6">
                                            <x-input id="daily_amount"
                                                     type="number"
                                                     name="daily_amount"
                                                     :value="$transactionLimit->daily_amount"
                                                     class="form-control"
                                                     placeholder="daily amount"
                                                     required  />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="monthly_amount" class="col-md-4 col-form-label text-md-end">{{ __('Monthly amount') }}</label>
                                        <div class="col-md-6">
                                            <x-input id="monthly_amount"
                                                     type="number"
                                                     name="monthly_amount"
                                                     :value="$transactionLimit->monthly_amount"
                                                     class="form-control"
                                                     placeholder="monthly amount"
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
                                                            <input type="radio" name="currency_id" id="option1" value="{{ $c->id }}" {{ $transactionLimit->currency_id == $c->id ? "checked" : "" }}> {{ $c->name }}
                                                        </label>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <x-select
                                        id="transactionType"
                                        name="transaction_type_id"
                                        :options="$transactionTypes"
                                        :selected="$transactionLimit->transactionTypes"
                                        required
                                    />
                                </div>
                                <div class="col-md-6">
                                    <x-select
                                        id="level"
                                        name="level_id"
                                        :options="$levels"
                                        required
                                    />
                                </div>
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>
                                        <div class="col-md-6">
                                            <x-input id="description"
                                                     type="text"
                                                     name="description"
                                                     :value="$transactionLimit->description"
                                                     class="form-control"
                                                     placeholder="Description"
                                                     required  />
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

