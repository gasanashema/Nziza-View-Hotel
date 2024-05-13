<div>
    <!-- main-content -->
    <div class="main-content">
        <!-- main-content-wrap -->
        <div class="main-content-inner">
            <!-- main-content-wrap -->
            <div class="main-content-wrap">
                <div class="flex items-center flex-wrap justify-between gap20 mb-27">

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
                            <h3>Room Categories</h3>
                        </div>
                        @if(auth()->user()->type == 'admin')
                        <a href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight1" aria-controls="offcanvasRight1" class="tf-button style-1 w208"><i class="icon-plus"></i>New</a>
                        @endif
                    </div>
                    <div class="wg-table table-countries wrap-checkbox">
                        <ul class="table-title flex gap20 mb-14">
                            <li>

                            </li>
                            <li>
                                <div class="body-title">#</div>
                            </li>
                            <li>
                                <div class="body-title">Title</div>
                            </li>
                            <li>
                                <div class="body-title">Details</div>
                            </li>
                            <li>
                                <div class="body-title">Price/Night</div>
                            </li>
                            @if (auth()->user()->type == 'admin')
                            <li>
                                <div class="body-title">Action</div>
                            </li>
                            @endif
                        </ul>
                        <ul class="flex flex-column">
                            @php
                            $i = 1;
                            @endphp

                            @foreach ($categories as $category)
                            <li class="countries-item">
                                <div>

                                </div>
                                <div class="body-text">#{{ $i++ }}</div>
                                <div class="body-text">{{ $category->category_title }}</div>
                                <div class="body-text">{{ $category->detail }}</div>
                                <div class="body-text">$ {{ $category->price_per_night }}</div>
                                @if (auth()->user()->type == 'admin')
                                <div>
                                    <div class="list-icon-function">
                                        <div class="item edit">
                                            <a href="#" class="text-success" wire:click="edit({{ $category->id }})"><i class="icon-edit-3"></i></a>

                                        </div>
                                        <div class="item trash">
                                            <a href="#" class="text-danger"><i class="icon-trash-2"></i></a>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </li>
                            @endforeach
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
            <h6>Add Room Category</h6>
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
                                        <div class="body-title mb-10">Title <span class="tf-color-1">*</span></div>
                                        <input type="text" wire:model="category_title" placeholder="Title" required>
                                    </fieldset>
                                    <fieldset class="email mb-24">
                                        <div class="body-title mb-10">Description <span class="tf-color-1">*</span></div>
                                        <input type="text" wire:model="detail" placeholder="Description" required>
                                    </fieldset>
                                    <fieldset class="email mb-24">
                                        <div class="body-title mb-10">Price Per Night <span class="tf-color-1">*</span></div>
                                        <input type="number" wire:model="price_per_night" placeholder="Price in $" required>
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
                    <form wire:submit.prevent="update({{$category_id}})">

                        <fieldset class="name mb-24">
                            <div class="body-title mb-10">Title <span class="tf-color-1">*</span></div>
                            <input type="text" wire:model="category_title" placeholder="Title" required>
                        </fieldset>
                        <fieldset class="email mb-24">
                            <div class="body-title mb-10">Description <span class="tf-color-1">*</span></div>
                            <input type="text" wire:model="detail" placeholder="Description" required>
                        </fieldset>
                        <fieldset class="email mb-24">
                            <div class="body-title mb-10">Price Per Night <span class="tf-color-1">*</span></div>
                            <input type="number" wire:model="price_per_night" placeholder="Price in $" required>
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