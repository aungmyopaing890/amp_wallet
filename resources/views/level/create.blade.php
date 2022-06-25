<x-master-layout>
    <div class="row">
        <div class="col-12 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <h3>Customer Level</h3>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="row">
                        <form method="POST" action="{{route('level.store') }}">
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
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Description</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($levels as $level)
                                        <tr>
                                            <td>
                                                <p class="text-xs mb-0">{{$level->id}}</p>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{$level->name}}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs mb-0">{{$level->description}}</p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <a href="{{route('level.destroy',$level->id)}}" class="text-decoration-none"><i class="feather-trash-2 text-danger fa-2x"></i></a>

                                                <form action="{{ route('level.destroy',$level->id) }}" class="d-inline-block" method="post">
                                                    @csrf
                                                    @method("delete")
                                                    <button class="btn btn-outline-danger btn-sm d-none">
                                                        <i class="feather-trash-2 fa-3x"></i>
                                                    </button>
                                                </form>
                                                <a href="{{route('level.edit',$level->id)}}" class="text-decoration-none"><i class="feather-edit text-primary fa-2x"></i></a>
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

