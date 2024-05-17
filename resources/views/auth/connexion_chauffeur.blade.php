@extends("layouts.default")
@section("title", "Connexion")
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
                        <h1 class="card-header text-center">Login chauffeur</h1>
                        <div class="card-body">
                            <form method="POST" action="{{route("login_chauffeur.post")}}">
                            @csrf
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Email" id="email" class="form-control" name="chauffeur_email" required autofocus>
                                    @if ($errors->has('chauffeur_email'))
                                        <span class="text-danger">{{ $errors->first('chauffeur_email')}}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" placeholder="Mot de passe" id="password" class="form-control" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif     
                                </div>
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dark btn-block">Se connecter</button>
                                </div>
                            </form>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection