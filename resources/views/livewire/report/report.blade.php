<div>
    <!-- main-content -->
    <div class="main-content">
        <!-- main-content-wrap -->
        <div class="main-content-inner">
            <!-- main-content-wrap -->
            <div class="main-content-wrap">
                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                    <h3>Reservations Report</h3>
                    <!-- Success Message -->
                    @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif

                    <!-- Error Message -->
                    @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif

                </div>


                <div>

                    <div class="col-12 mb-20">
                        <div class="wg-box">


                            <form action="" class="row" method="POST">
                                <div class="col-xl-6 mb-20">
                                    <div>
                                        <h5 class="mb-16">Form </h5>

                                        <div class="">
                                            <input type="date" wire:model.live="from">
                                        </div>

                                    </div>
                                </div>
                                <div class="col-xl-6 mb-20">
                                    <div>
                                        <h5 class="mb-16">To</h5>

                                        <div class="">
                                            <input type="date" wire:model.live="to" min="{{$from}}">
                                        </div>

                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>



                    <!-- All reservations -->
                    <div class="widget-content-inner active">
                        <!-- countries -->
                        <div class="wg-box">
                            <div class="road-map">
                                <div class="col-sm-3">
                                    <h6>From</h6>
                                    <div class="body-text">{{$from}}</div>
                                </div>
                                <div class="col-sm-3">
                                    <h6>To</h6>
                                    <div class="body-text">{{$to}}</div>
                                </div>
                                <div class="col-sm-3">
                                    <h6>Total Reservations</h6>
                                    <div class="body-text">{{$numberOfReservationsInThisPeriod}}</div>
                                </div>
                                <div class="col-sm-3">
                                    <h6>Total Amount Paid</h6>
                                    <div class="body-text">$
                                        @if($totalPaidAmount)
                                        {{number_format($totalPaidAmount, 0, '.', ',')}}
                                        @else
                                        0
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="wg-table table-countries wrap-checkbox">
                                <ul class="table-title flex gap20 mb-14">
                                    <li>

                                    </li>
                                    <li>
                                        <div class="body-title">#</div>
                                    </li>
                                    <li>
                                        <div class="body-title">Client</div>
                                    </li>
                                    <li>
                                        <div class="body-title">Room</div>
                                    </li>
                                    <li>
                                        <div class="body-title">Check In date</div>
                                    </li>
                                    <li>
                                        <div class="body-title">Check Out date</div>
                                    </li>
                                    <li>
                                        <div class="body-title">Total Price</div>
                                    </li>
                                    <li>
                                        <div class="body-title">status</div>
                                    </li>


                                </ul>
                                <ul class="flex flex-column">
                                    @php

                                    $i = 1;
                                    @endphp

                                    @foreach ($reservations as $reservation)


                                    <li class="countries-item">
                                        <div>

                                        </div>
                                        <div class="body-text">#{{ $i++ }}</div>
                                        <div class="body-text">{{ $reservation->client->names }}</div>
                                        <div class="body-text">{{ $reservation->room->title }}</div>
                                        <div class="body-text">{{ $reservation->check_in_date }}</div>
                                        <div class="body-text">{{ $reservation->check_out_date }}</div>
                                        <div class="body-text">$ {{ number_format($reservation->price, 0, '.', ',') }}</div>
                                        <div class="body-text">
                                            @if ($reservation->status == 'Pending')
                                            <span class="block-published">Pending</span>
                                            @elseif($reservation->status == 'Ongoing')
                                            <span class="block-available">Ongoing</span>
                                            @elseif($reservation->status == 'Ended')
                                            <span class="block-not-available">Ended</span>
                                            @endif
                                        </div>



                                    </li>
                                    @endforeach
                                </ul>
                            </div>


                        </div>
                        <!-- /countries -->
                    </div>



                </div>






            </div>
            <!-- /main-content-wrap -->
        </div>
        <!-- /main-content-wrap -->

    </div>
    <!-- /main-content -->




</div>