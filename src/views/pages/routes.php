<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h1>Registered Routes</h1>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-1">
        <label>Filter List</label>
    </div>
    <div class="col-md-5">
        <input data-ng-model="$state.current.data.search.$" class="form-control" autofocus>
    </div>
    <div class="col-md-offset-3 col-md-3">
        <filter-button></filter-button>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Domain</th>
                    <th>Verb</th>
                    <th>URI</th>
                    <th>Name</th>
                    <th>Action</th>
                    <th>Before</th>
                    <th>After</th>
                </tr>
            </thead>
            <tbody class="no-wrap">
                    <tr data-ng-repeat="route in routes | filter:$state.current.data.search | routesFilter">
                        <td>{{ route.domain }}</td>
                        <td>{{ route.verb }}</td>
                        <td ng-switch="route.verb==='GET'">
                            <a ng-switch-when="true"ng-href="{{route.uri}}" target="_blank">{{ route.uri }}</a>
                            <span ng-switch-when="false">{{ route.uri }}</span>
                        </td>
                        <td>{{ route.name }}</td>
                        <td>{{ route.action }}</td>
                        <td>{{ route.before }}</td>
                        <td>{{ route.after }}</td>
                    </tr>
            </tbody>
        </table>
    </div>
</div>
