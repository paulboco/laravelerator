<nav ng-controller="navbarController" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand">Angular JS</a>
    </div>
    <ul class="nav navbar-nav navbar-left">
        <li ng-repeat="page in pages" ng-class="{'active':isActive(page.url)}">
            <a href ng-click="loadPage(page)" ng-cloak>@{{ page.title }}</a>
        </li>
    </ul>
</nav>
