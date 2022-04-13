@extends('layouts.app')

@section('content')
<div class="container text-center">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card">
                @if(Session::has("message"))
                    <p>{{session("message")}}</p>
                @endif
                <p class="card-header">名前:{{$user->name}}</p>
                @if(Session::has('top_image_pass'))
                    <img src="{{asset('storage/top_file')}}/{{session('top_image_pass')}}" alt="大">
                @elseif($user->profile_image == "/def_img/noimage.png")
                    <p><img src="{{$user->profile_image}}" alt="中"></p>
                @else
                    <p><img src="{{ asset('/storage/top_file') }}/{{ $user->profile_image }}" alt=""> </p>
                @endif

                <form action="/home" method="post" enctype='multipart/form-data'>
                    {{ csrf_field() }}
                    <div>
                        <input type="file" name="top_image">
                    </div>
                    <button>変更</button>
                </form>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
