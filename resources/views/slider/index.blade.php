@extends('layouts.admin')

@section('content')
<div class="card">


    <div class="card-header">
            <h3 class="card-title">Slider list</h3>
            <a href="{{route('slider.create')}}" class="btn btn-info badge-success float-right"> <i class="fa-solid fa-plus"></i> Add Video  </a>
    </div>

    <!-- Search -->
    <div class="card-body">
        <form method="GET" action="{{ route('slider.index') }}" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control"
                       placeholder="Search by title..."
                       value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>

        <!-- Slider Table -->
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>SI</th>
                    <th>Title</th>
                    <th>Img</th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($results as $key => $slider)
                <tr>
                    <td>{{ $results->firstItem() + $key }}</td>
                    <td>{{ $slider->title }}</td>
                    <td>
                        <img src="{{ asset($slider->url) }}" alt="slider image" width="120" class="img-thumbnail">
                    </td>
                    <td>{{ $slider->priority }}</td>
                    <td>
                        <span class="badge {{ $slider->status == 1 ? 'bg-success' : 'bg-danger' }}">
                            {{ $slider->status == 1 ? 'Active' : 'De-Active' }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('slider.edit',$slider->id) }}" class="btn btn-success btn-sm">
                            <i class="fa-solid fa-pen-to-square"></i> Edit
                        </a>


                         <a href="#" class="btn btn-danger btn-sm"
                           onclick="event.preventDefault();
                               if(confirm('Are you sure you want to delete this slider?')) {
                                   document.getElementById('deleteSlider{{ $slider->id }}').submit();
                               }">
                            <i class="fa-solid fa-trash-can"></i> Delete
                        </a>

                        <form id="deleteSlider{{ $slider->id }}"
                              action="{{ route('slider.destroy', $slider->id) }}"
                              method="POST" class="d-none">
                            @csrf
                            @method('DELETE')
                        </form>



                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">No sliders found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="mt-3">
            {{ $results->appends(request()->query())->links() }}
        </div>
    </div>
</div>
@endsection
