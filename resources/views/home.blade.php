@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-custom">{{ __('Dashboard') }}</div>

                <div class="card-body">

                    <p>{{ __('You are logged in!') }}</p>


                    <a href="{{route('form.show')}}" class="btn btn-primary">{{__('Create new entry')}}</a>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif


                    <table id="example" class="table table-striped  mt-3" style="width:100%">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($entries as $entry)
                                <tr>
                                    <td>@if($entry->image)
                                        <img src="{{ asset('storage/' . $entry->image) }}" alt="{{ $entry->name }}" style="max-width: 100px;">
                                    @endif</td>
                                    <td>{{ $entry->name }}</td>
                                    <td>{{ $entry->description }}</td>
                                    <td><a class="btn btn-success" href="{{route('entries.edit',$entry->id)}}">{{__('Edit')}}</a></td>
                                     <td>
                                         <form action="{{ route('entries.delete', $entry->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this entry?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">{{__('Delete')}}</button>
                                    </form>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $('#example').DataTable();
});
</script>
@endsection
