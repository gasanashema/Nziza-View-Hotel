<div>
   <!-- main-content -->
                    <div class="main-content">
                        <!-- main-content-wrap -->
                        <div class="main-content-inner">
                            <!-- main-content-wrap -->
                            <di v class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                    <h3>Edit Reservation</h3>
                                   
                                </div>
                                <!-- form-add-product -->
                                <form class="tf-section-2 form-add-product" >
                                    <div class="wg-box">
                                    <a wire:navigate href="/reservation" class="btn btn-success col-sm-3" >View Reservatins</a>
                                      
                                        <div class="gap22 cols">
                                            <fieldset class="category">
                                                <div class="body-title mb-10">Check In Date <span class="tf-color-1">*</span></div>
                                               
                                                   <input type="date" class="mb-10" wire:model="CheckInDate" tabindex="0" value="" aria-required="true" required="">
                                                
                                            </fieldset>
                                            <fieldset class="male">
                                                <div class="body-title mb-10">Check Out Date <span class="tf-color-1">*</span></div>
                                               
                                                     <input type="date" class="mb-10" wire:model="CheckOutDate"  tabindex="0" value="" aria-required="true" required="">
                                                
                                            </fieldset>
                                        </div>
                                          
                                        <fieldset class="brand">
                                            <div class="body-title mb-10">Room <span class="tf-color-1">*</span></div>
                                            <div class="select">
                                                <select class="" wire:model="selectedRoom">
                                                    <option>Choose Room</option>
                                                    @foreach($rooms as $room)
                                                    <option value="{{$room->id}}">{{$room->title}} ( {{$room->roomCategory->category_title}} : ${{$room->roomCategory->price_per_night}} ) </option>
                                                    @endforeach
                                                    
                                                </select>
                                            </div>
                                        </fieldset>
                                        <fieldset class="name">
                                            <div class="body-title mb-10">Price</div>
                                            <input class="mb-10" type="text" wire:model="price"  disabled tabindex="0" aria-required="true">
                                            
                                           
                                        </fieldset>
                                        <fieldset class="brand">
                                            <div class="body-title mb-10">Client <span class="tf-color-1">*</span></div>
                                            <div class="select">
                                                <select class="">
                                                    <option>Choose Client</option>
                                                    @foreach($clients as $client)
                                                    <option>{{$client -> names}}</option>
                                                    @endforeach
                                                   
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
