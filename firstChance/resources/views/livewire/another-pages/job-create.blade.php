<div class="container-xxl bg-white p-0">
    <div class="container-xxl py-5 bg-dark page-header mb-5">
        <div class="container my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Add The Job</h1>
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
            <h1 class="mb-4 text-success">Add The Job</h1>
            <form wire:submit="save">
                <div class="row g-3">
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control @error('form.title') is-invalid @enderror" id="name" placeholder="Title" wire:model.blur="form.title">
                            @error('form.title') <div class="invalid-feedback"> {{$message}} </div> @enderror
                            <label for="name">Title</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <textarea class="form-control @error('form.description') is-invalid @enderror" wire:model.blur="form.description" placeholder="Desciption" id="description" style="height: 150px"></textarea>
                            @error('form.description') <div class="invalid-feedback"> {{$message}} </div> @enderror
                            <label for="description">Description</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="text" class="form-control @error('form.company_name') is-invalid @enderror" wire:model.blur="form.company_name" id="companyName" placeholder="Company Name">
                            @error('form.company_name') <div class="invalid-feedback"> {{$message}} </div> @enderror
                            <label for="companyName">Company Name</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <textarea class="form-control @error('form.company_description') is-invalid @enderror" placeholder="Company Description" wire:model.blur="form.company_description" id="companyDescription" style="height: 150px"></textarea>
                            @error('form.company_description') <div class="invalid-feedback"> {{$message}} </div> @enderror
                            <label for="companyDescription">Company Description</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="text" class="form-control @error('form.location') is-invalid @enderror" wire:model.blur="form.location" id="location" placeholder="Location">
                            @error('form.location') <div class="invalid-feedback"> {{$message}} </div> @enderror
                            <label for="location">Location</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="text" class="form-control @error('form.salary') is-invalid @enderror" wire:model.blur="form.salary" id="salary" placeholder="Salary">
                            @error('form.salary') <div class="invalid-feedback"> {{$message}} </div> @enderror
                            <label for="salary">Salary</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating">
                        {{-- <label for="employment_type">Employment Type</label> --}}
                            <select id="employment_type" wire:model.blur="form.employment_type" class="form-select @error('form.employment_type') is-invalid @enderror">
                                <option value="" selected>Select Employment Type</option>
                                <option value="full_time">Full Time</option>
                                <option value="part_time">Part Time</option>
                                <option value="internship">Internship</option>
                                <option value="remote">Remote</option>
                            </select>
                            @error('form.employment_type') <div class="invalid-feedback"> {{$message}} </div> @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating">
                            <select id="type_id" wire:model.blur="form.type_id" class="form-select @error('form.type_id') is-invalid @enderror">
                                <option value="" selected>Select Job Category</option>
                                @foreach ($types as $type)
                                    <option value="{{$type->id}}"> {{$type->title}} </option>                        
                                @endforeach
                            </select>
                            @error('form.type_id') <div class="invalid-feedback"> {{$message}} </div> @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary w-100 py-3" type="submit">Add Job</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
