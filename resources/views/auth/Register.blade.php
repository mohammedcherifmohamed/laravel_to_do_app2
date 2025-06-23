@extends('Layout.main')
@section('title')
Register Page
@endsection
@section('content')
 <main class="form-signin w-100 m-auto"> 
    <form action="{{route("register.post")}}" method="POST" >
    @csrf
        <img class="mb-4" src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
     <h1 class="h3 mb-3 fw-normal">Please Register Here</h1>
          <h3 class="h3 mb-3 fw-normal">you Have An account <a href="/login">Login Here</a> </h3>

          <div class="form-floating my-5">
            <input name="name" type="text" class="form-control" id="floatingName" placeholder="Your Name">
            <label for="floatingName">Name</label>
            @error('name')
                <span class="text-danger">{{$message}}</span>
            @enderror
         </div> 
         <div class="form-floating my-5">
            <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com"> 
            <label for="floatingInput">Email address</label> 
            @error('email')
                <span class="text-danger" >{{$message}}</span>
            @enderror
         </div> 
         <div class="form-floating my-5">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label> 
             @error('password')
                <span class="text-danger" >{{$message}}</span>

            @enderror
        </div> 
         <div class="form-floating my-5">
            <input type="password" name="password_verififcation" class="form-control" id="password_verififcation" placeholder="Verify your Password">
            <label for="password_verififcation">Password</label> 
            @error('password_verififcation')
                <span class="text-danger" >{{$message}}</span>
            @enderror
        </div> 
        @if(session()->has("success"))
            <div class="alert alert-success" >{{session()->get("success")}}</div>
        @endif
          @if(session()->has("error"))
            <div class="alert alert-danger">{{session()->get("error")}}</div>
        @endif
        <div class="form-check text-start my-3"> 
            <input class="form-check-input" type="checkbox" value="remember-me" id="checkDefault">
             <label class="form-check-label" for="checkDefault">
Remember me
</label>
 </div> 
 <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button> 
 <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2025</p> 
</form>
 </main> 

 @endsection()