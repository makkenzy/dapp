@foreach($transactions as $val)
    <tr>
        <td>{{ $val->created_at }}</td>
        @if($val->order->maker == $address)
            <td>{{ $val->order->makerToken->symbol }}</td>
            <td>{{ $val->order->takerToken->symbol }}</td>
            <td>{{ number_format($val->order->takerTokenAmount / $val->order->makerTokenAmount, 6) }}</td>
            <td>{{ $val->filledMakerTokenAmount }}</td>
            <td>{{ $val->filledTakerTokenAmount }}</td>
        @else
            <td>{{ $val->order->takerToken->symbol }}</td>
            <td>{{ $val->order->makerToken->symbol }}</td>
            <td>{{ number_format($val->order->makerTokenAmount / $val->order->takerTokenAmount, 6) }}</td>
            <td>{{ $val->filledTakerTokenAmount }}</td>
            <td>{{ $val->filledMakerTokenAmount }}</td>
        @endif
    </tr>
@endforeach
