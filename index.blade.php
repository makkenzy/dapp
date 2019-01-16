@extends('layouts.app')

@section('content')
<div class="middle clearfix">
    <div class="middle__container container">
        <div class="terms all_text">
            <div class="tradeHome__content">
                <form class="form form_trade form_sell wrap-form">
                    <h2 class="form__title">Wrap ETH</h2>
                    <div class="form__content">
                        <div class="form__item form__item_text form__item_buy form-group">
                            <input type="text" class="form__text form__text_buy" placeholder="Amount" name="amount">
                        </div>
                    </div>
                    <div class="form__footer">
                        <div class="form__actions form__actions_buy">
                            <input type="submit" class="form__submit form__submit_buy" value="Wrap">
                        </div>
                    </div>
                </form>
                <form class="form form_trade form_sell withdraw-form">
                    <h2 class="form__title">Withdraw ETH</h2>
                    <div class="form__content">
                        <div class="form__item form__item_text form__item_buy form-group">
                            <input type="text" class="form__text form__text_buy" placeholder="Amount" name="amount">
                        </div>
                    </div>
                    <div class="form__footer">
                        <div class="form__actions form__actions_buy">
                            <input type="submit" class="form__submit form__submit_buy" value="Withdraw">
                        </div>
                    </div>
                </form>
            </div>
            <section class="sellTable">
                <div class="container">
                    <div class="sellTable__content">
                        <h2 class="sellTable__title">ERC 20 TOKENS</h2>

                        <h2 class="sellTable__title trades-not-found-msg" style="display:none">Where is nothing found by your request. You can check available trades in GB</h2>

                        <table>
                            <thead>
                            <tr>
                                <th>Symbol</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Allowance</th>
                                <th>Balance</th>
                                {{--<th>Limits</th>--}}
                            </tr>
                            </thead>
                            <tbody class="trades-table">

                            @foreach($tokens as $val)

                                <tr>
                                    <td>
                                        <a class="sellTable__name" href="#"> {{ $val->symbol }} </a>
                                    </td>
                                    <td>
                                        <div class="sellTable__label">{{ $val->name }}</div>
                                    </td>
                                    <td>
                                        <div class="sellTable__location">{{ $val->address }}</div>
                                    </td>
                                    <td>
                                        <div class="sellTable__currency">
                                            <span>
                                                <div class="form__item form__item_check">
                                                    <input id="{{ $val->symbol }}-allowance" data-address="{{ $val->address }}" data-decimals="{{ $val->decimals }}" data-token="{{ $val->symbol }}" type="checkbox" class="form__checkbox allowance-checkbox" >
                                                    <label for="{{ $val->symbol }}-allowance"></label>
                                                </div>
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="sellTable__price"><span id="{{ $val->symbol }}-balance">0</span></div>
                                    </td>
                                    {{--<td>--}}
                                        {{--<div class="sellTable__price">{{ number_format($val->min_limit) }} - {{ number_format($val->max_limit) }} <span>{{ $val->currency->code }}</span></div>--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                        {{--@if(Auth::guest() || Auth::id() != $val->user_id)--}}
                                            {{--<a href="{{ url('/trades', $val->id) }}" class="sellTable__btn">{{ \App\Trade::$types[$val->type == \App\Trade::TYPE_BUY ? \App\Trade::TYPE_SELL : \App\Trade::TYPE_BUY] }}</a>--}}
                                        {{--@else--}}
                                            {{--<a href="{{ url('/trades', $val->id) }}" class="sellTable__btn">Details</a>--}}
                                        {{--@endif--}}
                                    {{--</td>--}}
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        <div class="sellTable__footer">
                        </div>
                    </div>
                </div>
            </section>
            <h1>Create Order</h1>

            <div class="tradeHome__content">
                <form class="form form_trade form_sell trade-form-create-order">
                    <h2 class="form__title">Buy</h2>
                    <div class="form__content">
                        <div class="form__item form__item_text form__item_buy form-group">
                            <input type="text" class="form__text form__text_buy" placeholder="Amount" name="takerTokenAmount">
                        </div>
                    </div>
                    <div class="form__item form__item_select form__item_buy form-group">
                        <select class="form__select form__select_buy" name="takerTokenAddress">
                            <option value="">Select Token</option>
                            @foreach($tokens as $val)
                                <option value="{{ $val->address }}">{{ $val->symbol }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form__item form__item_select form__item_buy form-group">
                        <p>For</p>
                    </div>
                    <div class="form__content">
                        <div class="form__item form__item_text form__item_buy form-group">
                            <input type="text" class="form__text form__text_buy" placeholder="Amount" name="makerTokenAmount">
                        </div>
                    </div>
                    <div class="form__item form__item_select form__item_buy form-group">
                        <select class="form__select form__select_buy" name="makerTokenAddress">
                            <option value="">Select Token</option>
                            @foreach($tokens as $val)
                                <option value="{{ $val->address }}">{{ $val->symbol }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form__footer">
                        <div class="form__actions form__actions_buy">
                            <input type="submit" class="form__submit form__submit_buy" value="Buy">
                        </div>
                    </div>
                </form>
                <form class="form form_trade form_sell trade-form-create-order">
                    <h2 class="form__title">Sell</h2>
                    <div class="form__content">
                        <div class="form__item form__item_text form__item_buy form-group">
                            <input type="text" class="form__text form__text_buy" placeholder="Amount" name="makerTokenAmount">
                        </div>
                    </div>
                    <div class="form__item form__item_select form__item_buy form-group">
                        <select class="form__select form__select_buy" name="makerTokenAddress">
                            <option value="">Select Token</option>
                            @foreach($tokens as $val)
                                <option value="{{ $val->address }}">{{ $val->symbol }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form__item form__item_select form__item_buy form-group">
                        <p>For</p>
                    </div>
                    <div class="form__content">
                        <div class="form__item form__item_text form__item_buy form-group">
                            <input type="text" class="form__text form__text_buy" placeholder="Amount" name="takerTokenAmount">
                        </div>
                    </div>
                    <div class="form__item form__item_select form__item_buy form-group">
                        <select class="form__select form__select_buy" name="takerTokenAddress">
                            <option value="">Select Token</option>
                            @foreach($tokens as $val)
                                <option value="{{ $val->address }}">{{ $val->symbol }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form__footer">
                        <div class="form__actions form__actions_buy">
                            <input type="submit" class="form__submit form__submit_buy" value="Sell">
                        </div>
                    </div>
                </form>
            </div>

            <section class="sellTable">
                <div class="container">
                    <div class="sellTable__content">
                        <h2 class="sellTable__title">ERC 20 TOKENS</h2>

                        <h2 class="sellTable__title trades-not-found-msg" style="display:none">Where is nothing found by your request. You can check available trades in GB</h2>

                        <table>
                            <thead>
                            <tr>
                                <th>MakerTokenSymbol</th>
                                <th>TakerTokenSymbol</th>
                                <th>MakerTokenAmount</th>
                                <th>TakerTokenAmount</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody class="trades-table">

                            @foreach($orders as $val)

                                <tr>
                                    <td>
                                        <a class="sellTable__name" href="#"> {{ $val->maker_symbol }} </a>
                                    </td>
                                    <td>
                                        <div class="sellTable__label">{{ $val->taker_symbol }}</div>
                                    </td>
                                    <td>
                                        <div class="sellTable__location">{{ $val->makerTokenAmount / 10 ** $val->maker_decimals }}</div>
                                    </td>
                                    <td>
                                        <div class="sellTable__price">{{ $val->takerTokenAmount  / 10 ** $val->taker_decimals }}</div>
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)" data-hash="{{ $val->orderHash }}" class="fill-order-btn sellTable__btn">Trade</a>
                                    </td>
                                    {{--<td>--}}
                                    {{--<div class="sellTable__price">{{ number_format($val->min_limit) }} - {{ number_format($val->max_limit) }} <span>{{ $val->currency->code }}</span></div>--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                    {{--@if(Auth::guest() || Auth::id() != $val->user_id)--}}
                                    {{--<a href="{{ url('/trades', $val->id) }}" class="sellTable__btn">{{ \App\Trade::$types[$val->type == \App\Trade::TYPE_BUY ? \App\Trade::TYPE_SELL : \App\Trade::TYPE_BUY] }}</a>--}}
                                    {{--@else--}}
                                    {{--<a href="{{ url('/trades', $val->id) }}" class="sellTable__btn">Details</a>--}}
                                    {{--@endif--}}
                                    {{--</td>--}}
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        <div class="sellTable__footer">
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
@section('javascript')
    <script src="/js/dapp.js"></script>
    <script>
        var tokens = @json($tokens);
        var wethTokenAddress = "{{ $weth_token->address }}";
    </script>
@endsection
