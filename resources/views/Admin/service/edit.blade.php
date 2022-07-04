<x-master-layout>
    <div class="row">
        <div class="col-12 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <h3>Service</h3>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="row">
                        <form method="POST" action="{{route('service.update',$service)}}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row justify-content-center">
                                <div class="col-10 col-md-6">
                                    <div class="row mb-3">
                                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                        <div class="col-md-6">
                                            <x-input id="name"
                                                     type="name"
                                                     name="name"
                                                     :value="$service->name"
                                                     class="form-control"
                                                     placeholder="name"
                                                     required  />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-10 col-md-6">
                                    <div class="row mb-3">
                                        <label for="status" class="col-md-4 col-form-label text-md-end">{{ __('Direct Publish') }}</label>
                                        <label class="switch">
                                            <input type="checkbox" name="status" value="1" {{$service->status==1 ? 'checked':''}}>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-10 col-md-6">
                                    <div class="row mb-3">
                                        <label for="price" class="col-md-4 col-form-label text-md-end">{{ __('Price') }}</label>
                                        <div class="col-md-6">
                                            <x-input id="price"
                                                     type="number"
                                                     name="price"
                                                     :value="$service->price"
                                                     class="form-control"
                                                     placeholder="price"
                                                     required  />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <x-select
                                        id="serviceType"
                                        name="service_type_id"
                                        :options="$serviceTypes"
                                        :selected="$service->service_type_id"
                                        class="form-control"
                                        required
                                    />
                                </div>
                                <div class="col-10 col-md-6">
                                    <div class="row mb-3">
                                        <label for="sorting" class="col-md-4 col-form-label text-md-end">{{ __('Sorting') }}</label>
                                        <div class="col-md-6">
                                            <x-input id="sorting"
                                                     type="number"
                                                     name="sorting"
                                                     :value="$service->sorting"
                                                     class="form-control"
                                                     placeholder="sorting"
                                                     required  />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-10 col-md-6">
                                    <div class="row mb-3">
                                        <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>
                                        <div class="col-md-6">
                                            <x-textarea
                                                id="description"
                                                type="number"
                                                name="description"
                                                :value="$service->description"
                                                class="form-control"
                                                placeholder="description"
                                                required  />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="mb-4 col-10 col-md-6">
                                    <div class="col-6">
                                        <label for="status" class="col-md-4 col-form-label text-md-end">{{ __('Image') }}</label>
                                        <img src="{{asset('storage/'.$service->imgPath)}}"
                                             id="imgPreview"
                                             class="cover-img w-100 rounded  @error('img') border border-danger is-invalid  @enderror"
                                             alt="">
                                        <input type="file" class="d-none" name="imgPath" id="imgPath">
                                        @error('img')
                                        <p class="invalid-feedback ps-2">{{ $message }}</p>
                                        @enderror
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
                    <hr>
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

