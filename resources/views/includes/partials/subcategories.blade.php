@foreach($subcategories as $sc)
	<li><a href="{{route('shop.index',['subcategory' => $sc->slug])}}">{{$sc->name}}</a></li>
@endforeach