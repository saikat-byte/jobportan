@extends('front.layouts.app')

@section('title', 'Profile')

@section('content')
    <section class="section-5 bg-2">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Account Settings</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    @include('front.account.sidebar')
                </div>
                <div class="col-lg-9">
                    @include('front.message')
                    <form action="{{ route('account.saveJob') }}" method="POST">
                        @csrf
                        <div class="card border-0 shadow mb-4 ">
                            <div class="card-body card-form p-4">
                                <h3 class="fs-4 mb-1">Job Details</h3>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label for="title" class="mb-2">Title<span class="req">*</span></label>
                                        <input type="text" placeholder="Job Title" id="title" name="title" value="{{ old('title') }}"
                                            class="form-control  @error('title') is-invalid @enderror">
                                        @error('title')
                                            <p class="invalid-feedback"> {{ $message }} </p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6  mb-4">
                                        <label for="category" class="mb-2">Category<span class="req">*</span></label>
                                        <select name="category" id="category" value="{{ old('category') }}"
                                            class="form-control @error('category') is-invalid  @enderror">
                                            <option value="">Select a Category</option>
                                            @if ($categories->isNotEmpty())
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('category')
                                            <p class="invalid-feedback"> {{ $message }} </p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label for="job_type" class="mb-2">Job Nature<span class="req">*</span></label>
                                        <select class="form-control @error('job_type') is-invalid @enderror" name="job_type" value="{{ old('job_type') }}"
                                            id="job_type">
                                            <option value="">Select Job Nature</option>
                                            @if ($jobTypes->isNotEmpty())
                                                @foreach ($jobTypes as $jobType)
                                                    <option value="{{ $jobType->id }}">{{ $jobType->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('job_type')
                                            <p class="invalid-feedback"> {{ $message }} </p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6  mb-4">
                                        <label for="vacancy" class="mb-2">Vacancy<span class="req">*</span></label>
                                        <input type="number" min="1" placeholder="Vacancy" id="vacancy" value="{{ old('vacancy') }}"
                                            name="vacancy" class="form-control  @error('vacancy') is-invalid @enderror">
                                        @error('vacancy')
                                            <p class="invalid-feedback"> {{ $message }} </p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-4 col-md-6">
                                        <label for="salary" class="mb-2">Salary</label>
                                        <input type="text" placeholder="Salary" id="salary" name="salary" value="{{ old('salary') }}"
                                            class="form-control">

                                    </div>

                                    <div class="mb-4 col-md-6">
                                        <label for="location" class="mb-2">Location<span class="req">*</span></label>
                                        <input type="text" placeholder="location" id="location" name="location" value="{{ old('location') }}"
                                            class="form-control @error('location') is-invalid @enderror">
                                        @error('location')
                                            <p class="invalid-feedback"> {{ $message }} </p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="description" class="mb-2">Description<span class="req">*</span></label>
                                    <textarea class="textarea @error('description') is-invalid  @enderror" name="description" id="description"
                                        cols="5" rows="5" placeholder="Description">{{ old('description') }}</textarea>

                                    @error('description')
                                        <p class="invalid-feedback"> {{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="benefits" class="mb-2">Benefits</label>
                                    <textarea class="textarea" name="benefits" id="benefits" cols="5" rows="5" placeholder="Benefits">{{ old('benefits') }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label for="responsibility" class="mb-2">Responsibility</label>
                                    <textarea class="textarea" name="responsibility" id="responsibility" cols="5" rows="5"
                                        placeholder="Responsibility">{{ old('responsibility') }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label for="qualifications" class="mb-2">Qualifications</label>
                                    <textarea class="textarea" name="qualification" id="qualification" cols="5" rows="5"
                                        placeholder="Qualifications">{{ old('qualification') }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label for="experience" class="mb-2">Experience<span
                                            class="req">*</span></label>
                                    <select class="form-control @error('experience') is-invalid @enderror"
                                        name="experience" id="experience">
                                        <option value="1">1 year</option>
                                        <option value="2">2 years</option>
                                        <option value="3">3 years</option>
                                        <option value="4">4 years</option>
                                        <option value="5">5 years</option>
                                        <option value="6">6 years</option>
                                        <option value="7">7 years</option>
                                        <option value="8">8 years</option>
                                        <option value="9">9 years</option>
                                        <option value="10">10 years</option>
                                        <option value="10_plus">10+ years</option>
                                    </select>
                                    @error('experience')
                                        <p class="invalid-feedback"> {{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="keywords" class="mb-2">Keywords</label>
                                    <input type="text" placeholder="keywords" id="keywords" name="keywords" value="{{ old('keywords') }}"
                                        class="form-control">
                                </div>

                                <h3 class="fs-4 mb-1 mt-5 border-top pt-5">Company Details</h3>

                                <div class="row">
                                    <div class="mb-4 col-md-6">
                                        <label for="company_name" class="mb-2">Name<span
                                                class="req">*</span></label>
                                        <input type="text" placeholder="Company Name" id="company_name" value="{{ old('company_name') }}"
                                            name="company_name"
                                            class="form-control @error('company_name') is-invalid @enderror">

                                        @error('company_name')
                                            <p class="invalid-feedback"> {{ $message }} </p>
                                        @enderror
                                    </div>

                                    <div class="mb-4 col-md-6">
                                        <label for="company_location" class="mb-2">Location</label>
                                        <input type="text" placeholder="Location" id="company_location" value="{{ old('company_location') }}"
                                            name="company_location" class="form-control">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="website" class="mb-2">Website</label>
                                    <input type="text" placeholder="Website" id="website" name="company_website" value="{{ old('company_website') }}"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="card-footer  p-4">
                                <button type="submit" class="btn btn-primary">Post Job</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
