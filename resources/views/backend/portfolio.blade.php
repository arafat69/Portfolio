@php
    $page='portfolio';
@endphp

@extends('backend.master.master')

@section('content')

<div class="row">
    <div class="col-md-8 m-auto">
        <div class="card">
            <div class="card-title p-3 bg-grey">
                <h4 class="float-start">Portfolio List</h4>
                <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addnew">Add New</button>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="addnew">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add New</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ url('/dashboard/portfolio') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label  class="form-label m-0">Category</label>
                                        <select name="category" class="form-select" required>
                                            <option value="Design">Design</option>
                                            <option value="Development">Development</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="mb-2">
                                        <label class="form-label m-0">Title</label>
                                        <input type="text" class="form-control"  name="title" placeholder="Title" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label class="form-label m-0">Link</label>
                                        <input type="text" class="form-control"  name="link" placeholder="Link" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label class="form-label m-0">Photo</label>
                                        <input type="file" class="form-control"  name="photo" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-bordered table-responsive">
                    <thead>
                        <tr class="text-center">
                            <th class="p-2">#</th>
                            <th class="p-2">Title</th>
                            <th class="p-2">Category</th>
                            <th class="p-2">Photo</th>
                            <th class="p-2">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $i=1 ?>
                            @foreach ($data as $list)
                            <tr>
                                <td class="p-1 text-center">{{ $i }}</td>
                                <td class="p-1">{{ $list->title }}</td>
                                <td class="p-1">{{ $list->category }}</td>
                                <td class="p-1 text-center" style="width: 65px">
                                    <img src="{{ asset('public/uploads/'.$list->photo) }}" width="50">
                                </td>
                                <td class="p-1">
                                    <button class="btn btn-info py-1 px-3" data-bs-toggle="modal" data-bs-target="#editmodal{{ $list->id }}"><i class="bi bi-pen"></i></button>
                                    <a href="{{ url('/dashboard/portfolio/'.$list->id) }}" class="btn btn-danger py-1 px-3" onclick="return confirm('Are You Sure ? Delete this!')"><i class="bi bi-trash"></i></a>
                                </td>

                                <!--Edit Modal -->
                                <div class="modal fade" id="editmodal{{ $list->id }}">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Icon</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{ url('/dashboard/portfolio/'.$list->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('patch')
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-2">
                                                            <label  class="form-label m-0">Category</label>
                                                            <select name="category" class="form-select" required>
                                                                <option value="{{ $list->category }}">{{ $list->category }}</option>
                                                                <option value="Design">Design</option>
                                                                <option value="Development">Development</option>
                                                                <option value="Others">Others</option>
                                                            </select>
                                                        </div>
                                                     </div>
                                                     <div class="col-md-6">
                                                        <div class="mb-2">
                                                            <label class="form-label m-0">Title</label>
                                                            <input type="text" class="form-control"  name="title" value="{{ $list->title }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-2">
                                                            <label class="form-label m-0">Link</label>
                                                            <input type="text" class="form-control"  name="link" value="{{ $list->link }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-2">
                                                            <label class="form-label m-0">Photo</label>
                                                            <input type="file" class="form-control"  name="photo">
                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                            <?php $i++ ?>
                            @endforeach
                        </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

@endsection
