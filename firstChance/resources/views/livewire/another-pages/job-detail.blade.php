<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="container-xxl py-5 bg-dark page-header mb-5">
                <div class="container my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Job Detail</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb text-uppercase">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Job Detail</li>
                        </ol>
                    </nav>
                </div>
            </div> 
            <div class="row gy-5 gx-4">
                <div class="col-lg-8">
                    <div class="d-flex align-items-center mb-5">
                        <div class="text-start ps-4">
                            <h3 class="mb-3">{{ $position->title }}</h3>
                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $position->location }}</span>
                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{ $position->employment_type }}</span>
                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>{{ $position->salary }}</span>
                        </div>
                    </div>
                    <div class="mb-5">
                        <h4 class="mb-3">Job description</h4>
                        <p>{{ $position->description }}</p>
                    </div>
    
                    <div class="">
                        <h4 class="mb-4">Apply For The Job</h4>
                        @if (session('send_email'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{session('send_email')}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                            <div class="row g-3">
                                <div class="col-12">
                                    <a class="btn btn-primary w-100" wire:navigate href="{{route('emailForm')}}">Apply Now</a>
                                </div>
                            </div>
                    </div>
                </div>
    
                <div class="col-lg-4">
                    <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                        <h4 class="mb-4">Job Summery</h4>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Company Name: {{$position->company_name}} </p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Published On: {{$position->created_at}} </p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Job Nature: {{$position->employment_type}} </p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Salary: {{$position->salary}} </p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Location:{{$position->location}} </p>
                    </div>
                    <div class="bg-light rounded p-5 wow slideInUp" data-wow-delay="0.1s">
                        <h4 class="mb-4">Company({{ $position->company_name }}) Detail</h4>
                        <p class="m-0">{{ $position->company_description }}</p>
                    </div>
                </div>
            </div>
        </div>
</div>