<div>
    <!-- main-content -->
    <div class="main-content">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css" />
        <!-- main-content-wrap -->
        <div class="main-content-inner">
            <!-- main-content-wrap -->
            <div class="main-content-wrap">
                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                    <h3>System Users</h3>
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
                    <div class="table-responsive">

                        <style>
                            table,
                            tr,
                            th,
                            td {
                                border: none;
                                padding: 10px;
                            }

                            .body-title {
                                font-weight: bold;
                            }
                        </style>
                        <table id="myTable" class="display table table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th class="body-title">#</th>
                                    <th class="body-title">First Name</th>
                                    <th class="body-title">Last Name</th>
                                    <th class="body-title" style="width: 300px;">Email</th>
                                    <th class="body-title">Phone</th>
                                    <th class="body-title">Role</th>
                                    <th class="body-title">Date Created</th>
                                    <th class="body-title">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 1;
                                @endphp

                                @foreach ($users as $user)
                                <tr>

                                    <td class="body-text">#{{ $i++ }}</td>
                                    <td class="body-text">{{ $user->first_name }}</td>
                                    <td class="body-text">{{ $user->last_name }}</td>
                                    <td class="body-text">{{ $user->email }}</td>
                                    <td class="body-text">{{ $user->phone }}</td>
                                    <td class="body-text">{{ $user->type }}</td>
                                    <td class="body-text">{{ $user->created_at }}</td>

                                    <td>
                                        <div class="list-icon-function">
                                            <div class="item edit">
                                                <a href="#" data-bs-toggle="offcanvas" data-bs-target="#canvasRight{{ $user->id }}" aria-controls="canvasRight{{ $user->id }}" class="text-success" wire:click="edit({{ $user->id }})"><i class="icon-edit-3"></i></a>
                                            </div>
                                            <div class="item trash">
                                                <a href="#" class="text-danger"><i class="icon-trash-2"></i></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
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
            <h6>Add user</h6>
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

                                    <fieldset class="email mb-24">
                                        <div class="body-title mb-10">Role <span class="tf-color-1">*</span></div>
                                        <div class="select">
                                            <select wire:model="role" required>
                                                <option disabled selected>Choose user role</option>
                                                <option value="1">Admin</option>
                                                <option value="0">Receptionist</option>
                                            </select>
                                        </div>
                                    </fieldset>

                                    <fieldset class="password mb-24">
                                        <div class="body-title mb-10">Password <span class="tf-color-1">*</span></div>
                                        <input type="text" wire:model="password" placeholder="Enter password" required>
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
            </div>
        </div>
    </div>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>


</div>