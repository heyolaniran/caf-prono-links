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
                    <div class="position-relative  overflow-hidden">
                        <img src="{{asset('assets/img/offline.png')}}" class="container-fluid" alt="offline">
                    </div>
                    <div class="mt-4">
                        <div class=" row d-flex justify-content-center align-middle text-center">
                            <div class="col-md-6">
                                <a href="{{route('deposit')}}" class="btn btn-info rounded-pill text-sm"> <i class="fa fa-refresh text-white" aria-hidden="true"></i> Rafraichir </a>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </section>
    </main>

</x-guest-layout>