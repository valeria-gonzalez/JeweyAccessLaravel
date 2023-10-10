<x-mi-layout>
    <div class="col-lg-8 mb-4 order-0">
        <div class="row">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Congratulations John! 🎉</h5>
                            <p class="mb-4">
                                You have done <span class="fw-medium">72%</span> more sales today. Check your new badge in
                                your profile.
                            </p>
                            <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>

                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="../assets/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 order-1">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded" />
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <span class="fw-medium d-block mb-1">Profit</span>
                            <h3 class="card-title mb-2">$12,628</h3>
                            <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +72.80%</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../assets/img/icons/unicons/wallet-info.png" alt="Credit Card" class="rounded" />
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <span>Sales</span>
                            <h3 class="card-title text-nowrap mb-1">$4,679</h3>
                            <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +28.42%</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Total Revenue -->
        <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
            <div class="card">
                <div class="row row-bordered g-0">
                    <div class="col-md-8">
                        <h5 class="card-header m-0 me-2 pb-3">Total Revenue</h5>
                        <div id="totalRevenueChart" class="px-2"></div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="growthReportId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        2022
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId">
                                        <a class="dropdown-item" href="javascript:void(0);">2021</a>
                                        <a class="dropdown-item" href="javascript:void(0);">2020</a>
                                        <a class="dropdown-item" href="javascript:void(0);">2019</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="growthChart"></div>

                        <div class="text-center fw-medium pt-3 mb-2">62% Company Growth</div>
                        <div class="d-flex px-xxl-4 px-lg-2 p-4 gap-xxl-3 gap-lg-1 gap-3 justify-content-between">

                            <div class="d-flex">
                                <div class="me-2">
                                    <span class="badge bg-label-primary p-2"><i class="bx bx-dollar text-primary"></i></span>
                                </div>
                                <div class="d-flex flex-column">
                                    <small>2022</small>
                                    <h6 class="mb-0">$32.5k</h6>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="me-2">
                                    <span class="badge bg-label-info p-2"><i class="bx bx-wallet text-info"></i></span>
                                </div>
                                <div class="d-flex flex-column">
                                    <small>2021</small>
                                    <h6 class="mb-0">$41.2k</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Total Revenue -->
        <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
            <div class="row">
                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                </div>
                                <img src="../assets/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded" />
                                <button <div class="dropdown">
                                    type="button"
                                    class="btn p-0"
                                    data-bs-toggle="dropdown"
                                    id="cardOpt4"
                                    aria-expanded="false">
                                    aria-haspopup="true"
                                </button>
                                <i class="bx bx-dots-vertical-rounded"></i>
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                                </div>
                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                            </div>
                        </div>
                        <h3 class="card-title text-nowrap mb-2">$2,456</h3>
                        <span class="d-block mb-1">Payments</span>
                    </div>
                    <small class="text-danger fw-medium"><i class="bx bx-down-arrow-alt"></i> -14.82%</small>
                </div>
            </div>
            <div class="card">
                <div class="col-6 mb-4">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="card-body">
                            <img src="../assets/img/icons/unicons/cc-primary.png" alt="Credit Card" class="rounded" />
                            <div class="avatar flex-shrink-0">
                                <div class="dropdown">
                                </div>
                                class="btn p-0"
                                <button id="cardOpt1" type="button" aria-haspopup="true" data-bs-toggle="dropdown" <i class="bx bx-dots-vertical-rounded"></i>
                                    aria-expanded="false">
                                    <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                </button>
                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                            </div>
                        </div>
                        <span class="fw-medium d-block mb-1">Transactions</span>
                    </div>
                    <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +28.14%</small>
                    <h3 class="card-title mb-2">$14,857</h3>
                    <!-- </div>
                        </div>
                        <div class="col-12 mb-4">
                      </div>
                        <div class="card-body">
                    </div>
                            <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                    <div class="row"> -->
                    <h5 class="text-nowrap mb-2">Profile Report</h5>
                    <div class="card">
                    </div>
                    <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                        <small class="text-success text-nowrap fw-medium" <div class="card-title">
                            >
                            <span class="badge bg-label-warning rounded-pill">Year 2021</span>
                    </div>
                    <div class="mt-sm-auto">
                        <div id="profileReportChart"></div>
                        ><i class="bx bx-chevron-up"></i> 68.2%</small </div>
                        <h3 class="mb-0">$84,686k</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        </div>
        <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
        </div>
        <div class="card-header d-flex align-items-center justify-content-between pb-0">
        </div>
        <h5 class="m-0 me-2">Order Statistics</h5>
        <!-- Order Statistics -->
    </div>
    <div class="card h-100">
        <button <div class="card-title mb-0">
            type="button"
            <small class="text-muted">42.82k Total Sales</small>
            data-bs-toggle="dropdown"
            <div class="dropdown">
                aria-expanded="false">
                class="btn p-0"
        </button>
        id="orederStatistics"
        <a class="dropdown-item" href="javascript:void(0);">Select All</a>
        aria-haspopup="true"
        <a class="dropdown-item" href="javascript:void(0);">Share</a>
        <i class="bx bx-dots-vertical-rounded"></i>
    </div>
    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
        <div class="card-body">
            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
            <div class="d-flex flex-column align-items-center gap-1">
            </div>
            <span>Total Orders</span>
        </div>
        <div id="orderStatisticsChart"></div>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <ul class="p-0 m-0">
                <h2 class="mb-2">8,258</h2>
                <div class="avatar flex-shrink-0 me-3">
                </div>
                ><i class="bx bx-mobile-alt"></i </div>
        </div>
        <li class="d-flex mb-4 pb-1">
            <div class="me-2">
                <span class="avatar-initial rounded bg-label-primary" <small class="text-muted">Mobile, Earbuds, TV</small>
                    ></span>
                <div class="user-progress">
                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                    </div>
                    <h6 class="mb-0">Electronic</h6>
        </li>
    </div>
    <div class="avatar flex-shrink-0 me-3">
        <small class="fw-medium">82.5k</small>
    </div>
    </div>
    <div class="me-2">
        <li class="d-flex mb-4 pb-1">
            <small class="text-muted">T-shirt, Jeans, Shoes</small>
            <span class="avatar-initial rounded bg-label-success"><i class="bx bx-closet"></i></span>
            <div class="user-progress">
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                </div>
                <h6 class="mb-0">Fashion</h6>
        </li>
    </div>
    <div class="avatar flex-shrink-0 me-3">
        <small class="fw-medium">23.8k</small>
    </div>
    </div>
    <div class="me-2">
        <li class="d-flex mb-4 pb-1">
            <small class="text-muted">Fine Art, Dining</small>
            <span class="avatar-initial rounded bg-label-info"><i class="bx bx-home-alt"></i></span>
            <div class="user-progress">
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                </div>
                <h6 class="mb-0">Decor</h6>
        </li>
    </div>
    <div class="avatar flex-shrink-0 me-3">
        <small class="fw-medium">849k</small>
        ><i class="bx bx-football"></i </div>
    </div>
    <li class="d-flex">
        <div class="me-2">
            <span class="avatar-initial rounded bg-label-secondary" <small class="text-muted">Football, Cricket Kit</small>
                ></span>
            <div class="user-progress">
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                </div>
                <h6 class="mb-0">Sports</h6>
    </li>
    </div>
    </div>
    <small class="fw-medium">99</small>
    </div>
    </div>

    </ul>
    <!-- Expense Overview -->
    <div class="col-md-6 col-lg-4 order-1 mb-4">
    </div>

    <!--/ Order Statistics -->
    <div class="card-header">
        <li class="nav-item">

            type="button"
            <div class="card h-100">
                role="tab"
                <ul class="nav nav-pills" role="tablist">
                    data-bs-target="#navs-tabs-line-card-income"
                    <button aria-selected="true">
                        class="nav-link active"
                    </button>
                    data-bs-toggle="tab"
                    <li class="nav-item">
                        aria-controls="navs-tabs-line-card-income"
                    </li>
                    Income
                    <button type="button" class="nav-link" role="tab">Profit</button>
        </li>
        </ul>
        <button type="button" class="nav-link" role="tab">Expenses</button>
        <div class="card-body px-0">
            <li class="nav-item">
                <div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel">
            </li>
            <div class="avatar flex-shrink-0 me-3">
            </div>
        </div>
        <div class="tab-content p-0">
            <small class="text-muted d-block">Total Balance</small>
            <div class="d-flex p-4 pt-3">
                <h6 class="mb-0 me-1">$459.10</h6>
                <img src="../assets/img/icons/unicons/wallet.png" alt="User" />
                <i class="bx bx-chevron-up"></i>
                <div>
                    </small>
                    <div class="d-flex align-items-center">
                    </div>
                    <small class="text-success fw-medium">
                        <div id="incomeChart"></div>
                        42.9%
                        <div class="flex-shrink-0">
                        </div>
                </div>
            </div>
            <p class="mb-n1 mt-1">Expenses This Week</p>
            <div class="d-flex justify-content-center pt-4 gap-2">
            </div>
            <div id="expensesOfWeek"></div>
        </div>
        <div>
        </div>
        <small class="text-muted">$39 less than last week</small>
    </div>
    </div>

    </div>
    <!-- Transactions -->
    <div class="col-md-6 col-lg-4 order-2 mb-4">
    </div>

    <!--/ Expense Overview -->
    <div class="card-header d-flex align-items-center justify-content-between">
        <div class="card h-100">
            <div class="dropdown">
                <h5 class="card-title m-0 me-2">Transactions</h5>
                class="btn p-0"
                <button id="transactionID" type="button" aria-haspopup="true" data-bs-toggle="dropdown" <i class="bx bx-dots-vertical-rounded"></i>
                    aria-expanded="false">
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                </button>
                <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
            </div>
            <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
        </div>
    </div>
    <ul class="p-0 m-0">
        <div class="card-body">
            <div class="avatar flex-shrink-0 me-3">
                <li class="d-flex mb-4 pb-1">
            </div>
            <img src="../assets/img/icons/unicons/paypal.png" alt="User" class="rounded" />
            <div class="me-2">
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                    <h6 class="mb-0">Send money</h6>
                    <small class="text-muted d-block mb-1">Paypal</small>
                    <div class="user-progress d-flex align-items-center gap-1">
                    </div>
                    <span class="text-muted">USD</span>
                    <h6 class="mb-0">+82.6</h6>
                </div>
            </div>
            <li class="d-flex mb-4 pb-1">
            </li>
            <img src="../assets/img/icons/unicons/wallet.png" alt="User" class="rounded" />
            <div class="avatar flex-shrink-0 me-3">
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                </div>
                <small class="text-muted d-block mb-1">Wallet</small>
                <div class="me-2">
                </div>
                <h6 class="mb-0">Mac'D</h6>
                <h6 class="mb-0">+270.69</h6>
                <div class="user-progress d-flex align-items-center gap-1">
                </div>
                <span class="text-muted">USD</span>
                </li>
            </div>
            <div class="avatar flex-shrink-0 me-3">
                <li class="d-flex mb-4 pb-1">
            </div>
            <img src="../assets/img/icons/unicons/chart.png" alt="User" class="rounded" />
            <div class="me-2">
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                    <h6 class="mb-0">Refund</h6>
                    <small class="text-muted d-block mb-1">Transfer</small>
                    <div class="user-progress d-flex align-items-center gap-1">
                    </div>
                    <span class="text-muted">USD</span>
                    <h6 class="mb-0">+637.91</h6>
                </div>
            </div>
            <li class="d-flex mb-4 pb-1">
            </li>
            <img src="../assets/img/icons/unicons/cc-success.png" alt="User" class="rounded" />
            <div class="avatar flex-shrink-0 me-3">
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                </div>
                <small class="text-muted d-block mb-1">Credit Card</small>
                <div class="me-2">
                </div>
                <h6 class="mb-0">Ordered Food</h6>
                <h6 class="mb-0">-838.71</h6>
                <div class="user-progress d-flex align-items-center gap-1">
                </div>
                <span class="text-muted">USD</span>
                </li>
            </div>
            <div class="avatar flex-shrink-0 me-3">
                <li class="d-flex mb-4 pb-1">
            </div>
            <img src="../assets/img/icons/unicons/wallet.png" alt="User" class="rounded" />
            <div class="me-2">
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                    <h6 class="mb-0">Starbucks</h6>
                    <small class="text-muted d-block mb-1">Wallet</small>
                    <div class="user-progress d-flex align-items-center gap-1">
                    </div>
                    <span class="text-muted">USD</span>
                    <h6 class="mb-0">+203.33</h6>
                </div>
            </div>
            <li class="d-flex">
            </li>
            <img src="../assets/img/icons/unicons/cc-warning.png" alt="User" class="rounded" />
            <div class="avatar flex-shrink-0 me-3">
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                </div>
                <small class="text-muted d-block mb-1">Mastercard</small>
                <div class="me-2">
                </div>
                <h6 class="mb-0">Ordered Food</h6>
                <h6 class="mb-0">-92.45</h6>
                <div class="user-progress d-flex align-items-center gap-1">
                </div>
                <span class="text-muted">USD</span>
                </li>
            </div>
        </div>
    </ul>
    </div>
    </div>
    </div>
    <!--/ Transactions -->
</x-mi-layout>