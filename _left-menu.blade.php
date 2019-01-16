<div class="markets_container">
    <div class="tabs m">

        <div class="markets-tabs">
            <ul class="tabs__caption">
                <li class="active">@lang('Markets')</li>
                <li>@lang('Wallet')</li>
            </ul>
            <span class="icon-burger"></span>
        </div>

        <div class="tabs__content active market-table">
            <div class="bg_transparent"></div>
            <div class="pairs_container">


                <div class="tabs2 pairs_tabs_wrap">
                    <div class="pairs_tabs">
                        <ul class="tabs_caption2">
                            <li class="active" onclick="toggleStars()">@lang('All')</li>
                            <li><i class="icon-star-on get-favorite-token-pairs"></i></li>
                        </ul>
                    </div>
                    <div class="tabs_content2 active">
                        <div class="search-wrap">
                            <input type="text" name="pair" placeholder="@lang('Search tokens')" class="search-tokens-input">
                            <i class="icon-Search"></i>
                        </div>
                        <div class="market-table-wrap">
                            <table>
                                <tr>
                                    <th>@lang('Pair')</th>
                                    <th>@lang('Price')</th>
                                    <th>@lang('Vol.')</th>
                                    <th>@lang('24h Change')</th>
                                </tr>
                                <tbody class="token-pairs-table">
                                    @include('dapp._token_pairs')
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tabs_content2">
                        <div class="market-table-wrap">
                            <table>
                                <tr>
                                    <th>@lang('Pair')</th>
                                    <th>@lang('Price')</th>
                                    <th>@lang('Vol.')</th>
                                    <th>@lang('24h Change')</th>
                                </tr>
                                <tbody class="favorite-token-pairs">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="chooseCurrency">
                <span class="currency-name">{{ $maker->symbol }} / {{ $taker->symbol }}</span>
            </div>

            <div class="market_info">
                @foreach($token_pairs as $val)
                    @if($val->taker_symbol == $taker->symbol)
                        <div class="market_info-row">
                            <div class="column-text">
                                <span>@lang('LAST TRADE PRICE')</span>
                                <strong>Ξ {{ count($transactions) ? $transactions[0]->taker_amount / $transactions[0]->maker_amount : 0 }} {{--/$0.00--}}</strong>
                            </div>
                            <div class="column-text">
                                <span>@lang('24H CHANGE')</span>
                                <strong>{{ $val->changed * -1 }}%</strong>
                            </div>
                        </div>
                        <div class="market_info-row">
                            <div class="column-text">
                                <span>@lang('Volume')</span>
                                <strong>Ξ {{ $val->volume }} {{--/$22434.79--}}</strong>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <div class="market-table-wrap">
                <table>
                    <tr>
                        <th>@lang('Coin')</th>
                        <th>@lang('Price')</th>
                        <th>@lang('Change')</th>
                    </tr>
                    <tbody>
                        @foreach(\App\Erc20Token::getTokenPairs('WETH', \Carbon\Carbon::now()->subDay()) as $token)
                            <tr>
                                <td>{{ $token->taker_symbol }}</td>
                                <td>{{ $token->price }}</td>
                                <td>{{ $token->changed }}%</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

        <div class="tabs__content">
            <div class="walletTab">
                <div class="wallet_block">
                    <span class="name">@lang('TOTAL') <br>@lang('HOLDINGS')</span>
                    {{--<span class="price">$0.00</span>--}}
                </div>
                <div class="wallet_block center">
                    <span class="title">@lang('Tokens')</span>
                </div>

                <div class="currency_block_scroll">
                    <div class="currency_block">
                        <div class="currency_block-name">
                            <strong>ETH</strong>
                            <span>ETHereum</span>
                        </div>
                        <div class="currency_block-value">
                            <span class="ETH-balance">0</span>
                            <small>$0.00</small>
                        </div>
                        <form class="wrap-form">
                            <input type="text" class="form__text form__text_buy" value="0" name="amount">
                            <button class="form__submit form__submit_buy">@lang('Wrap')</button>
                        </form>
                    </div>

                    <div class="currency_block">

                        <label class="switch">
                            <input type="checkbox" id="WETH-allowance" data-address="{{ $weth_token->address }}" data-decimals="{{ $weth_token->decimals }}" data-token="WETH" class="allowance-checkbox">
                            <span class="slider"></span>
                        </label>

                        <div class="currency_block-name">
                            <strong>WETH</strong>
                            <span>Wrapped Ether</span>
                        </div>
                        <div class="currency_block-value">
                            <span class="WETH-balance">0</span>
                            <small>$0.00</small>
                        </div>
                        <form class="withdraw-form">
                            <input type="text" class="form__text form__text_buy" value="0" name="amount">
                            <button class="form__submit form__submit_buy">@lang('Withdraw')</button>
                        </form>
                    </div>

                    @foreach($tokens as $val)
                        @if($val->symbol != 'WETH')
                            <div class="currency_block">

                                <label class="switch">
                                    <input type="checkbox" id="{{ $val->symbol }}-allowance" data-address="{{ $val->address }}" data-decimals="{{ $val->decimals }}" data-token="{{ $val->symbol }}" class="allowance-checkbox">
                                    <span class="slider"></span>
                                </label>

                                <div class="currency_block-name">
                                    <strong>{{ $val->symbol }}</strong>
                                    <span>{{ $val->name }}</span>
                                </div>
                                <div class="currency_block-value">
                                    <span class="{{ $val->symbol }}-balance">0</span>
                                    <small>$0.00</small>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

            </div>
        </div>

    </div><!-- .tabs-->
