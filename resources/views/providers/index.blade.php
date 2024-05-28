<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <x-app.navbar />


        <div class="row container">
            <div class="justify-content-start mb-4 d-md-none  ">
                <a href="{{route('dashboard')}}"> <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
            </div>
            <div class="col-md-6">
                <h4 class="text-xl font-weight-semibold mb-4">Moyens de paiement</h4>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <a href="{{route('provider.create')}}" class="btn btn-outline-info text-sm"> <i class="fa fa-plus " aria-hidden="true"></i> Ajouter </a>
            </div>
        </div>

        <div class="mt-4 container">
            <div class="form-group">
             <form action="{{route('transactions.search')}}" method="post">
                @csrf 
                <input type="text" name="search" id="search" class="form-control rounded-pill " placeholder="Rechercher une transaction" aria-describedby="helpId">
             </form>
              
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 d-block align-items-center justify-content-center text-center">
                <div class="mt-4 container ">
                    @foreach($providers as $provider)
                        <div class="card rounded-lg shadow-md shadow-blur mb-2 mt-2">
                        
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <a href="{{route('provider.edit',['provider' => $provider])}}">{{ucfirst($provider->account)}}</a> 
                                        </div>
                                        
                                        @if($provider->enabled)
                                            <div class="badge badge-success badge-sm text-center px-4 text-xs ">
                                                Actif
                                            </div>
                                        @else 
                                        
                                            <div class="badge badge-danger badge-sm text-center px-4 text-xs ">
                                                Désactivé
                                            </div>
            
                                        
                                        @endif

                                        <div>
                                            <form action="{{route('provider.availability', ['provider' =>$provider])}}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-outline-danger text-danger"> <i class="fas fa-eye-slash fa-sm  "></i>  Désactiver </button>
                                            </form>
                                        </div>

                                    
                                    </div>
                                </div>
                        </div>
                    @endforeach
                </div>

                <div class="align-middle justify-content-center text-center mt-4">
                    {{$providers->links()}}
                </div>
            </div>
        </div>
       
    </main>
</x-app-layout>