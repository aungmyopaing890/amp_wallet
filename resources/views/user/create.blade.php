<x-master-layout>
    <div class="row my-4 h-100">
        <div class="col-12 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6 col-7 mb-3">
                            <h6>Create New Users</h6>
                        </div>
                        <form method="POST" action="{{route('user.create') }}">
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
                                    <div class="row mb-3">
                                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('FullName') }}</label>
                                        <div class="col-md-6">
                                            <x-input id="fullName"
                                                     type="name"
                                                     name="fullName"
                                                     :value="old('fullName')"
                                                     class="form-control"
                                                     placeholder="Full Name"
                                                     required  />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>

                                        <div class="col-md-6">
                                            <x-input id="email"
                                                     type="name"
                                                     name="email"
                                                     :value="old('email')"
                                                     class="form-control"
                                                     placeholder="Email"
                                                     required  />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                        <div class="col-md-6">
                                            <x-input id="password"
                                                     type="password"
                                                     name="password"
                                                     :value="old('password')"
                                                     class="form-control"
                                                     placeholder="Password"
                                                     required  />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                        <div class="col-md-6">
                                            <x-input id="password-confirm"
                                                     type="password"
                                                     name="password-confirm"
                                                     :value="old('password')"
                                                     class="form-control"
                                                     placeholder="Confirm Password"
                                                     required  />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Country') }}</label>
                                        <div class="col-md-6">
                                            <x-input id="country"
                                                     type="text"
                                                     name="country"
                                                     :value="old('country')"
                                                     class="form-control"
                                                     placeholder="country"
                                                     required  />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('National ID') }}</label>
                                        <div class="col-md-6">
                                            <x-input id="nrc"
                                                     type="text"
                                                     name="nrc"
                                                     :value="old('nrc')"
                                                     class="form-control"
                                                     placeholder="National ID"
                                                     required  />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Date Of Birth') }}</label>
                                        <div class="col-md-6">
                                            <x-input id="dob"
                                                     type="date"
                                                     name="dob"
                                                     :value="old('dob')"
                                                     class="form-control"
                                                     required  />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>
                                        <div class="col-md-6">
                                            <x-input id="phoneNumber"
                                                     type="text"
                                                     name="phoneNumber"
                                                     :value="old('phoneNumber')"
                                                     class="form-control"
                                                     placeholder="Phone Number"
                                                     required  />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive">

                    </div>
                </div>
            </div>
        </div>

    </div>
</x-master-layout>

