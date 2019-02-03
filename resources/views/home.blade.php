@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <div class='col-md-12' id='messages'>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>

    window.Echo.channel('chat')
            .listen('MessageArrived', (e) => {
                console.log(e);
                var recipient_visitor = '<div class="container darker"><img src="{{asset('img/profile.png')}}" alt="Avatar" class="right"><p>' + e.message + '<span class="time-left">11:05</span></div>';
                var recipient_agent = '<div class="container"><img src="{{asset('img/profile.png')}}" alt="Avatar"><p>' + e.message + '<span class="time-right">11:05</span></div>';
                if (e.recipient = 'agent')
                    $('#messages').append(recipient_agent);
                else
                    $('#messages').append(recipient_visitor);
            });
            
            //.stopListening('MessageArrived');
</script>
@endsection
