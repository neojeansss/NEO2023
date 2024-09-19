<x-app title="Add Support | NEO 2022">

    <x-slot name="navbarAdmin"></x-slot>
    <x-slot name="sidebarAdmin"></x-slot>

    <div class="container p-5" style="max-width: 60rem">
        <h4 class="mb-4 fw-semibold text-primary">Add New Support</h4>

        <form method="POST" action="{{ route('supports.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card card-custom mb-3">
                <div class="card-body">
                    <div class="row mb-3">
                        <label class="col-3 col-form-label">Name</label>
                        <div class="col">
                            <input type="text" class="form-control" name="name" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-3 col-form-label">Logo</label>
                        <div class="col">
                            <input class="form-control" type="file" name="logo" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-3 col-form-label">Category</label>
                        <div class="col">
                            <fieldset>
                                <input type="radio" class="btn-check" id="sponsor" name="category" value="Sponsor"
                                required>
                                <label for="sponsor" class="label_sponsor rounded-pill">Sponsor</label>

                                <input type="radio" class="btn-check" id="medpar" name="category"
                                value="Media Partner">
                                <label for="medpar" class="label_medpar rounded-pill">Media Partner</label>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-grid gap-2 d-flex justify-content-end">
                <a href="{{ route('supports.index') }}" type="button" class="btn btn-outline-primary py-2 px-5">
                    Cancel
                </a>
                <button type="submit" class="btn btn-primary py-2 px-5">Add</button>
            </div>
        </form>
    </div>
</x-app>

<style>
    input[type="radio"]#sponsor:checked ~ label.label_sponsor{
        color: white;
        background-color: #FF5A01;
        border-radius: 8px;
        border: none;
        padding: 6px 10px;
        text-decoration: none;
    }
    input[type="radio"]#sponsor ~ label.label_sponsor{
        color: rgb(255, 90, 44);
        outline: 1px solid rgb(202, 202, 202);
        background-color:white;
        border-radius: 8px;
        border: none;
        padding: 6px 10px;
        text-decoration: none;
    }
    input[type="radio"]#medpar:checked ~ label.label_medpar{
        color: white;
        background-color: #FF5A01;
        border-radius: 8px;
        border: none;
        padding: 6px 10px;
        text-decoration: none;
    }
    input[type="radio"]#medpar ~ label.label_medpar{
        color: rgb(255, 90, 44);
        outline: 1px solid rgb(202, 202, 202);
        background-color:white;
        border-radius: 8px;
        border: none;
        padding: 6px 10px;
        text-decoration: none;
    }
</style>