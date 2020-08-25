@extends('layout')

@section('content')

<div class="ibm-fluid">
    <div class="ibm-col-12-8">
        
        <div class="ibm-card">
            <div class="ibm-card__content">
	            <h3 class="ibm-bold ibm-h4 ibm-textcolor-blue-40">Usage</h3>
                
                <p>This tool is for managing the process for gaining approval for planned paid overtime that is NOT 'Stand-by', 'Shift'</p>
                <p>When 'Call-out' is instigated a retrospective OAT is required.</p>            
                <p>Individuals should raise a request themselves. When you raise the request, you will need to specify the Competency you sit in and the account you work on. This dictates who your approvers will be. Once the request has been created, emails are sent to these Approvers. The requestor will be e.mailed with updates as the approvers respond. Requestors can also track the progress of their requests in the tool.</p>
            </div>
        </div>
        
        <div class="ibm-card">
            <div class="ibm-card__content">
            	<h3 class="ibm-bold ibm-h4 ibm-textcolor-red-40">Important Announcement</h3>
                
                <h4 class="ibm-bold ibm-h5">Q4 2016 World Wide Instruction - all overtime this quarter is prohibited the only exceptions to this is where there will be an impact to profitable in quarter revenue or we have a contractual commitment to provide 24/7 support. Any exceptions have to be approved in the Overtime Approval Tool.</h4>
                <p>The OAT tool was updated with the following changes:</p>
                <p>New levels of approval are now in place</p>
                
                <div class="ibm-fluid">
    				<div class="ibm-col-12-2">
                		<p><b>Approver</b></p>
                		<p><b>1st Approver</b></p>
                		<p><b>2nd Approver</b></p>
                		<p><b>3rd Approver</b></p>
                	</div>
                	<div class="ibm-col-12-4">
                		<p><b>Single Account</b></p>
                		<p><b>Import (excluding Ireland):</b>Auto Approved<br/><b>Onshore Regular/Subcontractor:</b> Blue Pages Manager<br/><b>Offshore CIC:</b>Local Owner</p>
                		<p>UK DPE</p>
                		<p>Andrew Green</p>
                	</div>
                	<div class="ibm-col-12-4">
                		<p><b>Multiple Accounts/Internal Operations</b></p>
                		<p>Auto-approved</p>
                		<p>Blue Pages Manager</p>
                		<p>Andrew Green</p>
                	</div>
                	<div class="ibm-col-12-2">
                		<p><b>CIC Load Balancing</b></p>
                		<p>Auto Approved</p>
                		<p>Auto Approved</p>
                		<p>Auto Approved</p>
                	</div>
                </div>
			</div>
        </div>
        
        <div class="ibm-card">
            <div class="ibm-card__content">
                <h3 class="ibm-bold ibm-h4 ibm-textcolor-blue-40">Known Problems</h3>
                <p>None.</p>
            </div>
        </div>
    
    	<div class="ibm-card">
            <div class="ibm-card__content">
                <h3 class="ibm-bold ibm-h4 ibm-textcolor-blue-40">Support</h3>
                
                <h4 class="ibm-bold ibm-h5">The support team are contactable via their Taskid <a href='mailto:ukiops@uk.ibm.com'>ukiops@uk.ibm.com</a></h4>
                
                <p>Guidance for the tool, including the process, scope and a list of approvers can be found here: <a href='https://w3-connections.ibm.com/wikis/home?lang=en-us#!/wiki/ITDBO/page/OVERTIME%20APPROVAL%20TOOL%20%28OAT%29%20Guidance' target='_blank' >OAT Tool Guidance</a></p>
                
                <h4 class="ibm-bold ibm-h5">In case of emergency:</h4>
                <?php
                // include("php/ldap.php");
                // $allAdmins = bluegroup_employees('OAT_ADMIN');
                
                // echo "<p>People with Admin access to this tool are : ";
                
                // foreach($allAdmins as $uid => $details){
                //  		echo "<a href='mailto:" . $details['mail'] . "'>" . $details['cn'] . "</a>, ";
                
                // }
                ?>
        	</div>
        </div>
        
        <div class="ibm-card">
            <div class="ibm-card__content">
                <h3 class="ibm-bold ibm-h4 ibm-textcolor-blue-40">Names in the Tool</h3>
                <p>When you add names to the request the tool automatically picks up the Notes address as you start to enter a name.  Give the tool time to populate and ensure you select the correct name from the list that appears.  If you do not, your request will not complete correctly.  Note that any person working overtime must be present in Bluepages in order for OAT to handle the request.</p>
            </div>
        </div>
        
        <div class="ibm-card">
            <div class="ibm-card__content">
                <h3 class="ibm-bold ibm-h4 ibm-textcolor-blue-40">Access & Admin</h3>
                <p>No special access is required to raise a request.  Anyone with access to the 9. network and an Intranet Logon id can use the tool. There is a small admin team, who can approve/reject any request. They belong to a specific Bluegroup. For details on this group please refer to the FAQs section in the support Wiki (address above).  Approvers require no special privileges on the system. They must always use the appropriate link in the email they receive, the system will confirm they are the requested approver before it processes their approval/rejection.   One approver can Reject - that does not prevent the other from Approving, however the request will remain in the REJECTED status, until the rejector approves the request.</p>
            </div>
        </div>
    </div>
  	
  	<div class="ibm-col-12-4">
    
    @include('partials.news')
    
	</div>
</div>

@endsection