</div>
@section('javascript')
    <script src="/js/dapp.js"></script>
    <script>
        var tokens = @json($tokens);
        var wethTokenAddress = "{{ $weth_token->address }}";
        var rpcUrl = "{{ env('0X_RPC_URL', 'http://localhost:8545') }}";
        var networkId = {{ env('0X_NETWORK_ID', 42) }};

        $(document).on('click', '.toggle-favorite-token-pairs', function () {
            let maker = $(this).data('maker');
            let taker = $(this).data('taker');

            let favoriteTokenPairs;

            if (typeof localStorage['favoriteTokenPairs'] == 'undefined')
                favoriteTokenPairs = {};
            else
                favoriteTokenPairs = JSON.parse(localStorage['favoriteTokenPairs']);
            if (typeof favoriteTokenPairs[maker+taker] != 'undefined')
                delete favoriteTokenPairs[maker+taker];
            else
                favoriteTokenPairs[maker+taker] = {maker: maker, taker: taker};

            localStorage.setItem('favoriteTokenPairs', JSON.stringify(favoriteTokenPairs));
        });

        $(document).on('click', '.get-favorite-token-pairs', function () {
            if (typeof localStorage['favoriteTokenPairs'] == 'undefined') return;
            let favorite = JSON.parse(localStorage['favoriteTokenPairs']);
            if (!Object.keys(favorite).length) return;
            $.post('/dapp/pairs/favorite', {favorite: favorite, _token: '{{csrf_token()}}'}).done(function (data) {
                $('.favorite-token-pairs').empty();
                $('.favorite-token-pairs').append(data);
                toggleStars();
            })
        });

        function toggleStars() {
            $('.favorite i').removeClass('icon-star-on');
            if (typeof localStorage['favoriteTokenPairs'] == 'undefined') return;
            for (let key in JSON.parse(localStorage['favoriteTokenPairs'])) {
                $('.favorite-' + key + '-pair').addClass('icon-star-on')
            }
        }

        $(document).ready(function () {
            toggleStars();
        });

        $('.search-tokens-input').keyup(function(event) {
            if (event.keyCode === 13) {
                let search = $(this).val();
                if (search == '') search = '{{ $maker->symbol }}';
                $.get('/dapp/pairs/' + search).done(function (data) {
                    $('.token-pairs-table').empty();
                    $('.token-pairs-table').append(data);
                    toggleStars();
                })
            }
        });

        $(document).on('click', '.clickable-row', function () {
            window.location = $(this).data('href');
        })
    </script>
@endsection
