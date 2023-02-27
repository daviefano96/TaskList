@extends('auth.master')
@section('content')

<div class="card shadow-lg mx-4 card-profile-bottom">
    <div class="card-body p-3">
        <div class="row gx-4">
            <div class="col-auto">
                <div class="avatar avatar-xl position-relative">
                    <!-- <img src="/img/team-1.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm"> -->
                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        {{ auth()->user()->firstname }} TASK BOARD
                    </h5>
                    <p class="mb-0 font-weight-bold text-sm">
                        <!-- Public Relations -->
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                <div class="nav-wrapper position-relative end-0">
                    <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center "
                        data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            <i class="ni ni-settings-gear-65"></i>
                            <span class="ms-2">Add new Task</span>
                        </button>
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="container-fluid py-4">
    <table class="table align-middle mb-0 bg-white" id="productTable">
        <thead class="bg-light">
            <tr>
                <th>Task Name</th>
                <th>Description</th>
                <!-- <th>Ownership</th> -->
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <!-- <img
                                src="https://mdbootstrap.com/img/new/avatars/8.jpg"
                                alt=""
                                style="width: 45px; height: 45px"
                                class="rounded-circle"
                                /> -->
                            <div class="ms-3">
                                <p class="fw-bold mb-1">{{ $task->name }}</p>
                                @if($task->user_id == auth()->user()->id)
                                    <p class="text-primary mb-0">Owner</p>
                                @else
                                    <p class="text-warning mb-0">Guest</p>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="fw-normal mb-1 bold">{{ $task->description }}</p>

                    </td>

                    <!-- <td>₱</td> -->
                    <td>
                        @if($task->status==1)
                            <span class="badge badge-danger rounded-pill d-inline">No Progress</span>
                        @elseif($task->status==2)
                            <span class="badge badge-warning rounded-pill d-inline">On Going</span>
                        @elseif($task->status==0)
                            <span class="badge badge-success rounded-pill d-inline">Completed</span>
                        @endif
                    </td>
                    <td>
                        <button type="button" class="btn btn-link btn-sm btn-rounded">
                            <a href="{{ url('taskview', $task->id) }}">
                                View
                            </a>
                        </button>
                        <a href="{{ url('deletetask', $task->id) }}" class="text-danger"
                            data-mdb-toggle="tooltip" title="Delete Task"><i class="fas fa-trash-alt"></i></a>
                    </td>   
                </tr>
            @endforeach
        </tbody>
    </table>


</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Task</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action={{ route('viewtask.add') }}>
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="form-label">Task Name</label>
                        <input type="hidden" name="user_id" value={{ auth()->user()->id }}>
                        <input type="text" class="form-control" name="name" placeholder="Task Name" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="form-label">Description</label>
                        <input type="text" class="form-control" name="description" placeholder="Description" required>

                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="form-label">Deadline Date</label>
                        <input type="date" class="form-control" name="deadline" placeholder="deadline" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>

        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#productTable').DataTable();
    });

</script>

@endsection
