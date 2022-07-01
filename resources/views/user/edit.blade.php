<x-master-layout>
    <div class="row my-4 h-100">
        <div class="col-12 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6 col-7 mb-3">
                            <h6>Update User Data</h6>
                        </div>
                        <form method="POST" action="{{route('user.update',$user)}}" enctype="multipart/form-data">
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
                                                     :value="$user->name"
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
                                                     :value="$user->name"
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
                                                     :value="$user->email"
                                                     class="form-control"
                                                     placeholder="Email"
                                                     required  />
                                        </div>
                                    </div>
                                    <x-select
                                        id="role"
                                        name="role_id"
                                        :value="$roles"
                                        class="form-control"
                                        :selected="$user->role_id"
                                        required
                                    />
                                    <div class="col-6">
                                        @if($user->profile->imgPath=="")
                                            <x-image-upload
                                                id="imgPreview"
                                                src="{{asset('storage/services/image-default.png')}}"
                                                class="cover-img w-100 rounded border-0"
                                                alt=""  />
                                        @else
                                            <x-image-upload
                                                id="imgPreview"
                                                src="{{asset('storage/'.$user->profile->imgPath)}}"
                                                class="cover-img w-100 rounded border-0"
                                                alt=""  />
                                        @endif

                                        <x-input id="imgPath"
                                                 type="file"
                                                 name="imgPath"
                                                 :value="$user->image"
                                                 class="d-none"/>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>
                                        <div class="col-md-6">
                                            <x-input id="address"
                                                     type="text"
                                                     name="address"
                                                     :value="$user->profile->address"
                                                     class="form-control"
                                                     placeholder="address"
                                                     required  />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="nrc" class="col-md-4 col-form-label text-md-end">{{ __('National ID') }}</label>
                                        <div class="col-md-6">
                                            <x-input id="nrc"
                                                     type="text"
                                                     name="nrc"
                                                     :value="$user->profile->nrc"
                                                     class="form-control"
                                                     placeholder="National ID"
                                                     required  />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="dob" class="col-md-4 col-form-label text-md-end">{{ __('Date Of Birth') }}</label>
                                        <div class="col-md-6">
                                            <x-input id="dob"
                                                     type="date"
                                                     name="dob"
                                                     :value="$user->profile->dob"
                                                     class="form-control"
                                                     required  />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="phoneNumber" class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>
                                        <div class="col-md-6">
                                            <x-input id="phoneNumber"
                                                     type="text"
                                                     name="phoneNumber"
                                                     :value="$user->profile->phoneNumber"
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
                                        {{ __('Update') }}
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
    <script>
        let coverPreview=document.querySelector("#imgPreview");
        let cover=document.querySelector("#imgPath");
        coverPreview.addEventListener("click",_=>cover.click())
        cover.addEventListener("change",_=>{
            let reader =new FileReader();
            reader.onload =function () {
                coverPreview.src=reader.result;
            }
            reader.readAsDataURL(cover.files[0]);
        })
    </script>
</x-master-layout>

