<div class="edituser">
    <div class="col-lg-9 form-col">
        <div>
            <form action="/admin" id="applicant-profile-form" class="form" role="form" method="POST">
                <input type="hidden" name="csrf_token" t-att-value="request.csrf_token()">

                <div class="form-part personal-information showForm" id="personal-information">
                    <h4 class="d-flex align-items-center border-bottom pb-3 mb-4 form-title" id="personal-information">
                        <i class="form-icon fa fa-user" aria-hidden="true"></i>
                        <span class="ml-3">Personal Information</span>
                    </h4>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputfirstname4">Username</label>
                            <input type="text" class="required form-control" name="username" id="inputfirstname4" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputlastname4">Email</label>
                            <input type="email" class="required form-control" name="email" id="inputlastname4" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputfathername4">Password</label>
                            <input type="password" class="required form-control" name="password" id="inputfathername4">
                        </div>


                        <div class="box">
                            <input name="access" type="checkbox" class="checkbox-input" id="checkbox">
                            <label for="checkbox"> Admin
                                <span class="checkbox">
                            </span>
                            </label>
                        </div>


                    </div>




                </div>
                <button type="submit" class="btn btn-primary me-3">Envoyer</button>






            </form>
        </div>
    </div>
</div>