@section('scripts')
	@parent

	<script type="text/javascript">
	$(document).ready(function() {

		// function displayWritePath()
		// {
		// 	var path = $('#path').val();
		// 	if (typeof path != 'undefined' )
		// 	{
		// 		$.ajax({
		// 			type: 'GET',
		// 			url: '{{ url('laravelerator/ajax/path') }}',
		// 			data: { path: path, _token: "{{ Session::token() }}" },
		// 			success: function(response) {
		// 				$("#path-status").html(response);
		// 			}
		// 		});
		// 	}
		// }

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

		// displayWritePath();
		setMockButtonState();

		// $("#path").on('change input', function() {
		// 	displayWritePath();
		// 	$('#field-error-path').remove();
		// });

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
