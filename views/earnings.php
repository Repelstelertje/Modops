    <!-- Call to action-->
    <section class="page-section bg-dark text-white" id="earnings">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5">
                <div class="col-lg-6 col-md-6">
                    <h2 class="mb-4"><?=$lang['EARNINGS-TITLE']?></h2>
                    <p><?=$lang['EARNINGS-TEXT']?></p>
                    <p><?=$lang['EARNINGS-TEXT-SUB']?></p>
                    <h3 class="mb-4"><?=$lang['EARNINGS-TABLE-TITLE']?></h3>
                    <table class="earnings-table">
                        <tr>
                          <th><?=$lang['EARNINGS-TABLE-TH-ONE']?></th>
                          <th><?=$lang['EARNINGS-TABLE-TH-TWO']?></th>
                        </tr>
                        <tr>
                          <td><?=$lang['EARNINGS-TABLE-TD-0']?></td>
                          <td><?=$lang['EARNINGS-TABLE-TD-12']?></td>
                        </tr>
                        <tr>
                          <td><?=$lang['EARNINGS-TABLE-TD-251']?></td>
                          <td><?=$lang['EARNINGS-TABLE-TD-13']?></td>
                        </tr>
                        <tr>
                          <td><?=$lang['EARNINGS-TABLE-TD-351']?></td>
                          <td><?=$lang['EARNINGS-TABLE-TD-14']?></td>
                        </tr>
                        <tr>
                          <td><?=$lang['EARNINGS-TABLE-TD-501']?></td>
                          <td><?=$lang['EARNINGS-TABLE-TD-15']?></td>
                        </tr>
                        <tr>
                          <td><?=$lang['EARNINGS-TABLE-TD-751']?></td>
                          <td><?=$lang['EARNINGS-TABLE-TD-16']?></td>
                        </tr>
                        <tr>
                          <td><?=$lang['EARNINGS-TABLE-TD-1201']?></td>
                          <td><?=$lang['EARNINGS-TABLE-TD-17']?></td>
                        </tr>
                        <tr>
                          <td><?=$lang['EARNINGS-TABLE-TD-WEEKEND']?></td>
                          <td><?=$lang['EARNINGS-TABLE-TD-BONUS']?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-lg-6 col-md-6">
                  <h3 class="mb-4 text-center"><?=$lang['EARNINGS-CALCULATE-TITLE']?></h3>
                    <div class="card bg-dark p-2 border-0">
                      <form>
                        <!-- Messages per day -->
                        <div class="form-group row">
                          <label class="col-6 col-sm-8 col-form-label" for="berichten"><?=$lang['EARNINGS-CALCULATE-ONE']?></label>
                          <div class="col-6 col-sm-4 input-group mb-4">
                              <input
                                  type="number"
                                  value="50"
                                  min="10"
                                  step="10"
                                  id="berichten"
                                  class="form-control text-white border-0 bg-input pr-0 no-radius"
                                  onchange="computeLoon()">
                              <div class="input-group-append mobile-hide">
                                  <span class="input-group-text bg-input border-0 text-white no-radius justify-content-center">
                                      <i class="bi bi-envelope"></i>
                                  </span>
                              </div>
                          </div>
                        </div>

                        <!-- Days per week -->
                        <!-- ======================================================================== -->
                        <div class="form-group row">
                          <label class="col-6 col-sm-8 col-form-label" for="werkDagen"><?=$lang['EARNINGS-CALCULATE-TWO']?></label>
                          <div class="col-6 col-sm-4 input-group mb-4">
                              <input
                                  type="number"
                                  value="5"
                                  min="1"
                                  max="7"
                                  id="werkDagen"
                                  class="form-control text-white border-0 bg-input pr-0 no-radius"
                                  onchange="computeLoon()">
                              <div class="input-group-append mobile-hide">
                                <span class="input-group-text bg-input border-0 text-white no-radius justify-content-center">
                                    <i class="bi bi-calendar-date"></i>
                                </span>
                              </div>
                          </div>
                        </div>

                        <!-- % night messages 
                        <div class="form-group row">
                            <label class="col-6 col-sm-8 col-form-label" for="avondBonus"><?=$lang['EARNINGS-CALCULATE-THREE']?></label>
                            <div class="col-6 col-sm-4 input-group mb-4">
                              <input
                                type="number"
                                value="10"
                                min="0"
                                max="100"
                                step="10"
                                id="avondBonus"
                                class="form-control text-white border-0 bg-input pr-0 no-radius"
                                onchange="computeLoon()">
                              <div class="input-group-append mobile-hide">
                                  <span class="input-group-text bg-input border-0 text-white no-radius justify-content-center">
                                    <i class="bi bi-percent"></i>
                                  </span>
                              </div>
                            </div>
                        </div>
                        -->
                        <!-- % weekend messages -->
                        <!-- ======================================================================== -->
                        <div class="form-group row mb-0">
                          <label class="col-6 col-sm-8 col-form-label" for="weekendBonus"><?=$lang['EARNINGS-CALCULATE-FOUR']?></label>
                          <div class="col-6 col-sm-4 input-group mb-4">
                            <input
                              type="number"
                              value="10"
                              min="0"
                              max="100"
                              step="10"
                              id="weekendBonus"
                              class="form-control text-white border-0 bg-input pr-0 no-radius"
                              onchange="computeLoon()">
                              <div class="input-group-append mobile-hide">
                                <span class="input-group-text bg-input border-0 text-white no-radius justify-content-center">
                                    <i class="bi bi-percent"></i>
                                  </span>
                              </div>
                            </div>
                      </div>

                      <!-- Earnings per day -->
                      <!-- ======================================================================== -->
                      <div class="form-group row">
                        <label class="col-6 col-sm-8 col-form-label" for="werkUren"><?=$lang['EARNINGS-CALCULATE-FIVE']?></label>
                        <div class="col-6 col-sm-4 input-group mb-4">
                          <div class="input-group-prepend mobile-hide">
                            <span class="input-group-text bg-success border-0 text-white no-radius">
                              <i class="bi bi-clock"></i>
                            </span>
                          </div>
                          <div class="form-control border-0 bg-success text-white no-radius" id="werkUren"></div>
                        </div>
                      </div>

                      <!-- Earnings per week -->
                      <!-- ======================================================================== -->
                      <div class="form-group row">
                        <label class="col-6 col-sm-8 col-form-label" for="weekVerdiensten"><?=$lang['EARNINGS-CALCULATE-SIX']?></label>
                        <div class="col-6 col-sm-4 input-group mb-4">
                          <div class="input-group-prepend mobile-hide">
                            <span class="input-group-text  bg-success border-0 text-white no-radius">
                              &euro;
                            </span>
                          </div>
                          <div class="form-control border-0 bg-success text-white no-radius" id="weekVerdiensten"></div>
                        </div>
                      </div>

                      <!-- Earnings per month -->
                      <!-- ======================================================================== -->
                      <div class="form-group row">
                        <label class="col-6 col-sm-8 col-form-label" for="maandVerdiensten"><?=$lang['EARNINGS-CALCULATE-SEVEN']?></label>
                        <div class="col-6 col-sm-4 input-group mb-4">
                          <div class="input-group-prepend mobile-hide">
                            <span class="input-group-text bg-success border-0 text-white no-radius">
                              &euro;
                            </span>
                          </div>
                          <div class="form-control border-0 bg-success text-white no-radius" id="maandVerdiensten"></div>
                        </div>
                      </div>
                    </form><!-- form-->
                  </div><!-- card-->
                </div><!-- col-->
            </div>
        </div>
    </section>
