@extends('laravelerator::layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1>Home</h1>
            </div>
            <ul class="list-group" style="font-size:larger;">
                <li class="list-group-item">
                    <h3>alg:generate <small>Database code generation</small></h3>
                    <ul>
                        <li>Validate schema</li>
                        <li>
                            template and path are required args.<br>
                            table, namespace, schema &amp; mock are options.
                        </li>
                    </ul>
                </li>
                <li class="list-group-item">
                    <h3>General</h3>
                    <ul>
                        <li>
                            Explore the use of Facades
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
@stop
