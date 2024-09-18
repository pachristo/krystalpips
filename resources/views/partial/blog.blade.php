<style>
    @import url("https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap");


    .card-tone {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0px 14px 80px rgba(34, 35, 58, 0.2);
        transition: all 300ms ease;
    }

    .card-tone:hover {
        transform: translateY(-5px);
        cursor: pointer;
    }

    .card__container {}

    .card__cover {
        height: 250px;
        background-size: cover;
        background-position: center;
        border-radius: 8px 8px 0 0;
        position: relative;
    }

    .card__tag {
        background: #2098dd;
        display: inline-block;
        position: absolute;
        bottom: 10px;
        left: 20px;
        padding: 3px 8px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: bold;
        text-transform: uppercase;
        color: #fff;
    }

    .card__body {
        padding: 20px;
    }

    .card__title {
        font-size: 25px;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .card__desc {
        margin-bottom: 20px;
        font-size: 15px;
        color: #858484;
        line-height: 1.6;
    }



    #huck {
        max-width: 80px;

        right: 0;
        bottom: 0;
    }
</style>
@php
    $blog=\App\Models\Blog::latest('created_at')->paginate(3);
@endphp
<div class="flex-wrap card__container d-flex">
    @foreach ($blog as $k=>$v )
    <div class="mb-2 col-lg-4 px-lg-2">
        <a href="{{ url('blog') }}/{{ $v->slug }}" class="text-decoration-none">
        <div class="card card-tone " >
            <div class="card__cover card__cover--one"style=" background-image: url({{ asset('storage/'.$v->photo) }});">
                <div class="card__tag">article</div>
            </div>
            <div class="card__body">
                <div class="card__title text-decoration-none">{{ \Str::limit($v->title, 30, '..') }}</div>
                <div class="card__desc text-decoration-none">{{ \Str::limit($v->description,120,'..') }}</div>
            </div>
        </div>
        </a>
    </div>
    @endforeach

</div>
{{-- <img id="huck" src="https://animal-crossing.com/assets/img/characters/CTRP_EAA_NPC-flg11_1_R_ad.png"/> --}}
