@extends('layouts.main')

@section('container')

<div class="container py-5">

    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h1 text-dark">Data Supplier</h1>
            <p class="text-muted">A list of all the supplier account.</p>
        </div>
        <div class="input-group" style="max-width: 300px;">
            <input type="text" class="form-control form-control-sm" placeholder="Search for supplier data..." />
            <button class="btn btn-outline-secondary" type="button">
                <i class="bi bi-search"></i>
            </button>
        </div>
    </div>

    <!-- Table Section -->
    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover text-center align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($suppliers as $supplier)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $supplier->nama_supplier }}</td>
                            <td>{{ $supplier->alamat_supplier }}</td>
                            <td>{{ $supplier->telepon_supplier }}</td>
                            <td>
                                <a href="{{ route('supplier.edit', $supplier->id) }}" class="text-primary text-decoration-none">Edit</a>
                            </td>
                            <td>
                                <a href="{{ route('supplier.destroy', $supplier->id) }}"
                                   class="text-danger text-decoration-none"
                                   onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this supplier?')) { document.getElementById('delete-form-{{ $supplier->id }}').submit(); }">
                                    Delete
                                </a>
                                <form id="delete-form-{{ $supplier->id }}" action="{{ route('supplier.destroy', $supplier->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination Section -->
        <div class="card-footer d-flex justify-content-between align-items-center">
            <span class="text-muted">Showing <b>1-5</b> of 45</span>
            <nav aria-label="Page navigation">
                <ul class="pagination pagination-sm mb-0">
                    <li class="page-item"><a class="page-link" href="#">Prev</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>

    <!-- Add Supplier Button -->
    <div class="text-center mt-4">
        <a href="{{ route('supplier.create') }}" class="btn btn-primary">Add Data Supplier Here</a>
    </div>

</div>

@endsection
