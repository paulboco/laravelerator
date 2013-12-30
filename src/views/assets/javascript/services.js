/**
 * Templates Service
 */
app.service('templatesService', function($http, laravel, promiseService) {
    this.all = function() {
        url = laravel.urlBase + 'ajax/templates';
        params = {'_token': laravel.csrfToken};
        cache = true;

        return promiseService.get(url, params, cache);
    };
});

/**
 * Path Display Service
 */
app.service('pathDisplayService', function($http, laravel, promiseService) {
    this.params = {'_token': laravel.csrfToken, 'path': ''};

    this.get = function(path) {
        url = laravel.urlBase + 'ajax/path';
        this.params.path = path;
        cache = false;

        return promiseService.get(url, this.params, cache);
    };
});

/**
 * Schema Service
 */
app.service('schemaService', function($http, laravel, promiseService) {
    this.all = function() {
        url = laravel.urlBase + 'assets/json';
        params = {'f': 'schema.json'};
        cache = true;

        return promiseService.get(url, params, cache);
    };
});

/**
 * Routes Service
 */
app.service('routesService', function($http, laravel, promiseService) {
    this.all = function() {
        url = laravel.urlBase + 'ajax/routes';
        params = {'_token': laravel.csrfToken};
        cache = true;

        return promiseService.get(url, params, cache);
    };
});

/**
 * Promise Service
 */
app.service('promiseService', function($http) {
    this.get = function(url, params, cache) {
        var promise = $http.get(url, {params: params, cache: cache})
        .then(function (response) {
            return response.data;
        });
        return promise;
    };
});

