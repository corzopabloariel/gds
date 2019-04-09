<section class="wrapper-proyectos">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-8">
                <div class="row">
                    @foreach ($familias as $v)
                        <a href="{{ URL::to('productos/'. $v['id']) }}" class="col-md-4 col-12 my-3">
                            <img src="{{asset($v['img'])}}" onError="this.src='{{ asset('images/general/no-img.png') }}'" class="w-100" />
                            <p class="mb-0">{{$v["titulo"]}}</p>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>