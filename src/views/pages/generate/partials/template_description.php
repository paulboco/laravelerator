<aside data-ng-cloak>
    <h4>Template Description</h4>
    <span class="help-block" data-ng-hide="!!$state.current.data.template">No template selected!</span>
    <div data-ng-show="!!$state.current.data.template">
        <div class="panel panel-default">
            <div class="panel-body">
                <h4>{{ $state.current.data.template.title }}</h4>
                <div data-ng-bind-html="$state.current.data.template.description"></div>
            </div>
        </div>
    </div>
</aside>