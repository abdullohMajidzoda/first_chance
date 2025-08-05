<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">   
    <div class="container">   
        <div class="row gy-5 gx-4">
            <div class="col-lg-8">
                <h4 class="mb-4">Apply For The Job</h4>
                @if (session('send_email'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session('send_email')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form wire:submit.prevent="sendEmail">
                    <div class="row g-3">
                        <div class="col-12 col-sm-6">
                            <input type="text" wire:model.blur="name" class="form-control @error('name') is-invalid @enderror" placeholder="Your Name">
                            @error('name') <div class="invalid-feedback"> {{$message}} </div> @enderror
                        </div>
                        <div class="col-12 col-sm-6">
                            <input type="email" wire:model.blur="email" class="form-control @error('email') is-invalid @enderror" placeholder="Your Email">
                            @error('email') <div class="invalid-feedback"> {{$message}} </div> @enderror
                        </div>
                        <div class="col-12 col-sm-6">
                            <input type="text" wire:model.blur="portfolio" class="form-control @error('portfolio') is-invalid @enderror" placeholder="Portfolio Website">
                            @error('portfolio') <div class="invalid-feedback"> {{$message}} </div> @enderror
                        </div>
                        <div class="col-12 col-sm-6">
                            <input type="file" wire:model="cv" class="form-control bg-white @error('cv') is-invalid @enderror">
                            @error('cv') <div class="invalid-feedback"> {{$message}} </div> @enderror
                            <div wire:loading wire:target="cv" class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                        <div class="col-12">
                            <textarea class="form-control @error('letter') is-invalid @enderror" wire:model.blur="letter" rows="5" placeholder="Coverletter"></textarea>
                            @error('letter') <div class="invalid-feedback"> {{$message}} </div> @enderror
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100" type="submit">Apply Now</button>
                            <div wire:loading wire:target="sendEmail" style="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
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
</div>
