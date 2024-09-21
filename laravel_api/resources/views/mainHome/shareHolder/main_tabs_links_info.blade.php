<ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <button class="nav-link {{ Request::segment(2) == 'view_single_school_info' ? 'active' : '' }}" data-bs-toggle="tab" data-bs-target="#profile-overview" onclick="window.location.href='{{ route('main.view_single_school_info',Crypt::encrypt($school_data->id)) }}'">Overview</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link {{ Request::segment(2) == 'edit_customer_info' ? 'active' : '' }}" onclick="window.location.href='{{ route('main.Customer_edit_info',Crypt::encrypt($school_data->id)) }}'">Edit info</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link {{ Request::segment(2) == 'customer_employee_student' ? 'active' : '' }}" onclick="window.location.href='{{ route('main.Customer_employee_student',Crypt::encrypt($school_data->id)) }}'">Employees & students</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link {{ Request::segment(2) == 'customer_payment_status' ? 'active' : '' }} " onclick="window.location.href='{{ route('main.Customer_payment_status',Crypt::encrypt($school_data->id)) }}'">Payment & Contract</button>
                            </li>
                        </ul>