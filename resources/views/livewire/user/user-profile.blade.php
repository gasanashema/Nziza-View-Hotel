<div class="main-content">
    <div class="main-content-inner">
        <div class="main-content-wrap">


            <div class="col-12 mb-20">
                <div class="wg-box">
                    <h3>{{auth()->user()->first_name.' '.auth()->user()->last_name}}</h3>
                    <div class="row">
                        <div class="col-xl-4 mb-20">
                            <div>
                                <h6 class="mb-10">Email</h6>
                                <div class="flex items-center gap10 flex-wrap">
                                    <p>{{auth()->user()->email}}</p>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 mb-20">
                            <div>
                                <h6 class="mb-10">Role</h6>
                                <div class="flex items-center gap10 flex-wrap">
                                    <p>{{auth()->user()->type}}</p>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 mb-20">
                            <div>
                                <h6 class="mb-10">Phone</h6>
                                <div class="flex items-center gap10 flex-wrap">
                                    <p>{{auth()->user()->phone}}</p>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 mb-20">
                            <div>
                                <h6 class="mb-10">Date Registered</h6>
                                <div class="flex items-center gap10 flex-wrap">
                                    <p>{{auth()->user()->created_at}}</p>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 mb-20">
                            <div>
                                <h6 class="mb-10">Total Reservations Created</h6>
                                <div class="flex items-center gap10 flex-wrap">
                                    <p>{{$total_reservations}}</p>

                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 mb-20">
                            <div>
                                <h6 class="mb-10">&nbsp;</h6>
                                <button class="tf-button w208" type="button" wire:click="edit( auth()->user()->id )">Edit Account</button>

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
    <div class=" modal-overlay" wire:click="closeModal">
    </div>
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
                    <form wire:submit.prevent="update(auth()->user()->id)">
                        <fieldset class="name mb-24">
                            <div class="body-title mb-10">First Name <span class="tf-color-1">*</span></div>
                            <input type="text" wire:model="first_name" placeholder="Enter first name" required>
                        </fieldset>

                        <fieldset class="name mb-24">
                            <div class="body-title mb-10">Last Name <span class="tf-color-1">*</span></div>
                            <input type="text" wire:model="last_name" placeholder="Enter last name" required>
                        </fieldset>

                        <fieldset class="email mb-24">
                            <div class="body-title mb-10">Email <span class="tf-color-1">*</span></div>
                            <input type="email" wire:model="email" placeholder="Enter email address" required>
                        </fieldset>

                        <fieldset class="name mb-24">
                            <div class="body-title mb-10">Phone <span class="tf-color-1">*</span></div>
                            <input type="tel" wire:model="phone" placeholder="Enter phone number" required>
                        </fieldset>



                        <div class="bot d-flex">
                            <button class="tf-button w208" type="submit">Save</button>
                            <button class="tf-button w208" type="reset">Clear</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>