@include('layout.js')
@include('layout.css')
<div class="container">



    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary" style="margin-top: 2%;">

                <div class="box">
                    <div class="box-header" align="center">
                        <h3 class="box-title">Recipt</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Branch Name</th>
                                <th>Request Date</th>
                                <th>Total Recieved Money </th>
                                <th>Over Amount</th>
                                <th>Total Payment</th>
                                <th>Balance Amount Payment </th>
                                <th>Type</th>
                                <th>Subject</th>
                                <th>Amount </th>
                                <th>Section of Expend</th>
                                <th>Note</th>


                            </tr>
                            </thead>

                            <tbody>

                            {{--@foreach($data as $datas)--}}
                                {{--<tr>--}}
                                    {{--<td>{{$datas->id}}</td>--}}
                                    {{--<td>{{$datas->branch->name}}</td>--}}
                                    {{--<td>{{$datas->request_date}}</td>--}}
                                    {{--<td>{{$datas->total_recieved_money}}</td>--}}
                                    {{--<td> {{$datas->over_amount}}</td>--}}
                                    {{--<td>{{$datas->total_payment}}</td>--}}
                                    {{--<td>{{$datas->balance}}</td>--}}
                                    {{--<td>{{$datas->type}}</td>--}}
                                    {{--<td>{{$datas->subject}}</td>--}}
                                    {{--<td>{{$datas->amount}}</td>--}}
                                    {{--<td>{{$datas->department}}</td>--}}
                                    {{--<td>{{$datas->note}}</td>--}}
                                 {{--</tr>--}}
                            {{--@endforeach--}}
                            </tbody>

                        </table>
                        <a href="javascript:window.close();"> Close</a>



                    </div>

                </div>




            </div>


        </div>



    </div>


</div>