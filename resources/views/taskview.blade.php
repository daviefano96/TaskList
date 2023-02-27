@extends('auth.master')
@section('content')


<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">

            <div class="card">
                <div class="card-body">
                    <section>
                        <div class="container py-5 h-100">
                            <div class="row d-flex justify-content-center align-items-center h-100">
                                <div class="col">
                                    <div class="card" id="list1"
                                        style="border-radius: .75rem; background-color: #eff1f2;">
                                        <div class="card-body py-4 px-4 px-md-5">

                                            <p class="h1 text-center mt-3 mb-4 pb-3 text-primary">
                                                <i class="fas fa-check-square me-1"></i>
                                                <u>{{ $task->name }}</u>
                                            </p>

                                            <div class="pb-2">
                                                <div class="card">
                                                    <form method="post"
                                                        action={{ route('taskview.add') }}>
                                                        @csrf
                                                        <div class="card-body">
                                                            <div class="d-flex flex-row align-items-center">
                                                                <input type="hidden" name="to_do_list_id"
                                                                    value="{{ $task->id }}">
                                                                <input type="text" class="form-control form-control-lg"
                                                                    name="name" placeholder="Add new Subtask">
                                                                <div>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Add</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                            <hr class="my-4">

                                            @foreach($task->task as $subtask)
                                                <form method="post"
                                                    action={{ route('taskview.edit') }}>
                                                    @csrf
                                                    <ul class="list-group list-group-horizontal rounded-0">
                                                        <li
                                                            class="list-group-item d-flex align-items-center ps-0 pe-3 py-1 rounded-0 border-0 bg-transparent">
                                                            <div class="form-check">

                                                                @if($subtask->status==0)
                                                                    <input class="form-check-input me-0" type="checkbox"
                                                                        value="{{ $subtask->id }}" name="taskbox"
                                                                        checked />
                                                                @else
                                                                    <input class="form-check-input me-0" type="checkbox"
                                                                        value="{{ $subtask->id }}" name="taskbox" />
                                                                @endif

                                                            </div>
                                                        </li>
                                                        <li
                                                            class="list-group-item px-3 py-1 d-flex align-items-center flex-grow-1 border-0 bg-transparent">
                                                            <input type="hidden" name="id" value="{{ $subtask->id }}">
                                                            <input type="hidden" name="to_do_list_id"
                                                                value="{{ $subtask->to_do_list_id }}">
                                                            <input id="name" name="name" class="lead fw-normal mb-0"
                                                                value="{{ $subtask->name }}" />

                                                        </li>
                                                        <li
                                                            class="list-group-item ps-3 pe-0 py-1 rounded-0 border-0 bg-transparent">
                                                            <div class="d-flex flex-row justify-content-end mb-1">
                                                                <button id="editbtn" class="text-info editbtn"
                                                                    data-mdb-toggle="tooltip" type="submit"><i
                                                                        class="fas fa-pencil-alt me-3"></i></button>

                                                                <a href="{{ url('delete', $subtask->id) }}"
                                                                    class="text-danger" data-mdb-toggle="tooltip"
                                                                    title="Delete todo"><i
                                                                        class="fas fa-trash-alt"></i></a>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </form>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="card card-profile">
                <!-- <img src="/img/bg-profile.jpg" alt="Image placeholder" class="card-img-top"> -->
                <div class="row justify-content-center">
                    <div class="col-4 col-lg-4 order-lg-2">
                        <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                            <a href="javascript:;">
                                <!-- <img src="/img/team-2.jpg"
                                        class="rounded-circle img-fluid border border-2 border-white"> -->
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">

                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col">
                            <div class="d-flex justify-content-center">
                                <div class="d-grid text-center">
                                    <span class="text-lg font-weight-bolder">{{ $task->finished }}</span>
                                    <span class="text-sm opacity-8">Finished</span>
                                </div>
                                <div class="d-grid text-center mx-4">
                                    <span class="text-lg font-weight-bolder">
                                        {{ $task->unfinished }}</span>
                                    <span class="text-sm opacity-8">Unfinished</span>
                                </div>
                                <div class="d-grid text-center">
                                    <span class="text-lg font-weight-bolder">{{ $task->percent }}%</span>
                                    <span class="text-sm opacity-8">Progression</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <h5>
                            Information
                        </h5>
                        <div class="h6 font-weight-300">
                            <i class="ni location_pin mr-2"></i>
                        </div>
                    </div>


                </div>

                <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">

                </div> @if($task->user_id==auth()->user()->id)
                <div class="card-body pt-0">
                    <div>
                        <div class="card">
                         
                            <form method="post" action="{{ route('addmember') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="d-flex flex-row align-items-center">
                                           
                                            <input type="hidden" name="to_do_list_id" value="{{ $task->id }}">
                                            <select name="user_id" id="user_id" class="form-control form-control-lg" placeholder="Select User">
                                             @foreach($task->users as $user)
                                                <option class="form-control-lg" value="{{ $user->id }}">{{ $user->firstname }}</option>
                                             @endforeach
                                            </select>
                                            
                                        <div>
                                            <button type="submit" class="btn btn-primary">Add</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            
                            
                        </div>
                    </div>
                    @else
                        <form method="post" action="{{ route('leave') }}">
                            @csrf
                                <div class="text-center mt-4">
                                    <h5>
                                    <input type="hidden" name="to_do_list_id" value="{{ $task->id }}">
                                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                        <button type="submit" class="btn btn-danger">Leave Task</button>
                                    </h5>
                                </div>
                        </form>
                    @endif




                </div>

            </div>
        </div>
    </div>
</div>

<script>
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    const selectedRowInput = document.getElementById('taskbox');

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('click', () => {
            // selectedRowInput.value = checkbox.value;
            var id = checkbox.value;

            if (checkbox.checked) {

                $.ajax({
                    type: 'POST',
                    header: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "unfinish",
                    data: {
                        _token: '{{ csrf_token() }}', // include CSRF token
                        data: id
                    },
                    success: function (response) {
                        console.log(response);
                    }
                });


            } else {

                $.ajax({
                    type: 'POST',
                    header: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "finish",
                    data: {
                        _token: '{{ csrf_token() }}', // include CSRF token
                        data: id
                    },
                    success: function (response) {
                        console.log(response);
                    }
                });

            }
        });
    });

    $(document).ajaxStop(function () {
        window.location.reload();
    });

</script>

@endsection
