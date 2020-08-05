<!DOCTYPE html>
<html lang="en">
<head>
  <title>Certificate Generation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <form role="form" method="post" action="{{route('saveteacher')}}">
   @csrf
    <div class="form-group">
      <label for="teachername">Teacher Name</label>
      <input type="text" class="form-control" id="teachername" placeholder="Enter Teacher Name" name="teachername">
	  <label for="email">Teacher Name</label>
      <input type="date" class="form-control" id="teacherdob" placeholder="Enter Teacher DOB" name="teacherdob">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>
<div class="container">
  <h2>Basic Table</h2>
  <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>            
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Date Of Birth</th>
		<th>Certificate</th>
      </tr>
    </thead>
    <tbody>
	@foreach($teacher as $t)
      <tr>
        <td>{{$t->id}}</td>
        <td>{{$t->name}}</td>
        <td>{{$t->dob}}</td>
		<td><a target="_blank" href="{{route('createPDF',['id'=>$t->id])}}">View</a></td>
      </tr>
	 @endforeach
      
    </tbody>
  </table>
</div>
</body>
</html>
