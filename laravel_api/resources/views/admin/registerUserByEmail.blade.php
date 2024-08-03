@extends('admin.cover')
@section('content')
  <div class="pagetitle">
      <h1>System users</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">System-users</li>
          <li class="breadcrumb-item active">register-users</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">

          <div class="card">
            <div class="card-body text-center" style="overflow: auto;">
        				<h5 class="card-title">Send an email to a new user</h5>
                <p>You have to send an email to a new system user so that he/she can register him/her self !</p>

                @if($errors->any())
                  <div class="d-flex align-items-center justify-content-center" id="error_msg">
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          @foreach($errors->all() as $error)
                              {{ $error }}<br>
                          @endforeach
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                  </div>
                @endif
        		</div>

            <div class="row">
              <div class="col-lg-1"></div>
              <div class="col-lg-10">
                <form action="{{ route('submitUserEmailToRegister') }}" method="POST" style="display: flex; flex-direction: column; align-items:center;">
                  @csrf
                  <input type="text" name="email" class="form-control" placeholder="Enter email">
                  <br>
                  <button class="btn btn-primary mb-4" type="submit">Send&nbsp;<i class="fa fa-paper-plane"></i></button>
                </form>
                @if($count_email_user != 0)
                  <button class="btn btn-secondary mb-4 float-right" style="display: flex; flex-direction: column; align-items: center;" data-bs-toggle="modal" data-bs-target="#EmailDataModal">
                    <span>User not registered yet&nbsp;<i class="badge badge-light mt-2">{{$data_count_email}}</i></span>
                    
                  </button>

                @endif
              </div>
              <div class="col-lg-1"></div>
              
            </div>
          </div>

        </div>
        <div class="col-lg-2"></div>
      </div>
    </section>

  <div class="modal fade" id="EmailDataModal" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <div class="modal-header"style="display: flex; flex-direction: column; align-items:center;">
                <h5 class="modal-title">System users' email not registered yet !&nbsp;&nbsp;<i class="fa fa-anvelope"></i> </h5>
              </div>

              <div class="modal-body">
                <table b border="1" class="table table-bordered table-striped">
                  <thead>
                    <tr class="text-center">
                      <th>N<sup>o</sup></th>
                      <th>Email</th>
                      <th>Time-ago</th>
                    </tr>
                  </thead>
                  
                    @foreach($data_email as $data)
                      
                        <tr>
                          <td>{{ $count++ }}</td>
                          <td>{{ $data->email }}</td>
                          @php
                            $dateTime=new DateTime($data->created_at);
                            $now=new DateTime();
                            $diff=$now->diff($dateTime);
                            
                            if ($diff -> y >0) {
                                $timeAgo=$diff->y." year".($diff->y >1 ? "s" : ""). " ago";
                            }elseif($diff -> m >0) {
                                $timeAgo=$diff->m." month".($diff->m >1 ? "s" : ""). " ago";
                            }elseif($diff -> d >0) {
                                $timeAgo=$diff->d." day".($diff->d >1 ? "s" : ""). " ago";
                            }elseif($diff -> h >0) {
                                $timeAgo=$diff->h." hour".($diff->h >1 ? "s" : ""). " ago";
                            }elseif($diff -> i >0) {
                                $timeAgo=$diff->i." min". " ago";
                            }else{
                                $timeAgo="Just now";
                            }
                          @endphp
                          <td><b>{{ $timeAgo }}</b></td>
                        </tr>
                      
                    @endforeach
                
                </table>
              </div>
              <div class="modal-footer">
                <button class="btn btn-danger" class="btn-close" data-bs-dismiss="modal" aria-label="Close">Close&nbsp;<i class="fa fa-times"></i></button>
              </div>
              
          </div>
      </div>
  </div>

    <script type="text/javascript">
      setTimeout(function(){
          document.getElementById('error_msg').style.display="none";
        },5000);
    </script>
@endsection