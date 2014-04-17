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
    <div class="col-md-6">
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

    <div class="col-md-6">
        @if ($selectedTable)
            <h3>Schema</h3>
            <table class="table">
                <tr>
                    <td>Database:</td>
                    <td>{{ $selectedDatabase }}</td>
                </tr>
                <tr>
                    <td>Table:</td>
                    <td>{{ $selectedTable }}</td>
                </tr>
            </table>
            {{ dv($schema) }}
        @endif
    </div>
</div>
@stop

@include('laravelerator::assets.js.laravelerator')