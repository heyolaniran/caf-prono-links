<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <div class="top-0 bg-cover z-index-n1 min-height-100 max-height-200 h-25 position-absolute w-100 start-0 end-0"
            style="background-image: url(''); background-position: bottom;">
        </div>
        <x-app.navbar />

        

        <div class="px-5 py-4 container-fluid ">
            <form action={{ route('users.update') }} method="POST">
                @csrf
                @method('PUT')
                <div class="mt-5 mb-5 mt-lg-9 row justify-content-center">
                    <div class="col-lg-9 col-12">
                        <div class="card card-body" id="profile">
                            <img src="../../../assets/img/header-orange-purple.jpg" alt="pattern-lines"
                                class="top-0 rounded-2 position-absolute start-0 w-100 h-100">

                            <div class="row z-index-2 justify-content-center align-items-center">
                                <div class="col-sm-auto col-4">
                                    <div class="avatar rounded-circle avatar-xl position-relative">
                                        <img src="../assets/img/avatar.png" alt="bruce"
                                            class="w-100 h-100 object-fit-cover border-radius-lg shadow-sm"
                                            id="preview">
                                    </div>
                                </div>
                                <div class="col-sm-auto col-8 my-auto">
                                    <div class="h-100">
                                        <h5 class="mb-1 text-white font-weight-bolder">
                                            {{ auth()->user()->name }}
                                        </h5>
                                        <p class="mb-0 text-white font-weight-bold text-sm">
                                            {{ auth()->user()->bet_account }}
                                        </p>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-9 col-12">
                        @if (session('error'))
                            <div class="alert alert-danger" role="alert" id="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success" role="alert" id="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="mb-5 row justify-content-center">
                    <div class="col-lg-9 col-12 ">
                        <div class="card " id="basic-info">
                            <div class="card-header">
                                <h5>Mon Compte</h5>
                            </div>
                            <div class="pt-0 card-body">

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="name">Nom & Prénoms</label>
                                        <input type="text" name="name" id="name"
                                            value="{{ old('name', auth()->user()->name) }}" class="form-control">
                                        @error('name')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email"
                                            value="{{ old('email', auth()->user()->email) }}" class="form-control" readonly>
                                        @error('email')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    

                                    <div class="">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="phone" id="phone" placeholder="0733456987"
                                            value="{{ old('phone', auth()->user()->phone) }}" class="form-control">
                                        @error('phone')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <label for="about">A propos de moi </label>
                                    <textarea name="about" id="about" rows="5" class="form-control">{{ old('about', auth()->user()->about) }}</textarea>
                                    @error('about')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="mt-6 mb-0 btn btn-white btn-sm float-end">Enregistrer </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
       
        </div>
       
    </main>


</x-app-layout>
