@extends('layout')

@section('content')

<div class="ibm-fluid">
    <div class="ibm-col-12-12">
		<div class="ibm-card">
            <div class="ibm-card__content">
                <h3 class="ibm-bold ibm-h4 ibm-textcolor-blue-40">Request</h3>
                
                <div class="ibm-rule ibm-alternate ibm-blue-40"><hr></div>
                
                <h3 class="ibm-bold ibm-h4 ibm-textcolor-red-40">New Features</h3>
                <ul>
                    <li><b>Usability: Since now it is possible to check all Approvers Persons names before submitting request.</b></li>
                    <li>Usability: Accounts are now in true alphabetical order, regardless of case.</li>
                    <li>Usability: To find your account, begin typing it's name in the select box and the list of options will instantly be filtered to just that match the characters you've typed</li>
                    <li>Performance: Page loads a lot faster</li>
                    <li>If you experience any technical problems using the tool, please contact <a href='mailto:piotr.tajanowicz@ibm.com'>Piotr Tajanowicz</a></li>
                </ul>
                <h3 class="ibm-bold ibm-h4 ibm-textcolor-red-40">Account Rationalisation</h3>
                <p>November 2016. We have reduced the available accounts, removing many entries for accounts we no longer support, renaming others to reflect changes to the contract. If you cannot find an account you need, contact OAT Support <a href='mailto:ukiops@uk.ibm.com'>ukiops@uk.ibm.com</a> with the details
                </p>
                
                <div class="ibm-rule ibm-alternate ibm-blue-40"><hr></div>
                
                <h3 class="ibm-bold ibm-h4 ibm-textcolor-blue-40">Request for Overtime to be worked</h3>
                <form id="create" class="ibm-column-form" method="post" action="">
                    <div class="ibm-fluid">
                        <div class="ibm-col-12-12">
                        	<p>
                                <label class="ibm-column-field-label ibm-bold" for="__REPLACE_ME_1__">Name of individual working overtime</label>
                                <span>
                                    <input type="text" value="" size="100" id="__REPLACE_ME_1__" name="first_name">
                                </span>
                                <span class="ibm-bold">If changing this entry please allow time for Bluepages Auto Completion to work, it will overwrite this text and re-populate the two fields below.</span>
                            </p>
                        </div>
                    </div>
                    <div class="ibm-fluid">
                        <div class="ibm-col-12-12">
                            <p>
                                <label class="ibm-column-field-label ibm-bold" for="__REPLACE_ME_1__">Title <span class="ibm-required"></span></label>
                                <span>
                                    <input type="text" value="" size="100" id="__REPLACE_ME_1__" name="title">
                                </span>
                            </p>
                        </div>
                	</div>
                	<div class="ibm-fluid">
                        <div class="ibm-col-12-12">
                            <p>
                                <label class="ibm-column-field-label ibm-bold" for="__REPLACE_ME_1__">Details of overtime activity <span class="ibm-required"></span></label>
                                <span>
                                    <textarea type="text" value="" rows="10" cols="100" id="__REPLACE_ME_1__" name="title"></textarea>
                                </span>
                            </p>
                        </div>
                	</div>
                	<div class="ibm-rule ibm-alternate ibm-blue-40"><hr></div>
                	<div class="ibm-fluid">
                        <div class="ibm-col-12-6">
                            <p>
                                <label class="ibm-column-field-label ibm-bold" for="__REPLACE_ME_1__">Service Line of person working overtime <span class="ibm-required"></span></label>
                                <span>
                                <select id="__REPLACE_ME__011__">
                                    <option value="" selected>Select one</option>
                                    <option value="A">Option A</option>
                                    <option value="B">Option B</option>
                                    <option value="C">Option C</option>
                                    <option value="D">Option D</option>
                                    <option value="D">Option E</option>
                                    <option value="D">Option F</option>
                                </select>
                                </span>
                            </p>
                            <p>
                                <label class="ibm-column-field-label ibm-bold" for="__REPLACE_ME_1__">Account <span class="ibm-required"></span></label>
                                <span>
                                	<select id="__REPLACE_ME__011__">
                                        <option value="" selected>Select one</option>
                                        <option value="A">Option A</option>
                                        <option value="B">Option B</option>
                                        <option value="C">Option C</option>
                                        <option value="D">Option D</option>
                                        <option value="D">Option E</option>
                                        <option value="D">Option F</option>
                                    </select>
                                </span>
                            </p>
                            <p>
                                <label class="ibm-column-field-label ibm-bold" for="__REPLACE_ME_1__">IBM country of employment <span class="ibm-required"></span></label>
                                <span>
                                	<select id="__REPLACE_ME__011__">
                                    <option value="" selected>Select one</option>
                                    <option value="A">Option A</option>
                                    <option value="B">Option B</option>
                                    <option value="C">Option C</option>
                                    <option value="D">Option D</option>
                                    <option value="D">Option E</option>
                                    <option value="D">Option F</option>
                                </select>
                                </span>
                            </p>
                            <p>
                                <label class="ibm-column-field-label ibm-bold" for="__REPLACE_ME_1__">Is worker an Import to SO Delivery? <span class="ibm-required"></span></label>
                                <span>
                                	<select id="__REPLACE_ME__011__">
                                    <option value="" selected>Select one</option>
                                    <option value="A">Option A</option>
                                    <option value="B">Option B</option>
                                    <option value="C">Option C</option>
                                    <option value="D">Option D</option>
                                    <option value="D">Option E</option>
                                    <option value="D">Option F</option>
                                </select>
                                </span>
                            </p>
                   		</div>
                        <div class="ibm-col-12-6">
	                        <p>
                                <label class="ibm-column-field-label ibm-bold" for="__REPLACE_ME_1__">Claim Code/ Account Id <span class="ibm-required"></span></label>
                                <span>
                                    <input type="text" value="" size="40" id="__REPLACE_ME_1__" name="title">
                                </span>
                            </p>
                            <p>
                                <label class="ibm-column-field-label ibm-bold" for="__REPLACE_ME_1__">Hours required <span class="ibm-required"></span></label>
                                <span>
                                    <input type="text" value="" size="40" id="__REPLACE_ME_1__" name="title">
                                </span>
                            </p>
                            <p>
                                <label class="ibm-column-field-label ibm-bold" for="__REPLACE_ME_1__">Recoverable <span class="ibm-required"></span></label>
                                <span>
                                    <input type="text" value="" size="40" id="__REPLACE_ME_1__" name="title">
                                </span>
                            </p>
                            <p>
                                <label class="ibm-column-field-label ibm-bold" for="__REPLACE_ME_1__">Nature <span class="ibm-required"></span></label>
                                <span>
                                    <input type="text" value="" size="40" id="__REPLACE_ME_1__" name="title">
                                </span>
                            </p>
                            <p>
                                <label class="ibm-column-field-label ibm-bold" for="__REPLACE_ME_1__">Weekending <span class="ibm-required"></span></label>
                                <span>
                                    <input type="text" value="" size="40" id="__REPLACE_ME_1__" name="title">
                                </span>
                            </p>
                        </div>
                   </div>
                   
                   <div class="ibm-rule ibm-alternate ibm-blue-40"><hr></div>
                   
                   <div class="ibm-fluid">
                       <div class="ibm-col-12-6">
                            <p>
                                <label class="ibm-column-field-label ibm-bold" for="__REPLACE_ME_1__">1st Level Approver</label>
                                <span>
                                    <input type="text" value="Auto-populated upon submission." size="40" id="__REPLACE_ME_1__" name="title" disabled name="disabled">
                                </span>
                            </p>
                            <p>
                                <label class="ibm-column-field-label ibm-bold" for="__REPLACE_ME_1__">2nd Level Approver</label>
                                <span>
                                    <input type="text" value="Auto-populated upon submission." size="40" id="__REPLACE_ME_1__" name="title" disabled name="disabled">
                                </span>
                            </p>
                            <p>
                                <label class="ibm-column-field-label ibm-bold" for="__REPLACE_ME_1__">3rd Level Approver</label>
                                <span>
                                    <input type="text" value="Auto-populated upon submission." size="40" id="__REPLACE_ME_1__" name="title" disabled name="disabled">
                                </span>
                            </p>
                       </div>
                       <div class="ibm-col-12-6">
                       		<p>
                                <label class="ibm-column-field-label ibm-bold" for="__REPLACE_ME_1__">Predicted 1st Level Approver</label>
                                <span id="APPROVER_FIRST_CHECK">
                                Use Check Approvers option to discover who is suitable 1st Level Approver
                            	</span>
                            <p>
                                <label class="ibm-column-field-label ibm-bold" for="__REPLACE_ME_1__">Predicted 2nd Level Approver</label>
                                <span id="APPROVER_SECOND_CHECK">
                                Use Check Approvers option to discover who is suitable 2nd Level Approver
                            	</span>
                            </p>
                            <p>
                                <label class="ibm-column-field-label ibm-bold" for="__REPLACE_ME_1__">Predicted 3rd Level Approver</label>
                                <span id="APPROVER_THIRD_CHECK">
	                                Use Check Approvers option to discover who is suitable 3rd Level Approver
                                </span>
                            </p>
                       </div>
                   </div>
                   
                   <div class="ibm-rule ibm-alternate ibm-blue-40"><hr></div>
                   
                   <p><b>Click Submit to Create the Request.</b></p>
                   <p class="ibm-btn-row ibm-button-link">
                       <button type="button" class="ibm-btn-pri ibm-btn-blue-50">Submit</button>
                       <button type="button" class="ibm-btn-sec ibm-btn-blue-50">Reset</button>
                       <button type="button" class="ibm-btn-pri ibm-btn-blue-50">Check Approvers</button>
                   </p>
                   
                </form>
                
				<h3 class="ibm-h3"><a href='https://w3-connections.ibm.com/wikis/home?lang=en-us#!/wiki/ITDBO/page/OVERTIME%20APPROVAL%20TOOL%20%28OAT%29%20Guidance' target='_blank' >OAT Tool Guidance</a> for List of Approvers (opens in a new window)</h3>
                
			</div>
        </div>
	</div>
</div>

@endsection