@props(['name'])
@error($name)
    <div class="alert alert-danger mt-2" role="alert">
        {{ $message }}
    </div>
@enderror
