<form id='agentForm'>
                          <div class="mb-3">
                            <label for="a_username" class="form-label">Username</label>
                            <input type="text" pattern="[a-zA-Z0-9-]+" title="Only Alphabets & Numbers allowed" class="form-control" id="a_username" aria-describedby="emailHelp"
                              required>
                          </div>
                          <div class="mb-3">
                            <label for="a_password" class="form-label">Password</label>
                            <input type="password" pattern='^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{0,15}$' title='Include Upper case,lower case,number & special character.' class="form-control" id="a_password" aria-describedby="emailHelp"
                              required>
                          </div>

                          <div class="mb-3">
                            <label for="a_name" class="form-label">Name</label>
                            <input type="text" class="form-control" pattern="^[A-Za-z -]+$" title="Only Alphabets allowed" id="a_name" aria-describedby="" required>
                          </div>
                          <div class="mb-3">
                            <label for="a_email" class="form-label">Email</label>
                            <input type="email" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" class="form-control" id="a_email" aria-describedby="" required>
                            <small>Format: anyone@gmail.com</small>
                          </div>
                          <div class="mb-3">
                            <label for="a_dob" class="form-label">DOB</label>
                            <input type="date" placeholder="" class="form-control" id="a_dob" aria-describedby=""
                              required>
                          </div>

                          <div class="mb-3">
                            <label for="a_address" class="form-label">Address</label>
                            <div class="form-floating">
                              <textarea class="form-control" placeholder="Leave a address here" id="a_address"
                                required></textarea>
                            </div>
                          </div>
                          <div class="mb-3">
                            <label for="a_city" class="form-label">City</label>
                            <input type="text" class="form-control" id="a_city" aria-describedby="" required>
                          </div>
                          <div class="mb-3">
                            <label for="a_state" class="form-label">State</label>
                            <input type="text" class="form-control" id="a_state" aria-describedby="" required>
                          </div>
                          <div class="mb-3">
                            <label for="a_zipcode" class="form-label">Zipcode</label>
                            <input type="number" class="form-control" pattern='^[1-9][0-9]{5}$'  title='Zipcode is of 6 numbers letters' id="a_zipcode" aria-describedby="" required>
                          </div>

                          <div class="mb-3">
                            <label for="a_branch" class="form-label">Branch</label>
                            <input type="text" class="form-control" id="a_branch" aria-describedby="" required>
                          </div>
                          <div class="mb-3">
                            <label for="a_gender" class="form-label">Gender</label>
                            <select class="form-select" id='a_gender' aria-label="Default select example">
                              <option selected disabled>Select..</option>
                              <option value="male">Male</option>
                              <option value="female">Female</option>
                              <option value="others">Others</option>
                            </select>
                          </div>
                          <div class="mb-3">
                            <label for="a_phone" class="form-label">Contact No</label>
                            <!-- <input type="text" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" id="a_phone" aria-describedby=""  required> -->
                            <input type="text" class="form-control" pattern='[0-9]+' aria-describedby="" title='Only Phone Number Allowed' id="a_phone" aria-describedby=""  required>
                          </div>


                          <!-- <button type="submit" class="btn btn-primary">Add</button> -->
                          <input class="btn btn-primary" type="Submit" value="Sign-Up" id="beagent">
                        </form>