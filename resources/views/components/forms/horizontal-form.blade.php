<div class="col-xxl">
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">{{ $title }}</h5>
            <small class="text-muted float-end">{{ $description }}</small>
        </div>
        <div class="card-body">
            {{ $slot }}
        </div>
    </div>
</div>