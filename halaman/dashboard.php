<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                <h4 class="page-title">Dashboard</h4>
                <div class="">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Approx</a>
                        </li><!--end nav-item-->
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div><!--end row-->
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="row">
                <div class="col-md-6">
                    <div class="card  bg-welcome-img overflow-hidden">
                        <div class="card-body">
                            <div class="">
                                <h3 class="text-white fw-semibold fs-20 lh-base">Selamat datang di
                                    <br>Store Information System
                                </h3>
                                <a href="#" class="btn btn-sm btn-danger"><?= $_SESSION['username'] ?></a>
                                <img src="assets/images/extra/fund.png" alt="" class=" mb-n4 float-end" height="107">
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div><!--end col-->
                <div class="col-md-6">
                    <div class="card bg-globe-img">
                        <div class="card-body">
                            <div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fs-16 fw-semibold">Balance</span>
                                    <form class="">
                                        <select id="dynamic-select" name="example-select"
                                            data-placeholder="Select an option" data-dynamic-select>
                                            <option value="1" data-img="assets/images/logos/m-card.png">xx25
                                            </option>
                                            <option value="2" data-img="assets/images/logos/ame-bank.png">
                                                xx56</option>
                                        </select>
                                    </form>
                                </div>

                                <h4 class="my-2 fs-24 fw-semibold">122.5692.00 <small class="font-14">BTC</small></h4>
                                <p class="mb-3 text-muted fw-semibold">
                                    <span class="text-success"><i class="fas fa-arrow-up me-1"></i>11.1%</span>
                                    Outstanding
                                    balance boost
                                </p>
                                <button type="submit" class="btn btn-soft-primary">Transfer</button>
                                <button type="button" class="btn btn-soft-danger">Request</button>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end col-->
        <div class="col-lg-5">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-6">
                    <div class="card bg-corner-img">
                        <div class="card-body">
                            <div class="row d-flex justify-content-center">
                                <div class="col-9">
                                    <p class="text-muted text-uppercase mb-0 fw-normal fs-13">Total Revenue
                                    </p>
                                    <h4 class="mt-1 mb-0 fw-medium">$8365.00</h4>
                                </div>
                                <!--end col-->
                                <div class="col-3 align-self-center">
                                    <div
                                        class="d-flex justify-content-center align-items-center thumb-md border-dashed border-primary rounded mx-auto">
                                        <i class="iconoir-dollar-circle fs-22 align-self-center mb-0 text-primary"></i>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
                <div class="col-md-6 col-lg-6">
                    <div class="card bg-corner-img">
                        <div class="card-body">
                            <div class="row d-flex justify-content-center">
                                <div class="col-9">
                                    <p class="text-muted text-uppercase mb-0 fw-normal fs-13">New Order</p>
                                    <h4 class="mt-1 mb-0 fw-medium">722</h4>
                                </div>
                                <!--end col-->
                                <div class="col-3 align-self-center">
                                    <div
                                        class="d-flex justify-content-center align-items-center thumb-md border-dashed border-info rounded mx-auto">
                                        <i class="iconoir-cart fs-22 align-self-center mb-0 text-info"></i>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
                <div class="col-md-6 col-lg-6">
                    <div class="card bg-corner-img">
                        <div class="card-body">
                            <div class="row d-flex justify-content-center">
                                <div class="col-9">
                                    <p class="text-muted text-uppercase mb-0 fw-normal fs-13">Sessions</p>
                                    <h4 class="mt-1 mb-0 fw-medium">181</h4>
                                </div>
                                <!--end col-->
                                <div class="col-3 align-self-center">
                                    <div
                                        class="d-flex justify-content-center align-items-center thumb-md border-dashed border-warning rounded mx-auto">
                                        <i
                                            class="iconoir-percentage-circle fs-22 align-self-center mb-0 text-warning"></i>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->

                <div class="col-md-6 col-lg-6">
                    <div class="card bg-corner-img">
                        <div class="card-body">
                            <div class="row d-flex justify-content-center">
                                <div class="col-9">
                                    <p class="text-muted text-uppercase mb-0 fw-normal fs-13">Avg. Order
                                        value</p>
                                    <h4 class="mt-1 mb-0 fw-medium">$1025.50</h4>
                                </div>
                                <!--end col-->
                                <div class="col-3 align-self-center">
                                    <div
                                        class="d-flex justify-content-center align-items-center thumb-md border-dashed border-danger rounded mx-auto">
                                        <i class="iconoir-hexagon-dice fs-22 align-self-center mb-0 text-danger"></i>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div><!--end col-->
            </div>
            <!--end row-->
        </div><!--end col-->

    </div><!--end row-->

    <div class="row justify-content-center">

        <div class="col-md-12 col-lg-9">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="card-title">Report</h4>
                        </div><!--end col-->
                        <div class="col-auto">
                            <div class="dropdown">
                                <a href="#" class="btn bt btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="icofont-calendar fs-5 me-1"></i> This Month<i
                                        class="las la-angle-down ms-1"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Today</a>
                                    <a class="dropdown-item" href="#">Last Week</a>
                                    <a class="dropdown-item" href="#">Last Month</a>
                                    <a class="dropdown-item" href="#">This Year</a>
                                </div>
                            </div>
                        </div><!--end col-->
                    </div> <!--end row-->
                </div><!--end card-header-->
                <div class="card-body pt-0">
                    <div id="reports" class="apex-charts pill-bar"></div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="card-title">Exchange Rate</h4>
                        </div><!--end col-->
                    </div> <!--end row-->
                </div><!--end card-header-->
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <tbody>
                                <tr class="">
                                    <td class="px-0">
                                        <div class="d-flex align-items-center">
                                            <img src="assets/images/flags/us_flag.jpg"
                                                class="me-2 align-self-center thumb-sm rounded-circle" alt="...">
                                            <h6 class="m-0 text-truncate">USA</h6>
                                        </div><!--end media-->
                                    </td>
                                    <td class="px-0 text-end"><span
                                            class="text-body ps-2 align-self-center text-end fw-medium">0.835230
                                            <span
                                                class="badge rounded text-success bg-success-subtle">1.10%</span></span>
                                    </td>
                                </tr><!--end tr-->
                                <tr class="">
                                    <td class="px-0">
                                        <div class="d-flex align-items-center">
                                            <img src="assets/images/flags/spain_flag.jpg"
                                                class="me-2 align-self-center thumb-sm rounded-circle" alt="...">
                                            <h6 class="m-0 text-truncate">Spain</h6>
                                        </div><!--end media-->
                                    </td>
                                    <td class="px-0 text-end"><span
                                            class="text-body ps-2 align-self-center text-end fw-medium">0.896532
                                            <span
                                                class="badge rounded text-success bg-success-subtle">0.91%</span></span>
                                    </td>
                                </tr><!--end tr-->
                                <tr class="">
                                    <td class="px-0">
                                        <div class="d-flex align-items-center">
                                            <img src="assets/images/flags/french_flag.jpg"
                                                class="me-2 align-self-center thumb-sm rounded-circle" alt="...">
                                            <h6 class="m-0 text-truncate">French</h6>
                                        </div><!--end media-->
                                    </td>
                                    <td class="px-0 text-end"><span
                                            class="text-body ps-2 align-self-center text-end fw-medium">0.875433
                                            <span class="badge rounded text-danger bg-danger-subtle">0.11%</span></span>
                                    </td>
                                </tr><!--end tr-->
                                <tr class="">
                                    <td class="px-0">
                                        <div class="d-flex align-items-center">
                                            <img src="assets/images/flags/germany_flag.jpg"
                                                class="me-2 align-self-center thumb-sm rounded-circle" alt="...">
                                            <h6 class="m-0 text-truncate">Germany</h6>
                                        </div><!--end media-->
                                    </td>
                                    <td class="px-0 text-end"><span
                                            class="text-body ps-2 align-self-center text-end fw-medium">0.795621
                                            <span
                                                class="badge rounded text-success bg-success-subtle">0.85%</span></span>
                                    </td>
                                </tr><!--end tr-->
                                <tr class="">
                                    <td class="px-0">
                                        <div class="d-flex align-items-center">
                                            <img src="assets/images/flags/french_flag.jpg"
                                                class="me-2 align-self-center thumb-sm rounded-circle" alt="...">
                                            <h6 class="m-0 text-truncate">French</h6>
                                        </div><!--end media-->
                                    </td>
                                    <td class="px-0 text-end"><span
                                            class="text-body ps-2 align-self-center text-end fw-medium">0.875433
                                            <span class="badge rounded text-danger bg-danger-subtle">0.11%</span></span>
                                    </td>
                                </tr><!--end tr-->
                                <tr class="">
                                    <td class="px-0 pb-0">
                                        <div class="d-flex align-items-center">
                                            <img src="assets/images/flags/baha_flag.jpg"
                                                class="me-2 align-self-center thumb-sm rounded-circle" alt="...">
                                            <h6 class="m-0 text-truncate">Bahamas</h6>
                                        </div><!--end media-->
                                    </td>
                                    <td class="px-0 pb-0 text-end"><span
                                            class="text-body ps-2 align-self-center text-end fw-medium">0.845236
                                            <span class="badge rounded text-danger bg-danger-subtle">0.22%</span></span>
                                    </td>
                                </tr><!--end tr-->
                            </tbody>
                        </table> <!--end table-->
                    </div><!--end /div-->
                    <hr class="hr-dashed">
                    <div class="row">
                        <div class="col-lg-6 text-center">
                            <div class="p-2 border-dashed border-theme-color rounded">
                                <p class="text-muted text-uppercase mb-0 fw-normal fs-13">Higher Rate</p>
                                <h5 class="mt-1 mb-0 fw-medium text-success">0.833658</h5>
                                <small>05 Sep 2024</small>
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-6 text-center">
                            <div class="p-2 border-dashed border-theme-color rounded">
                                <p class="text-muted text-uppercase mb-0 fw-normal fs-13">Lower Rate</p>
                                <h5 class="mt-1 mb-0 fw-medium text-danger">0.812547</h5>
                                <small>05 Sep 2024</small>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!--end col-->
    </div><!--end row-->

</div>