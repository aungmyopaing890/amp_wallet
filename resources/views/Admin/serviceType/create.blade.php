<x-master-layout>
    <div class="row">
        <div class="col-12 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <h3>Service Types </h3>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="row">
                        <form method="POST" action="{{route('serviceType.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-10 col-md-6">
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
                                <div class="col-10 col-md-6">
                                    <div class="row mb-3">
                                        <label for="status" class="col-md-4 col-form-label text-md-end">{{ __('Direct Publish') }}</label>
                                        <label class="switch">
                                            <input type="checkbox" name="status" value="1">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="mb-4 col-10 col-md-6">
                                    <div class="col-6">
                                        <x-image-upload
                                            id="imgPreview"
                                            src="{{asset('storage/servicesType/image-default.png')}}"
                                            class="cover-img w-100 rounded border-0"
                                            alt=""  />
                                        <x-input id="imgPath"
                                                 type="file"
                                                 name="imgPath"
                                                 class="d-none"/>
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
                    <div class="table-responsive">
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">img</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">name</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($serviceTypes as $serviceType)
                                        <tr>
                                            <td>
                                                <p class="text-xs mb-0">{{$serviceType->id}}</p>
                                            </td>
                                            <td>
                                                @if($serviceType->imgPath=="")
                                                    <img src="{{asset('storage/serviceTypes/image-default.png')}}" style="height: 50px" class="rounded shadow-sm" alt="">
                                                @else
                                                    <img src="{{asset($serviceType->imgPath)}}" style="height: 50px" class="rounded shadow-sm" alt="">
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <a href="{{route('serviceType.show',$serviceType)}}"><h6 class="mb-0 text-sm">{{$serviceType->name}}</h6>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs mb-0">{{$serviceType->status == 1 ?'published':'not published'}}</p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <form action="{{ route('serviceType.destroy',$serviceType->id) }}" class="d-inline-block" method="post">
                                                    @csrf
                                                    @method("delete")
                                                    <button class="btn btn-outline-danger btn-sm">
                                                        <i class="feather-trash-2 fa-3x"></i>
                                                    </button>
                                                </form>
                                                <a href="{{route('serviceType.edit',$serviceType->id)}}" class="text-decoration-none"><i class="feather-edit text-primary fa-2x"></i></a>
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

