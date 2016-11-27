@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    @yield('content')
                    <router-view>
                        <div class="panel-body">
                            Loading...
                        </div>
                    </router-view>
                </div>

            </div>
        </div>
    </div>
@endsection
