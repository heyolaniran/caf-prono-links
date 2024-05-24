<x-guest-layout>
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <x-guest.sidenav-guest />
            </div>
        </div>
    </div>
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-md-6 d-flex flex-column mx-auto">
                            <div class="card card-plain mt-8">
                                <div class="card-header pb-0 text-left bg-transparent">
                                    <h3 class="font-weight-black text-dark display-6 text-center"> Modifier le mot de passe </h3>
                                    <span class="text-mutted text-center mt-4 mb-2"> Entrez votre nouveau mot de passe, la longueur de votre mot de passe est de 6 caaractères minimum </span>
                                </div>
                                <div class="card-body text-center">
                                    @if ($errors->any())
                                        <div>
                                            <div>Quelque chose s'est mal passé !</div>

                                            <div class=" alert alert-danger text-sm " role="alert">
                                                @foreach ($errors->all() as $error)
                                                    <span>{{ $error }}</span>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                    @if (session('status'))
                                        <div class="mb-4 font-medium text-sm text-green-600">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    <form role="form" action="{{route('reset.store')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="uid" value="{{$uid}}">
                                        <div class="mb-3">
                                            <input type="password" id="password" class="form-control" name="password"
                                                placeholder="Nouveau Mot de passe " aria-label="Password" id="password"
                                                name="password"required>
                                        </div>
                                        <div class="mb-3">
                                            <input type="password" id="password_confirmation" class="form-control"
                                                name="password_confirmation" placeholder="Confirmez le mot de passe "
                                                aria-label="Password" id="password_confirmation"
                                                name="password_confirmation" required>
                                            <div class="text-center">
                                                <button type="submit"
                                                    class="my-4 mb-2 btn btn-info rounded-pill btn-lg w-100">Enregistrer <i class="fa fa-arrow-right text-sm" aria-hidden="true"></i></button>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-absolute w-40 top-0 end-0 h-100 d-md-block d-none">
                            <div class="oblique-image position-absolute fixed-top ms-auto h-100 z-index-0 bg-cover ms-n8"
                                style="background-image:url('../assets/img/image-sign-in.jpg')">
                                <div
                                    class="blur mt-12 p-4 text-center border border-white border-radius-md position-absolute fixed-bottom m-4">
                                    <h2 class="mt-3 text-dark font-weight-bold">Plus qu'une étape pour renouer avec votre communauté</h2>
                                    <h6 class="text-dark text-sm mt-5">Copyright © 2024 CASH-XBET by <a href="https://x.com/heyolaniran">by @heyolaniran</a> </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </main>

</x-guest-layout>
