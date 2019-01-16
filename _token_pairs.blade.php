@foreach($token_pairs as $val)
    <tr class="clickable-row" data-href="/dapp/trade/{{ $val->maker_symbol }}/{{ $val->taker_symbol }}">
        <td>{{ $val->maker_symbol }} / {{ $val->taker_symbol }}</td>
        <td>Ξ {{ $val->price }}</td>
        <td>Ξ {{ $val->volume }}</td>
        <td>
            <div class="favorite">
                <span>{{ $val->changed * -1}}%</span>
                <i class="icon-star toggle-favorite-token-pairs favorite-{{ $val->maker_symbol . $val->taker_symbol }}-pair" data-maker="{{ $val->maker_symbol }}" data-taker="{{ $val->taker_symbol }}"></i>
            </div>
        </td>
    </tr>
@endforeach
