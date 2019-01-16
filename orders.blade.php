@extends('layouts.app')

@section('content')
    <main class="page-trade trade">
        @include('dapp._header')
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="currency_title">
                        <h1>@lang('My Orders')</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row tables-wrap">
                <div class="col-lg-12">
                    <div class="orders-table">
                        <h3>@lang('Open orders')</h3>
                        <div class="table-scroll">
                            <table>
                                <thead>
                                    <tr>
                                        <th>@lang('Time')</th>
                                        <th>@lang('Sell')</th>
                                        <th>@lang('Buy')</th>
                                        <th>@lang('Price')</th>
                                        <th>@lang('Sell Amount')</th>
                                        <th>@lang('Buy Amount')</th>
                                        <th class="status">@lang('Status')</th>
                                    </tr>
                                </thead>
                                <tbody class="js-orders-table-items">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row tables-wrap">
                <div class="col-lg-12">
                    <div class="orders-table">
                        <h3>@lang('Order history')</h3>
                        <div class="table-scroll">
                            <table>
                                <thead>
                                    <tr>
                                        <th>@lang('Time')</th>
                                        <th>@lang('Sell')</th>
                                        <th>@lang('Buy')</th>
                                        <th>@lang('Price')</th>
                                        <th>@lang('Sell Amount')</th>
                                        <th>@lang('Buy Amount')</th>
                                        <th class="status">@lang('Status')</th>
                                    </tr>
                                </thead>
                                <tbody class="js-orders-history-table-items">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row tables-wrap">
                <div class="col-lg-12">
                    <div class="orders-table">
                        <h3>Transactions</h3>
                        <div class="table-scroll">
                            <table>
                                <thead>
                                    <tr>
                                        <th>@lang('Time')</th>
                                        <th>@lang('Sell')</th>
                                        <th>@lang('Buy')</th>
                                        <th>@lang('Price')</th>
                                        <th>@lang('Sell Amount')</th>
                                        <th>@lang('Buy Amount')</th>
                                    </tr>
                                </thead>
                                <tbody class="js-transactions-table-items">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('dapp._left-menu')
    </main>
@endsection
