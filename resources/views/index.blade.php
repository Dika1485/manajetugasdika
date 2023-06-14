<!DOCTYPE html>
<html lang="en">
<head>
  <title>Manajetugasdika - All Task</title>
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
  <form action="/tasks" method="post">
    @csrf
  <p>
    <div class="table-responsive">
        <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
            <tbody>
                <tr>
                    <th>Title</th>
                    <td><input type="text" name="title" class="form-control form-control-user" required></td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td><textarea type="text" name="description" class="form-control form-control-user" required></textarea></td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td><input type="radio" name="status" value="1" required> Completed&emsp;<input type="radio" name="status" value=0> Incompleted</td>
                </tr>
            </tbody>
        </table>
        <center>
        <p>
            <button type="submit" class="btn btn-success btn-md">Insert Task</button>
        </p>
        </center>
    </div>
  </p>
  </form>
  <h2>List of All Task</h2>
  <table id="myTable" class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach($task as $task)
      <tr>
        <td>{{$task->id}}</td>
        <td>{{$task->title}}</td>
        <td>{{$task->description}}</td>
        <td>{{($task->status)?"Completed":"Incompleted"}}</td>
        <td>
        	<a href="/tasks/{{$task->id}}" class="btn btn-primary">Edit</a> 
            <form action="/tasks/{{$task->id}}/status" method="post">
                @csrf
                @method('PUT')
                <!-- <input type="hidden" name="_method" value="DELETE"> -->
                <button type="submit" class="btn btn-secondary">Switch Status</button> 
            </form>
            <form action="/tasks/{{$task->id}}" method="post">
                @csrf
                @method('DELETE')
                <!-- <input type="hidden" name="_method" value="DELETE"> -->
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>

</body>
<script>
	$(document).ready( function () {
		$('#myTable').DataTable();
	} );
</script>
</html>