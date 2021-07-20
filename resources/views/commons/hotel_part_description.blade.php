<?php
$sektor = Helper::getHotelTypeUrl($item->sektor);
		
		
			?>
			<div class="col-sm-12">
				<div class="article-section1 marginSection shadow1">
					<?php if($title != "wellcom"){?>	
						<div class="hotel-section-title"><?php echo($title)?></div>
					<?php } ?>	
					<div class="hotel-section-text row float-left" style="margin-right: 0px;margin-left: 0px;">
						<?php
						if($hotel_rooms != ""){
							
							foreach($rooms as $room){
								$roomUrl = $path."/".$sektor."/".$item->hotel_translit."/".Translit::encodestring($room->name)."-".$room->room_id;
								//echo($roomUrl."<br>");
								if($room->typeroom == $typeroom){
									?>
									<div class="col-sm-4">
										<div class="hotel-section marginSection shadow">
											<!--<a class='room-' href="<?php echo($roomUrl)?>">-->
												<div>
													<div class='hotelHeader'><?php echo($room->name)?></div>
													<img class="img img-fluid-height" src="{{url($image_path.'/roomfotosmall/rest'.$room->room_id.'.jpg')}}" alt="<?php echo($room->name)?>">
													<div class='hotelHeader'>Подробно...</div>
												</div>
											<!--</a>-->
										</div>
									</div>
									
									<?php
								}
							}
						}
						?>
						<span class=""><?php echo($paragraph_title)?></span>
						
						
					</div>			
				</div>
			 </div>
	
		
