<h6 class="text-muted">{{ $label }}</h6>
<div class="nav-align-top mb-4">
    <ul class="nav nav-pills mb-3" role="tablist">
        @foreach ($pills as $pill)
        <li class="nav-item">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-{{$pill['id']}}" aria-controls="navs-pills-top-{{$pill['name']}}" aria-selected="true">
                {{ $pill['name'] }}
            </button>
        </li>
        @endforeach
    </ul>
    <div class="tab-content">
        @foreach ($pills as $pill)
        <div class="tab-pane fade show" id="navs-pills-top-{{$pill['id']}}" role="tabpanel">
            {{ $pill['content'] }}
        </div>
        @endforeach
    </div>
</div>