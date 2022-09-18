<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Licence Plate Form - Parking Permit Laravel Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Licence Plate</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('plates.index') }}" enctype="multipart/form-data">
                        Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('plates.update',$plate->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Licence Plate:</strong>
                        <input type="text" name="plate" value="{{ $plate->plate }}" class="form-control"
                            placeholder=“M-PP123”>
                        @error('plate')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Owner Name:</strong>
                        <input type="text" name="owner" class="form-control" placeholder="Max"
                            value="{{ $plate->owner }}">
                        @error('owner')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Start Date:</strong>
                        <input type="datetime" name="start_date" class="form-control" placeholder=“2020-09-18T13:21:21Z”
                            value="{{ $plate->start_date }}">
                        @error('start_date')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>End Date:</strong>
                        <input type="datetime" name="end_date" class="form-control" placeholder=“2020-09-18T13:21:21Z”
                            value="{{ $plate->end_date }}">
                        @error('end_date')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>