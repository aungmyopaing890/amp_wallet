<div class="row mb-3">
    <label for="{{$attributes['id']}}" class="col-md-4 col-form-label text-md-end">Select {{$attributes['id']}}</label>
    <div class="col-md-6">
        <select {!! $attributes->merge(['class' => 'form-control ']) !!}>
            @foreach($attributes['value'] as $q)
                <option value="{{ $q['id'] }}" {{ old($attributes['name']) == $q['id']  ? "selected":"" }}>{{ $q['name']  }}</option>
            @endforeach
        </select>
    </div>
    @error($attributes['name'])
        <small class="text-danger font-weight-bold">{{ $message }}</small>
    @enderror
</div>
