@foreach($orders as $val)
    <tr>
        <td>{{ $val->created_at }}</td>
        <td>{{ $val->makerToken->symbol }}</td>
        <td>{{ $val->takerToken->symbol }}</td>
        <td>{{ $val->price }}</td>
        <td>{{ $val->makerTokenAmount }}</td>
        <td>{{ $val->takerTokenAmount }}</td>
        @if($val->isValid)
            <td class="open">@lang('Open')</td>
        @else
            <td class="closed">{{ \App\ZeroExOrder::$errors[$val->state->error] }}</td>
        @endif
    </tr>
@endforeach
