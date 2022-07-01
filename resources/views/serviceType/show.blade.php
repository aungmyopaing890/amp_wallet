<x-master-layout>
    <div class="row">
        <div class="col-12 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <h3>{{$serviceType->name}}</h3>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="row">
                            <div class="row justify-content-center">
                                <div class="col-10 col-md-6">
                                    <div class="row mb-3">
                                        <label for="status" class="col-md-4 col-form-label text-md-end">{{$serviceType->status == 1 ?'Published':'Not Published'}}</label>
                                    </div>
                                </div>
                                <div class="mb-4 col-10 col-md-6">
                                    <div class="col-6">
                                        <img src="{{asset('storage/servicesType/'.$serviceType->img)}}" id="imgPreview" class="cover-img w-100 rounded  @error('img') border border-danger is-invalid  @enderror" alt="">
                                    </div>
                                </div>
                            </div>
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
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Sorting</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($serviceType->services as $service)
                                        <tr>
                                            <td>
                                                <p class="text-xs mb-0">{{$service->id}}</p>
                                            </td>
                                            <td>
                                                <img src="{{ asset('storage/services/'.$service->img) }}" style="height: 50px" class="rounded shadow-sm" alt="">
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{$service->name}}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs mb-0">{{$service->sorting}}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs mb-0">{{$service->status == 1 ?'published':'not published'}}</p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <form action="{{ route('service.destroy',$service->id) }}" class="d-inline-block" method="post">
                                                    @csrf
                                                    @method("delete")
                                                    <button class="btn btn-outline-danger btn-sm">
                                                        <i class="feather-trash-2 fa-3x"></i>
                                                    </button>
                                                </form>
                                                <a href="{{route('service.edit',$service->id)}}" class="text-decoration-none"><i class="feather-edit text-primary fa-2x"></i></a>
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

