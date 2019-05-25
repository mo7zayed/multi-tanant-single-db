<div class="col-md-8">
    <div class="card">
        <div class="card-header">Add A Project</div>

        <div class="card-body">
            <form action="{{ route('projects.store') }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Project Name">
                </div>
            </form>
        </div>
    </div>
</div>
