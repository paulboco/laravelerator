/*
|--------------------------------------------------------------------------
| Routes filter
|--------------------------------------------------------------------------
*/

app.filter('routesFilter', function($state) {
    return function(routes) {
        if ($state.current.data.filter.value)
        {
            var string = $state.current.data.filter.string;
            var len = $state.current.data.filter.string.length;
            var rval = [];
            var j = 0;

            if (typeof(routes) !== 'undefined')
            {
                for (var i = 0; i < routes.length; i++) {
                    if (routes[i].uri.substring(0, len) !=  string) {
                        rval[j] = routes[i];
                        j++;
                    }
                }
            }
            return rval;
        }
        else
        {
            return routes;
        }
    };
});
