@extends('layout.master')


<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>


@section('body')


    {{--datatable--}}



    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary" style="margin-top: 2%;">

                <div class="box">
                    <div class="box-header" align="center">
                        <h1 align="center"><b><u>Opening Amount for Employees</u></b></h1><br><br>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <div class="col-md-12">
                            <div class="form-group">


                                <div align="center">
                                    @if(session('success'))
                                        <div class="alert alert-success">

                                            <h4>{{session('success')}}</h4>

                                        </div>
                                    @endif
                                </div>

                                <div align="center">
                                    @if(session('update'))
                                        <div class="alert alert-info">

                                            <h4>{{session('update')}}</h4>

                                        </div>
                                    @endif
                                </div>


                                <div align="center">
                                    @if(session('delete'))
                                        <div class="alert alert-danger">

                                            <h4>{{session('delete')}}</h4>

                                        </div>
                                    @endif
                                </div>


                            </div>
                        </div>


                        <form method="post" action="/openingamount" id="myForm">
                            {{csrf_field()}}

                            <div class="row" style="margin-bottom: 2%;">


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Name">Employees:</label>
                                        <select class="form-control" name="user_id" required>
                                            <option selected disabled>Select</option>
                                            @foreach($employees as $emp)
                                                <option value="{{$emp->id}}">{{$emp->first_name}}
                                                    | {{$emp->last_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Name">Opening Amount:</label>
                                        <input type="text" class="form-control" name="opening_amount" required>
                                    </div>

                                </div>

                            </div>

                            <div class="row" style="margin-bottom: 2%;">


                                <div class="row" style="margin-bottom: 2%;">

                                    <div align="center">

                                        <button type="submit" class="btn btn-success fa-1x" name="submit">
                                            Submit
                                        </button>

                                    </div>
                                </div>
                            </div>

                        </form>


                        <table id="example1" class="table table-bordered table-striped">


                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Employee</th>
                                <th>Opening Amount</th>
                            </tr>
                            </thead>

                            <tbody>

                            @foreach($data as $d)
                                <tr>
                                    <td>{{$d->date}}</td>
                                    <td>{{$d->first_name}} | {{$d->last_name}}</td>
                                    <td>{{$d->opening_amount}}</td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>

                </div>

                <div>


                </div>


            </div>


        </div>


    </div>





























@endsection
