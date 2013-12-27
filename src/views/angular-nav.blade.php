<nav data-ng-controller="NavbarController" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand">LARAVELERATOR</a>
    </div>
    <ul class="nav navbar-nav navbar-left">
        <li data-ng-repeat="page in pages" data-ng-class="{'active':isActive(page.url)}">
            <a href data-ng-click="loadPage(page)" data-ng-cloak>@{{ page.title }}</a>
        </li>
    </ul>
</nav>
