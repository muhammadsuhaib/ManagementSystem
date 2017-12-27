@extends('layout.master')
@section('body')



    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary" style="margin-top: 2%;">

                <div class="box">
                    <div class="box-header" align="center">
                        <h1 align="center"><b><u>Petty Cash Management System "Accountant"</u></b> </h1><br><br>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">



                        <form method="post" action="/pettycashc">
                            {{csrf_field()}}

                            <input type="month" name="bdaymonth">

                            <input type="submit"  class="btn btn-success fa-1x" name="submit">



                        </form><br><br><br>







                        {{--<div class="row">--}}
                            {{--<div class="col-lg-3 col-xs-6">--}}
                                {{--<!-- small box -->--}}
                                {{--<div class="small-box bg-aqua">--}}
                                    {{--<div class="inner">--}}
                                        {{--<h3>{{$carry_over_amount}}</h3>--}}

                                        {{--<p>Carry Over Amount</p>--}}
                                    {{--</div>--}}
                                    {{--<div class="icon">--}}
                                        {{--<i class=" small ion-social-usd"></i>--}}
                                    {{--</div>--}}
                                    {{--<a href="#" class="small-box-footer">Amount<i class="fa fa-arrow-circle-right"></i></a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<!-- ./col -->--}}
                            {{--<div class="col-lg-3 col-xs-6">--}}
                                {{--<!-- small box -->--}}
                                {{--<div class="small-box bg-green">--}}
                                    {{--<div class="inner">--}}
                                        {{--<h3>{{$opening_amount ? $opening_amount : ''}}<sup style="font-size: 20px"></sup></h3>--}}

                                        {{--<p>Total Reveived</p>--}}
                                    {{--</div>--}}
                                    {{--<div class="icon">--}}
                                        {{--<i class="ion small ion-social-usd"></i>--}}
                                    {{--</div>--}}
                                    {{--<a href="#" class="small-box-footer">Amount <i class="fa fa-arrow-circle-right"></i></a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<!-- ./col -->--}}
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-yellow">
                                    <div class="inner">
                                        <h3>{{$total_payment}}</h3>

                                        <p>Total Aprroved Current Month</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion small ion-social-usd"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">Total Payment<i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            {{--<!-- ./col -->--}}
                            {{--<div class="col-lg-3 col-xs-6">--}}
                                {{--<!-- small box -->--}}
                                {{--<div class="small-box bg-red">--}}
                                    {{--<div class="inner">--}}
                                        {{--<h3>{{$balance}}</h3>--}}

                                        {{--<p>Balance</p>--}}
                                    {{--</div>--}}
                                    {{--<div class="icon">--}}
                                        {{--<i class="ion small ion-social-usd"></i>--}}
                                    {{--</div>--}}
                                    {{--<a href="#" class="small-box-footer">Amount<i class="fa fa-arrow-circle-right"></i></a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<!-- ./col -->--}}















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
                                    <th>Checker Status</th>
                                    <th>Accountant Status</th>
                                    <th>Actions</th>

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

                                        @if($datas->checker == 2)
                                            <td> <button disabled class="btn btn-danger">Rejected</button></td>
                                        @elseif($datas->checker == 1)
                                            <td> <button disabled class="btn btn-success">Approved</button></td>
                                        @else

                                            <td> <button disabled class="btn btn-warning">Pending</button></td>
                                        @endif




                                        @if($datas->accountant == 2)
                                            <td> <button disabled class="btn btn-danger">Rejected</button></td>
                                        @elseif($datas->accountant)
                                            <td> <button disabled class="btn btn-success">Approved</button></td>
                                        @else

                                            <td> <button disabled class="btn btn-warning">Pending</button></td>
                                        @endif


                                        <td>




                                            @if($datas->accountant == 1 )
                                                <form  action="{{route('pettycashc.show',$datas->id)}}" method="get">
                                                    {{method_field('put')}}
                                                    {{csrf_field()}}
                                                    <select name="accountant" required hidden>
                                                        <option value="0">Clear</option>
                                                    </select>
                                                    <input required type="submit" class="btn btn-danger" value="Clear">
                                                </form>



                                            @else
                                                <form action="{{route('pettycashc.show',$datas->id)}}" method="get">
                                                    {{method_field('put')}}
                                                    {{csrf_field()}}
                                                    <select name="accountant">
                                                        <option value="1">Approve</option>
                                                        <option value="2">Reject</option>
                                                    </select>
                                                    <input required type="submit" class="btn btn-primary" value="Update">
                                                </form>
                                        @endif





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



























    </div>

@endsection
