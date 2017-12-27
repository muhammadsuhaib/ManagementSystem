@extends('layout.master')
@section('body')


    {{--datatable--}}



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

                            <input type="submit"  class="btn btn-success fa-1x" name="Search">



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
                                    <a href="#" class="small-box-footer">Amount<i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-green">
                                    <div class="inner">
                                        <h3>{{$total_recieved_money}}<sup style="font-size: 20px"></sup></h3>

                                        <p>Total Reveived</p>
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
                                <div class="small-box bg-yellow">
                                    <div class="inner">
                                        <h3>{{$totalpayment}}</h3>

                                        <p>Total Payment</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion small ion-social-usd"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">Amount<i class="fa fa-arrow-circle-right"></i></a>
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




                                <div class="col-lg-3 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-maroon-active">
                                        <div class="inner">
                                            <h3>{{$search}}</h3>

                                            <p>Requested Month Total Amount </p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-social-usd"></i>
                                        </div>
                                        <a href="#" class="small-box-footer">Requested Month Total Amount <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>














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
                                    @if($datas->accountant)
                                        <td>Approved</td>
                                    @else
                                        <td>Pending</td>
                                    @endif
                                    <td>
                                        @if($datas->accountant != null )
                                        <button disabled class="btn btn-danger">Approved</button>
                                    @else
                                            <form action="{{route('pettycashc.show',$datas->id)}}" method="get">
                                                {{--                                            {{method_field('put')}}--}}
                                                {{csrf_field()}}
                                                <select name="accountant">
                                                    <option selected disabled>Select Option</option>
                                                    <option value="1">Approve</option>
                                                    </select>
                                                <input type="submit" class="btn btn-primary" value="update">
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
