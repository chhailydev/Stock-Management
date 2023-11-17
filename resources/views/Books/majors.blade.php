<!DOCTYPE html>
<html>

<head>
    @include('Books.link')
</head>

<body>
    @include('Books.Navbar')
    <main id="main" class="main">
        <section class="section dashboard">
            <div class="row">
                <div class="col-lf-12">
                    <div class="card-body pb-0">
                        <a href="#" class="btn btn-primary" id="btnadd">Add Major</a>
                        @if ($data->isEmpty())
                            <h1>No available Major</h1>
                        @else
                            <table class="table table-border text-center" id="tbmajor">
                                <tr>
                                    <th>ID</th>
                                    <th>Faculty Of</th>
                                    <th>Create At</th>
                                    <th>Active</th>
                                </tr>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->major_id }}</td>
                                        <td>{{ $item->major_name }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <a href="#" class="btn btn-primary btn-sm btnedit">EDIT</a>
                                            {{-- <a href="#" class="btn btn-danger btn-sm btndelete">DELETE</a> --}}
                                            <form action="/major/:{{$item->major_id}}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this semester?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Add faculty --}}
            <div class="modal fade" id="addModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Add Major</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div align="right"><a href="#" id="addfty"
                                    class="btn btn-primary btn-sm p-1">Add</a></div>
                            <table class="table-border text-center" id="addrow">
                                <tr>
                                    <th>Major</th>
                                </tr>
                                <tbody id="trow">
                                    <tr>
                                        <td>
                                            <div class="group-form mb-3">
                                                <input type="text" class="form-control major"
                                                    placeholder="major Name" name="major">
                                        </td>
                        </div>
                        </tr>
                        </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="btnsave">Add</button>
                    </div>
                </div>
            </div>
            </div>
            {{-- End add faculty --}}

            {{-- Edit --}}
            <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Edit Major</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="id">
                            <div class="group-form mb-3">
                                <input type="text" id="major" placeholder="Major Name" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="btnEdit">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- End edit --}}


            {{-- Delete --}}
            <div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="id">
                            <h4>Are you sure delete Major?</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="btnDelete">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- End edit --}}
        </section>
    </main>

    <script src="{{ asset('js/major/add.js') }}"></script>
    <script src="{{ asset('js/major/edit.js') }}"></script>
</body>

</html>
