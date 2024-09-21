<ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <button class="nav-link {{ Request::segment(2) == 'view_single_school_info' ? 'active' : '' }}" data-bs-toggle="tab" data-bs-target="#profile-overview" onclick="window.location.href='{{ route('main.show.profile',Crypt::encrypt($school_data->id)) }}'">Overview</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link {{ Request::segment(2) == 'information' ? 'active' : '' }}" onclick="window.location.href='{{ route('main.Customer_edit_info',Crypt::encrypt($school_data->id)) }}'">Edit info</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link {{ Request::segment(2) == 'username' ? 'active' : '' }}" onclick="window.location.href='{{ route('main.Customer_employee_student',Crypt::encrypt($school_data->id)) }}'">Employees & students</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link {{ Request::segment(2) == 'password' ? 'active' : '' }} " onclick="window.location.href='{{ route('main.Customer_payment_status',Crypt::encrypt($school_data->id)) }}'">Payment & Contract</button>
                            </li>
                        </ul>