@extends('master')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-lg-8">

            <!-- Top Header & Breadcrumb -->
            <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-1">
                            <li class="breadcrumb-item"><a href="{{ url('/admin') }}" class="text-decoration-none">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('/admin/products') }}" class="text-decoration-none">Products</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add New</li>
                        </ol>
                    </nav>
                    <h2 class="fw-bold mb-0">Add New Product</h2>
                </div>

                <a href="{{ url('/admin/products') }}" class="btn btn-outline-secondary rounded-pill px-3">
                    <i class="bi bi-arrow-left me-1"></i> Back to Products
                </a>
            </div>

            <!-- Validation Errors Summary -->
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show rounded-4 shadow-sm mb-4" role="alert">
                    <div class="d-flex align-items-center mb-1">
                        <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
                        <h6 class="mb-0 fw-bold">Please fix the following errors:</h6>
                    </div>
                    <ul class="mb-0 ps-4 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Form Card -->
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4 p-md-5">

                    <form action="{{ url('/admin/products/store') }}" method="POST">
                        @csrf

                        <!-- Product Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">Product Name <span class="text-danger">*</span></label>
                            <input type="text" 
                                   class="form-control rounded-3 @error('name') is-invalid @enderror" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name') }}" 
                                   placeholder="e.g. Samsung Galaxy S24 Ultra" 
                                   required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row g-3">
                            <!-- Price -->
                            <div class="col-md-6 mb-3">
                                <label for="price" class="form-label fw-semibold">Price (₹) <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0 rounded-start-3">₹</span>
                                    <input type="number" 
                                           step="0.01" 
                                           class="form-control rounded-end-3 @error('price') is-invalid @enderror" 
                                           id="price" 
                                           name="price" 
                                           value="{{ old('price') }}" 
                                           placeholder="1299.00" 
                                           required>
                                    @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Category -->
                            <div class="col-md-6 mb-3">
                                <label for="category" class="form-label fw-semibold">Category <span class="text-danger">*</span></label>
                                <input type="text" 
                                       class="form-control rounded-3 @error('category') is-invalid @enderror" 
                                       id="category" 
                                       name="category" 
                                       value="{{ old('category') }}" 
                                       placeholder="e.g. Mobile, Electronics, Fashion" 
                                       required>
                                @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Gallery Image URL -->
                        <div class="mb-3">
                            <label for="gallery" class="form-label fw-semibold">Image URL (Gallery)</label>
                            <input type="url" 
                                   class="form-control rounded-3 @error('gallery') is-invalid @enderror" 
                                   id="gallery" 
                                   name="gallery" 
                                   value="{{ old('gallery') }}" 
                                   placeholder="https://example.com/image.jpg"
                                   oninput="updateImagePreview(this.value)">
                            @error('gallery')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Web image URL paste karein</small>
                        </div>

                        <!-- Image Preview Box -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold text-muted small d-block">Image Preview</label>
                            <div class="border rounded-3 p-2 bg-light d-inline-block text-center" style="min-width: 140px; min-height: 140px;">
                                <img id="previewImg" 
                                     src="{{ old('gallery') ? old('gallery') : 'https://placehold.co/140x140?text=Preview' }}" 
                                     alt="Preview" 
                                     class="rounded-2 object-fit-cover" 
                                     style="width: 140px; height: 140px;"
                                     onerror="this.onerror=null;this.src='https://placehold.co/140x140?text=Invalid+URL';">
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <label for="description" class="form-label fw-semibold">Description <span class="text-danger">*</span></label>
                            <textarea class="form-control rounded-3 @error('description') is-invalid @enderror" 
                                      id="description" 
                                      name="description" 
                                      rows="4" 
                                      placeholder="Product ke details aur features yahan likhein..." 
                                      required>{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex justify-content-end gap-2 pt-2 border-top">
                            <a href="{{ url('/admin/products') }}" class="btn btn-light rounded-pill px-4">Cancel</a>
                            <button type="submit" class="btn btn-primary rounded-pill px-4 shadow-sm">
                                <i class="bi bi-check-circle me-1"></i> Save Product
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>

<!-- JavaScript for Live Image Preview -->
<script>
function updateImagePreview(url) {
    const preview = document.getElementById('previewImg');
    if (url.trim() !== '') {
        preview.src = url;
    } else {
        preview.src = 'https://placehold.co/140x140?text=Preview';
    }
}
</script>

@endsection