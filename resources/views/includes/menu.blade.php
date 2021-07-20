@foreach ($hotel_types as $hotel_type)
		<a href="{{url($locale.'/'.$hotel_type->url)}}">{{ $hotel_type->name }}</a>
@endforeach
