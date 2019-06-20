<div class="card card card-small mb-4 bm-md enable">
    <div class="card-header border-bottom">
        <h6 class="m-0">
            {{$title}}({{$count}})
        </h6>
    </div>
    <div class="card-body">
        @include($data)
    </div>
</div>
@include($mobile)