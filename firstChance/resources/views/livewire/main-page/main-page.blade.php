<div class="container-xxl bg-white p-0">
    
    {{-- Banner --}}
    <div class="owl-carousel header-carousel position-relative">  
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="{{ asset('img/ds.jpg') }}" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(43, 57, 64, .5);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-10 col-lg-8">
                            <h1 class="display-3 text-white animated slideInDown mb-4">Find The Perfect Job That You Deserved</h1>
                            <p class="fs-5 fw-medium text-white mb-4 pb-2">Find the Perfect Job That You Truly Deserve — One That Matches Your Passion, Skills, and Career Goals</p>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Search A Job</a>
                            <a href="{{route('jobCreate')}}" wire:navigate class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Post A Job</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="{{ asset('img/dd.jpg') }}" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(43, 57, 64, .5);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-10 col-lg-8">
                            <h1 class="display-3 text-white animated slideInDown mb-4">Find The Best Startup Job That Fit You</h1>
                            <p class="fs-5 fw-medium text-white mb-4 pb-2">Find Your Place in the Startup World — Work Where Ideas Matter and You Make an Impact</p>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Search A Job</a>
                            <a href="{{route('jobCreate')}}" wire:navigate class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Post A Job</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>        
    
    {{-- Jobs --}}
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-2 container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
                <div class="col-md-10">
                    <div class="row g-2">
                        <div class="col-md-6">
                            <input type="text" class="form-control border-0" placeholder="Keyword, Location" wire:model.live="search" />
                        </div>
                        <div class="col-md-6">
                            <select class="form-select border-0" wire:model.live="selectedType">
                                <option value="">Select Category</option>
                                @foreach ($types as $type)            
                                <option value="{{ $type->id }}">{{ $type->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="col-md-4">
                            <select class="form-select border-0">
                                @foreach ($positions as $position)     
                                <option value="{{ $position->id }}">{{ $position->location }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                    </div>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-dark border-0 w-100">Search</button>
                </div>
                <div wire:loading style="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Listing</h1>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                {{-- <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill" href="#tab-1">
                            <h6 class="mt-n1 mb-0">Featured</h6>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-2">
                            <h6 class="mt-n1 mb-0">Full Time</h6>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#tab-3">
                            <h6 class="mt-n1 mb-0">Part Time</h6>
                        </a>
                    </li>
                </ul> --}}
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="job-item p-4 mb-4">
                            @foreach ($positions as $position)
                            <div class="row g-4 mb-4">

                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3"> {{ $position->title }} </h5>
                                        <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i> {{ $position->location }} </span>
                                        <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{ $position->employment_type }}</span>
                                        <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i> {{ $position->salary }} </span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                    <div class="d-flex mb-3">
                                        <a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-primary"></i></a>
                                        <a class="btn btn-primary" wire:navigate href="{{ route('jobDetail', $position->id) }}">Apply Now</a>
                                    </div>
                                    <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line: {{ $position->created_at }}</small>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="btn btn-primary py-3 px-5">
                            {{ $positions->links(data:['scrollTo' => false]) }}
                            <div wire:loading style="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
                                <div class="spinner-border" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>
