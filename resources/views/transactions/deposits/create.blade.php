<x-app-layout>
    <main class="main-content  position-relative max-height-vh-100 h-100 border-radius-lg">
        <x-app.navbar />

        <div class="container mt-2">
            <div class="justify-content-start mt-2 mb-3">
                <a href="{{route('transactions')}}"> <i class="fa fa-arrow-left fa-1.5x" aria-hidden="true"></i></a>
            </div>

            <h3 class="font-weight-black text-dark text-center display-6">Dépôt</h3>
            <p class="mb-0 text-center">Rechargez votre compte 1XBET et pariez en toute tranquillité </p>

            <form action="{{route('transactions.store')}}" method="POST" class="mt-2">
                @csrf 

                <input type="hidden" name="type" value="{{App\Enums\Types::DEPOT->value}}">

                <label for="bet_account">ID du Compte  1XBET</label>
                <div class="form-group">
                    <input type="text" name="bet_account" id="bet_account" class="form-control" value="{{old('bet_account')}}" placeholder="ID du compte  1XBET" aria-describedby="">
                    @error('bet_account')
                        <small class="text-danger text-sm"> {{$message}} </small>
                    @enderror
                </div>

                <label for="amount">Montant à déposer <span class="text-danger ms-2 text-xs bg-danger px-2 py-1 rounded-pill text-white"> Min. 500 XOF</label>
                <div class="form-group">
                    <input type="number" min="500" name="amount" id="amount" class="form-control" value="{{old('amount')}}" placeholder="Montant à déposer (min. 500 XOF)" aria-describedby="">
                    @error('amount')
                        <small class="text-danger text-sm"> {{$message}} </small>
                    @enderror
                </div>

                <div class="text-center w-12 mt-6">
                    <p class="bg-dark text-light text-center px-4 py-2 text-md"> Payez au {{$provider->ussd}} <span class="font-weight-bold" id="value">Montant</span> #</p>
                    <hr>
                    <span class="text-center"> ou </span>
                    <hr>
                    <div class="text-center">
                        <a href="" id="ussd" class="btn btn-info rounded-pill">Payer ici </a>
                    </div>
                </div>

                <div class="">
                    <label for="txid">ID de la transaction</label>
                    <div class="form-group">
                        <input type="text" name="tx_id" id="txid" class="form-control" placeholder="ID de la transaction" aria-describedby="">
                        @error('tx_id')
                            <small class="text-danger text-sm"> {{$message}} </small>
                        @enderror
                    </div>

                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-info px-4 py-2 rounded-pill"> Envoyer  <i class="fa fa-arrow-right" aria-hidden="true"></i> </button>
                </div>



            </form>

        </div>


    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function () {
           $("#amount").on('change', function () {
             var value = 'tel:'+"{{$provider->ussd}}"+$('#amount').val()+"#"
             $('#value').html($("#amount").val());
             $("#ussd").attr('href', value ); 
           });
        });
    </script>
</x-app-layout>