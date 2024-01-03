<div class="testmonial-area testmonial-area2 bg-img-2 black-opacity">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="test-title text-center">
                    <h2>What Our client Says</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 offset-md-1 col-12">
                <div class="testmonial-active owl-carousel">
                    @foreach ($testimonial as $item)
                    <div class="test-items test-items2">
                        <div class="test-content">
                            <p>{{$item->client_message}}</p>
                            <h2>{{$item->client_name}}</h2>
                            <p>{{$item->client_designation}}</p>
                        </div>
                        <div class="test-img2">
                            <img  src="{{ !empty($item->client_image) ? asset($item->client_image) : asset('avator.png') }}" alt="">

                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
