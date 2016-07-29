@extends('layouts.app')

@section('content')
    <div class="col-md-6">
        <div class="well well-lg text-center">
            <h2 class="text-{{ $joanne <= $rien ? $joanne == $rien ? 'info' : 'danger' : 'success'}}">
                Joanne: &euro;{{ $joanne/100 }}
            </h2>
        </div>
    </div>
    <div class="col-md-6">
        <div class="well well-lg text-center">
            <h2 class="text-{{ $joanne >= $rien ? $joanne == $rien ? 'info' : 'danger' : 'success'}}">
                Rien: &euro;{{ $rien/100 }}
            </h2>
        </div>
    </div>
    <div class="col-md-12">
        <div class="well well-lg text-center">
            <h1>
                Verschil: €{{ abs($joanne - $rien)/100 }}
            </h1>
        </div>
        <a href="{{ url('import') }}" class="form-control btn btn-primary">Importeren</a>
    </div>
@endsection
