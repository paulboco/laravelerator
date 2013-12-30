app.directive("inputTable", function() {
    return {
        restrict: "E",
        require: "^state",
        controller:  ['$state', function($state) {
			$state.current.data.tableClass = function() {
				if ($state.current.data.table === '')
					return 'has-error';
				else
					return 'ok';
			}
      	}],
        template: '<div ng-class="$state.current.data.tableClass()" class="form-group"><label for="table" class="control-label">* Table Name</label><input data-ng-model="$state.current.data.table" name="table" type="text" class="form-control"></div>'
    };
});
