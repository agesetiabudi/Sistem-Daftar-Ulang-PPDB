@if($errors->any())

	<div class="alert alert-danger">
	    <ul style="margin-bottom: 0px;">
	        @foreach ($errors->all() as $error)
	            <li>{{ $error }}</li>
	        @endforeach
	    </ul>
	</div>

@endif