<div class="col-sm-3">
			<a href="{{url($locale."/".$product->translit."/".Helper::getHotelTypeUrl($item->sektor)."/".$item->hotel_translit)}}">
				<div class="hotel-section marginSection shadow">	
					<div class="hotelHeader">{{$item->name}}</div>
					<div class="img1">
						<img align="center"  class="hotel_image img-fluid-height" src="{{url($image_path.'/smalldomgold/vadimtur'.$item->doma_id.'.jpg')}}" alt="{{$item->name}}">
					</div>
					<div class="hotelHeader">Подробно</div>
					<div class="hoteladditionalInfo">
						<div class="hotelAdditionalsectionAbsolute">
							<a href="{{url($locale."/".$product->translit)}}">{{$item->pname}}</a>
						</div>
					</div>
				</div>
			</a>
		</div>
