<!-- Edit Modal -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editLabel">Edit</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="product/update">
                @csrf
                <div class="form-group row">
                  <label for="name" class="col-sm-2 col-form-label">Name</label>
                  <input type="text" class="form-control col" id="name" placeholder="Example Name" required autofocus>
                </div>
                <div class="form-group row">
                  <label for="category" class="col-sm-2 col-form-label">Category</label>
                  <input type="text" class="form-control col" id="category" placeholder="Example Category" required>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Photo</label>
                    <div class="custom-file col-sm-6">
                      <input accept="image/*" type="file" id="photo" multiple class="custom-file-input form-control" id="photo">
                      <label class="custom-file-label" for="photo">Choose image</label>
                    </div>
                    <img id="preview" class="rounded ml-5" style="height: 100px;" src="https://dummyimage.com/100x100/111/eee&text=preview" alt="">
                </div>
                <div class="form-group row">
                  <label for="stock" class="col-sm-2 col-form-label">Stock</label>
                  <input type="text" class="form-control col" id="stock" onkeypress="return isNumberKey(event)" placeholder="1234" required>
                </div>
                <div class="form-group row">
                  <label for="price" class="col-sm-2 col-form-label">Price</label>
                  <input type="text" class="form-control col" id="price" onkeypress="return isNumberKey(event)" placeholder="1234" required>
                </div>
                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea rows="3" class="form-control" id="description" placeholder="Example Description"></textarea>
                </div>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-warning">Save changes</button>
        </div>
      </div>
    </div>
  </div>
