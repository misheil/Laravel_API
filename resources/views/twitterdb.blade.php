<!DOCTYPE html>
<html>
<head>
	<title>Laravel 5 - Twitter API Fetch Data from DB </title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<meta http-equiv="refresh" content="7200;  URL=/">
</head>
<body>


<div class="container">
    <h2>Laravel 5 - Twitter API - Fetch Data from DB</h2>


    <form method="POST" action="{{ route('post.back') }}" enctype="multipart/form-data">


        {{ csrf_field() }}


        @if(count($errors))
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.
                <br/>
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif



        <div class="form-group">
            <input type="submit" name="back" class="btn btn-success" value="Back">
        </div>
    </form>


    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="50px">No</th>
                <th>Twitter Id</th>
                <th>Message</th>
                <th>Retweet</th>
            </tr>
        </thead>
        <tbody>

					@if(!empty($dataDB))
							@foreach($dataDB as $key => $value)
									<tr>
										<td>{{ ++$key }}</td>
										<td>{{ $value['Twitter_Id'] }}</td>
										<td>{{ $value['Message'] }}</td>
										<td>{{ $value['tweet_count'] }}</td>

									</tr>
							@endforeach
					@else
							<tr>
									<td colspan="6">There are no data .</td>
							</tr>
					@endif
        </tbody>
    </table>
</div>


</body>
</html>
