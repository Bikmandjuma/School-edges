@extends('mainHome.customer.cover')
@section('content')

      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-1 col-md-1"></div>
        <div class="col-lg-10 col-md-10 col-sm-12">

          <div class="title">
            <div id="chatbot" class="main-card collapsed">
              <div class="chat-area" id="message-box">
              </div>
              <div class="line"></div>
              <div class="input-div">
                <input class="input-message" name="message" type="text" id="message" placeholder="Type your message ..." />
                <button class="input-send" onclick="send()">
                  <svg style="width:24px;height:24px">
                    <path d="M2,21L23,12L2,3V10L17,12L2,14V21Z" />
                  </svg>
                </button>
              </div>
            </div>
        </div>
        <div class="col-lg-1 col-md-1"></div>

      </div>
@endsection