@extends('laravelerator::layouts.master')

@section('subTitle', '- Generate')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h1>Generate <small>Create code from an existing table.</small></h1>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <h3>Databases</h3>
        <div class="panel-group" id="accordion">
            @foreach ($databases as $database => $tables)
                <?php $in = $database == $selectedDatabase ? ' in' : '' ?>
                <div class="panel panel-default">
                    <div class="panel-heading directories" data-toggle="collapse" data-parent="#accordion" href="#collapse-{{ $database }}">
                        {{ $database }}
                    </div>
                    <div id="collapse-{{ $database }}" class="panel-collapse collapse{{ $in }}">
                        <div class="panel-body">
                            @foreach ($tables as $table)
                                {{ link_to_route('laravelerator.generate.from.table', $table, [$database, $table])}}<br>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="col-md-9">
        @if ($selectedTable)
            <h3>Schema for `{{ $selectedDatabase }}`.`{{ $selectedTable }}`</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Field</th>
                        <th>Type</th>
                        <th class="center">Null</th>
                        <th>Key</th>
                        <th>Default</th>
                        <th>Extra</th>
                        <th class="center">Length</th>
                        <th>Attr</th>
                    </tr>
                </thead>
                <tbody class="no-wrap">
                    @foreach ($schema as $schemata)
                        <tr>
                            <td>{{ $schemata['Field'] }}</th>
                            <td>{{ $schemata['Type'] }}</th>
                            <td class="center">{{ $schemata['Null'] }}</th>
                            <td>{{ $schemata['Key'] }}</th>
                            <td>{{ $schemata['Default'] }}</th>
                            <td>{{ $schemata['Extra'] }}</th>
                            <td class="center">{{ $schemata['Length'] }}</th>
                            <td>{{ $schemata['Attr'] }}</th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ Form::open(['action' => 'Laravelerator\Laravelerator\GenerateController@fromForm', 'class' => 'form-horizontal', 'role' => 'form']) }}
                <textarea name="schema" class="form-control" rows="{{ count($schema) + 1 }}">
@foreach ($schema as $schemata)
{{ $schemata['Field'] }}:{{ $schemata['Type'] }},{{ PHP_EOL }}
@endforeach
                </textarea>
            <button class="btn btn-success btn-generate" type="submit">GENERATE</button>
            {{ Form::close() }}

        @endif
    </div>
</div>
@stop

@include('laravelerator::assets.js.laravelerator')
array (
  '_token' => 'emlHyvMQ7mm8aOVtzxbTvbto9EBsSphgyiGNrENO',
  'template' => 'scaffold',
  'path' => 'app',
  'table' => 'problems',
  'namespace' => 'Shiphed',
  'schema' => 'id : increments
username : string(100)
password : string(100)
',
  'mock' => '',
)