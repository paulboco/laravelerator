<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h1>Registered Routes</h1>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-1">
        <h4>Filter</h4>
    </div>
    <div class="col-md-11">
        <input data-ng-model="search.$" class="form-control" autofocus>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
                <tr>
                    <th>Domain</th>
                    <th>URI</th>
                    <th>Name</th>
                    <th>Action</th>
                    <th>Before</th>
                    <th>After</th>
                </tr>
            </thead>
            <tbody class="no-wrap">
                    <tr data-ng-repeat="route in routes | filter:search">
                        <td>{{ route.domain }}</td>
                        <td>{{ route.uri }}</td>
                        <td>{{ route.name }}</td>
                        <td>{{ route.action }}</td>
                        <td>{{ route.before }}</td>
                        <td>{{ route.after }}</td>
                    </tr>
            </tbody>
        </table>
    </div>
</div>
