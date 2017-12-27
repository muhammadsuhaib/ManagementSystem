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
                        <h1 align="center"><b><u>"Please Approve Current Month Amount"</u></b> </h1><br><br>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">


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
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-green">
                                    <div class="inner">
                                        <h3>{{$deficiency_amount}}<sup style="font-size: 20px"></sup></h3>

                                        <p>Deficiency</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion small ion-social-usd"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">Amount <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <br><br><br><br><br><br><br><br>
                            <!-- ./col -->


                            {{--@if($datas->accountant == 0)--}}
                    @foreach($data as $datas)
                                <form action="{{route('request.show',$datas->id)}}" method="get">
                                @endforeach    {{--                                            {{method_field('put')}}--}}
                                    {{csrf_field()}}
                                    <select name="checker">
                                        <option selected disabled>Select Option</option>
                                        <option value="1">Approve</option>
                                        <option value="2">Reject</option>
                                        <option value="0">Clear</option>
                                    </select>
                                   <input type="submit"class="btn btn-primary" value="UPDATE">
                                    <a href="/pettycashb" class="btn btn-primary"> Home</a>
                                </form>

                            <!-- ./col -->
                        </div>


                    </div>

                </div>

                <div>






                </div>




            </div>

        </div>



    </div>

@endsection
