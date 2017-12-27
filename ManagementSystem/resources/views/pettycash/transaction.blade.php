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
                        <h1 align="center"><b><u>"Your Transaction Details of The Requested Month"</u></b> </h1><br><br>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">


                        <div class="row">


                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-red">
                                    <div class="inner">

                                        <h3>{{ $carry_over_amount}}</h3>


                                        <p>Carry Over Amount Recieved</p>
                                    </div>
                                    <div class="icon">
                                        <i class=" small ion-social-usd"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">Carry Over Amount to Next Month <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>







                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-aqua">
                                    <div class="inner">

                                        <h3>{{ $deficiency_amount}}</h3>


                                        <p> Deficiency Amount Recieved</p>
                                    </div>
                                    <div class="icon">
                                        <i class=" small ion-social-usd"></i>
                                    </div>
                                    <a href="#" class="small-box-footer"> Carry Over to Deficiency Amount <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>



                            <!-- ./col -->
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-lime">
                                    <div class="inner">
                                        <h3>{{$total}}</h3>
                                        {{----}}
                                        <p>Total Recieved Payment</p>
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
                                        <h3>{{$total_payment}}</h3>
{{----}}
                                        <p>Requested Month Expense Amount</p>
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
                                <div class="small-box bg-purple">
                                    <div class="inner">
                                        <h3>{{$balance}}</h3>

                                        <p>Requested Month Balance</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion small ion-social-usd"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">Amount<i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div align="center">
                                <a  href="/pettycashb" class="btn btn-primary" name="submit">Home Page</a>
                            </div>
                        </div>


                    </div>

                </div>

                <div>






                </div>




            </div>

        </div>



    </div>





























@endsection
