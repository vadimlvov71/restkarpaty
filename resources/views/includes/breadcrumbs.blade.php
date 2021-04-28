<section id="inner-headline">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
					<?php 
					/*echo "<pre>";
					print_r($breadcrumbs);
					echo "</pre>";*/
					$local = App::getLocale();
					?>
                    @foreach($breadcrumbs as $item)
                        @if(!empty($item['url']))
                            <li>
                                <a href="{{url($local.'/'.$item['url'])}}">{{$item['text']}}/</a>
                            </li>
                        @else
                            <li class="active">{{$item['text']}}/</li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
