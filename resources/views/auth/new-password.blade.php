@extends("layouts.default")
@section("title", "reset")
@section("content")
    <main class="mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    @if ($errors->any())
                        <div class="col-12">
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger">{{$error}}</div>
                            @endforeach
                        </div>
                    @endif
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
                        <h1 class="card-header text-center">reset</h1>
                        <div class="card-body">
                        <form method="POST" action="{{ route('reset.password.post') }}">
                            @csrf
                            <input type="text" name="token" hidden value="{{$token}}">
                            <div class="form-group mb-3">
                                <input type="password" placeholder=" Nouveau mot de passe" id="password" class="form-control" name="password" required>
                                @if ($errors->has('mdp'))
                                    <span class="text-danger">{{ $errors->first('mdp') }}</span>
                                @endif     
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" placeholder="Confirmez le mot de passe" id="password_confirmation" class="form-control" name="password_confirmation" required>
                                @if ($errors->has('mdp_confirmation'))
                                    <span class="text-danger">{{ $errors->first('mdp_confirmation') }}</span>
                                @endif     
                            </div>
                            <button type="submit">Envoyer le lien de réinitialisation</button>
                        </form>

                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection