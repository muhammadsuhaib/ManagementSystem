@extends('layout.master')

@include('layout.searchjs')
@include('layout.searchcss')

@section('body')

    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary" style="margin-top: 2%;">

                    <div class="row">

                        <div class="col-md-6">
                            <div align="right">

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div align="left">

                            </div>
                        </div>
                    </div>

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


                                     @if  ( $check_previous_data_count<1)
                                         {


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

                                }@endif

                                            <div class="col-lg-3 col-xs-6">
                                                <!-- small box -->
                                                <div class="small-box bg-aqua-gradient">
                                                    <div class="inner">

                                            @if(!$checker_status)
                                                        <h3>Pending Request</h3>
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




                                            <div class="col-lg-3 col-xs-6">
                                                <!-- small box -->
                                                <div class="small-box bg-maroon-active">
                                                    <div class="inner">

                                                        @if(!$checker_status)
                                                            <h3>Pending Request</h3>
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


                                            <div class="col-lg-3 col-xs-6">
                                                <!-- small box -->
                                                <div class="small-box bg-green">
                                                    <div class="inner">
                                                        <h3>{{$opening_amount}}<sup style="font-size: 20px"></sup></h3>

                                                        <p>Will be Carry Over to Next Month</p>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="ion small ion-social-usd"></i>
                                                    </div>
                                                    <a href="#" class="small-box-footer">Amount <i
                                                                class="fa fa-arrow-circle-right"></i></a>
                                                </div>
                                            </div>




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


                                            {{--<div class="col-lg-3 col-xs-6">--}}
                                                {{--<!-- small box -->--}}
                                                {{--<div class="small-box bg-orange">--}}
                                                    {{--<div class="inner">--}}
                                                        {{--<h3>{{$balance}}</h3>--}}

                                                        {{--<p>Carry Over From Previous Month</p>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="icon">--}}
                                                        {{--<i class="ion small ion-social-usd"></i>--}}
                                                    {{--</div>--}}
                                                    {{--<a href="#" class="small-box-footer">Amount<i--}}
                                                                {{--class="fa fa-arrow-circle-right"></i></a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}




                                            {{--<div class="col-lg-3 col-xs-6">--}}
                                                {{--<!-- small box -->--}}
                                                {{--<div class="small-box bg-blue">--}}
                                                    {{--<div class="inner">--}}
                                                        {{--<h3>{{$totalpayment}}</h3>--}}

                                                        {{--<p>Defiency in Carry Over Amount</p>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="icon">--}}
                                                        {{--<i class="ion small ion-social-usd"></i>--}}
                                                    {{--</div>--}}
                                                    {{--<a href="#" class="small-box-footer">Amount<i--}}
                                                                {{--class="fa fa-arrow-circle-right"></i></a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}



                                            {{--<div class="col-lg-3 col-xs-6">--}}
                                                {{--<!-- small box -->--}}
                                                {{--<div class="small-box bg-blue">--}}
                                                    {{--<div class="inner">--}}
                                                        {{--<h3>{{$totalpayment}}</h3>--}}

                                                        {{--<p>Defiency Amount Recieved</p>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="icon">--}}
                                                        {{--<i class="ion small ion-social-usd"></i>--}}
                                                    {{--</div>--}}
                                                    {{--<a href="#" class="small-box-footer">Amount<i--}}
                                                                {{--class="fa fa-arrow-circle-right"></i></a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}



                                            <!-- ./col -->









                                            {{--<div class="col-lg-3 col-xs-6">--}}
                                                {{--<!-- small box -->--}}
                                                {{--<div class="small-box bg-orange">--}}
                                                    {{--<div class="inner">--}}
                                                        {{--<h3>{{$balance}}</h3>--}}

                                                        {{--<p>Carry Over From Previous Month</p>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="icon">--}}
                                                        {{--<i class="ion small ion-social-usd"></i>--}}
                                                    {{--</div>--}}
                                                    {{--<a href="#" class="small-box-footer">Amount<i--}}
                                                                {{--class="fa fa-arrow-circle-right"></i></a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}


                                            <!-- ./col -->

                                            <!-- ./col -->

                                            <!-- ./col -->







                                        </div>




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
                                                    <label for="Name">Subject:</label>
                                                    <select class="form-control" name="subject" required>
                                                        <option selected disabled>Select Subject</option>
                                                        <option value="Supply A Deficiency">Supply A Deficiency</option>
                                                        <option value="Pen">Pen</option>
                                                        <option value="Notes">Notes</option>
                                                        <option value="PrePaid Card for Mobile">PrePaid Card for
                                                            Mobile
                                                        </option>
                                                    </select>
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


                                            <div class="col-md-12">


                                                <div class="form-group">
                                                    <label for="Name">Note:</label>
                                                    <input type="text-area" class="form-control" name="note" required>
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

    <div class="container">


        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary" style="margin-top: 2%;">

                    <div class="box">
                        <div class="box-header" align="center">
                            <h3 class="box-title">Detailed Data</h3><br>
                            <h3 class="box-title">Kawai Shoji Group</h3><br>
                            <h3 class="box-title">Petty Cash Management System</h3><br>
                            <h3 class="box-title">Your Branch {{$branch->name}}</h3><br>
                        </div>


                        <!-- /.box-header -->
                        <div class="box-body">

                            <table class="table table-bordered table-striped">

                                <thead>

                                <tr>
                                    <th>ID</th>
                                    <th>Branch Name</th>
                                    <th>Request Date</th>
                                    {{--<th>Total Recieved Money </th>--}}
                                    {{--<th>Over Amount</th>--}}
                                    {{--<th>Total Payment</th>--}}
                                    {{--<th>Balance Amount Payment </th>--}}
                                    <th>Type</th>
                                    <th>Subject</th>
                                    <th>Amount</th>
                                    <th>Section of Expend</th>
                                    <th>Note</th>
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
                                        <td>{{$datas->created_at->toDateString()}}</td>
                                        {{--<td>{{$datas->total_recieved_money}}</td>--}}
                                        {{--<td> {{$datas->over_amount}}</td>--}}
                                        {{--<td>{{$datas->total_payment}}</td>--}}
                                        {{--<td>{{$datas->balance}}</td>--}}
                                        <td>{{$datas->type}}</td>
                                        <td>{{$datas->subject}}</td>
                                        <td>{{$datas->amount}}</td>
                                        <td>{{$datas->department}}</td>
                                        <td>{{$datas->note}}</td>


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



                                        @if($datas->accountant)
                                            <td>
                                                <button disabled class="btn btn-danger">Approved</button>
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


















@endsection
