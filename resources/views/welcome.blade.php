<x-guest-layout>
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <x-guest.sidenav-guest />
            </div>
        </div>
    </div>

    <main class="main-content mt-0">
        <section class="">
            <div class=" page-header min-vh-100 ">
                <div class="row">
                    <div class="position-relative overflow-hidden">
                        <div class="swiper mySwiper mt-4 mb-2">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div>
                                        <div
                                            class="card card-background shadow-none border-radius-xl card-background-after-none align-items-start mb-0">
                                            <div class="full-background  bg-cover"
                                                style="background-image: url('../assets/img/img-2.jpg')"></div>
                                            <div class="card-body text-start px-3 py-0 w-100">
                                                <div class="row mt-12">
                                                    <div class="col-sm-3 mt-auto ">
                                                        <h4 class="text-dark font-weight-bolder ">#1</h4>
                                                        <p class="text-dark opacity-6 text-xs font-weight-bolder mb-0">Name
                                                        </p>
                                                        <h5 class="text-dark font-weight-bolder">Secured</h5>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div
                                        class="card card-background shadow-none border-radius-xl card-background-after-none align-items-start mb-0">
                                        <div class="full-background bg-cover"
                                            style="background-image: url('../assets/img/img-1.jpg')"></div>
                                        <div class="card-body text-start px-3 py-0 w-100">
                                            <div class="row mt-12">
                                                <div class="col-sm-3 mt-auto">
                                                    <h4 class="text-dark font-weight-bolder">#2</h4>
                                                    <p class="text-dark opacity-6 text-xs font-weight-bolder mb-0">Name</p>
                                                    <h5 class="text-dark font-weight-bolder">Cyber</h5>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div
                                        class="card card-background shadow-none border-radius-xl card-background-after-none align-items-start mb-0">
                                        <div class="full-background bg-cover"
                                            style="background-image: url('../assets/img/img-3.jpg')"></div>
                                        <div class="card-body text-start px-3 py-0 w-100">
                                            <div class="row mt-12">
                                                <div class="col-sm-3 mt-auto">
                                                    <h4 class="text-dark font-weight-bolder">#3</h4>
                                                    <p class="text-dark opacity-6 text-xs font-weight-bolder mb-0">Name</p>
                                                    <h5 class="text-dark font-weight-bolder">Alpha</h5>
                                                </div>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div
                                        class="card card-background shadow-none border-radius-xl card-background-after-none align-items-start mb-0">
                                        <div class="full-background bg-cover"
                                            style="background-image: url('../assets/img/img-4.jpg')"></div>
                                        <div class="card-body text-start px-3 py-0 w-100">
                                            <div class="row mt-12">
                                                <div class="col-sm-3 mt-auto">
                                                    <h4 class="text-dark font-weight-bolder">#4</h4>
                                                    <p class="text-dark opacity-6 text-xs font-weight-bolder mb-0">Name</p>
                                                    <h5 class="text-dark font-weight-bolder">Beta</h5>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div
                                        class="card card-background shadow-none border-radius-xl card-background-after-none align-items-start mb-0">
                                        <div class="full-background bg-cover"
                                            style="background-image: url('../assets/img/img-5.jpg')"></div>
                                        <div class="card-body text-start px-3 py-0 w-100">
                                            <div class="row mt-12">
                                                <div class="col-sm-3 mt-auto">
                                                    <h4 class="text-dark font-weight-bolder">#5</h4>
                                                    <p class="text-dark opacity-6 text-xs font-weight-bolder mb-0">Name</p>
                                                    <h5 class="text-dark font-weight-bolder">Gama</h5>
                                                </div>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div
                                        class="card card-background shadow-none border-radius-xl card-background-after-none align-items-start mb-0">
                                        <div class="full-background bg-cover"
                                            style="background-image: url('../assets/img/img-1.jpg')"></div>
                                        <div class="card-body text-start px-3 py-0 w-100">
                                            <div class="row mt-12">
                                                <div class="col-sm-3 mt-auto">
                                                    <h4 class="text-dark font-weight-bolder">#6</h4>
                                                    <p class="text-dark opacity-6 text-xs font-weight-bolder mb-0">Name</p>
                                                    <h5 class="text-dark font-weight-bolder">Rompro</h5>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                    <div class="mt-4">
                        <div class=" row d-flex justify-content-center align-middle text-center">
                            <div class="col-md-6">
                                <a href="{{route('deposit')}}" class="btn btn-info rounded-pill text-sm"> <i class="fab fa-dollar-sign text-sm text-white"></i> Effectuer un dépôt </a>
                            </div>
                        </div>
                        <div class=" row d-flex justify-content-center align-middle text-center">
                            <div class="col-md-6">
                                <a href="{{route('transactions.create')}}" class="btn text-info rounded-pill text-sm btn-outline-info "> <i class="fab fa-dollar-sign text-sm text-info"></i> Effectuer un retrait </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-guest-layout>