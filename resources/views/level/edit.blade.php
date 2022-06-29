<x-master-layout>
    <div class="row my-4 h-100">
        <div class="col-12 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <h3>Level</h3>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="row">
                        <form method="POST" action="{{route('level.update',$level) }}">
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
                                                     :value="$level->name"
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
                                                     :value="$level->description"
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

