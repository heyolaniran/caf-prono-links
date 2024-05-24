<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-app.navbar />
        <div class="px-5 py-4 ">
            <div class="mt-4 row">
                <div class="col-md-12">
                    
                    <div class="card">
                        <div class="pb-0 card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="">Les utilisateurs </h5>
                                    <p class="mb-0 text-sm">
                                        Gestion des utilisateurs .
                                    </p>
                                </div>
                                <div class="col-md-6 text-end">
                                    <div class="input-group w-sm-60 ms-auto">
                                        <span class="input-group-text text-body">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z">
                                                </path>
                                            </svg>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Search">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="">
                                @if (session('success'))
                                    <div class="alert alert-success" role="alert" id="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if (session('error'))
                                    <div class="alert alert-danger" role="alert" id="alert">
                                        {{ session('error') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table text-secondary text-center">
                                <thead>
                                    <tr>
                                        
                                        
                                        <th
                                            class="text-left text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                            Name</th>
                                        <th
                                            class="text-left text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                            Email</th>
                                        <th
                                            class="text-center text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                            Role</th>
                                        <th
                                            class="text-center text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                            Creation</th>
                                        <th
                                            class="text-center text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>

                                            <td class="align-middle bg-transparent border-bottom">{{$user->name}}</td>
                                            <td class="align-middle bg-transparent border-bottom">{{$user->email}}</td>
                                            <td class="text-center align-middle bg-transparent border-bottom">{{$user->role}}</td>
                                            <td class="text-center align-middle bg-transparent border-bottom">{{$user->created_at->format('d/m/y')}}</td>

                                            <td class="text-center align-middle bg-transparent border-bottom">
                                                @if(!$user->isAdmin())
                                                    <form action="{{route('user.nominate', ['user' => $user])}}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <button class="btn btn-outline-danger text-danger"> Nommer </button>
                                                    </form>
                                                @else 
                                                    <form action="{{route('user.denominate', ['user' => $user])}}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <button class="btn btn-outline-info text-info"> Démettre  </button>
                                                    </form>

                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-app.footer />
    </main>

</x-app-layout>

<script src="/assets/js/plugins/datatables.js"></script>
<script>
    const dataTableBasic = new simpleDatatables.DataTable("#datatable-search", {
        searchable: true,
        fixedHeight: true,
        columns: [{
            select: [2, 6],
            sortable: false
        }]
    });
</script>
