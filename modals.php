<div class="modal" tabindex="-1" id="add_car_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="add_car_title">Modal title</h5>
        <button type="button" id="btn-close" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" id="add-edit-car" method="POST">
          <input type="text" name="car_id" id="car_id" value="" hidden>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group p-1">
                        <label for="vehicle_model">Vehicle Model :</label>
                        <input type="text" name="vehicle_model" id="vehicle_model" class="form-control" placeholder="Enter Vehicle Model" required>
                    </div>
                    <div class="form-group p-1">
                        <label for="vehicle_number">Vehicle Number :</label>
                        <input type="text" name="vehicle_number" id="vehicle_number" class="form-control" placeholder="Enter Vehicle Number" required>
                    </div>
                    <div class="form-group p-1">
                        <label for="no_of_seats">Seating Capacity :</label>
                        <input type="number" name="no_of_seats" id="no_of_seats" class="form-control" placeholder="Enter Number of Seats" required>
                    </div>
                    <div class="form-group p-1">
                        <label for="rent_per_day">Rent per Day :</label>
                        <input type="number" name="rent_per_day" id="rent_per_day" class="form-control" placeholder="Enter Rate per Day in Rs."required>
                    </div>
                    <div class="form-group p-1">
                        <label for="available">Available :</label>
                        <select name="available" id="" class="form-control">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
              <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
     
    </div>
  </div>
</div>