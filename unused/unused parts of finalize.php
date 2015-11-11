 <div class="form-group">
                                    <label class="control-label">Address:</label>
                                    <input type="text" name="address" class="form-control" required="TRUE" placeholder="Address"value="<?php echo $_SESSION['result']["address"];?>">
                                    <input type="text" name="city" class="form-control" required="TRUE" placeholder="City"value="<?php echo $_SESSION['result']["city"];?>">    
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-6">
                                        <input type="text" name="state" class="form-control" maxlength="2"placeholder="State"value="<?php echo $_SESSION['result']["state"];?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text"  name="zip" class="form-control" required="TRUE" placeholder="Zipcode"value="<?php echo $_SESSION['result']["zip"];?>">
                                    </div>
                                </div>