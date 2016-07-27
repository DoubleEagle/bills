@extends('layouts.app')

@section('content')
    <div class="col-md-6">
        <div class="well well-lg text-center">
            <h2 class="text-success">
                Joanne: €10,-
            </h2>
        </div>
    </div>
    <div class="col-md-6">
        <div class="well well-lg text-center">
            <h2 class="text-danger">
                Rien: €10,-
            </h2>
        </div>
    </div>
    <div class="col-md-12">
        <div class="well well-lg text-center">
            <h1>
                Verschil: €0,-
            </h1>
        </div>
        <a href="{{ url('import') }}" class="form-control btn btn-primary">Importeren</a>
    </div>
@endsection
