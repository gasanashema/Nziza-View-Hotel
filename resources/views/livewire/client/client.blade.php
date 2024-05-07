<div>
    <!-- main-content -->
    <div class="main-content">
        <!-- main-content-wrap -->
        <div class="main-content-inner">
            <!-- main-content-wrap -->
            <div class="main-content-wrap">
                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                    <h3>Clients</h3>
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
                        <a href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight1" aria-controls="offcanvasRight1" class="tf-button style-1 w208"><i class="icon-plus"></i>New</a>
                    </div>
                    <div class="wg-table table-countries wrap-checkbox">
                        <ul class="table-title flex gap20 mb-14">
                            <li>

                            </li>
                            <li>
                                <div class="body-title">#</div>
                            </li>
                            <li>
                                <div class="body-title">Names</div>
                            </li>
                            <li>
                                <div class="body-title">Gender</div>
                            </li>
                            <li>
                                <div class="body-title">Phone</div>
                            </li>
                            <li>
                                <div class="body-title">Nationality</div>
                            </li>
                            <li>
                                <div class="body-title">ID Number</div>
                            </li>
                            <li>
                                <div class="body-title">Passport Number</div>
                            </li>
                            <li>
                                <div class="body-title">Date Added</div>
                            </li>


                            <li>
                                <div class="body-title">Action</div>
                            </li>
                        </ul>
                        <ul class="flex flex-column">
                            @php
                            $i = 1;
                            @endphp

                            @foreach ($clients as $client)
                            <li class="countries-item">
                                <div>

                                </div>
                                <div class="body-text">#{{ $i++ }}</div>
                                <div class="body-text">{{ $client->names }}</div>
                                <div class="body-text">{{ $client->gender }}</div>
                                <div class="body-text">{{ $client->phone }}</div>
                                <div class="body-text">{{ $client->nationality }}</div>
                                <div class="body-text">{{ $client->id_number }}</div>
                                <div class="body-text">{{ $client->passport_number }}</div>
                                <div class="body-text">{{ $client->created_at }}</div>

                                <div>
                                    <div class="list-icon-function">
                                        <div class="item edit">
                                            <a href="#" data-bs-toggle="offcanvas" data-bs-target="#canvasRight{{ $client->id }}" aria-controls="canvasRight{{ $client->id }}" class="text-success" wire:click="edit({{ $client->id }})"><i class="icon-edit-3"></i></a>
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
            <!-- /main-content-wrap -->
        </div>
        <!-- /main-content-wrap -->

    </div>
    <!-- /main-content -->

    <!-- add form offcanvas -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight1">
        <div class="offcanvas-header">
            <h6>Add Client</h6>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="col-12 mb-20">
                <div class="wg-box">

                    <div class="row">
                        <div class="col-12 mb-20">
                            <div>
                                <form wire:submit.prevent="save">

                                    <fieldset class="name mb-24">
                                        <div class="body-title mb-10">Names <span class="tf-color-1">*</span></div>
                                        <input type="text" wire:model="names" placeholder="Title" required>
                                    </fieldset>
                                    <fieldset class="email mb-24">
                                        <div class="body-title mb-10">Gender <span class="tf-color-1">*</span></div>
                                        <div class="select">
                                            <select class="" wire:model="gender" required>
                                                <option selected>Select Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>

                                            </select>
                                        </div>
                                    </fieldset>
                                    <fieldset class="email mb-24">
                                        <div class="body-title mb-10">Phone <span class="tf-color-1">*</span></div>
                                        <input type="text" wire:model="phone" placeholder="Phone" required>
                                    </fieldset>
                                    <fieldset class="email mb-24">
                                        <div class="body-title mb-10">Nationality <span class="tf-color-1">*</span></div>
                                        <input type="text" wire:model="nationality" placeholder="Nationality" required>
                                    </fieldset>
                                    <fieldset class="email mb-24">
                                        <div class="body-title mb-10">ID Number (Optional)</div>
                                        <input type="text" wire:model="id_number" placeholder="Id Number">
                                    </fieldset>
                                    <fieldset class="email mb-24">
                                        <div class="body-title mb-10">Passport Number (Optional)</div>
                                        <input type="text" wire:model="passport_number" placeholder="Passport Number">
                                    </fieldset>


                                    <div class="bot">
                                        <button class="tf-button w208" type="submit">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
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
    @if($isOpen)
    <div class="modal-overlay" wire:click="closeModal"></div>
    <div class="modal p-3 curved" tabindex="-1" role="dialog" style="display: block;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title p-2">Edit</h5>
                    <button type="button" style="background-color: transparent;" aria-label="Close" wire:click="closeModal">
                        X
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="update({{$client_id}})">

                        <fieldset class="name mb-24">
                            <div class="body-title mb-10">Names <span class="tf-color-1">*</span></div>
                            <input type="text" wire:model="names" placeholder="Title" required>
                        </fieldset>
                        <fieldset class="email mb-24">
                            <div class="body-title mb-10">Gender <span class="tf-color-1">*</span></div>
                            <div class="select">
                                <select class="" wire:model="gender" required>
                                    <option selected>Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>

                                </select>
                            </div>
                        </fieldset>
                        <fieldset class="email mb-24">
                            <div class="body-title mb-10">Phone <span class="tf-color-1">*</span></div>
                            <input type="text" wire:model="phone" placeholder="Phone" required>
                        </fieldset>
                        <fieldset class="email mb-24">
                            <div class="body-title mb-10">Nationality <span class="tf-color-1">*</span></div>
                            <input type="text" wire:model="nationality" placeholder="Nationality" required>
                        </fieldset>
                        <fieldset class="email mb-24">
                            <div class="body-title mb-10">ID Number (Optional)</div>
                            <input type="text" wire:model="id_number" placeholder="Id Number">
                        </fieldset>
                        <fieldset class="email mb-24">
                            <div class="body-title mb-10">Passport Number (Optional)</div>
                            <input type="text" wire:model="passport_number" placeholder="Passport Number">
                        </fieldset>


                        <div class="bot">
                            <button class="tf-button w208" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif


</div>