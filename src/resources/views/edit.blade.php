<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Laravel Package</title>
    <style>
        .c-required{
            color: red;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit user</h3>
                            <a class="text-right" href="{{ url('package') }}">Back</a>
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if (isset($errors) && (!empty($errors->any())))
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <form action="{{ url('package/update') }}" id="sales_tracker" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <input type="hidden" name="uuid" value="{{ base64_encode(base64_encode($data->id))}}">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="label_for_sales_by">Entry By</label>
                                            <select class="form-control" name="entry_by">
                                                <option value="020123" {{ ((isset($data->entry_by) && $data->entry_by == 020123)) ? "selected" : ""; }}>USER 1</option>
                                                <option value="030123" {{ ((isset($data->entry_by) && $data->entry_by == 030123)) ? "selected" : ""; }}>USER 2</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="label_for_user_name"><span class="c-required">* </span>Name</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ (isset($data->name) && !empty($data->name)) ? $data->name : ''; }}" placeholder="Enter Your Name">
                                        </div>
                                    </div>


                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="label_for_user_phone"><span class="c-required">*
                                                </span>Phone</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="phone_prefix">880</span>
                                                </div>
                                                <input type="text" class="form-control" id="phone" name="phone"
                                                    value="{{ (isset($data->phone) && !empty($data->phone)) ? $data->phone : ''; }}" placeholder="17xxxxxxxx">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="label_for_user_email"><span class="c-required">*
                                                </span>Email</label>
                                            <input type="email" class="form-control" id="email"
                                                name="email" value="{{ (isset($data->email) && !empty($data->email)) ? $data->email : ''; }}" placeholder="Enter Your Email">
                                        </div>
                                    </div>
                                </div>




                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
