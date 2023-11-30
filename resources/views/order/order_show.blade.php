<x-mi-layout>
    <div class="container-fluid flex-grow-1 container-p-y">
        <x-text.page-heading1 span="Order / " after-span="Show Order" />
        @php
        $client_name = $order->client->name . ' ' . $order->client->first_lastname . ' ' . $order->client->second_lastname;
        @endphp
        <div class="nav-align-top mb-4">
            <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
                <li class="nav-item">
                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-order" aria-controls="navs-pills-justified-order" aria-selected="true">
                        <i class="tf-icons bx bx-home me-1"></i><span class="d-none d-sm-block">
                            Order Information</span>
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-product" aria-controls="navs-pills-justified-product" aria-selected="false">
                        <i class="tf-icons bx bx-message-square me-1"></i><span class="d-none d-sm-block"> Product Information</span>
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-client" aria-controls="navs-pills-justified-client" aria-selected="false">
                        <i class="tf-icons bx bx-user me-1"></i><span class="d-none d-sm-block">
                            Client Information </span>
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-system" aria-controls="navs-pills-justified-system" aria-selected="false">
                        <i class="tf-icons bx bx-message-square me-1"></i><span class="d-none d-sm-block"> System Information</span>
                    </button>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="navs-pills-justified-order" role="tabpanel">
                    <small class="text-light fw-medium">General Information</small>
                    <dl class="row mt-2">
                        <dt class="col-sm-3"> Order Id </dt>
                        <dd class="col-sm-9"> {{ $order->id }} </dd>

                        <dt class="col-sm-3"> Total Amount Due</dt>
                        <dd class="col-sm-9"> {{ $order->total }} </dd>

                        <dt class="col-sm-3"> Delivery Date </dt>
                        <dd class="col-sm-9"> {{ $order->delivery_date }} </dd>

                        <dt class="col-sm-3"> Delivery Time </dt>
                        <dd class="col-sm-9"> {{ $order->delivery_time }} </dd>
                    </dl>

                    <small class="text-light fw-medium">Shipping Information</small>
                    <dl class="row mt-2">
                        <dt class="col-sm-3"> Recipient Name </dt>
                        <dd class="col-sm-9"> {{ $client_name }} </dd>

                        <dt class="col-sm-3"> Street </dt>
                        <dd class="col-sm-9"> {{ $order->street }} </dd>

                        <dt class="col-sm-3"> Apartment Number </dt>
                        <dd class="col-sm-9"> {{ $order->apt_number }} </dd>

                        <dt class="col-sm-3"> Neighborhood </dt>
                        <dd class="col-sm-9"> {{ $order->neighborhood }} </dd>

                        <dt class="col-sm-3"> Zipcode </dt>
                        <dd class="col-sm-9"> {{ $order->zipcode }} </dd>

                        <dt class="col-sm-3"> City </dt>
                        <dd class="col-sm-9"> {{ $order->city }} </dd>

                        <dt class="col-sm-3"> State </dt>
                        <dd class="col-sm-9"> {{ $order->state }} </dd>

                        <dt class="col-sm-3"> Country </dt>
                        <dd class="col-sm-9"> {{ $order->country }} </dd>

                        <dt class="col-sm-3"> References </dt>
                        <dd class="col-sm-9"> {{ $order->references }} </dd>
                    </dl>
                </div>

                <div class="tab-pane fade" id="navs-pills-justified-client" role="tabpanel">
                    <small class="text-light fw-medium">Client Information</small>
                    <dl class="row mt-2">
                        <dt class="col-sm-3"> Client Id </dt>
                        <dd class="col-sm-9"> {{ $order->client->id }} </dd>

                        <dt class="col-sm-3"> Client Name </dt>
                        <dd class="col-sm-9"> {{ $client_name }} </dd>

                        <dt class="col-sm-3"> Phone Number </dt>
                        <dd class="col-sm-9"> {{ $order->client->phone_number }} </dd>

                    </dl>
                </div>

                <div class="tab-pane fade" id="navs-pills-justified-product" role="tabpanel">
                    <small class="text-light fw-medium">Product Information</small>
                    <dl class="row mt-2">
                    @foreach($products as $product)
                        <dt class="col-sm-3"> {{ $product->name }} ($ {{ $product->price }})</dt>
                        <dd class="col-sm-9"> x{{ $product->pivot->quantity }} </dd>
                    @endforeach
                    </dl>
                </div>

                <div class="tab-pane fade" id="navs-pills-justified-system" role="tabpanel">
                    <small class="text-light fw-medium">System Information</small>
                    <dl class="row mt-2">
                        <dt class="col-sm-3"> Created at </dt>
                        <dd class="col-sm-9"> {{ $order->created_at }} </dd>

                        <dt class="col-sm-3"> Created By </dt>
                        <dd class="col-sm-9"> {{ $order->user->name }} </dd>

                        <dt class="col-sm-3"> Last Update </dt>
                        <dd class="col-sm-9"> {{ $order->updated_at }} </dd>

                        <dt class="col-sm-3"> Last Update By </dt>
                        <dd class="col-sm-9"> {{ $order->updated_by }} </dd>

                        <dt class="col-sm-3"> Status </dt>
                        @if ($order->status == 'PENDING')
                        <dd class="col-sm-9">
                            <span class="badge rounded-pill bg-label-warning">Pending</span>
                        </dd>
                        @elseif ($order->status == 'DELIVERED')
                        <dd class="col-sm-9">
                            <span class="badge rounded-pill bg-label-success">Delivered</span>
                        </dd>
                        @elseif ($order->status == 'CANCELLED')
                        <dd class="col-sm-9">
                            <span class="badge rounded-pill bg-label-danger">Cancelled</span>
                        </dd>
                        @endif
                    </dl>
                </div>
            </div>
        </div>
</x-mi-layout>