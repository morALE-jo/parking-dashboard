<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Parking Permit Laravel Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Parking Permit Laravel Dashboard</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('plates.create') }}"> Create plate</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Licence Plate</th>
                    <th>Owner</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($plates as $plate)
                    <tr>
                        <td>{{ $plate->plate }}</td>
                        <td>{{ $plate->owner }}</td>
                        <td>{{ $plate->start_date }}</td>
                        <td>{{ $plate->end_date }}</td>
                        <td>
                            <form action="{{ route('plates.destroy',$plate->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('plates.edit',$plate->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        {!! $plates->links() !!}
    </div>
</body>
</html>