<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    {{ config('app.name') }}
                </div>

                <div class="links">
                    <a href="{{ route('credit.account') }}" onclick="event.preventDefault(); document.getElementById('credit-account').submit();">{{ __('Deposite') }}</a>
                    <a href="{{ route('debit.account') }}" onclick="event.preventDefault(); document.getElementById('debit-account').submit();">{{ __('Withdraw') }}</a>
                    <a href="{{ route('credit.paybill') }}" onclick="event.preventDefault(); document.getElementById('credit-paybill').submit();">{{ __('Pay via Paybill') }}</a>
                    <a href="{{ route('credit.airtime') }}" onclick="event.preventDefault(); document.getElementById('credit-airtime').submit();">{{ __('Buy Airtime') }}</a>
                </div>

                <form id="credit-account" action="{{ route('credit.account') }}" method="POST" style="display: none;">
                    @csrf
                    <input type="hidden" name="transaction_type_id" value="1">
                    <input type="hidden" name="transaction_amount" value="10000">
                    <input type="hidden" name="customer_id" value="1">
                </form>

                <form id="debit-account" action="{{ route('debit.account') }}" method="POST" style="display: none;">
                    @csrf
                    <input type="hidden" name="transaction_type_id" value="2">
                    <input type="hidden" name="transaction_amount" value="5000">
                    <input type="hidden" name="customer_id" value="1">
                </form>

                <form id="credit-paybill" action="{{ route('credit.paybill') }}" method="POST" style="display: none;">
                    @csrf
                    <input type="hidden" name="transaction_type_id" value="3">
                    <input type="hidden" name="transaction_amount" value="2000">
                    <input type="hidden" name="customer_id" value="1">
                </form>

                <form id="credit-airtime" action="{{ route('credit.airtime') }}" method="POST" style="display: none;">
                    @csrf
                    <input type="hidden" name="transaction_type_id" value="4">
                    <input type="hidden" name="transaction_amount" value="1000">
                    <input type="hidden" name="customer_id" value="1">
                </form>

            </div>
        </div>
    </body>
</html>