@extends('layouts.app')

@section('content')
    <form action="{{ url('opslaan') }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped click-table">
            @foreach ($rows as $row)
                <tr>
                    <td><input type="hidden" name="transactions[{{ $row['hash'] }}][amount]" value="{{ $row['amount'] }}">{{ $row['amount'] }}</td>
                    <td><input type="hidden" name="transactions[{{ $row['hash'] }}][title]" value="{{ $row['title'] }}">{{ $row['title'] }}</td>
                    <td>
                        <div class="checkbox">
                            {{ debug($rows) }}
                            <label>
                                <input type="checkbox" name="transactions[{{ $row['hash'] }}][checked]" value="true">
                            </label>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
        <input type="submit" value="Opslaan" class="btn btn-primary">
@endsection
