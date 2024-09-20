@extends('mainHome.shareHolder.cover')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body" style="overflow: auto;">
                    <h5 class="card-title">All Schools Not Allowed Yet 
                        <span class="badge text-white bg-primary badge-number">{{ $school_count }}</span>
                    </h5>

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th><b>N</b>o</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Country</th>
                                <th>Time Ago</th>
                                <th>Confirm</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($school_data as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->school_name }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->phone }}</td>
                                <td>{{ $data->country }}</td>
                                <td>{{ $data->time_ago }}</td>
                                @if($data->status == 'Allowed')
                                    <td>
                                        <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#allowedModal">
                                            Allowed&nbsp;<i class="fas fa-check"></i>
                                        </button>
                                    </td>
                                @else
                                    <td>
                                        <!-- Trigger the modal -->
                                        <button class="btn btn-danger allow-btn" data-id="{{ Crypt::encrypt($data->id) }}" data-bs-toggle="modal" data-bs-target="#confirmModal">
                                            Not yet&nbsp;<i class="fas fa-question"></i>
                                        </button>
                                    </td>
                                @endif
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Confirmation Modal -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Confirm Action</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to allow this school to register?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmAllow">Allow</button>
            </div>
        </div>
    </div>
</div>

<!-- Allowed Modal -->
<div class="modal fade" id="allowedModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            
            <div class="modal-body align-items-center text-center">
                Allowed to register ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let schoolId = '';

        // Get all "Allow" buttons and attach event listener
        document.querySelectorAll('.allow-btn').forEach(button => {
            button.addEventListener('click', function() {
                // Set the schoolId when the modal is opened
                schoolId = this.getAttribute('data-id');
            });
        });

        // Handle the modal confirmation action
        document.getElementById('confirmAllow').addEventListener('click', function() {
            if (schoolId) {
                // Redirect to the allow school route with the schoolId
                window.location.href = "{{ route('main.allowed_school_to_register', '') }}/" + schoolId;
            }
        });
    });
</script>
@endsection
