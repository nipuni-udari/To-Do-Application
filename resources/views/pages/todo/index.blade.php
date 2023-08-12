@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row ">
            <div class="col-lg-12 text-center">
                <h1 class="page-title"> To do List </h1>
            </div>
                <div class="col-lg-12 mt-5">
                    <form action="{{ route ('todo.store') }}" method="post" enctype="multipart/form">
                        @csrf
                        <div class="row">
                            <div class=" col-lg-8">
                                <div class="form-group">
                                    <input class="form-control" name="title" placeholder="Enter a task">
                                </div>
                            </div>
                            <div class = "col-lg-4 mt-5">
                                <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-12">
                <div>
                <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($tasks as $key => $task)

                                <tr>
                                    <th scope="row">{{++$key}}</th>
                                    <td>{{ $task -> title }}</td>
                                    <td>{{ $task -> done }}</td>
                                    <td>
                                        @if ($task->done == 0)
                                            <span class="badge text-bg-warning">Not completed</span>

                                        @else
                                            <span class="badge text-bg-success">completed</span>

                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('todo.delete', $task->id) }}" class="btn "><i class="fa-solid fa-trash-can" style="color: #f50511;"></i></a>
                                        <a href="{{ route('todo.done', $task->id) }}" class="btn "><i class="fa-solid fa-circle-check" style="color: #018e18;"></i></a>

                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                </table>

            </div>
        </div>
    </div>
</div>


@endsection

@push("css")
<style>
.page-title {

    padding-top: 10vh;
    font-size: 5rem;
    color: #c90909;
}

</style>
@endpush
