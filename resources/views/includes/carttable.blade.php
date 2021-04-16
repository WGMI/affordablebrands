<table>
    <thead>
        <tr>
            <th>Image</th>
            <th class="p-name">Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach(Cart::content() as $item)
        
            <tr>
                <td class="cart-pic" style="padding: 10px"><img src="{{asset('storage/'.$item->model->image)}}" alt=""></td>
                <td class="cart-title">
                    <h5>{{$item->model->name}}</h5>
                </td>
                <td class="p-price">{{$item->model->presentPrice()}}</td>
                <td class="qua-col">
                    <form action="{{url('/cartupdate')}}/{{$item->rowId}}" method="POST">
                        @csrf
                        <select name="quantity" onchange="this.form.submit()">
                            @for($x=1;$x<6;$x++)
                                <option value="{{$x}}" {{$item->qty==$x ? 'selected':''}}>{{$x}}</option>
                            @endfor
                        </select>
                    </form>
                </td>
                <td class="total-price">Ksh {{$item->qty * $item->model->price}}</td>
                <td class="close-td">
                    <form action="{{route('cart.destroy',$item->rowId)}}" method="POST" id="remove-{{$item->rowId}}">
                        @csrf
                        {{method_field('DELETE')}}
                        <button type="submit" class="btn btn-danger">
                            Remove
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>