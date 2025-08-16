<div class="container-xxl bg-white p-0">
    <div class="container-xxl py-5 bg-dark page-header mb-5">
        <div class="container my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Post A Job</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Post A Job</li>
                </ol>
            </nav>
        </div>
    </div> 
    <div class="col-md-12 my-5 p-5">
        <div class="wow fadeInUp" data-wow-delay="0.5s">
            <h1 class="mb-4 text-success">Post A Job</h1>
            <form wire:submit="save">
                <div class="row g-3">
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name" wire:model.blur="name">
                            @error('name') <div class="invalid-feedback"> {{$message}} </div> @enderror
                            <label for="name">Name</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" wire:model.blur="email" id="email" placeholder="Your Email">
                            @error('email') <div class="invalid-feedback"> {{$message}} </div> @enderror
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" wire:model.blur="password" id="password" placeholder="Enter Your Password">
                            @error('password') <div class="invalid-feedback"> {{$message}} </div> @enderror
                            <label for="password">Password</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary w-100 py-3" type="submit">Register</button>
                        <div wire:loading style="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
                            <div class="spinner-border" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
