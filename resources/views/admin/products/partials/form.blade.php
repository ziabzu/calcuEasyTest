<div class="modal fade" id="modal-product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('products.store') }}">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">{{ __('Create product') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>
                    @csrf
                    <input type="hidden" id="product-id" value="" >
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1">DKK</span>
                            </div>
                            <input type="number" class="form-control" placeholder="price" aria-label="price" aria-describedby="basic-addon1"
                                id="price" name="price" required
                                >
                          </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="button" class="btn btn-success" value="Save" id="btn-store-product" onclick="storeProduct()" />
                    <input type="button" class="btn btn-success" value="Update" id="btn-update-product" onclick="updateProduct()" />
                </div>
            </form>
        </div>
    </div>
</div>
