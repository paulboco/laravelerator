/**
 * Templates Service
 */
app.service('templateService', function($http, LARAVEL, promiseService) {
    this.all = function() {
        url = '/laravelerator/ajax/template';
        params = {'_token': LARAVEL.token};
        cache = true;

        return promiseService.get(url, params, cache);
    };
});

/**
 * Path Display Service
 */
app.service('pathService', function($http, LARAVEL, promiseService) {
    this.params = {'_token': LARAVEL.token, 'path': ''};

    this.get = function(path) {
        url = '/laravelerator/ajax/path';
        this.params.path = path;
        cache = false;

        return promiseService.get(url, this.params, cache);
    };
});

/**
 * Generate service
 */
app.service('generateService', function($http, LARAVEL, promiseService) {
    this.params = {'_token': LARAVEL.token, 'form': ''};

    this.create = function(form) {
        url = '/laravelerator/ajax/generate/create';
        this.params.form = form;
        cache = false;

        return promiseService.get(url, this.params, cache);
    };
});

/**
 * Schema Service
 */
app.service('schemaService', function($http, promiseService) {
    this.all = function() {
        url = '/laravelerator/assets/json';
        params = {'f': 'schema.json'};
        cache = true;

        return promiseService.get(url, params, cache);
    };
});

/**
 * Routes Service
 */
app.service('routesService', function($http, LARAVEL, promiseService) {
    this.all = function() {
        url = '/laravelerator/ajax/routes';
        params = {'_token': LARAVEL.token};
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
