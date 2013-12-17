@extends('laravelerator::layouts.master')

@section('content')
    <table class="table" style="background-color: silver;">
        <thead>
            <tr>
                <th>Domain</th>
                <th>URI</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($routes as $route)
                <tr>
                    <td>&nbsp;</td>
                    <td>{{ $route['methods'][0]}} {{ $route['uri'] }}</td>
                    <td>{{ $route['name'] }}</td>
                    <td>{{ $route['actionName'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
