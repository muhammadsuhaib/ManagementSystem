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
                                                    <div class="col-lg-3 col-xs-6">
                                                        <!-- small box -->
                                                        <div class="small-box bg-aqua">
                                                            <div class="inner">
                                                                {{--<h3>{{$carry_over_amount}}</h3>--}}

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
{{--                                                                <h3>{{$total_recieved_money}}<sup style="font-size: 20px"></sup></h3>--}}

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
                                                                {{--<h3>{{$totalpayment}}</h3>--}}

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
{{--                                                                <h3>{{$balance}}</h3>--}}

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
                                                <div class="col-md-4">

                                                    <div class="form-group">
                                                        <label for="Name">Subject:</label>
                                                        {{--<input type="text" class="form-control" value="{{$data->subject}}" name="subject" >--}}
                                                        <select class= "form-control" name="subject" required>
                                                                <option selected value="{{$data->subject}}">{{$data->subject}}</option>
                                                                <option value="Supply A Deficiency">Supply A Deficiency</option>
                                                                <option value="Pen">Pen</option>
                                                                <option value="Notes">Notes</option>
                                                                <option value="PrePaid Card for Mobile">PrePaid Card for Mobile</option>
                                                            </select>
                                                        </div>
                                                    </div>



                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="Name">Amount:</label>
                                                        <input type="text" value="{{$data->amount}}" class="form-control"  name="amount" >
                                                    </div>
                                                </div>


                                                <div class="col-md-4">

                                                    <label for="Name">Section of Expend</label>

                                                    <select class="form-control" name="department" >
                                                        <option selected >{{$data->department}}</option>
                                                        <@foreach($bumons as $bumon)
                                                            <option value="{{$bumon->bum06}}">{{$bumon->bum06}}</option>
                                                        @endforeach
                                                    </select>
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
                                                        <a  href="/pettycasha" class="btn btn-primary" name="submit">Back</a>







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