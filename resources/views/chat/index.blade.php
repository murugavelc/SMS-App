@extends('layouts.dashboard')
@section('page_heading','Chat Room')

@section('section')
    <div class="chat_box">
        <div class="chat_head"> Chat Box</div>
        <div class="chat_body">
            @foreach($users as $user=> $value)
                <div class="user" id="user"  onclick="selectedUser('{{ $value->user_id }}','{{ $value->name }}')">{{ $value->name }}
                </div>
            @endforeach
        </div>

    </div>

    <div class="msg_box" style="right:290px">
        <div class="msg_head">{{ $value->name }}
            <div class="close">x</div>
        </div>
        <div class="msg_wrap">
            <div class="msg_body" id = "msg_body">
                <div class="msg_a">This is from A	</div>
                <div class="msg_b">This is from B, and its amazingly kool nah... i know it even i liked it :)</div>
                <div class="msg_a">Wow, Thats great to hear from you man </div>
                <div class="msg_push"></div>
            </div>
            <form align="center" method=POST>
                <div class="input-group">
                    <input type="text" id="mainText" class="form-control"  align="center" placeholder="Typing here..">
                    <span class="input-group-btn">
                        <button id="submit" class="btn btn-default" onclick="getText('{{ Auth::user()->id }}')">Send</button>
                    </span>
                </div>
            </form>
            <br>
          <!--  <div class="msg_footer"><textarea class="msg_input" rows="4"></textarea></div> -->
        </div>
    </div>
@endsection
@include('widgets.panel', array('header'=>true, 'as'=>'cotable'))

@stop
