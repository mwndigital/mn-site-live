@extends('layouts.admin')
@push('page-title')
    Admin Edit {{ $category->name }} Knowledgebase Category
@endpush
@push('page-scripts')

@endpush
@push('page-styles')

@endpush
@section('content')
    <section class="pageHero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-9">
                    <h1>
                        Edit {{ $category->name }} Knowledgebase Category
                    </h1>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('admin.knowledgebase-categories.index') }}" class="darkPurpleBtn">
                        <i class="fas fa-chevron-left"></i> All Post Categories
                    </a>
                </div>
            </div>
        </div>
    </section>

    <x-admin-errors-banner/>

    <section class="pageMain">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.knowledgebase-categories.update', $category->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="row">
                            <div class="col-12">
                                <label for="">Name *</label>
                                <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" required>
                                @error('name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Description</label>
                                <textarea name="description" id="description" cols="30" rows="10" class="tinyEditor">{{ old('description', $category->description) }}</textarea>
                                @error('description')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Featured Image</label>
                                <input type="file" name="featured_image" id="featured_image">
                                @error('featured_image')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="">Current Image</label>
                                @if($category->featured_image)
                                    <img class="img-fluid" src="{{ Storage::url($category->featured_image) }}" style="display: block; height: 100px; width: auto;">
                                @else
                                    No featured post set
                                @endif
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="darkPurpleBtn">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
