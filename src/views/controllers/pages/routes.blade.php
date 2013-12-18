@extends('laravelerator::layouts.master')

@section('subTitle', '- Routes')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1>Registered Routes</h1>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Domain</th>
                        <th>URI</th>
                        <th>Name</th>
                        <th>Action</th>
                        <th>Before Filters</th>
                        <th>After Filters</th>
                    </tr>
                </thead>
                <tbody class="no-wrap">
                    @foreach ($routes as $route)
                        <tr>
                            <td>{{ $route['domain'] }}</td>
                            <td>{{ $route['uri'] }}</td>
                            <td>{{ $route['name'] }}</td>
                            <td>{{ $route['actionName'] }}</td>
                            <td>{{ $route['beforeFilters'] }}</td>
                            <td>{{ $route['afterFilters'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
