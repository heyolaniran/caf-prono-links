<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <x-app.navbar />


        <div class="row container align-middle">
            <div class="justify-content-start mb-4 d-md-none  ">
                <a href="{{route('dashboard')}}"> <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
            </div>

            <div class="mt-4">
                <h4 class="text-center"> Nouveau moyen de paiement </h4>
            </div>

            <form action="{{route('provider.store')}}" method="post" class="mt-2">
                @csrf

                <div class="row page-header">
                    <div class="col-md-6">
                        <label>Nom du Moyen de Paiement</label>
                        <div class="mb-3">
                            <input type="text" id="name" name="name" class="form-control"
                                placeholder="Moyen de paiement (nom)" value="{{old("name")}}" aria-label="name"
                                aria-describedby="email-addon">
                            @error('name')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label> Code du Moyen de Paiement</label>
                        <div class="mb-3">
                            <input type="text" id="account" name="account" class="form-control"
                                placeholder="Moyen de paiement (code)" value="{{old("account")}}" aria-label="name"
                                aria-describedby="email-addon">
                            @error('account')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                </div>

                <div class="mt-2">
                    <label>Code USD à composer</label>
                    <div class="mb-3">
                        <input type="text" id="ussd" name="ussd" class="form-control"
                            placeholder="USSD" value="{{old("ussd")}}" aria-label="ussd"
                            aria-describedby="email-addon">
                        @error('ussd')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="">
                                                
                    <label for="">Pays</label>
                    <select class="form-control text-center" name="country_id" id="">
                      @foreach ($countries as $country)
                           <option value="{{$country->id}}">({{$country->name}})</option>
                      @endforeach
                     
                    </select>
                 
              </div>

                <div class="align-middle mt-4 text-center">
                    <button type="submit" class="btn btn-outline-info btn-sm ">Ajouter</button>
                </div>
            </form>
        </div>
       
    </main>
</x-app-layout>