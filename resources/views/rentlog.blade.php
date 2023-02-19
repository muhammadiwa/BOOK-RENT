@extends('layouts.mainlayout')

@section('title', 'Rent Log')

@section('content')
    <h1>Rent Log</h1>

    <div class="mt-3">
        <x-rent-log-table :rentlog='$rent_logs'/>
    </div>
@endsection