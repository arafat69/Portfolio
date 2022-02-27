@php
    $page='social';
@endphp
@extends('backend.master.master')

@section('content')

<div class="row">
    <div class="col-md-8 m-auto">
        <div class="card">
            <div class="card-title p-3 bg-grey">
                <h4 class="float-start">Social Link List</h4>
                <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addnew">Add New</button>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="addnew">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add New</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('social.store') }}" method="POST">
                            @csrf
                        <div class="modal-body">
                            <div class="mb-2">
                                <label  class="form-label m-0">Icon name</label>
                                <input type="text" class="form-control" name="icon"  placeholder="Example : facebook">
                              </div>
                            <div class="mb-2">
                                <label class="form-label m-0">Icon Link</label>
                                <input type="text" class="form-control"  name="link" placeholder="Link">
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
                        <tr>
                            <th class="py-2">#</th>
                            <th class="py-2">Icon</th>
                            <th class="py-2">Link</th>
                            <th class="py-2">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $i=1 ?>
                            @foreach ($social as $list)
                            <tr>
                                <td class="py-1">{{ $i }}</td>
                                <td class="py-1 px-2 text-center"><a target="_blank" href="{{ $list->link }}"><i class="bi bi-{{ $list->icon }}"></i></a></td>
                                <td class="py-1 px-2">{{ $list->link }}</td>
                                <td class="py-1 px-2">
                                    <button class="btn btn-info py-1 px-3" data-bs-toggle="modal" data-bs-target="#editmodal{{ $list->id }}"><i class="bi bi-pen"></i></button>
                                    <a href="{{ url('/dashboard/social/'.$list->id) }}" class="btn btn-danger py-1 px-3" onclick="return confirm('Are You Sure ? Delete this!')"><i class="bi bi-trash"></i></a>
                                </td>

                                <!--Edit Modal -->
                                <div class="modal fade" id="editmodal{{ $list->id }}">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Icon</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{ url('/dashboard/social/'.$list->id) }}" method="POST">
                                                @csrf
                                                @method('patch')
                                            <div class="modal-body">
                                                <div class="mb-2">
                                                    <label  class="form-label m-0">Icon name</label>
                                                    <input type="text" class="form-control" name="icon"  value="{{ $list->icon }}">
                                                </div>
                                                <div class="mb-2">
                                                    <label class="form-label m-0">Icon Link</label>
                                                    <input type="text" class="form-control"  name="link" value="{{ $list->link }}">
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
