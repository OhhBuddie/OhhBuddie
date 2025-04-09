@foreach($products as $pdts)
<div class="col-6">
    <div class="card position-relative" style="border-radius: unset; background-color: white; color: black; border-radius: 10px;">
        <a href="/product/{{ Crypt::encryptString($pdts->id) }}" style="text-decoration:none;">
            @php
                $images = json_decode($pdts->images, true);
            @endphp
            @if(empty($images))
                <img src="https://assets.ajio.com/medias/sys_master/root/20230728/GBrh/64c3db50a9b42d15c979555c/-473Wx593H-466398360-green-MODEL.jpg" alt="Image" style="width:100%; border-top-left-radius: 10px; border-top-right-radius: 10px; height: 245px;">
            @else
                <img src="{{ $images[0] }}" alt="Image" style="width:100%; border-top-left-radius: 10px; border-top-right-radius: 10px; height: 245px;">
            @endif

            <div class="rating-label position-absolute" style="bottom: 80px; right: 10px; background-color:#04AA6D; color: white; padding: 2px 8px; border-radius: 12px; font-size: 14px;">
                3.5 ★
            </div>

            @php
                $bname = DB::table('brands')->where('id', $pdts->brand_id)->latest()->first();
            @endphp
            <div class="card-body product-item-card-body text-left">
                <h8 class="card-title"><b>{{$bname->brand_name}}</b></h8><br>
                <h8 class="card-title" title="{{ $pdts->product_name }}">
                    {{ Str::limit($pdts->product_name, 22, '...') }}
                </h8>                        
                <div class="d-flex">
                    <p class="card-text me-2" style="text-decoration: line-through; color: red">Rs. {{$pdts->maximum_retail_price}}</p>
                    <p class="card-text ml-2">Rs. {{$pdts->portal_updated_price}}</p>
                </div>                    
            </div>
        </a>
    </div>
</div>
@endforeach
