@section('scripts')
	<script type="text/javascript">
	$(document).ready(function() {

		function displayTemplateInfo()
		{
			var template = $('#id-field-template').val();
			$.ajax({
				type: 'GET',
				url: '{{ url('alg/ajax/template') }}',
				data: { template: template, _token: "{{ Session::token() }}" },
				success: function(response) {
					$("#template-description").html(response);
				}
			});
		}

		function displayWritePath()
		{
			var path = $('#id-field-path').val();
			if (typeof path != 'undefined' )
			{
				$.ajax({
					type: 'GET',
					url: '{{ url('alg/ajax/path') }}',
					data: { path: path, _token: "{{ Session::token() }}" },
					success: function(response) {
						$("#path-status").html(response);
					}
				});
			}
		}

		function toggleMockButton()
		{
			if ($('#mock-hidden').val() == 'mock')
				$('#mock-hidden').val(null);
			else
				$('#mock-hidden').val('mock');
		}

		function setMockButtonState()
		{
			if ($('#mock-hidden').val() == 'mock')
				$('#mock-button').html('Engaged').addClass('active');
			else
				$('#mock-button').html('Disengaged').removeClass('active');
		}

		// display data on page load
		displayTemplateInfo();
		displayWritePath();
		setMockButtonState();

		$("#id-field-template").change(function() {
			displayTemplateInfo();
			$('#field-error-template').remove();
		});

		$("#id-field-path").on('change input', function() {
			displayWritePath();
			$('#field-error-path').remove();
		});

		// Change state of Mock status button and hidden input
		$('#mock-button').click(function(e) {
			toggleMockButton();
			setMockButtonState();
			e.stopPropagation();
		});

		// focus the first input
		// $( "input[name=table]" ).focus();
	})
</script>
@stop
