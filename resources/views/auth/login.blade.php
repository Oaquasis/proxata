@extends('layouts.master')

@section('content')
    <div class="columns is-centered is-full-height">
        <div class="column is-two-fifths-tablet is-one-third-desktop is-vertical-center">
            <div class="box is-square">
                <div class="box-header columns is-mobile">
                    <div class="column is-half has-text-left"><h1 style="padding:0.75em 0em">Login</h1></div>
                    <div class="column is-half has-text-right is-size-3"><h1>Proxata</h1></div>
                </div>
                <div class="content">
                    @auth
                        Welcome AUTHENTICATED USER
                    @else
                        Welcome Guest,
                    @endauth
                    <p class="is-small">Welcome to services guarded by Proxata.<br>
                    Please login below to continue.</p>
                </div>
                <div class="box-content">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="field">
                            <div class="control">
                                <input id="email" type="email" class="input is-square {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <input id="password" type="password" class="input is-square{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <button class="button is-square is-block is-primary is-fullwidth">Login</button>
                    </form>
                </div>
                <div class="box-footer"></div>
            </div>
        </div>
    </div>
@endsection