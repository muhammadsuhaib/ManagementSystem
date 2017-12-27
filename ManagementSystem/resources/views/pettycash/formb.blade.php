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
                        <h1 align="center"><b><u>Petty Cash Management System "Checker Form"</u></b> </h1><br><br>
                    </div>



                    <!-- /.box-header -->
                    <div class="box-body">



                        <form method="get" action="/pettycashb">
                            {{csrf_field()}}

                            <input type="month" name="bdaymonth">

                            <input type="submit"  class="btn btn-success fa-1x" name="Search" value="Search">



                        </form><br><br><br>



                        <div class="row">
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-aqua">
                                    <div class="inner">
                                        <h3>{{$carry_over_amount}}</h3>

                                        <p>Carry Over Amount</p>
                                    </div>
                                    <div class="icon">
                                        <i class=" small ion-social-usd"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">Amount <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->

                            <!-- ./col -->
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-yellow">
                                    <div class="inner">
                                        <h3>{{$totalpayment}}</h3>

                                        <p>Total Payment</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion small ion-social-usd"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">Amount <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <!-- ./col -->
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
                                    <a href="#" class="small-box-footer">Amount<i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                        </div>






                        <form method="post" action="/pettycashb">
                            {{csrf_field()}}
                            <label for="checker_amount"> Please Enter Amount for Petty Cash System</label>
                            <input type="text" name="petty_cash_first_amount">

                            <input type="submit"  class="btn btn-success fa-1x" name="submit">



                        </form><br><br><br>


                        <table id="example1" class="table table-bordered table-striped">



                            <thead>
                            <tr>

                                <th>ID</th>
                                <th>Branch Name</th>
                                <th>Request Date</th>
                                <th>Type</th>
                                <th>Subject</th>
                                <th>Amount </th>
                                <th>Section of Expend</th>
                                <th>Note</th>
                                <th>Status</th>
                                {{--<th>Checker Approval Date</th>--}}
                                <th>Created At</th>
                                <th>Action</th>

                            </tr>
                            </thead>

                            <tbody>

                            @foreach($data as $datas)
                                <tr>
                                    <td>{{$datas->id}}</td>
                                    <td>{{$datas->branch->name}}</td>
                                    <td>{{$datas->created_at->toDateString()}}</td>
                                    <td>{{$datas->type}}</td>
                                    <td>{{$datas->subject}}</td>
                                    <td>{{$datas->amount}}</td>
                                    <td>{{$datas->department}}</td>
                                    <td>{{$datas->note}}</td>
                                    @if($datas->checker)
                                        <td>Approved</td>
                                    @else
                                        <td>Pending</td>
                                    @endif

                                    {{--<td>--}}
                                    {{--<form method="post" action="/pettycashb">--}}
                                    {{--<input type="datetime-local" name="date">--}}
                                    {{--<input type="text" id="datepicker">--}}

                                    {{--</form>--}}
                                    {{--</td>--}}

                                    <td>{{$datas->created_at->diffForHumans()}}</td>


                                    <td>
                                        <form action="{{route('pettycashb.show',$datas->id)}}" method="get">
                                            {{--                                            {{method_field('put')}}--}}
                                            {{csrf_field()}}
                                            <select name="checker">
                                                <option selected disabled>Select Option</option>
                                                <option value="1">Approve</option>
                                            </select>
                                            <input type="submit"class="btn btn-primary" value="update">
                                        </form>
                                    </td>
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
