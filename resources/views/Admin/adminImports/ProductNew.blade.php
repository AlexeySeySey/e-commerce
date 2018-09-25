<form action="{{ URL::to('/admin/saveNewProduct') }}"
  method="POST"
  enctype="multipart/form-data">
  @csrf
  <div class="container">
    <div class="row">

      <div class="col-md">
        <b>Name:</b>
        <input class="form-control"
          type="text"
          name="name"
          required>
        <br>
        <b>Weight:</b>
        <input type=number
          name="weight"
          step=0.1
          class="form-control w-150" 
          required/>
        <br>
        <b>Price($):</b>
        <input type=number
          name="price"
          step=0.1
          class="form-control w-150" 
          required/>
        <br>
        <div>
          <b>Weight Type:</b>
          <br>
          <div class="btn-group"
            style="width:600px !important">
            <select name="w_type"
              class="form-control"
              required>
              selected
              <option value="l">l</option>
              <option value="kg">kg</option>
              <option value="th">th</option>
            </select>
          </div>
        </div>
        <br>
        <span><b>Produced date and time:</b></span>
        <input class="form-control"
          type="text"
          name="produced"
          placeholder="1971-06-25 00:00:00"
          required>
        <br>
        <span><b>Expiration date and time:</b></span>
        <input class="form-control"
          type="text"
          name="expiration"
          placeholder="1980-05-25 10:56:13"
          required>
      </div>


      <div id="photoEditGood"
        class="col-md">
        <div class="container-fluid">
          <div class="col-md-6 alert alert-secondary">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-btn">
                  <span class="btn btn-default btn-file">
                    <i class="fa fa-image btn btn-secondary"></i>
                    <input type="file"
                      id="imgInp"
                      name="good_image_up"
                      accept="image/*"
                      required>
                  </span>
                </span>
                <input type="text"
                  name="new_img_name_good"
                  class="form-control"
                  readonly
                  id="inpt">
              </div>
              <img id='img-upload' />
            </div>
          </div>
        </div>
        <div class="container"
          id="result"></div>
        <br>
        <hr>

        <div>
          <b>Producer:</b>
          <input class="form-control"
            type="text"
            name="producer"
            placeholder="Gulgowski, O'Connell and Hartmann"
            required>
          <br>
          <b>Address:</b>
          <input class="form-control"
            type="text"
            name="address"
            placeholder="Beckerside Apt. 165"
            required>
          <br>
          <b>Phone:</b>
          <input class="form-control"
            type="text"
            name="phone"
            placeholder="(844) 793-5957"
            required>
          <br>
          <b>Email:</b>
          <input class="form-control"
            type="email"
            name="email"
            placeholder="shana.strosin@gmail.com"
            required>
        </div>

      </div>
    </div>
    <br>
    <button type="submit"
      class="btn btn-dark btn-lg"
      style="margin-left:900px;">
      <i class="fa fa-check"></i>
      Save
    </button>
  </div>
  <hr><br><br>
</form>