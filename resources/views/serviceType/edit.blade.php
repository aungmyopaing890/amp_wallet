<x-master-layout>
    <div class="row my-4 h-100">
        <div class="col-12 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <h3>Level</h3>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="row">
                        <form method="POST" action="{{route('serviceType.update',$serviceType) }}" enctype="multipart/form-data">
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
                                                     :value="$serviceType->name"
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
                                            <input type="checkbox" name="status" value="1" {{$serviceType->status==1 ? 'checked':''}}>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="mb-4 col-10 col-md-6">
                                    <div class="col-6">
                                        <label for="status" class="col-md-4 col-form-label text-md-end">{{ __('Image') }}</label>
                                        <img src="{{asset('storage/servicesType/'.$serviceType->img)}}" id="imgPreview" class="cover-img w-100 rounded  @error('img') border border-danger is-invalid  @enderror" alt="">
                                        <input type="file" class="d-none" name="img" id="img">
                                        @error('img')
                                        <p class="invalid-feedback ps-2">{{ $message }}</p>
                                        @enderror
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
    <script>
        let coverPreview=document.querySelector("#imgPreview");
        let cover=document.querySelector("#img");
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

