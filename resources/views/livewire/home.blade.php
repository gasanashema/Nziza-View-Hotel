<div class="main-content">
    <!-- main-content-wrap -->
    <div class="main-content-inner">
        <!-- main-content-wrap -->
        <div class="main-content-wrap">
            <div class="tf-section-4 mb-30">
                <!-- chart-default -->
                <div class="wg-chart-default">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap14">
                            <div class="image type-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="52" viewBox="0 0 48 52" fill="none">
                                    <path d="M19.1094 2.12943C22.2034 0.343099 26.0154 0.343099 29.1094 2.12943L42.4921 9.85592C45.5861 11.6423 47.4921 14.9435 47.4921 18.5162V33.9692C47.4921 37.5418 45.5861 40.8431 42.4921 42.6294L29.1094 50.3559C26.0154 52.1423 22.2034 52.1423 19.1094 50.3559L5.72669 42.6294C2.63268 40.8431 0.726688 37.5418 0.726688 33.9692V18.5162C0.726688 14.9435 2.63268 11.6423 5.72669 9.85592L19.1094 2.12943Z" fill="#22C55E" />
                                </svg>
                                <i class="icon-shopping-bag"></i>
                            </div>
                            <div>
                                <div class="body-text mb-2">Reservations This Month</div>
                                <h4>{{$reservationsThisMonth}}</h4>
                            </div>
                        </div>

                    </div>
                    <div class="wrap-chart">
                        <div id="line-chart-1"></div>
                    </div>
                </div>
                <!-- /chart-default -->
                <!-- chart-default -->
                <div class="wg-chart-default">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap14">
                            <div class="image type-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="52" viewBox="0 0 48 52" fill="none">
                                    <path d="M19.1094 2.12943C22.2034 0.343099 26.0154 0.343099 29.1094 2.12943L42.4921 9.85592C45.5861 11.6423 47.4921 14.9435 47.4921 18.5162V33.9692C47.4921 37.5418 45.5861 40.8431 42.4921 42.6294L29.1094 50.3559C26.0154 52.1423 22.2034 52.1423 19.1094 50.3559L5.72669 42.6294C2.63268 40.8431 0.726688 37.5418 0.726688 33.9692V18.5162C0.726688 14.9435 2.63268 11.6423 5.72669 9.85592L19.1094 2.12943Z" fill="#FF5200" />
                                </svg>
                                <i class="icon-dollar-sign"></i>
                            </div>
                            <div>
                                <div class="body-text mb-2">Booked Rooms</div>
                                <h4>{{$reservationsRoomsBooked}}</h4>
                            </div>
                        </div>

                    </div>
                    <div class="wrap-chart">
                        <div id="line-chart-2"></div>
                    </div>
                </div>
                <!-- /chart-default -->
                <!-- chart-default -->
                <div class="wg-chart-default">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap14">
                            <div class="image type-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="52" viewBox="0 0 48 52" fill="none">
                                    <path d="M19.1094 2.12943C22.2034 0.343099 26.0154 0.343099 29.1094 2.12943L42.4921 9.85592C45.5861 11.6423 47.4921 14.9435 47.4921 18.5162V33.9692C47.4921 37.5418 45.5861 40.8431 42.4921 42.6294L29.1094 50.3559C26.0154 52.1423 22.2034 52.1423 19.1094 50.3559L5.72669 42.6294C2.63268 40.8431 0.726688 37.5418 0.726688 33.9692V18.5162C0.726688 14.9435 2.63268 11.6423 5.72669 9.85592L19.1094 2.12943Z" fill="#CBD5E1" />
                                </svg>
                                <i class="icon-file"></i>
                            </div>
                            <div>
                                <div class="body-text mb-2">Active Reservations</div>
                                <h4>{{$reservationOngoing}}</h4>
                            </div>
                        </div>

                    </div>
                    <div class="wrap-chart">
                        <div id="line-chart-3"></div>
                    </div>
                </div>
                <!-- /chart-default -->
                <!-- chart-default -->
                <div class="wg-chart-default">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap14">
                            <div class="image type-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="52" viewBox="0 0 48 52" fill="none">
                                    <path d="M19.1094 2.12943C22.2034 0.343099 26.0154 0.343099 29.1094 2.12943L42.4921 9.85592C45.5861 11.6423 47.4921 14.9435 47.4921 18.5162V33.9692C47.4921 37.5418 45.5861 40.8431 42.4921 42.6294L29.1094 50.3559C26.0154 52.1423 22.2034 52.1423 19.1094 50.3559L5.72669 42.6294C2.63268 40.8431 0.726688 37.5418 0.726688 33.9692V18.5162C0.726688 14.9435 2.63268 11.6423 5.72669 9.85592L19.1094 2.12943Z" fill="#2377FC" />
                                </svg>
                                <i class="icon-users"></i>
                            </div>
                            <div>
                                <div class="body-text mb-2">Total Visitor</div>
                                <h4>{{$reservationsClients}}</h4>
                            </div>
                        </div>

                    </div>
                    <div class="wrap-chart">
                        <div id="line-chart-4"></div>
                    </div>
                </div>
                <!-- /chart-default -->
            </div>

            <!-- product-overview -->
            <div class="wg-box">
                <div class="flex items-center justify-between">
                    <h5>Recent Reservations</h5>
                    <div class="dropdown default">
                        <button class="btn btn-secondary dropdown-toggle" type="button" wire:navigate href="/reservation">
                            <span class="view-all">View all</span>
                        </button>

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
                        <li>
                            <div class="body-title">Payment Status</div>
                        </li>

                       
                    </ul>
                    <ul class="flex flex-column">
                        @php

                        $i = 1;

                        @endphp

                        @foreach ($reservationsRecent as $reservation)
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
                            
                        </li>
                        @endforeach
                    </ul>
                </div>

            </div>
            <!-- /product-overview -->
        </div>
        <!-- /main-content-wrap -->
    </div>
    <!-- /main-content-wrap -->

</div>