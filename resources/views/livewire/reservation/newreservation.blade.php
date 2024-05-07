<div>
    <!-- main-content -->
    <div class="main-content">
        <!-- main-content-wrap -->
        <div class="main-content-inner">
            <!-- main-content-wrap -->
            <di v class="main-content-wrap">
                <div class="flex items-center flex-wrap justify-between gap20 mb-27">

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
                <!-- form-add-product -->
                <form class="tf-section-1 form-add-product" wire:submit.prevent="save">
                    <div class="wg-box">
                        <div class="row">
                            <h3 class="col-sm-9">Make New Reservation</h3>
                            <a wire:navigate href="/reservation" class="btn btn-success col-sm-2 p-3 fs-4 mr-0">View Reservations</a>

                        </div>

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
                    </div>

                </form>
                <!-- /form-add-product -->
        </div>
        <!-- /main-content-wrap -->
    </div>
    <!-- /main-content-wrap -->

</div>
<!-- /main-content -->
</div>