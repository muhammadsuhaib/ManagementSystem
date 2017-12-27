@extends('layout.master')
@section('body' )

    <div class="container" >
        <div class="box-body container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary" style="margin-top: 2%;">




                        <div class="row">
                            <div class="col-md-12">
                                <h1 align="center"><b><u>Petty Cash Management System "Data Entry Form"</u></b> </h1><br><br>
                                <div align="left">

                                    <form action="{{url('pettycasha/'.$data->id)}}" method="post" >
                                        {{method_field('PUT')}}
                                        {{csrf_field()}}

                                        <div class="box-body container-fluid">

                                            <div align="center" class="row" style="margin-bottom: 2%;">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="Name"> Your Branch Name </label>
                                                        <input type="text=" value="{{$data->branch->name}}"  style="width: 100%;" class="form-control" name="branch_id" disabled>
                                                        <input type="text=" value="{{$data->branch_id}}"  name="branch_id" hidden>
                                                    </div>
                                                </div>
                                            </div>






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

                                                                <p>Will be Carry Over to Next Month</p>
                                                            </div>
                                                            <div class="icon">
                                                                <i class="ion small ion-social-usd"></i>
                                                            </div>
                                                            <a href="#" class="small-box-footer">Amount <i
                                                                        class="fa fa-arrow-circle-right"></i></a>
                                                        </div>
                                                    </div>
                                                @endif




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






                                            <div class="row" style="margin-bottom: 2%;">

                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label for="ID">ID:</label><br>
                                                        <input type="text=" value="{{$data->id}}"  style="width: 100%;" class="form-control" name="id" disabled>
                                                    </div>

                                                </div>

                                                <div class="col-md-6">


                                                    <div class="form-group">
                                                        <label for="Name" >Type:</label>
                                                        <select class="form-control" name="type" >

                                                            <option selected >{{$data->type}}</option>
                                                            @foreach($types as $type)

                                                                <option value="{{$type->Type}}">{{$type->Type}}</option>
                                                            @endforeach
                                                        </select>

                                                    </div>

                                                </div>


                                            </div>





                                            <div class="row"  style="margin-bottom: 2%;">



                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="Name">Subject</label>
                                                        <input type="text" value="{{$data->subject}}" class="form-control"  name="subject" >
                                                    </div>
                                                </div>



                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="Name">Amount:</label>
                                                        <input type="text" value="{{$data->amount}}" class="form-control"  name="amount" >
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row"  style="margin-bottom: 2%;">
                                                <div class="col-md-6">

                                                    <label for="Name">Section of Expend</label>

                                                    <select class="form-control" name="department" >
                                                        <option selected >{{$data->department}}</option>
                                                        <@foreach($bumons as $bumon)
                                                            <option value="{{$bumon->bum06}}">{{$bumon->bum06}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>





                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="Name">Purchasing Date</label>
                                                        <input type="date" value="{{$data->purchasing_date}}" class="form-control"  name="purchasing_date" >
                                                    </div>
                                                </div>





                                            </div>









                                            <div align="center" class="row"  style="margin-bottom: 2%;">


                                                <div class="col-md-12">


                                                    <div class="form-group">
                                                        <label for="Name">Note:</label>
                                                        <input type="text-area" class="form-control" name="note" required value="{{$data->note}}">

                                                    </div>

                                                </div>


                                            </div>


                                            <div class="row"  style="margin-bottom: 2%;">

                                                <div align="center">

                                                    <button type="submit" class="btn btn-success" name="submit">Update</button>
                                                    <a  href="/pettycash/managementsystem/public/pettycasha" class="btn btn-primary" name="submit">Back</a>







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
    </div>







@endsection