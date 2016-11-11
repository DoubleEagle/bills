@extends('layouts.app')

@section('content')

<h1>Transactions Joanne</h1>
<table class="table table-striped click-table">
    @foreach ($rows['joanne'] as $index => $row)
        <tr>
            <td><input type="hidden" name="transactions[{{ $index }}][date]" value="{{ $row['date']->format('d-m-Y') }}">{{ $row['date']->format('d-m-Y') }}</td>
            <td><input type="hidden" name="transactions[{{ $index }}][amount]" value="{{ $row['amount'] }}">&euro;{{ $row['amount'] }}</td>
            <td><input type="hidden" name="transactions[{{ $index }}][title]" value="{{ $row['title'] }}">{{ explode(" - ",$row['title'])[0] }}<p class="text-muted">{{ explode(" - ",$row['title'])[1] }}</td>
        </tr>
    @endforeach
</table>

<h1>Transactions Rien</h1>
<table class="table table-striped click-table">
    @foreach ($rows['rien'] as $index => $row)
        <tr>
            <td><input type="hidden" name="transactions[{{ $index }}][date]" value="{{ $row['date']->format('d-m-Y') }}">{{ $row['date']->format('d-m-Y') }}</td>
            <td><input type="hidden" name="transactions[{{ $index }}][amount]" value="{{ $row['amount'] }}">&euro;{{ $row['amount'] }}</td>
            <td><input type="hidden" name="transactions[{{ $index }}][title]" value="{{ $row['title'] }}">{{ explode(" - ",$row['title'])[0] }}<p class="text-muted">{{ explode(" - ",$row['title'])[1] }}</td>
        </tr>
    @endforeach
</table>

@endsection
