<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <a href="/laravelerator/states" class="navbar-brand">LARAVELERATOR</a>
    </div>
    <ul class="nav navbar-nav navbar-left">
        <li ui-sref-active="active" ng-repeat="item in items" class>
            <a href ui-sref="{{ item.url }}">{{ item.title }}</a>
        </li>
    </ul>
</nav>
