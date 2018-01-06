@extends('layouts.app')

@section('content')

    <div class="row">

        <div class="page page-forms-wizard">
          <div class="row">
            <div class="col-md-12">
              <div class="pageheader">
                <h2>School Setup</h2>
                <div class="page-bar  br-5">
                  <ul class="page-breadcrumb">
                    <li><a href="index.html"><i class="fa fa-home"></i> yatri</a></li>
                    <li><a href="#">Form Stuff</a></li>
                    <li><a class="active" href="layout-fullwidth.html">Form Wizard</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- page content -->
          <div class="pagecontent">
            <div id="rootwizard" class="tab-container tab-wizard">
              <ul class="nav nav-tabs nav-justified">
                <li><a href="#tab1" data-toggle="tab">Personal Information <span class="badge badge-default pull-right wizard-step">1</span></a></li>
                <li><a href="#tab2" data-toggle="tab">Address<span class="badge badge-default pull-right wizard-step">2</span></a></li>
                <li><a href="#tab3" data-toggle="tab">Education<span class="badge badge-default pull-right wizard-step">3</span></a></li>
                <li><a href="#tab4" data-toggle="tab">Contact<span class="badge badge-default pull-right wizard-step">4</span></a></li>
                <li><a href="#tab5" data-toggle="tab">EULA<span class="badge badge-default pull-right wizard-step">5</span></a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane" id="tab1">
                  <form name="step1" role="form">
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="username">Name : </label>
                        <input type="text" name="name" id="name" class="form-control"
                                                       required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="username">Username : </label>
                        <input type="text" name="username" id="username" class="form-control"
                                                       minlength="3"
                                                       maxlength="8"
                                                       required>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="password">Password : </label>
                        <input type="password" name="password" id="password" class="form-control"
                                                       minlength="6"
                                                       required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="passwordConfirm">Password confirmation : </label>
                        <input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control"
                                                       data-parsley-equalto="#password"
                                                       required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="message">About you : </label>
                      <textarea class="form-control" rows="5" name="message" id="message" placeholder="Write something about you..."></textarea>
                    </div>
                  </form>
                </div>
                <div class="tab-pane" id="tab2">
                  <form name="step2" role="form">
                    <div class="row">
                      <div class="form-group col-md-8 mb-0">
                        <label for="street">Street : </label>
                        <input type="text" name="street" id="street" class="form-control" placeholder="Enter street address"
                                                       required>
                      </div>
                      <div class="form-group col-md-4 mb-0">
                        <label for="dnumber">Door no. : </label>
                        <input type="text" name="dnumber" id="dnumber" class="form-control" placeholder="Enter door number"
                                                       required>
                      </div>
                    </div>
                    <div class="form-group mt-10">
                      <label for="address2">Address Line 2 : </label>
                      <input type="text" name="address2" id="address2" class="form-control" placeholder="Enter secondary address">
                    </div>
                    <div class="row">
                      <div class="form-group col-md-4">
                        <label for="city">City : </label>
                        <input type="text" name="city" id="city" class="form-control" placeholder="Enter city"
                                                       required>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="state">State : </label>
                        <input type="text" name="state" id="state" class="form-control" placeholder="Enter state"
                                                       required>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="zip">Zip : </label>
                        <input type="text" name="zip" id="zip" class="form-control" placeholder="Enter zip"
                                                       required>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="tab-pane" id="tab3">
                  <form name="step3" role="form" novalidate>
                    <h4 class="custom-font"><strong>Primary</strong> School</h4>
                    <div class="row">
                      <div class="form-group col-md-4 mb-0">
                        <label for="pr-subject">Subject : </label>
                        <input type="text" name="pr-subject" id="pr-subject" class="form-control">
                      </div>
                      <div class="form-group col-md-4 mb-0">
                        <label for="pr-name">School name : </label>
                        <input type="text" name="pr-name" id="pr-name" class="form-control"
                                                       required>
                      </div>
                      <div class="form-group col-md-2 mb-0">
                        <label for="prstart">Start Date : </label>
                        <input type="text" name="prstart" id="prstart" class="form-control" placeholder="YYYY-MM-DD"
                                                       pattern="/[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])$/">
                      </div>
                      <div class="form-group col-md-2 mb-0">
                        <label for="prend">End Date : </label>
                        <input type="text" name="prend" id="prend" class="form-control" placeholder="YYYY-MM-DD"
                                                       pattern="/[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])$/">
                      </div>
                    </div>
                    <h4 class="custom-font"><strong>Secondary</strong> School</h4>
                    <div class="row">
                      <div class="form-group col-md-4 mb-0">
                        <label for="sc-subject">Subject : </label>
                        <input type="text" name="sc-subject" id="sc-subject" class="form-control">
                      </div>
                      <div class="form-group col-md-4 mb-0">
                        <label for="sc-name">School name : </label>
                        <input type="text" name="sc-name" id="sc-name" class="form-control">
                      </div>
                      <div class="form-group col-md-2 mb-0">
                        <label for="scstart">Start Date : </label>
                        <input type="text" name="scstart" id="scstart" class="form-control" placeholder="YYYY-MM-DD"
                                                       pattern="/[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])$/">
                      </div>
                      <div class="form-group col-md-2 mb-0">
                        <label for="scend">End Date : </label>
                        <input type="text" name="scend" id="scend" class="form-control" placeholder="YYYY-MM-DD"
                                                       pattern="/[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])$/">
                      </div>
                    </div>
                    <div class="form-group m-10">
                      <label for="qualification">Other qualification : </label>
                      <textarea class="form-control" rows="5" name="qualification" id="qualification"></textarea>
                    </div>
                  </form>
                </div>
                <div class="tab-pane" id="tab4">
                  <form name="step4" role="form" novalidate>
                    <div class="row">
                      <div class="form-group col-md-6 mb-0">
                        <label for="email">Email : </label>
                        <input type="email" name="email" id="email" class="form-control"
                                                       required>
                      </div>
                      <div class="form-group col-md-6 mb-0">
                        <label for="phone">Phone : </label>
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="(XXX) XXXX XXX"
                                                       pattern="^[\d\+\-\.\(\)\/\s]*$">
                      </div>
                    </div>
                    <div class="form-group mr-10">
                      <label for="web">Website : </label>
                      <input type="url" name="web" id="web" class="form-control" placeholder="http://">
                    </div>
                  </form>
                </div>
                <div class="tab-pane" id="tab5">
                  <p class="well">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                  <form name="step5" role="form" novalidate>
                    <div class="checkbox">
                      <label class="checkbox checkbox-custom">
                        <input type="checkbox" name="agree" id="agree"
                                                       required>
                        <i></i> I agree to the <a href class="text-info">Terms of Service</a> </label>
                    </div>
                    <div class="checkbox">
                      <label class="checkbox checkbox-custom">
                        <input type="checkbox" name="newsletter" id="newsletter">
                        <i></i> Receive newsletter </label>
                    </div>
                  </form>
                </div>
                <ul class="pager wizard">
                  <li class="previous">
                    <button class="btn btn-default">Previous</button>
                  </li>
                  <li class="next">
                    <button class="btn btn-default">Next</button>
                  </li>
                  <li class="next finish" style="display:none;">
                    <button class="btn btn-success">Finish</button>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

    </div>


@endsection