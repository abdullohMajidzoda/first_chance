<div class="container-xxl py-5">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Favorites</h1>
        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
           @if (session('favorite_removed'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{session('favorite_removed')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="job-item p-4 mb-4">
                        <div class="row g-4">
                            @foreach ($items as $item) 
                            @foreach ($item->favorites as $favoritef)
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3">{{ $favoritef->title }}</h5>
                                    <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $favoritef->location }}</span>
                                    <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{ $favoritef->employment_type }}</span>
                                    <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>{{ $favoritef->salary }}</span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                <div class="d-flex mb-3">
                                    <i class="fa fa-trash me-4 text-danger" wire:click="destroyFavorite({{ $favoritef->id }})"></i>
                                    <div wire:loading wire:target="destroyFavorite({{ $favoritef->id }})" style="position: relative; width:100%; height:100%; background:rgba(255,255,255, .7); text-align:center; padding-top:20px">
                                        <div class="spinner-border text-primary" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                    <a class="btn btn-primary" wire:navigate href="{{ route('jobDetail', $favoritef->id) }}">Apply Now</a>
                                </div>
                                <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>{{ $favoritef->created_at->format('d M, Y') }}</small>
                            </div>
                            @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
