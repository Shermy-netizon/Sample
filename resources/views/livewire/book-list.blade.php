<div>
    <div class="app-content"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row">
                <div class="col-md-12 pt-4">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Book List</h3>

                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#bookmodal" wire:click="resetInputFields">
                                    Add Book</button>
                            </div>
                        </div> <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>ISBN</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($books as $book)
                                        <tr class="align-middle">
                                            <td>{{ $loop->index + 1 }} </td>
                                            <td>{{ $book->title }}</td>
                                            <td>{{ $book->author }}</td>
                                            <td>{{ $book->isbn }}</td>
                                            <td>{{ $book->status }}</td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                    data-bs-target="#editBook" wire:click="editBook({{ $book->id }})">Edit</button>
                                                <button type="button" class="btn btn-danger"
                                                    wire:click.prevent="deleteBook({{ $book->id }})">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
                </div> <!-- /.col -->
            </div> <!--end::Row-->
        </div> <!--end::Container-->
    </div>

    <!-- Modal for Adding a Book -->
    <div class="modal fade" id="bookmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="bookmodal">Add Book</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="resetInputFields"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" wire:model="title" id="title">
                            @error('title')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Author <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" wire:model="author" id="author">
                            @error('author')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">ISBN <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" wire:model="isbn" id="isbn">
                            @error('isbn')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Status <span class="text-danger">*</span></label>
                            <select class="form-control" wire:model="status" id="status">
                                <option value="available">Available</option>
                                <option value="issued">Issued</option>
                                <option value="not available">Not Available</option>
                            </select>
                            @error('status')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" wire:click.prevent="save">Add</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Editing a Book -->
    <div class="modal fade" id="editBook" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editBook">Edit Book</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" wire:model="title" id="title">
                            @error('title')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Author <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" wire:model="author" id="author">
                            @error('author')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">ISBN <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" wire:model="isbn" id="isbn">
                            @error('isbn')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Status <span class="text-danger">*</span></label>
                            <select class="form-control" wire:model="status" id="status">
                                <option value="available">Available</option>
                                <option value="issued">Issued</option>
                                <option value="not available">Not Available</option>
                            </select>
                            @error('status')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click.prevent="saveUpdate">Save</button>
                </div>
            </div>
        </div>
    </div>

</div>
