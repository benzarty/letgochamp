<div class="content-wrapper">
	<div class="content-header sty-two">
		<ol class="breadcrumb">

		</ol>
	</div>
	<div class="content">
		<div class="card">
			<div class="card-body">
				<h4 class="text-black m-b-3">Step wizard</h4>
				<div id="demo">
					<div class="step-app">
						<ul class="step-steps">
							<li><a href="#step1"><span class="number">1</span> Personal Info</a></li>
							<li><a href="#step2"><span class="number">2</span> Job Status</a></li>
							<li><a href="#step3"><span class="number">3</span> Interview</a></li>
						</ul>
						<div class="step-content">
							<div class="step-tab-panel" id="step1">
								<form>
									<div class="row m-t-2">
										<div class="col-md-6">
											<div class="form-group">
												<label for="firstName1">First Name:</label>
												<input class="form-control" type="text">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="lastName1">Last Name:</label>
												<input class="form-control" type="text">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="firstName1">Email Address:</label>
												<input class="form-control" type="text">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="lastName1">Phone Number:</label>
												<input class="form-control" type="text">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="location1">Select City :</label>
												<select class="custom-select form-control" id="location1" name="location">
													<option value="">Select City</option>
													<option value="Amsterdam">India</option>
													<option value="Berlin">USA</option>
													<option value="Frankfurt">Dubai</option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="date1">Date of Birth :</label>
												<input class="form-control" id="date1" type="date">
											</div>
										</div>
									</div>
								</form>
							</div>
							<div class="step-tab-panel" id="step2">
								<div class="row m-t-2">
									<div class="col-md-6">
										<div class="form-group">
											<label for="jobTitle1">Job Title :</label>
											<input class="form-control" id="jobTitle1" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="videoUrl1">Company Name :</label>
											<input class="form-control" id="videoUrl1" type="text">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="shortDescription1">Job Description :</label>
											<textarea name="shortDescription" id="shortDescription1" rows="6" class="form-control"></textarea>
										</div>
									</div>
								</div>
							</div>
							<div class="step-tab-panel" id="step3">
								<div class="row m-t-2">
									<div class="col-md-6">
										<div class="form-group">
											<label for="int1">Interview For :</label>
											<input class="form-control" id="int1" type="text">
										</div>
										<div class="form-group">
											<label for="intType1">Interview Type :</label>
											<select class="custom-select form-control" id="intType1" data-placeholder="Type to search cities" name="intType1">
												<option value="Banquet">Normal</option>
												<option value="Fund Raiser">Difficult</option>
												<option value="Dinner Party">Hard</option>
											</select>
										</div>
										<div class="form-group">
											<label for="Location1">Location :</label>
											<select class="custom-select form-control" id="Location1" name="location">
												<option value="">Select City</option>
												<option value="India">India</option>
												<option value="USA">USA</option>
												<option value="Dubai">Dubai</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="jobTitle2">Interview Date :</label>
											<input class="form-control" id="jobTitle2" type="date">
										</div>
										<div class="form-group">
											<label>Requirements :</label>
											<div class="c-inputs-stacked">
												<label class="inline custom-control custom-checkbox block">
													<input class="custom-control-input" type="checkbox">
													<span class="custom-control-indicator"></span> <span class="custom-control-description ml-0">Employee</span> </label>
												<label class="inline custom-control custom-checkbox block">
													<input class="custom-control-input" type="checkbox">
													<span class="custom-control-indicator"></span> <span class="custom-control-description ml-0">Contract</span> </label>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
						<div class="step-footer">
							<button data-direction="prev" class="btn btn-light">Previous</button>
							<button data-direction="next" class="btn btn-primary">Next</button>
							<button data-direction="finish" class="btn btn-primary">Submit</button>
						</div>
					</div>
				</div></div></div></div></div>
