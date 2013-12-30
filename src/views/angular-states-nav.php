<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <a href="/laravelerator" class="navbar-brand">LARAVELERATOR</a>
    </div>
    <ul class="nav navbar-nav navbar-left">
        <li data-ui-sref-active="active" data-ng-repeat="item in navItems" class>
            <a href data-ui-sref="{{ item.url }}">{{ item.label }}</a>
        </li>
    </ul>
</nav>
