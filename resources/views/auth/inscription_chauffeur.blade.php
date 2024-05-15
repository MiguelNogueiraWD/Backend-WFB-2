@extends("layouts.default")
@section("title", "Inscription")
@section("content")
    <main class="mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    @if(session()->has("success"))
                        <div class="alert alert-success">
                            {{session()->get("success")}}
                        </div>
                    @endif
                    @if(session()->has("error"))
                        <div class="alert alert-danger">
                            {{session()->get("error")}}
                        </div>
                    @endif
                    <div class="card">
                        <h1 class="card-header text-center">Inscription chauffeur</h1>
                        <div class="card-body">
                            <form method="POST" action="{{route("register_chauffeur.post")}}">
                                @csrf
                                    <div class="form-group mb-3">
                                        <input type="text" placeholder="Nom" id="nom" class="form-control" name="nom" required autofocus>
                                        @if ($errors->has('nom'))
                                            <span class="text-danger">{{ $errors->first('nom') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="text" placeholder="Prénom" id="prenom" class="form-control" name="prenom" required>
                                        @if ($errors->has('prenom'))
                                            <span class="text-danger">{{ $errors->first('prenom') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="email" placeholder="Email" id="email" class="form-control" name="email" required>
                                            @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="text" placeholder="Adresse" id="adresse" class="form-control" name="adresse" required>
                                        @if ($errors->has('adresse'))
                                            <span class="text-danger">{{ $errors->first('adresse') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="text" placeholder="Téléphone" id="telephone" class="form-control" name="tel" required>
                                        @if ($errors->has('tel'))
                                            <span class="text-danger">{{ $errors->first('tel') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="password" placeholder="Mot de passe" id="password" class="form-control" name="password" required>
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif     
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="password" placeholder="Confirmez le mot de passe" id="password_confirmation" class="form-control" name="password_confirmation" required>
                                        @if ($errors->has('mdp_confirmation'))
                                            <span class="text-danger">{{ $errors->first('mdp_confirmation') }}</span>
                                        @endif     
                                    </div>
                                    <div class="d-grid mx-auto">
                                        <button type="submit" class="btn btn-dark btn-block">S'inscrire</button>
                                    </div>
                            </form>

                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection