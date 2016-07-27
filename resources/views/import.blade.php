@extends('layouts.app')

@section('content')
    <form action="{{ url('verwerken') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="file">CSV-bestand</label>
            <input type="file" class="form-control" name="file">
        </div>
        <input type="submit" value="Genereer vinkjes" class="btn btn-primary">
    </form>
@endsection
