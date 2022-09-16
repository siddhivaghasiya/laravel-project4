<!DOCTYPE html>
<html lang="en">

<head>

    <style>
        form {
            margin-top: 27px;
            margin-right: 250px;
        }

        .card.card-primary {
            margin-top: 40px;
        }

        .container {
            width: 1046px;
        }

        .error {
            color: red;
        }
    </style>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script src="{{ asset('theme/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('theme/additional-methods.min.js') }}"></script>
</head>

<body>



    <div class="container">
        <h2>Doctors Form</h2>

        {!! Form::open([
            'url' => route('doctors.save-add'),
            'id' => 'doctors',
            'method' => 'post',
            'enctype' => 'multipart/form-data',
        ]) !!}

        @csrf

        <div class="form-group">
            <label>Name:</label>
            {!! Form::text('name', null, [
                'id' => 'name',
                'placeholder' => 'Enter name',
                'class' => 'form-control'
            ]) !!}
        </div>

        <div class="form-group">
            <label>Position:</label>
            {!! Form::text('position', null, [
                'id' => 'position',
                'placeholder' => 'Enter Position',
                'class' => 'form-control',
            ]) !!}
        </div>

        <div class="form-group">
            <label> Description:</label>
            {!! Form::text('description', null, [
                'id' => 'description',
                'placeholder' => 'Enter description',
                'class' => 'form-control',
            ]) !!}
        </div>

        <div class="form-group">
            <label>Number:</label>
            {!! Form::text('number', null, ['id' => 'number', 'placeholder' => 'Enter number', 'class' => 'form-control']) !!}
        </div>


        <div class="form-group">
            <label>Status:</label>
            {!! Form::select('status', ['1' => 'Active', '2' => 'Inactive'], null, [
                'id' => 'status',
                'placeholder' => 'select status',
                'class' => 'form-control',
            ]) !!}
        </div>

        {!! Form::submit('submit', ['class' => 'btn btn-primary']) !!}

        <a href="{{ route('doctors.listing') }}" class="btn btn-danger">Cancle</a>

        {!! Form::close() !!}

    </div>

    <script>
        $(document).ready(function() {
            $("#doctors").validate({
                rules: {
                    image: {
                        required: true
                    },
                    name: {
                        required: true
                    },
                    position: {
                        required: true
                    },
                    description: {
                        required: true
                    },
                    number: {
                        required: true
                    },
                    status: {
                        required: true
                    },
                },
                messages: {
                    image: {
                        required: "this field is required."
                    },
                    name: {
                        required: "this field is required."
                    },
                    position: {
                        required: "this field is required."
                    },
                    description: {
                        required: "this field is required."
                    },
                    number: {
                        required: "this field is required."
                    },
                    status: {
                        required: "this field is required.."
                    },
                }
            });
        });
    </script>

</body>

</html>
