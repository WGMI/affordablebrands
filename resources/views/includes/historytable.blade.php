<table>
    <thead>
        <tr>
            <th>Date</th>
            <th class="p-name">Items</th>
            <th>Amount</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $item)
            <tr>
                <td class="cart-title">
                    <h5>{{\Carbon\Carbon::parse($item->created_at)->format('d, M y')}}</h5>
                </td>
                <td class="qua-col">
                    <ul>
                        @foreach($item->products as $p)
                            <li>{{$p->name}}</li>
                        @endforeach
                    </ul>
                </td>
                <td class="total-price">Ksh {{$item->amount}}</td>
                <td class="status"><span class="badge badge-primary">{{$item->status}}</span></td>
            </tr>
        @endforeach
    </tbody>
</table>