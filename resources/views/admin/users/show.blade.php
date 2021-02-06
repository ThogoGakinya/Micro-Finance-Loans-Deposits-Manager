@extends('layouts.admin')
@section('content')


    <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle"
                             width="150">
                        <div class="mt-3">
                            <h4>{{$user->name}}</h4>
                            <p class="text-secondary mb-1">Role:
                                @foreach($user->roles as $key => $item)
                                    <span class="badge badge-info">{{ $item->title }}</span>
                                @endforeach
                            </p>
                            {{--<p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
                            <button class="btn btn-primary">Follow</button>
                            <button class="btn btn-outline-primary">Message</button>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Full Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{$user->name}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{$user->email}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Phone</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            (+254) 729-100-200
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Address</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            Kilimani Area, Nairobi City - Kenya
                        </div>
                    </div>
                </div>
            </div>
            {{----}}
            <div class="card mb-3">
                <div class="card-header">
                    Recent Payments for <strong>{{$account_name}}</strong>
                </div>

                <div class="card-body">
                    <table
                        class="table table-bordered table-hover responsive ">
                        <thead>
                        <tr>
                            <th>Month</th>
                            <th>Year</th>
                            <th>Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($payments)>0)
                            @foreach($payments as $key=> $payment)
                                <tr>
                                    <td>{{ Carbon\Carbon::createFromFormat('m', $payment->month ?? '')->format('M')}}</td>
                                    <td>{{$payment->year ?? ''}}</td>
                                    <td>Ksh {{number_format($payment->amount)  ??''}}</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
