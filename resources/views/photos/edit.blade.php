@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Foto</h2>
    <form action="{{ route('photos.update', $photo->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="caption">Caption</label>
            <textarea name="caption" id="caption" class="form-control">{{ old('caption', $photo->caption) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
