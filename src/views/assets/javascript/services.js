app.service('ajaxService', function($http) {
    // Get available templates
    this.getTemplates = function() {
        var promise = $http.get(urlBase + 'ajax/templatesavailable', {params: {'_token': csrfToken}, cache: true})
        .then(function (response) {
            return response.data;
        });
        return promise;
    };
});
