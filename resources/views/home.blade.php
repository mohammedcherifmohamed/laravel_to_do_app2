@extends('Layout.main')

@section('title')
    My To-Do-List
@endsection

@section('content')

    <section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">

            <div class="card">
            <div class="card-body p-5">
                <form action="{{route('tasks.store')}}" method="POST" class="d-flex justify-content-center align-items-center mb-4">
                    @csrf
                    <div data-mdb-input-init class="form-outline flex-fill">
                        @if (session('success'))                            
                            <x-alert type="success">{{session('success')}}</x-alert>
                        @endif
                        <input name="title" type="text" id="form2" class="form-control" />
                        <label class="form-label" for="form2">New task...</label>
                        @error('title')
                            <div class="text-danger" >{{$message}}</div>
                        @enderror
                    </div>
                    <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-info ms-2">Add</button>
                </form>

                <!-- Tabs navs -->
                <ul class="nav nav-tabs mb-4 pb-2" id="ex1" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="ex1-tab-1" data-mdb-tab-init href="#ex1-tabs-1" role="tab"
                    aria-controls="ex1-tabs-1" aria-selected="true">All</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="ex1-tab-2" data-mdb-tab-init href="#ex1-tabs-2" role="tab"
                    aria-controls="ex1-tabs-2" aria-selected="false">Active</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="ex1-tab-3" data-mdb-tab-init href="#ex1-tabs-3" role="tab"
                    aria-controls="ex1-tabs-3" aria-selected="false">Completed</a>
                </li>
                </ul>
                <!-- Tabs navs -->

                <!-- Tabs content -->
                <div class="tab-content" id="ex1-content">
                <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel"
                    aria-labelledby="ex1-tab-1">
                 <ul class="space-y-2">
    @foreach($tasks as $task)
    <li class="flex justify-between items-center p-4 bg-gray-100 rounded shadow-sm hover:bg-gray-200 transition">
        <div class="flex items-center gap-3">

            <form action="{{ route('tasks.toggle', $task->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <input 
                    type="checkbox" 
                    onchange="this.form.submit()" 
                    class="form-checkbox h-5 w-5 text-indigo-600" 
                    {{ $task->completed ? 'checked' : '' }}
                >
            </form>

            @if($task->completed)
                <s class="text-gray-500">{{ $task->title }}</s>
            @else
                <span class="text-gray-800 font-medium">{{ $task->title }}</span>
            @endif
        </div>

        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this task?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-500 hover:text-red-700 transition" title="Delete">
                🗑️
            </button>
        </form>
    </li>
@endforeach

</ul>

                </div>
                <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                    <ul class="list-group mb-0">
                    <li class="list-group-item d-flex align-items-center border-0 mb-2 rounded"
                        style="background-color: #f4f6f7;">
                        <input class="form-check-input me-2" type="checkbox" value="" aria-label="..." />
                        Morbi leo risus
                    </li>
                    <li class="list-group-item d-flex align-items-center border-0 mb-2 rounded"
                        style="background-color: #f4f6f7;">
                        <input class="form-check-input me-2" type="checkbox" value="" aria-label="..." />
                        Porta ac consectetur ac
                    </li>
                    <li class="list-group-item d-flex align-items-center border-0 mb-0 rounded"
                        style="background-color: #f4f6f7;">
                        <input class="form-check-input me-2" type="checkbox" value="" aria-label="..." />
                        Vestibulum at eros
                    </li>
                    </ul>
                </div>
                <div class="tab-pane fade" id="ex1-tabs-3" role="tabpanel" aria-labelledby="ex1-tab-3">
                    <ul class="list-group mb-0">
                    <li class="list-group-item d-flex align-items-center border-0 mb-2 rounded"
                        style="background-color: #f4f6f7;">
                        <input class="form-check-input me-2" type="checkbox" value="" aria-label="..." checked />
                        <s>Cras justo odio</s>
                    </li>
                    <li class="list-group-item d-flex align-items-center border-0 mb-2 rounded"
                        style="background-color: #f4f6f7;">
                        <input class="form-check-input me-2" type="checkbox" value="" aria-label="..." checked />
                        <s>Dapibus ac facilisis in</s>
                    </li>
                    </ul>
                </div>
                </div>
                <!-- Tabs content -->

            </div>
            </div>

        </div>
        </div>
    </div>
    </section>

@endsection

