@extends('layout.master')




<script src="https://datatables.yajrabox.com/js/jquery.min.js"></script>
<script src="https://datatables.yajrabox.com/js/bootstrap.min.js"></script>
<script src="https://datatables.yajrabox.com/js/jquery.dataTables.min.js"></script>
<script src="https://datatables.yajrabox.com/js/datatables.bootstrap.js"></script>
<script src="https://datatables.yajrabox.com/js/handlebars.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mark.js/8.0.0/jquery.mark.min.js"></script>

@section('body')


    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary" style="margin-top: 2%;">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 align="center"><b><u>Petty Cash Management System "Data Entry Form"</u></b></h1><br><br>
                            <div align="left">

                                <form method="post" action="/pettycasha" id="myForm">
                                    {{csrf_field()}}

                                    <div class="box-body container-fluid">

                                        <div align="center" class="row" style="margin-bottom: 2%;">

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


                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="Name">Your Branch Name</label>
                                                    <input type="text" disabled value="{{$branch->name}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>


                                        <!-- Small boxes (Stat box) -->



                                        <div class="row">
                                            @if  ( $check_previous_data_count <1)
                                                <div class="col-lg-3 col-xs-6">
                                                    <!-- small box -->
                                                    <div class="small-box bg-fuchsia">
                                                        <div class="inner">

                                                            {{--@foreach($transactions as $transaction)--}}

                                                            <h3>{{$opening_amount ? $opening_amount : ''}}</h3>
                                                            {{--                                                        <h3>{{$opening_amount ? $opening_amount : ''}}</h3>--}}

                                                            <p>Openning Amount </p>
                                                        </div>
                                                        <div class="icon">
                                                            <i class=" small ion-social-usd"></i>
                                                        </div>
                                                        <a href="#" class="small-box-footer">Amount <i
                                                                    class="fa fa-arrow-circle-right"></i></a>
                                                    </div>
                                                </div>
                                            @endif





                                            @if  ( $check_previous_data_count >0)
                                                <div class="col-lg-3 col-xs-6">
                                                    <!-- small box -->
                                                    <div class="small-box bg-aqua-gradient">
                                                        <div class="inner">

                                                            @if(!$checker_status)
                                                                <h3>Pending</h3>
                                                            @else
                                                                <h3>{{$carry_payment}}</h3>

                                                            @endif

                                                            <p>Carry Payment </p>
                                                        </div>
                                                        <div class="icon">
                                                            <i class=" small ion-social-usd"></i>
                                                        </div>
                                                        <a href="#" class="small-box-footer">Amount <i
                                                                    class="fa fa-arrow-circle-right"></i></a>
                                                    </div>
                                                </div>




                                            @else

                                                <div class="col-lg-3 col-xs-6">
                                                    <!-- small box -->
                                                    <div class="small-box bg-aqua-gradient">
                                                        <div class="inner">


                                                            <h3>0</h3>


                                                            <p>Carry Payment </p>
                                                        </div>
                                                        <div class="icon">
                                                            <i class=" small ion-social-usd"></i>
                                                        </div>
                                                        <a href="#" class="small-box-footer">Amount <i
                                                                    class="fa fa-arrow-circle-right"></i></a>
                                                    </div>
                                                </div>

                                            @endif


                                            @if  ( $check_previous_data_count >0)

                                                <div class="col-lg-3 col-xs-6">
                                                    <!-- small box -->
                                                    <div class="small-box bg-maroon-active">
                                                        <div class="inner">

                                                            @if(!$checker_status)
                                                                <h3>Pending</h3>
                                                            @else
                                                                <h3>{{$deficiency_payment}}</h3>
                                                            @endif
                                                            <p>Deficiency Payment Recieved </p>
                                                        </div>
                                                        <div class="icon">
                                                            <i class=" small ion-social-usd"></i>
                                                        </div>
                                                        <a href="#" class="small-box-footer">Amount <i
                                                                    class="fa fa-arrow-circle-right"></i></a>
                                                    </div>
                                                </div>





                                            @else


                                                <div class="col-lg-3 col-xs-6">
                                                    <!-- small box -->
                                                    <div class="small-box bg-maroon-active">
                                                        <div class="inner">


                                                            <h3>0</h3>

                                                            <p>Deficiency Payment Recieved </p>
                                                        </div>
                                                        <div class="icon">
                                                            <i class=" small ion-social-usd"></i>
                                                        </div>
                                                        <a href="#" class="small-box-footer">Amount <i
                                                                    class="fa fa-arrow-circle-right"></i></a>
                                                    </div>
                                                </div>

                                            @endif



                                            @if  ( $check_previous_data_count >0)
                                                <div class="col-lg-3 col-xs-6">
                                                    <!-- small box -->
                                                    <div class="small-box bg-green">
                                                        <div class="inner">
                                                            @if(!$checker_status)
                                                                <h3>Pending </h3>
                                                            @else
                                                                <h3>{{$opening_amount}}</h3>
                                                            @endif

                                                            <p>Total Recieved This Month</p>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="ion small ion-social-usd"></i>
                                                        </div>
                                                        <a href="#" class="small-box-footer">Amount <i
                                                                    class="fa fa-arrow-circle-right"></i></a>
                                                    </div>
                                                </div>
                                            @endif


                                            @if  ( $check_previous_data_count >0)

                                                <div class="col-lg-3 col-xs-6">
                                                    <!-- small box -->
                                                    <div class="small-box bg-yellow">
                                                        <div class="inner">
                                                            @if(!$checker_status)
                                                                <h3>Pending </h3>
                                                            @else
                                                                <h3>{{$totalpayment}}</h3>
                                                            @endif
                                                            <p>Approved Current Month</p>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="ion small ion-social-usd"></i>
                                                        </div>
                                                        <a href="#" class="small-box-footer"> Total Amount <i
                                                                    class="fa fa-arrow-circle-right"></i></a>
                                                    </div>
                                                </div>

                                            @else
                                                <div class="col-lg-3 col-xs-6">
                                                    <!-- small box -->
                                                    <div class="small-box bg-yellow">
                                                        <div class="inner">

                                                            <h3>{{$totalpayment}}</h3>

                                                            <p>Approved Current Month</p>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="ion small ion-social-usd"></i>
                                                        </div>
                                                        <a href="#" class="small-box-footer"> Total Amount <i
                                                                    class="fa fa-arrow-circle-right"></i></a>
                                                    </div>
                                                </div>
                                            @endif


                                            @if  ( $check_previous_data_count >0)

                                                <div class="col-lg-3 col-xs-6">
                                                    <!-- small box -->
                                                    <div class="small-box bg-red">
                                                        <div class="inner">
                                                            @if(!$checker_status)
                                                                <h3>Pending </h3>
                                                            @else
                                                                <h3>{{$balance2}}</h3>
                                                            @endif
                                                            <p>Balance</p>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="ion small ion-social-usd"></i>
                                                        </div>
                                                        <a href="#" class="small-box-footer">Amount<i
                                                                    class="fa fa-arrow-circle-right"></i></a>
                                                    </div>
                                                </div>
                                        </div>


                                        @else

                                            <div class="col-lg-3 col-xs-6">
                                                <!-- small box -->
                                                <div class="small-box bg-red">
                                                    <div class="inner">
                                                        <h3>{{$balance}}</h3>

                                                        <p>Balance</p>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="ion small ion-social-usd"></i>
                                                    </div>
                                                    <a href="#" class="small-box-footer">Amount<i
                                                                class="fa fa-arrow-circle-right"></i></a>
                                                </div>
                                            </div>
                                    </div>

                                    @endif

















                                    <div class="row" style="margin-bottom: 2%;">


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Name">Type:</label>
                                                <select class="form-control" name="type" required>
                                                    <option selected disabled>Select</option>
                                                    @foreach($types as $type)
                                                        <option value="{{$type->Type}}">{{$type->Type}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>





                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Name">Subject</label>
                                                <input type="text" class="form-control" name="subject" required>
                                            </div>

                                        </div>










                                        <div class="row" style="margin-bottom: 2%;">


                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Name">Amount:</label>
                                                <input type="text" class="form-control" name="amount" required>
                                            </div>

                                        </div>


                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="Name">Section of Expend</label>
                                                <select class="form-control" name="department" required>
                                                    <option selected disabled>Select</option>
                                                    @foreach($bumons as $bumon)
                                                        <option value="{{$bumon->bum06}}">{{$bumon->bum06}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div align="center" class="row" style="margin-bottom: 2%;">


                                        <div class="col-md-6">


                                            <div class="form-group">
                                                <label for="Name">Note:</label>
                                                <input type="text-area" class="form-control" name="note" required>
                                            </div>

                                        </div>


                                        <div class="col-md-6">


                                            <div class="form-group">
                                                <label for="Name">Purchasing Date:</label>
                                                <input type="date" class="form-control" name="purchasing_date" required>
                                            </div>

                                        </div>





                                    </div>


                                    <div class="row" style="margin-bottom: 2%;">


                                        <div class="row" style="margin-bottom: 2%;">

                                            <div align="center">

                                                <button type="submit" class="btn btn-success fa-1x" name="submit">
                                                    Submit
                                                </button>

                                                {{--<input type=button onClick="javascript: w=window.open('/print'); w.print();" class="btn btn-default" value='Print All'>--}}

                                                <input type="button" onclick="myFunctions()" value="New"
                                                       class="btn btn-default fa-1x">


                                            </div>


                                        </div>


                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    {{--<div class="container">--}}
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary" style="margin-top: 2%;">

                <div class="box">
                    <div class="box-header" align="center">
                        <h3 class="box-title">Detailed Data</h3><br>
                        <h3 class="box-title">Kawai Shoji Group</h3><br>
                        <h3 class="box-title">Petty Cash Management System</h3><br>
                        <h3 class="box-title">Your Branch {{$branch->name}}</h3><br>
                    </div><!-- /.box-header -->
                    <div class="box-body">

                        <table class="table table-bordered table-striped" id="users-table">

                            <thead>

                            <tr>
                                <th>ID</th>
                                <th>Branch Name</th>
                                <th>Purchasing Date</th>
                                {{--<th>Total Recieved Money </th>--}}
                                {{--<th>Over Amount</th>--}}
                                {{--<th>Total Payment</th>--}}
                                {{--<th>Balance Amount Payment </th>--}}
                                <th>Type</th>
                                <th>Subject</th>
                                <th>Amount</th>
                                <th>Section of Expend</th>
                                <th>Note</th>
                                <th>Requested Date</th>
                                <th>Checker Status</th>
                                <th>Accountant Status</th>
                                <th>Edit</th>
                                <th>Print</th>
                                <th>Delete</th>

                            </tr>
                            </thead>

                            <tbody>

                            @foreach($data as $datas)
                                <tr>
                                    <td>{{$datas->id}}</td>
                                    <td>{{$datas->branch->name}}</td>
                                    {{--                                        <td>{{$datas->created_at->toDateString()}}</td>--}}
                                    <td>{{$datas->purchasing_date}}</td>
                                    {{--<td>{{$datas->total_recieved_money}}</td>--}}
                                    {{--<td> {{$datas->over_amount}}</td>--}}
                                    {{--<td>{{$datas->total_payment}}</td>--}}
                                    {{--<td>{{$datas->balance}}</td>--}}
                                    <td>{{$datas->type}}</td>
                                    <td>{{$datas->subject}}</td>
                                    <td>{{$datas->amount}}</td>
                                    <td>{{$datas->department}}</td>
                                    <td>{{$datas->note}}</td>
                                    <td>{{$datas->created_at->toDateString()}}</td>


                                    @if($datas->checker == 2)
                                        <td>
                                            <button disabled class="btn btn-danger">Rejected</button>
                                        </td>
                                    @elseif($datas->checker)
                                        <td>
                                            <button disabled class="btn btn-success">Approved</button>
                                        </td>
                                    @else

                                        <td>
                                            <button disabled class="btn btn-warning">Pending</button>
                                        </td>
                                    @endif



                                    @if($datas->accountant == 2)
                                        <td>
                                            <button disabled class="btn btn-danger">Rejected</button>
                                        </td>
                                    @elseif($datas->accountant)
                                        <td>
                                            <button disabled class="btn btn-success">Approved</button>
                                        </td>
                                    @else
                                        <td>
                                            <button disabled class="btn btn-warning">Pending</button>
                                        </td>
                                    @endif


                                    <td>
                                        @if($datas->checker == 1 || $datas->checker == 2)
                                            {!! Form::open(['url'=>['pettycasha/'.$datas->id.'/edit'],'method'=>'GET'])  !!}
                                            {{ Form::button(
                                                '<span class="glyphicon glyphicon-edit -sign fa-2x"></span>',
                                                array(
                                                'disabled',
                                                'class'=>'btn btn-info',
                                                'type'=>'submit'))
                                                }}
                                            {!! Form::close() !!}


                                            {{--<button disabled type="button" class="btn btn-danger" class="btn btn-info "  onclick="('{{url('pettycasha/'.$datas->id.'/edit')}}')"><i class=" glyphicon glyphicon-edit fa-2x"></i></button>--}}

                                        @else

                                            {!! Form::open(['url'=>['pettycasha/'.$datas->id.'/edit'],'method'=>'GET'])  !!}
                                            {{ Form::button(
                                                '<span class="glyphicon glyphicon-edit -sign fa-2x"></span>',
                                                array(
                                                'class'=>'btn btn-info',
                                                'type'=>'submit'))
                                                }}
                                            {!! Form::close() !!}

                                            {{--<button type="button" class="glyphicon glyphicon-edit" class="btn btn-info "  onclick="('{{url('pettycasha/'.$datas->id.'/edit')}}')"><i class=" glyphicon glyphicon-edit fa-2x"></i></button>--}}
                                        @endif

                                    </td>

                                    <td>
                                        @if($datas->checker == 1 || $datas->checker == 2)
                                            <button disabled class="btn btn-danger"><i
                                                        class="glyphicon glyphicon-print fa-2x"></i></button>

                                        @else
                                            <button class="btn btn-success"
                                                    onClick="javascript: w=window.open('{{url('forma/'.$datas->id.'/print')}}'); w.print();">
                                                <i class="glyphicon glyphicon-print fa-2x"></i></button>

                                        @endif
                                    </td>


                                    <td>
                                        @if($datas->checker == 1 || $datas->checker == 2)


                                            {!! Form::open (['url'=>['pettycasha/'.$datas->id],'method'=>'DELETE', 'onsubmit' => 'return ConfirmDelete()']) !!}

                                            {!! Form::hidden('case_id', $datas->id, ['class' => 'form-control']) !!}

                                            {!! Form::button('<i class="glyphicon glyphicon-trash fa-2x"></i>', array('type' => 'submit', 'class' => 'btn btn-danger','disabled',)) !!}

                                            {!! Form::close() !!}






                                        @else
                                            <script>

                                                function ConfirmDelete() {
                                                    var x = confirm("Are you sure you want to delete?");

                                                    if (x)
                                                        return true;
                                                    else
                                                        return false;
                                                }

                                            </script>
                                            {!! Form::open (['url'=>['pettycasha/'.$datas->id],'method'=>'DELETE', 'onsubmit' => 'return ConfirmDelete()']) !!}

                                            {!! Form::hidden('case_id', $datas->id, ['class' => 'form-control']) !!}

                                            {!! Form::button('<i class="glyphicon glyphicon-trash fa-2x"></i>', array('type' => 'submit', 'class' => 'btn btn-danger',)) !!}

                                            {!! Form::close() !!}

                                        @endif
                                    </td>


                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    {{--datatable--}}














    <script>
        $('#users-table').DataTable();
    </script>


@endsection


{{--<script type="text/javascript">--}}



        {{--$.ajaxSetup({--}}
            {{--headers: {--}}
                {{--'X-CSRF-TOKEN': $('meta[name="csrf-token"]').--}}
                {{--attr('content')--}}
            {{--}--}}
        {{--})--}}

                {{--$('#login-form').submit(function(event) {--}}
                     {{--event.preventDefault()--}}

                 {{--var postData=--}}
                               {{--{--}}
                    {{--'type':$( 'select[name=type]').val(),--}}
                    {{--'department':$( 'select[name=department]').val(),--}}
                    {{--'subject':$('input[name=subject]').val() ,--}}
                    {{--'amount':$('input[name=amount]').val() ,--}}
                    {{--'note':$('input[name=note]').val() ,--}}
                    {{--'purchasing_date':$('input[name=purchasing_date]').val() ,--}}
                               {{--}--}}


            {{--$.ajax({--}}
                {{--type:   'POST',--}}
                {{--url:    '/pettycasha',--}}
                {{--data: postData,--}}
                {{--success: function(response){--}}
{{--//                  window.location.href = response.redirect--}}
{{--//                  console.log(response)--}}
                {{--},--}}

                {{--error: function(response){--}}
                    {{--$('alert-danger').text(response.responseJSON.error)--}}
                    {{--$('alert-danger').show()--}}
{{--///--}}

                {{--},--}}



            {{--})--}}


        {{--})--}}

    {{--</script>--}}
