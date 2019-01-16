@foreach($token_pairs as $val)
    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
        <a href="{{ url('/dapp/trade/' . $val->maker_symbol . '/' . $val->taker_symbol) }}" class="currency__block">
            <div class="currency__block-info">
                <img src="/{{ str_replace('public', 'storage', $val->taker_icon) }}" alt="symbol">
                <div class="title">
                    <h3>{{ $val->maker_symbol }} / {{ $val->taker_symbol }} @lang('AVAILABLE')</h3>
                    {{--<span>203531.4</span>--}}
                    {{--<small>$205886.9</small>--}}
                </div>
            </div>
            <div class="currency__block-price">
                <small>@lang('PRICE')</small>
                <strong>{{ $val->price }} WETH</strong>
            </div>
            <div class="currency__block-change">
                <div>
                    <small>@lang('24HR CHANGE')</small>
                    <strong>{{ $val->changed }}%</strong>
                </div>
                <div>
                    <small>@lang('24HR VOLUME')</small>
                    <strong>{{ $val->volume }} WETH</strong>
                </div>
            </div>

            <div>
                <div class="stats_chart" id="{{ $val->maker_symbol . '-' . $val->taker_symbol }}-highcharts-container" style="height: 100px; width: 100%"></div>
            </div>
        </a>
    </div>
@endforeach
