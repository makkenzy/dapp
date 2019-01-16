@extends('layouts.app')

@section('content')
    <main class="page-trade trade">
        @include('dapp._header')

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="currency_title">
                        <h1>{{ $maker->symbol }}/{{ $taker->symbol }}</h1>
                        <span>{{ $maker->name }}/{{ $taker->name }}</span>
                        <small>{{ $maker->address }}</small>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="price_container">
                        <div class="lastprice">
                            <span class="price__col-name">@lang('LAST PRICE')</span>
                            <span class="price__col-val">{{ count($transactions) ? $transactions[0]->taker_amount / $transactions[0]->maker_amount : 0 }} $0.00</span>
                        </div>
                        <div class="hr24change borders">
                            <span class="price__col-name">@lang('24 HR CHANGE')</span>
                            <span class="price__col-val">-0.00015763 -5.89%</span>
                        </div>
                        <div class="hr24high">
                            <span class="price__col-name">@lang('24 HR HIGH')</span>
                            <span class="price__col-val">0.00264918</span>
                        </div>
                        <div class="hr24low borders">
                            <span class="price__col-name">@lang('24 HR LOW')</span>
                            <span class="price__col-val">0.00251831</span>
                        </div>
                        <div class="hr24volum">
                            <span class="price__col-name">@lang('24 HR VOLUME')</span>
                            <span class="price__col-val">2.329 WETH</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="chart-wrapper">
                        <div id="container" style="height: 360px; width: 100%"></div>

                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="trade-wrapper">

                        <div class="option-container">
                            <h2>Buy {{ $maker->symbol }}</h2>

                            <form class="buysellForm trade-form-create-order">
                                <input type="hidden" name="takerTokenAddress" value="{{ $maker->address }}">
                                <input type="hidden" name="makerTokenAddress" value="{{ $taker->address }}">
                                <div class="form-field">
                                    <label>@lang('Price')</label>
                                    <input type="text" name="makerTokenAmount" placeholder="{{ $taker->symbol }}">
                                </div>

                                <div class="form-field">
                                    <label>@lang('Ammount')</label>
                                    <input type="text" name="takerTokenAmount" placeholder="{{ $maker->symbol }}">
                                </div>

                                {{--<div class="form-field">--}}
                                    {{--<label></label>--}}
                                    {{--<div class="button-group">--}}
                                        {{--<button type="button">25%</button>--}}
                                        {{--<button type="button">50%</button>--}}
                                        {{--<button type="button">75%</button>--}}
                                        {{--<button type="button">100%</button>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                <div class="form-field total">
                                    <label>@lang('Total')</label>
                                    <span><span class="{{ $taker->symbol }}-balance">0</span> {{ $taker->symbol }} {{--($0.0000)--}}</span>
                                </div>

                                <div class="form-field trading">
                                    <label>@lang('Trading Fee:')</label>
                                    <span>{{ settings('zeroExMakerFee') }} ZRX {{--(0.00%)--}}</span>
                                </div>

                                {{--<div class="advanced-container">
                                    <div class="form-field">
                                        <label></label>
                                        <div class="advanced-option">
                                            <div class="toggle-indicator">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </div>
                                            <span class="text">Advanced</span>
                                        </div>
                                    </div>

                                    <div class="hidden-advanced">
                                        <div class="form-field">
                                            <label>Gas Price</label>
                                            <input type="text" name="GWEI" placeholder="GWEI">
                                        </div>

                                        <div class="form-field">
                                            <label>Order Expiry</label>
                                            <input type="text" name="MIN" placeholder="MIN">
                                        </div>
                                    </div>
                                </div>--}}
                                <button class="form__submit form__submit_buy">@lang('Place Buy Order')</button>
                            </form>
                        </div>

                        <div class="option-container">
                            <h2>Sell {{ $maker->symbol }}</h2>

                            <form class="buysellForm trade-form-create-order">

                                <input type="hidden" name="takerTokenAddress" value="{{ $taker->address }}">
                                <input type="hidden" name="makerTokenAddress" value="{{ $maker->address }}">

                                <div class="form-field">
                                    <label>@lang('Price')</label>
                                    <input type="text" name="takerTokenAmount" placeholder="{{ $taker->symbol }}">
                                </div>

                                <div class="form-field">
                                    <label>@lang('Ammount')</label>
                                    <input type="text" name="makerTokenAmount" placeholder="{{ $maker->symbol }}">
                                </div>

                                {{--<div class="form-field">--}}
                                    {{--<label></label>--}}
                                    {{--<div class="button-group">--}}
                                        {{--<button type="button">25%</button>--}}
                                        {{--<button type="button">50%</button>--}}
                                        {{--<button type="button">75%</button>--}}
                                        {{--<button type="button">100%</button>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                <div class="form-field total">
                                    <label>@lang('Total')</label>
                                    <span><span class="{{ $maker->symbol }}-balance">0</span> {{ $maker->symbol }} {{--($0.0000)--}}</span>
                                </div>

                                <div class="form-field">
                                    <label>@lang('Trading Fee:')</label>
                                    <span>{{ settings('zeroExMakerFee') }} ZRX {{--(0.00%)--}}</span>
                                </div>

                                {{--<div class="advanced-container">
                                    <div class="form-field">
                                        <label></label>
                                        <div class="advanced-option">
                                            <div class="toggle-indicator">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </div>
                                            <span class="text">Advanced</span>
                                        </div>
                                    </div>

                                    <div class="hidden-advanced">
                                        <div class="form-field">
                                            <label>Gas Price</label>
                                            <input type="text" name="GWEI" placeholder="GWEI">
                                        </div>

                                        <div class="form-field">
                                            <label>Order Expiry</label>
                                            <input type="text" name="MIN" placeholder="MIN">
                                        </div>
                                    </div>
                                </div>--}}
                                <button class="form__submit form__submit_buy">@lang('Place Sell Order')</button>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="row stretch tables-wrap">
                <div class="col-lg-6 col-md-12">
                    <div class="orders-table md-margin">
                        <h3>@lang('Buy orders')</h3>
                        <div class="table-scroll">
                            <table>
                                <tr>
                                    <th class="PriceWETH">@lang('Price') {{ $maker->symbol }}</th>
                                    <th>{{ $taker->symbol }}</th>
                                    <th>{{ $maker->symbol }}</th>
                                </tr>
                                @foreach($orders as $val)
                                    @if($val->taker_symbol == $maker->symbol)
                                        <tr>
                                            <td>{{ number_format($val->maker_amount / $val->taker_amount, 8) }}</td>
                                            <td>{{ $val->maker_amount }}</td>
                                            <td>{{ $val->taker_amount }}</td>
                                            <td><button class="trade_btn fill-order-btn" data-hash="{{ $val->orderHash }}">@lang('Trade')</button></td>
                                        </tr>
                                    @endif
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="orders-table">
                        <h3>@lang('Sell orders')</h3>
                        <div class="table-scroll">
                            <table>
                                <tr>
                                    <th class="PriceWETH">@lang('Price') {{ $taker->symbol }}</th>
                                    <th>{{ $maker->symbol }}</th>
                                    <th>{{ $taker->symbol }}</th>
                                </tr>
                                @foreach($orders as $val)
                                    @if($val->taker_symbol == $taker->symbol)
                                        <tr>
                                            <td>{{ number_format($val->maker_amount / $val->taker_amount, 8) }}</td>
                                            <td>{{ $val->maker_amount }}</td>
                                            <td>{{ $val->taker_amount }}</td>
                                            <td><button class="trade_btn fill-order-btn" data-hash="{{ $val->orderHash }}">@lang('Trade')</button></td>
                                        </tr>
                                    @endif
                                @endforeach
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
                        <h3>@lang('Recent Market History')</h3>
                        <div class="table-scroll recent">
                            <table>
                                <thead>
                                <tr>
                                    <th class="time">@lang('Time')</th>
                                    <th class="type">@lang('Type')</th>
                                    <th>Price {{ $maker->symbol }}</th>
                                    <th>{{ $taker->symbol }}</th>
                                    <th>{{ $maker->symbol }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($transactions as $val)
                                        <tr>
                                            <td>{{ $val->created_at }}</td>
                                            <td>{{ $val->maker_symbol == $maker->symbol ? trans('Sell') : trans('Buy') }}</td>
                                            <td>{{ number_format($val->taker_amount / $val->maker_amount, 8) }}</td>
                                            <td>{{ number_format($val->taker_amount, 8) }}</td>
                                            <td>{{ number_format($val->maker_amount, 8) }}</td>
                                        </tr>
                                    @endforeach
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
@section('highcharts-script')
    <script>
        var chartTitle = '{{ $maker->symbol . '/' . $taker->symbol }}';
    </script>
    <script src="https://code.highcharts.com/stock/highstock.js"></script>
    <script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
    <script src="/js/highcharts.js"></script>
@endsection
