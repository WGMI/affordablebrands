@foreach(App\Category::all() as $c)
	<li><a href="{{route('shop.index',['category' => $c->slug])}}">{{$c->name}}</a></li>
@endforeach