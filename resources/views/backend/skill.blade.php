@php
    $page='skill';
@endphp
@extends('backend.master.master')

@section('content')

<div class="row">
    <div class="col-md-8 m-auto">
        <div class="card">
            <div class="card-title p-3 bg-grey">
                <h4 class="float-start">Skill List</h4>
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
                        <form action="{{ url('/dashboard/skill') }}" method="POST">
                            @csrf
                        <div class="modal-body">
                            <div class="mb-2">
                                <label  class="form-label m-0">Skill Name</label>
                                <input type="text" class="form-control" name="name"  placeholder="Example : HTML" required>
                              </div>
                            <div class="mb-2">
                                <label class="form-label m-0">persen(%)</label>
                                <input type="text" class="form-control"  name="persen" placeholder="Example: 70" required>
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
                            <th class="p-2 text-center">#</th>
                            <th class="p-2">Skill</th>
                            <th class="p-2">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($skill as $list)
                            <tr>
                                <td class="p-2 text-center" style="width: 8%">{{ $i }}</td>
                                <td class="p-2" style="width: 62%">
                                    <label class="text-bold">{{ $list->name }}</label>
                                    <div class="progress progress-primary progress-lg">
                                        <div class="progress-bar progress-label" role="progressbar" style="width: {{ $list->persen }}%" aria-valuenow="{{ $list->persen }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td class="p-2" style="width: 30%">
                                    <button class="btn btn-info py-1 px-3" data-bs-toggle="modal" data-bs-target="#editmodal{{ $list->id }}"><i class="bi bi-pen"></i></button>
                                    <a href="{{ url('/dashboard/skill/'.$list->id) }}" class="btn btn-danger py-1 px-3" onclick="return confirm('Are You Sure ? Delete this!')"><i class="bi bi-trash"></i></a>
                                </td>

                                <!--Edit Modal -->
                                <div class="modal fade" id="editmodal{{ $list->id }}">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Skill</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{ url('/dashboard/skill/'.$list->id) }}" method="POST">
                                                @csrf
                                                @method('patch')
                                            <div class="modal-body">
                                                <div class="mb-2">
                                                    <label  class="form-label m-0">Skill Name</label>
                                                    <input type="text" class="form-control" name="name"  value="{{ $list->name }}">
                                                </div>
                                                <div class="mb-2">
                                                    <label class="form-label m-0">Persen(%)</label>
                                                    <input type="text" class="form-control"  name="persen" value="{{ $list->persen }}">
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
