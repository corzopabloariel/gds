<section class="wrapper-proyectos">
    <div class="container">
        <div class="row py-3">
            <div class="col-12">
                <h3 class="title">Proyectos</h3>
            </div>
        </div>
        <div class="row">
            @foreach ($proyectos as $v)
                <a href="{{ URL::to('proyectos/'. $v['id']) }}" class="col-md-4 col-12 my-3" href="">
                    @php
                    $imgData = json_decode($v['img']);
                    $img = null;
                    if(count($imgData) > 0)
                        $img = $imgData[0];
                    @endphp
                    <img src="{{asset($img)}}" onError="this.src='{{ asset('images/general/no-img.png') }}'" class="w-100" />
                    <p class="mb-0">{{$v["titulo"]}}</p>
                </a>
            @endforeach
        </div>
    </div>
</section>