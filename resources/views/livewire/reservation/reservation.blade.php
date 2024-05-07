<div>
    <!-- main-content -->
    <div class="main-content">
        <!-- main-content-wrap -->
        <div class="main-content-inner">
            <!-- main-content-wrap -->
            <div class="main-content-wrap">
                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                    <h3>Reservations</h3>
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

                    <div class="widget-tabs">
                        <ul class="widget-menu-tab style-1">
                            <li class="item-title active">
                                <span class="inner"><span class="h6">All</span></span>
                            </li>
                            <li class="item-title">
                                <span class="inner"><span class="h6">Pending</span></span>
                            </li>
                            <li class="item-title">
                                <span class="inner"><span class="h6">Ongoing</span></span>
                            </li>
                            <li class="item-title">
                                <span class="inner"><span class="h6">Completed</span></span>
                            </li>
                        </ul>
                        <div class="widget-content-tab">

                            <!-- All reservations -->
                            <div class="widget-content-inner active">
                                <!-- countries -->
                                <div class="wg-box">
                                    <div class="flex items-center justify-between gap10 flex-wrap">
                                        <div class="wg-filter flex-grow">
                                            <div class="show">
                                                <div class="text-tiny">Showing</div>
                                                <div class="select">
                                                    <select class="">
                                                        <option>10</option>
                                                        <option>20</option>
                                                        <option>30</option>
                                                    </select>
                                                </div>
                                                <div class="text-tiny">entries</div>
                                            </div>

                                            <form class="form-search">
                                                <fieldset class="name">
                                                    <input type="text" placeholder="Search here..." class="" name="name" tabindex="2" value="" aria-required="true" required="">
                                                </fieldset>
                                                <div class="button-submit">
                                                    <button class="" type="submit"><i class="icon-search"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                        <a wire:navigate href="/new-reservation" class="tf-button style-1 w208"><i class="icon-plus"></i>New</a>
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
                                            <li>
                                                <div class="body-title">Payment</div>
                                            </li>
                                            <li>
                                                <div class="body-title">More</div>
                                            </li>

                                            <li>
                                                <div class="body-title">Action</div>
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
                                                <div class="body-text">$ {{ $reservation->price }}</div>
                                                <div class="body-text">
                                                    @if ($reservation->status == 'Pending')
                                                    <span class="block-published">Pending</span>
                                                    @elseif($reservation->status == 'Ongoing')
                                                    <span class="block-available">Ongoing</span>
                                                    @elseif($reservation->status == 'Ended')
                                                    <span class="block-not-available">Ended</span>
                                                    @endif
                                                </div>
                                                <div class="body-text">{{ $reservation->payment_status }}</div>

                                                <!-- <div class="body-text">{-- $remainingDays --}</div> -->
                                                <div class="body-text">
                                                    <div>

                                                        <div class="flex items-center gap10 flex-wrap">

                                                            <div class="dropdown default">
                                                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <span class="icon-more"><i class="icon-more-horizontal"></i></span>
                                                                </button>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li>
                                                                        <a href="javascript:void(0);">Done by : <span class="text-success">{{ $reservation->user->first_name." ".$reservation->user->last_name }}</span></a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:void(0);">At : <span class="text-success">{{ $reservation->created_at}}</span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <div class="list-icon-function">
                                                        <div class="item edit">
                                                            <a wire:navigate class="text-success" href="/edit-reservation/{{ $reservation->id }}"><i class="icon-edit-3"></i></a>
                                                        </div>
                                                        <div class="item trash">
                                                            <a href="#" class="text-danger"><i class="icon-trash-2"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="divider"></div>
                                    <div class="flex items-center justify-between flex-wrap gap10">
                                        <div class="text-tiny">Showing 10 to 16 in 16 records</div>
                                        <ul class="wg-pagination">
                                            <li>
                                                <a href="#"><i class="icon-chevron-left"></i></a>
                                            </li>
                                            <li>
                                                <a href="#">1</a>
                                            </li>
                                            <li class="active">
                                                <a href="#">2</a>
                                            </li>
                                            <li>
                                                <a href="#">3</a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="icon-chevron-right"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /countries -->
                            </div>
                            <!-- Pending Reservations -->
                            <div class="widget-content-inner">
                                <!-- countries -->
                                <div class="wg-box">
                                    <div class="flex items-center justify-between gap10 flex-wrap">
                                        <div class="wg-filter flex-grow">
                                            <div class="show">
                                                <div class="text-tiny">Showing</div>
                                                <div class="select">
                                                    <select class="">
                                                        <option>10</option>
                                                        <option>20</option>
                                                        <option>30</option>
                                                    </select>
                                                </div>
                                                <div class="text-tiny">entries</div>
                                            </div>

                                            <form class="form-search">
                                                <fieldset class="name">
                                                    <input type="text" placeholder="Search here..." class="" name="name" tabindex="2" value="" aria-required="true" required="">
                                                </fieldset>
                                                <div class="button-submit">
                                                    <button class="" type="submit"><i class="icon-search"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                        <a wire:navigate href="/new-reservation" class="tf-button style-1 w208"><i class="icon-plus"></i>New</a>
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
                                            <li>
                                                <div class="body-title">Payment Status</div>
                                            </li>

                                            <li>
                                                <div class="body-title">More</div>
                                            </li>

                                            <li>
                                                <div class="body-title">Action</div>
                                            </li>
                                        </ul>
                                        <ul class="flex flex-column">
                                            @php

                                            $i = 1;
                                            @endphp

                                            @foreach ($reservationPending as $reservation)


                                            <li class="countries-item">
                                                <div>

                                                </div>
                                                <div class="body-text">#{{ $i++ }}</div>
                                                <div class="body-text">{{ $reservation->client->names }}</div>
                                                <div class="body-text">{{ $reservation->room->title }}</div>
                                                <div class="body-text">{{ $reservation->check_in_date }}</div>
                                                <div class="body-text">{{ $reservation->check_out_date }}</div>
                                                <div class="body-text">$ {{ $reservation->price }}</div>
                                                <div class="body-text">
                                                    @if ($reservation->status == 'Pending')
                                                    <span class="block-published">Pending</span>
                                                    @elseif($reservation->status == 'Ongoing')
                                                    <span class="block-available">Ongoing</span>
                                                    @elseif($reservation->status == 'Ended')
                                                    <span class="block-not-available">Ended</span>
                                                    @endif
                                                </div>
                                                <div class="body-text">{{ $reservation->payment_status }}</div>
                                                <!-- <div class="body-text">{-- $remainingDays --}</div> -->
                                                <div class="body-text">
                                                    <div>

                                                        <div class="flex items-center gap10 flex-wrap">

                                                            <div class="dropdown default">
                                                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <span class="icon-more"><i class="icon-more-horizontal"></i></span>
                                                                </button>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li>
                                                                        <a href="javascript:void(0);">Done by : <span class="text-success">{{ $reservation->user->first_name." ".$reservation->user->last_name }}</span></a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:void(0);">At : <span class="text-success">{{ $reservation->created_at}}</span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <div class="list-icon-function">
                                                        <div class="item edit">
                                                            <a wire:navigate class="text-success" href="/edit-reservation/{{ $reservation->id }}"><i class="icon-edit-3"></i></a>
                                                        </div>
                                                        <div class="item trash">
                                                            <a href="#" class="text-danger"><i class="icon-trash-2"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="divider"></div>
                                    <div class="flex items-center justify-between flex-wrap gap10">
                                        <div class="text-tiny">Showing 10 to 16 in 16 records</div>
                                        <ul class="wg-pagination">
                                            <li>
                                                <a href="#"><i class="icon-chevron-left"></i></a>
                                            </li>
                                            <li>
                                                <a href="#">1</a>
                                            </li>
                                            <li class="active">
                                                <a href="#">2</a>
                                            </li>
                                            <li>
                                                <a href="#">3</a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="icon-chevron-right"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /countries -->
                            </div>
                            <!-- Ongoing Reservations -->
                            <div class="widget-content-inner">
                                <!-- countries -->
                                <div class="wg-box">
                                    <div class="flex items-center justify-between gap10 flex-wrap">
                                        <div class="wg-filter flex-grow">
                                            <div class="show">
                                                <div class="text-tiny">Showing</div>
                                                <div class="select">
                                                    <select class="">
                                                        <option>10</option>
                                                        <option>20</option>
                                                        <option>30</option>
                                                    </select>
                                                </div>
                                                <div class="text-tiny">entries</div>
                                            </div>

                                            <form class="form-search">
                                                <fieldset class="name">
                                                    <input type="text" placeholder="Search here..." class="" name="name" tabindex="2" value="" aria-required="true" required="">
                                                </fieldset>
                                                <div class="button-submit">
                                                    <button class="" type="submit"><i class="icon-search"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                        <a wire:navigate href="/new-reservation" class="tf-button style-1 w208"><i class="icon-plus"></i>New</a>
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
                                            <li>
                                                <div class="body-title">Payment Status</div>
                                            </li>

                                            <li>
                                                <div class="body-title">More</div>
                                            </li>

                                            <li>
                                                <div class="body-title">Action</div>
                                            </li>
                                        </ul>
                                        <ul class="flex flex-column">
                                            @php

                                            $i = 1;
                                            @endphp

                                            @foreach ($reservationOngoing as $reservation)


                                            <li class="countries-item">
                                                <div>

                                                </div>
                                                <div class="body-text">#{{ $i++ }}</div>
                                                <div class="body-text">{{ $reservation->client->names }}</div>
                                                <div class="body-text">{{ $reservation->room->title }}</div>
                                                <div class="body-text">{{ $reservation->check_in_date }}</div>
                                                <div class="body-text">{{ $reservation->check_out_date }}</div>
                                                <div class="body-text">$ {{ $reservation->price }}</div>
                                                <div class="body-text">
                                                    @if ($reservation->status == 'Pending')
                                                    <span class="block-published">Pending</span>
                                                    @elseif($reservation->status == 'Ongoing')
                                                    <span class="block-available">Ongoing</span>
                                                    @elseif($reservation->status == 'Ended')
                                                    <span class="block-not-available">Ended</span>
                                                    @endif
                                                </div>
                                                <div class="body-text">{{ $reservation->payment_status }}</div>
                                                <!-- <div class="body-text">{-- $remainingDays --}</div> -->
                                                <div class="body-text">
                                                    <div>

                                                        <div class="flex items-center gap10 flex-wrap">

                                                            <div class="dropdown default">
                                                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <span class="icon-more"><i class="icon-more-horizontal"></i></span>
                                                                </button>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li>
                                                                        <a href="javascript:void(0);">Done by : <span class="text-success">{{ $reservation->user->first_name." ".$reservation->user->last_name }}</span></a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:void(0);">At : <span class="text-success">{{ $reservation->created_at}}</span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <div class="list-icon-function">
                                                        <div class="item edit">
                                                            <a wire:navigate class="text-success" href="/edit-reservation/{{ $reservation->id }}"><i class="icon-edit-3"></i></a>
                                                        </div>
                                                        <div class="item trash">
                                                            <a href="#" class="text-danger"><i class="icon-trash-2"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="divider"></div>
                                    <div class="flex items-center justify-between flex-wrap gap10">
                                        <div class="text-tiny">Showing 10 to 16 in 16 records</div>
                                        <ul class="wg-pagination">
                                            <li>
                                                <a href="#"><i class="icon-chevron-left"></i></a>
                                            </li>
                                            <li>
                                                <a href="#">1</a>
                                            </li>
                                            <li class="active">
                                                <a href="#">2</a>
                                            </li>
                                            <li>
                                                <a href="#">3</a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="icon-chevron-right"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /countries -->
                            </div>
                            <!-- Completed Reservations -->
                            <div class="widget-content-inner">
                                <!-- countries -->
                                <div class="wg-box">
                                    <div class="flex items-center justify-between gap10 flex-wrap">
                                        <div class="wg-filter flex-grow">
                                            <div class="show">
                                                <div class="text-tiny">Showing</div>
                                                <div class="select">
                                                    <select class="">
                                                        <option>10</option>
                                                        <option>20</option>
                                                        <option>30</option>
                                                    </select>
                                                </div>
                                                <div class="text-tiny">entries</div>
                                            </div>

                                            <form class="form-search">
                                                <fieldset class="name">
                                                    <input type="text" placeholder="Search here..." class="" name="name" tabindex="2" value="" aria-required="true" required="">
                                                </fieldset>
                                                <div class="button-submit">
                                                    <button class="" type="submit"><i class="icon-search"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                        <a wire:navigate href="/new-reservation" class="tf-button style-1 w208"><i class="icon-plus"></i>New</a>
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
                                            <li>
                                                <div class="body-title">Payment Status</div>
                                            </li>

                                            <li>
                                                <div class="body-title">More</div>
                                            </li>

                                            <li>
                                                <div class="body-title">Action</div>
                                            </li>
                                        </ul>
                                        <ul class="flex flex-column">
                                            @php

                                            $i = 1;
                                            @endphp

                                            @foreach ($reservationCompleted as $reservation)


                                            <li class="countries-item">
                                                <div>

                                                </div>
                                                <div class="body-text">#{{ $i++ }}</div>
                                                <div class="body-text">{{ $reservation->client->names }}</div>
                                                <div class="body-text">{{ $reservation->room->title }}</div>
                                                <div class="body-text">{{ $reservation->check_in_date }}</div>
                                                <div class="body-text">{{ $reservation->check_out_date }}</div>
                                                <div class="body-text">$ {{ $reservation->price }}</div>
                                                <div class="body-text">
                                                    @if ($reservation->status == 'Pending')
                                                    <span class="block-published">Pending</span>
                                                    @elseif($reservation->status == 'Ongoing')
                                                    <span class="block-available">Ongoing</span>
                                                    @elseif($reservation->status == 'Ended')
                                                    <span class="block-not-available">Ended</span>
                                                    @endif
                                                </div>
                                                <div class="body-text">{{ $reservation->payment_status }}</div>
                                                <!-- <div class="body-text">{-- $remainingDays --}</div> -->
                                                <div class="body-text">
                                                    <div>

                                                        <div class="flex items-center gap10 flex-wrap">

                                                            <div class="dropdown default">
                                                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <span class="icon-more"><i class="icon-more-horizontal"></i></span>
                                                                </button>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li>
                                                                        <a href="javascript:void(0);">Done by : <span class="text-success">{{ $reservation->user->first_name." ".$reservation->user->last_name }}</span></a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:void(0);">At : <span class="text-success">{{ $reservation->created_at}}</span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <div class="list-icon-function">
                                                        <div class="item edit">
                                                            <a wire:navigate class="text-success" href="/edit-reservation/{{ $reservation->id }}"><i class="icon-edit-3"></i></a>
                                                        </div>
                                                        <div class="item trash">
                                                            <a href="#" class="text-danger"><i class="icon-trash-2"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="divider"></div>
                                    <div class="flex items-center justify-between flex-wrap gap10">
                                        <div class="text-tiny">Showing 10 to 16 in 16 records</div>
                                        <ul class="wg-pagination">
                                            <li>
                                                <a href="#"><i class="icon-chevron-left"></i></a>
                                            </li>
                                            <li>
                                                <a href="#">1</a>
                                            </li>
                                            <li class="active">
                                                <a href="#">2</a>
                                            </li>
                                            <li>
                                                <a href="#">3</a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="icon-chevron-right"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /countries -->
                            </div>
                        </div>
                    </div>
                </div>






            </div>
            <!-- /main-content-wrap -->
        </div>
        <!-- /main-content-wrap -->

    </div>
    <!-- /main-content -->




</div>