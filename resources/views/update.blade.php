<!DOCTYPE html>
<html lang="en">
<head>
  <title>Manajetugasdika - Update Task</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
</head>
<body>

<div class="container mt-3">
    <p>
    <ul class="navbar-nav list-group">
        <li class="nav-item list-group-item-active"><a href="/tasks">All Task</a></li>
        <li class="nav-item list-group-item-active"><a href="/tasks/completed">Completed Task</a></li>
        <li class="nav-item list-group-item-active"><a href="/tasks/incompleted">Incompleted Task</a></li>
    </ul>
    </p>
  <h2>Form to Update Task</h2>
  @foreach($task as $task)
  <form action="/tasks/{{$task->id}}" method="post">
    @csrf
    @method('PUT')
  <p>
    <div class="table-responsive">
        <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
            <tbody>
                <tr>
                    <th>Title</th>
                    <td><input type="text" name="title" class="form-control form-control-user" value="{{$task->title}}" required></td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td><textarea type="text" name="description" class="form-control form-control-user" required>{{$task->description}}</textarea></td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td><input type="radio" name="status" value="1" {{$task->status==1?'checked':''}} required> Completed&emsp;<input type="radio" name="status" value="0" {{$task->status==0?'checked':''}}> Incompleted</td>
                </tr>
            </tbody>
        </table>
        <center>
        <p>
            <button type="submit" class="btn btn-success btn-md">Update Task</button>
        </p>
        </center>
    </div>
  </p>
  </form>
  @endforeach
</div>

</body>
<script>
	$(document).ready( function () {
		$('#myTable').DataTable();
	} );
</script>
</html>