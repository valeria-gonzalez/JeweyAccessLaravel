<x-mi-layout>
    <div class="container-fluid flex-grow-1 container-p-y">
        <x-text.page-heading1 span="Product / " after-span="Show Product" />
        <div class="nav-align-top mb-4">
            <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
                <li class="nav-item">
                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-product" aria-controls="navs-pills-justified-product" aria-selected="true">
                        <i class="tf-icons bx bx-home me-1"></i><span class="d-none d-sm-block">
                            Product Information</span>
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-material" aria-controls="navs-pills-justified-material" aria-selected="false">
                        <i class="tf-icons bx bx-message-square me-1"></i><span class="d-none d-sm-block"> Material Information</span>
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-system" aria-controls="navs-pills-justified-system" aria-selected="false">
                        <i class="tf-icons bx bx-message-square me-1"></i><span class="d-none d-sm-block"> System Information</span>
                    </button>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="navs-pills-justified-product" role="tabpanel">
                    <small class="text-light fw-medium">General Information</small>
                    <dl class="row mt-2">
                        <dt class="col-sm-3"> Product Id </dt>
                        <dd class="col-sm-9"> {{ $product->id }} </dd>

                        <dt class="col-sm-3"> Name </dt>
                        <dd class="col-sm-9"> {{ $product->name }} </dd>

                        <dt class="col-sm-3"> Price </dt>
                        <dd class="col-sm-9"> ${{ $product->price }} </dd>

                        <dt class="col-sm-3"> Stock </dt>
                        <dd class="col-sm-9"> {{ $product->stock }} </dd>

                        <dt class="col-sm-3"> Description </dt>
                        <dd class="col-sm-9"> {{ $product->description }} </dd>
                    </dl>
                    
                    <small class="text-light fw-medium">Product Image</small>
                    <dl class="row mt-2">
                        <div class="col-md">
                            <img class="img-fluid rounded float-left d-block w-20" 
                                src="{{ asset('storage/' . $product->image) }}" 
                                alt="{{ $product->name }}" 
                            />
                        </div>
                    </dl>
                </div>

                <div class="tab-pane fade" id="navs-pills-justified-material" role="tabpanel">

                </div>
                <div class="tab-pane fade" id="navs-pills-justified-system" role="tabpanel">
                    <small class="text-light fw-medium">System Information</small>
                    <dl class="row mt-2">
                        <dt class="col-sm-3"> Created at </dt>
                        <dd class="col-sm-9"> {{ $product->created_at }} </dd>

                        <dt class="col-sm-3"> Last Update </dt>
                        <dd class="col-sm-9"> {{ $product->updated_at }} </dd>

                        <dt class="col-sm-3"> Created By </dt>
                        <dd class="col-sm-9"> {{ $product->user->name }} </dd>
                    </dl>
                </div>
            </div>
        </div>

        <!-- carrousel -->

    </div>
</x-mi-layout>