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


                                            <form class="form-search">
                                                <h3>All Reservations</h3>

                                            </form>
                                        </div>
                                        <a href="#" wire:click="openReservationModal()" class="tf-button style-1 w208"><i class="icon-plus"></i>New</a>
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
                                            @php
                                            $status = check_reservation_status($reservation->check_in_date,$reservation->check_out_date);
                                            @endphp

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
                                                    @if($status == 'Pending')
                                                    <span class="block-published">{{ $status }}</span>
                                                    @elseif($status == 'Ongoing')
                                                    <span class="block-available">{{ $status }}</span>
                                                    @elseif($status == 'Ended')
                                                    <span class="block-not-available">{{ $status }}</span>
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
                                                            <a class="text-success" wire:click="edit({{$reservation->id}})"><i class="icon-edit-3"></i></a>
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

                                </div>
                                <!-- /countries -->
                            </div>
                            <!-- Pending Reservations -->
                            <div class="widget-content-inner">
                                <!-- countries -->
                                <div class="wg-box">
                                    <div class="flex items-center justify-between gap10 flex-wrap">
                                        <div class="wg-filter flex-grow">

                                            <form class="form-search">
                                                <h3>Pending Reservations</h3>
                                            </form>
                                        </div>
                                        <a wire:click="openReservationModal()" class="tf-button style-1 w208"><i class="icon-plus"></i>New</a>
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
                                            @php
                                            $status = check_reservation_status($reservation->check_in_date,$reservation->check_out_date);
                                            @endphp

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
                                                    @if($status == 'Pending')
                                                    <span class="block-published">{{ $status }}</span>
                                                    @elseif($status == 'Ongoing')
                                                    <span class="block-available">{{ $status }}</span>
                                                    @elseif($status == 'Ended')
                                                    <span class="block-not-available">{{ $status }}</span>
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
                                                            <a wire:navigate href="/edit-reservation/{{$reservation->id}}" class="text-success"><i class="icon-edit-3"></i></a>
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

                                </div>
                                <!-- /countries -->
                            </div>
                            <!-- Ongoing Reservations -->
                            <div class="widget-content-inner">
                                <!-- countries -->
                                <div class="wg-box">
                                    <div class="flex items-center justify-between gap10 flex-wrap">
                                        <div class="wg-filter flex-grow">

                                            <form class="form-search">
                                                <h3>Ongoing Reservations</h3>
                                            </form>
                                        </div>
                                        <a wire:click="openReservationModal()" class="tf-button style-1 w208"><i class="icon-plus"></i>New</a>
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
                                            @php
                                            $status = check_reservation_status($reservation->check_in_date,$reservation->check_out_date);
                                            @endphp

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
                                                    @if($status == 'Pending')
                                                    <span class="block-published">{{ $status }}</span>
                                                    @elseif($status == 'Ongoing')
                                                    <span class="block-available">{{ $status }}</span>
                                                    @elseif($status == 'Ended')
                                                    <span class="block-not-available">{{ $status }}</span>
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
                                                            <a class="text-success" wire:navigate href="/edit-reservation/{{$reservation->id}}"><i class="icon-edit-3"></i></a>
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

                                </div>
                                <!-- /countries -->
                            </div>
                            <!-- Completed Reservations -->
                            <div class="widget-content-inner">
                                <!-- countries -->
                                <div class="wg-box">
                                    <div class="flex items-center justify-between gap10 flex-wrap">
                                        <div class="wg-filter flex-grow">


                                            <form class="form-search">
                                                <h3>Completed Reservations</h3>
                                            </form>
                                        </div>
                                        <a wire:click="openReservationModal()" class="tf-button style-1 w208"><i class="icon-plus"></i>New</a>
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
                                            @php
                                            $status = check_reservation_status($reservation->check_in_date,$reservation->check_out_date);
                                            @endphp

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
                                                    @if($status == 'Pending')
                                                    <span class="block-published">{{ $status }}</span>
                                                    @elseif($status == 'Ongoing')
                                                    <span class="block-available">{{ $status }}</span>
                                                    @elseif($status == 'Ended')
                                                    <span class="block-not-available">{{ $status }}</span>
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
                                                            <a wire:navigate href="/edit-reservation/{{$reservation->id}}" class="text-success"><i class="icon-edit-3"></i></a>
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
    <style>
        /* Add this to your CSS file or style section */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            /* Adjust transparency as needed */
            z-index: 9999;
        }

        .modal {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 10000;
        }

        .modal-dialog {
            z-index: 10001;
            max-width: 80%;
        }
    </style>
    @if($isReservationOpen)
    <div class="modal-overlay" wire:click="closeReservationModal"></div>
    <div class="modal p-3 curved" tabindex="-1" role="dialog" style="display: block;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title p-2">Make New Reservation</h5>
                    <button type="button" style="background-color: transparent;" aria-label="Close" wire:click="closeReservationModal">
                        X
                    </button>
                </div>
                <div class="modal-body">
                    <!-- form-add-product -->
                    <form wire:submit.prevent="save">


                        <div class="gap22 cols">
                            <fieldset class="category">
                                <div class="body-title mb-10">Check In Date <span class="tf-color-1">*</span></div>

                                <input type="date" class="mb-10" min="{{ now()->toDateString() }}" wire:model.live="CheckInDate" tabindex="0" value="" aria-required="true" required="">

                            </fieldset>
                            <fieldset class="male">
                                <div class="body-title mb-10">Check Out Date <span class="tf-color-1">*</span></div>

                                <input type="date" class="mb-10" wire:model.live="CheckOutDate" @if(is_null($CheckInDate)) disabled @endif min="{{ $CheckInDate }}" tabindex="0" value="" aria-required="true" required="">

                            </fieldset>
                        </div>

                        <fieldset class="brand">
                            <div class="body-title mb-10">Room <span class="tf-color-1">*</span></div>
                            <div class="select">
                                <select class="" wire:model.live="selectedRoom">
                                    <option>Choose Room</option>
                                    @foreach($rooms as $room)
                                    <option value="{{$room->id}}">{{$room->title}} ( {{$room->roomCategory->category_title}} : ${{$room->roomCategory->price_per_night}} ) </option>
                                    @endforeach

                                </select>
                            </div>
                        </fieldset>
                        <fieldset class="name">
                            <div class="body-title mb-10">Price</div>
                            <input class="mb-10" type="text" @if($price) value='${{$price}}' @endif disabled tabindex="0" aria-required="true">


                        </fieldset>
                        <fieldset class="brand">
                            <div class="body-title mb-10">Client <span class="tf-color-1">*</span></div>
                            <div class="select">
                                <select class="" wire:model.live="client">
                                    <option>Choose Client</option>
                                    @foreach($clients as $client)
                                    <option value="{{$client -> id}}">{{$client -> names}} (nationality: {{$client -> nationality}} , Phone: {{$client -> phone}})</option>
                                    @endforeach

                                </select>
                            </div>
                        </fieldset>
                        <fieldset class="brand">
                            <div class="body-title mb-10">Payment Status <span class="tf-color-1">*</span></div>
                            <div class="select">
                                <select class="" wire:model.live="payment_status" required>
                                    <option>Select Status</option>
                                    <option value="Paid" selected>Paid</option>
                                    <option value="Not Paid">Not Paid</option>
                                </select>
                            </div>
                        </fieldset>


                        <div class="cols gap10">
                            <button class="tf-button w-full" type="submit">Confirm Reservation</button>
                            <button class="tf-button style-1 w-full" type="reset">Clear</button>

                        </div>


                    </form>
                    <!-- /form-add-product -->
                </div>
            </div>
        </div>
    </div>
    @endif

    @if($isEditReservationOpen)
    <div class="modal-overlay" wire:click="closeReservationModal"></div>
    <div class="modal p-3 curved" tabindex="-1" role="dialog" style="display: block;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title p-2">Edit Reservation</h5>
                    <button type="button" style="background-color: transparent;" aria-label="Close" wire:click="closeEditReservationModal">
                        X
                    </button>
                </div>
                <div class="modal-body">
                    <!-- form-add-product -->
                    <form wire:submit.prevent="update({{ $reservation->id }})">


                        <div class="gap22 cols">
                            <fieldset class="category">
                                <div class="body-title mb-10">Check In Date <span class="tf-color-1">*</span></div>

                                <input type="date" class="mb-10" min="{{ now()->toDateString() }}" wire:model.live="CheckInDate" tabindex="0" value="" aria-required="true" required="">

                            </fieldset>
                            <fieldset class="male">
                                <div class="body-title mb-10">Check Out Date <span class="tf-color-1">*</span></div>

                                <input type="date" class="mb-10" wire:model.live="CheckOutDate" @if(is_null($CheckInDate)) disabled @endif min="{{ $CheckInDate }}" tabindex="0" value="" aria-required="true" required="">

                            </fieldset>
                        </div>

                        <fieldset class="brand">
                            <div class="body-title mb-10">Room <span class="tf-color-1">*</span></div>
                            <div class="select">
                                <select class="" wire:model.live="selectedRoom">
                                    <option>Choose Room</option>
                                    @foreach($rooms as $room)
                                    <option value="{{$room->id}}">{{$room->title}} ( {{$room->roomCategory->category_title}} : ${{$room->roomCategory->price_per_night}} ) </option>
                                    @endforeach

                                </select>
                            </div>
                        </fieldset>
                        <fieldset class="name">
                            <div class="body-title mb-10">Price</div>
                            <input class="mb-10" type="text" @if($price) value='${{$price}}' @endif disabled tabindex="0" aria-required="true">


                        </fieldset>
                        <fieldset class="brand">
                            <div class="body-title mb-10">Client <span class="tf-color-1">*</span></div>
                            <div class="select">
                                <select class="" wire:model.live="client">
                                    <option>Choose Client</option>
                                    @foreach($clients as $client)
                                    <option value="{{$client -> id}}">{{$client -> names}} (nationality: {{$client -> nationality}} , Phone: {{$client -> phone}})</option>
                                    @endforeach

                                </select>
                            </div>
                        </fieldset>
                        <fieldset class="brand">
                            <div class="body-title mb-10">Payment Status <span class="tf-color-1">*</span></div>
                            <div class="select">
                                <select class="" wire:model.live="payment_status" required>
                                    <option>Select Status</option>
                                    <option value="Paid" selected>Paid</option>
                                    <option value="Not Paid">Not Paid</option>
                                </select>
                            </div>
                        </fieldset>


                        <div class="cols gap10">
                            <button class="tf-button w-full" type="submit">Confirm Reservation</button>
                            <button class="tf-button style-1 w-full" type="reset">Clear</button>

                        </div>


                    </form>
                    <!-- /form-add-product -->
                </div>
            </div>
        </div>
    </div>
    @endif



</div>