@extends('template.main-second')
@section('title')
@lang('titles.show-perfil')
@stop
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1></h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div id="rwb" class="mT20 lbox p30">

            <div align="center">
                <span id="unique" style="display:none;" class="warningAlert"></span>
            </div>


            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                    <td id="heading_icon" class="Leads-titleIcon"></td>
                    <td id="heading_title" class="title hline" height="30" style="padding-left:10px">Create Lead</td>

                    <td align="right" id="heading_help" class="hline">
                        <a id="context-helplink" class="toplink" href="javascript:;" data-helpurl="http://www.zoho.com/crm/help/leads/create-leads.html" onclick="Crm.openHelpUrl(event)">
                            Help
                        </a>
                    </td>

                </tr>

                </tbody>
            </table>







            <input type="hidden" id="layoutDetails" value="1978268000000091055">



            <table width="95%">
                <tbody>
                <tr>
                    <td align="center">

                        <div class="bodyText" style="float:right">
                            <a target="_blank" class="smalledit" href="/crm/ShowSetup.do?module=Leads&amp;tab=customize&amp;subTab=modules&amp;innerTab=layouts">
                                Edit Page Layout
                            </a>
                        </div>



                        <input data-params="" onclick="crmTemplate.handleButtonClick(event,this)" data-module="Leads" type="button" id="saveLeadsBtn" data-zcqa="saveLeadsBtn" name="save" class="newgraybtn" value="Save">

                        <input data-params="" onclick="crmTemplate.handleButtonClick(event,this)" data-module="Leads" type="button" id="saveAndNewLeadsBtn" data-zcqa="saveAndNewLeadsBtn" name="saveAndNew" class="newgraybtn" value="Save &amp; New">

                        <input data-params="" onclick="crmTemplate.handleButtonClick(event,this)" data-module="Leads" type="button" id="cancelLeadsBtn" data-zcqa="cancelLeadsBtn" name="cancel" class="newgraybtn" value="Cancel" data-cid="backOneLevel">

                    </td>
                </tr>
                </tbody>
            </table>






            <div id="preHTMLContainer_Leads">
                <div id="secDiv_Lead_Information">


                    <table style="width:95%" cellspacing="0" cellpadding="0" id="secHead_Lead_Information">
                        <tbody>
                        <tr>
                            <td class="secHead">
                                Lead Information
                            </td>

                        </tr>
                        </tbody>
                    </table>





                    <table style="width:95%" class="secContent" border="0" cellspacing="1" cellpadding="0" id="secContent_Lead_Information">
                        <tbody width="100%">


                        <tr id="Leads_fldRow_"><td width="25%" class="label" id="Crm_Leads_SMOWNERID_label">  Lead Owner</td><td class="element" width="25%"><div name="searchUserLookup" class="selectElementNew1" onclick="Search.showLookup(this.id)" nowrap="nowrap" style="width:100%; min-width:unset; box-sizing: border-box;" id="Crm_Leads_SMOWNERID" title="Ricardo Luis Diez Noria" maxlength="120" data-zcqa="Lead Owner" data-def-mandate="false" data-mandate="false" data-content-type="Lookup" data-uitype="8" data-colname="SMOWNERID" data-name="Lead Owner" data-maxlength="120" data-customfield="false" data-decimal-length="2" data-displaylabel="Lead Owner" data-old-value="" data-label="Lead Owner" data-readonly="false" data-id="1978268000000099003" data-withmultipleoptions="no" data-deactivatedusers="no" data-withemail="yes" data-entityowner="yes"><span id="ownerNameLookupSpan" name="ownerNameLookupSpan" title="Ricardo Luis Diez Noria">Ricardo Luis Diez Noria</span><a href="javascript:;"></a></div></td><td width="25%" class="label mandatory" id="Crm_Leads_COMPANY_label">  *  Company</td><td class="element" width="25%"><input type="text" class="textField" style="width:100%" id="Crm_Leads_COMPANY" maxlength="100" data-zcqa="Company" data-def-mandate="true" data-mandate="true" data-content-type="Text" data-uitype="1" data-colname="COMPANY" data-name="Company" data-maxlength="100" data-customfield="false" data-decimal-length="2" data-displaylabel="Company" data-old-value="" data-label="Company" data-readonly="false" value=""></td></tr><tr id="Leads_fldRow_"><td width="25%" class="label" id="Crm_Leads_FIRSTNAME_label">  First Name</td><td class="element" width="25%"><select data-module="Leads" data-zcqa="First Name" data-def-mandate="false" data-mandate="false" data-content-type="salutation" data-uitype="27" data-colname="SALUTATION" data-name="saltName" data-maxlength="40" data-customfield="false" data-decimal-length="2" data-displaylabel="First Name" data-old-value="" data-label="First Name" data-readonly="false" data-values="[&quot;-None-&quot;,&quot;Mr.&quot;,&quot;Mrs.&quot;,&quot;Ms.&quot;,&quot;Dr.&quot;,&quot;Prof.&quot;]" id="Crm_Leads_FIRSTNAME_SALUTATION" style="width:28%" class="select"><option value="">-None-</option><option value="Mr.">Mr.</option><option value="Mrs.">Mrs.</option><option value="Ms.">Ms.</option><option value="Dr.">Dr.</option><option value="Prof.">Prof.</option></select><input type="text" class="textField" style="width:68%" id="Crm_Leads_FIRSTNAME" maxlength="40" data-zcqa="First Name" data-def-mandate="false" data-mandate="false" data-content-type="Text" data-uitype="27" data-colname="FIRSTNAME" data-name="First Name" data-maxlength="40" data-customfield="false" data-decimal-length="2" data-displaylabel="First Name" data-old-value="-None-" data-label="First Name" data-readonly="false" data-values="[&quot;-None-&quot;,&quot;Mr.&quot;,&quot;Mrs.&quot;,&quot;Ms.&quot;,&quot;Dr.&quot;,&quot;Prof.&quot;]" value=""></td><td width="25%" class="label mandatory" id="Crm_Leads_LASTNAME_label">  *  Last Name</td><td class="element" width="25%"><input type="text" class="textField" style="width:100%" id="Crm_Leads_LASTNAME" maxlength="80" data-zcqa="Last Name" data-def-mandate="true" data-mandate="true" data-content-type="Text" data-uitype="127" data-colname="LASTNAME" data-name="Last Name" data-maxlength="80" data-customfield="false" data-decimal-length="2" data-displaylabel="Last Name" data-old-value="" data-label="Last Name" data-readonly="false" value=""></td></tr><tr id="Leads_fldRow_"><td width="25%" class="label" id="Crm_Leads_DESIGNATION_label">  Title</td><td class="element" width="25%"><input type="text" class="textField" style="width:100%" id="Crm_Leads_DESIGNATION" maxlength="100" data-zcqa="Designation" data-def-mandate="false" data-mandate="false" data-content-type="Text" data-uitype="1" data-colname="DESIGNATION" data-name="Designation" data-maxlength="100" data-customfield="false" data-decimal-length="2" data-displaylabel="Title" data-old-value="" data-label="Designation" data-readonly="false" value=""></td><td width="25%" class="label" id="Crm_Leads_EMAIL_label">  Email</td><td class="element" width="25%"><input type="text" class="textField" style="width:100%" id="Crm_Leads_EMAIL" maxlength="100" data-zcqa="Email" data-def-mandate="false" data-mandate="false" data-content-type="Email" data-uitype="25" data-colname="EMAIL" data-name="Email" data-maxlength="100" data-customfield="false" data-decimal-length="2" data-displaylabel="Email" data-old-value="" data-label="Email" data-readonly="false" value=""></td></tr><tr id="Leads_fldRow_"><td width="25%" class="label" id="Crm_Leads_PHONE_label">  Phone</td><td class="element" width="25%"><input type="text" class="textField" style="width:100%" id="Crm_Leads_PHONE" maxlength="30" data-zcqa="Phone" data-def-mandate="false" data-mandate="false" data-content-type="Phone" data-uitype="33" data-colname="PHONE" data-name="Phone" data-maxlength="30" data-customfield="false" data-decimal-length="2" data-displaylabel="Phone" data-old-value="" data-label="Phone" data-readonly="false" value=""></td><td width="25%" class="label" id="Crm_Leads_FAX_label">  Fax</td><td class="element" width="25%"><input type="text" style="width:100%" class="textField" id="Crm_Leads_FAX" maxlength="30" data-zcqa="Fax" data-def-mandate="false" data-mandate="false" data-content-type="Text" data-uitype="35" data-colname="FAX" data-name="Fax" data-maxlength="30" data-customfield="false" data-decimal-length="2" data-displaylabel="Fax" data-old-value="" data-label="Fax" data-readonly="false" value=""></td></tr><tr id="Leads_fldRow_"><td width="25%" class="label" id="Crm_Leads_MOBILE_label">  Mobile</td><td class="element" width="25%"><input type="text" class="textField" style="width:100%" id="Crm_Leads_MOBILE" maxlength="30" data-zcqa="Mobile" data-def-mandate="false" data-mandate="false" data-content-type="Phone" data-uitype="33" data-colname="MOBILE" data-name="Mobile" data-maxlength="30" data-customfield="false" data-decimal-length="2" data-displaylabel="Mobile" data-old-value="" data-label="Mobile" data-readonly="false" value=""></td><td width="25%" class="label" id="Crm_Leads_WEBSITE_label">  Website</td><td class="element" width="25%"><input type="text" class="textField" style="width:100%" id="Crm_Leads_WEBSITE" maxlength="255" data-zcqa="Website" data-def-mandate="false" data-mandate="false" data-content-type="Website" data-uitype="21" data-colname="WEBSITE" data-name="Website" data-maxlength="255" data-customfield="false" data-decimal-length="2" data-displaylabel="Website" data-old-value="" data-label="Website" data-readonly="false" value=""></td></tr><tr id="Leads_fldRow_"><td width="25%" class="label" id="Crm_Leads_LEADSOURCE_label">  Lead Source</td><td class="element" width="25%"><select data-module="Leads" class="select" style="width:95%" id="Crm_Leads_LEADSOURCE" maxlength="120" data-zcqa="Lead Source" data-def-mandate="false" data-mandate="false" data-content-type="Pick List" data-uitype="2" data-colname="LEADSOURCE" data-name="Lead Source" data-maxlength="120" data-customfield="false" data-decimal-length="2" data-displaylabel="Lead Source" data-old-value="-None-" data-label="Lead Source" data-readonly="false" data-values="[&quot;-None-&quot;,&quot;Advertisement&quot;,&quot;Cold Call&quot;,&quot;Employee Referral&quot;,&quot;External Referral&quot;,&quot;OnlineStore&quot;,&quot;Partner&quot;,&quot;Public Relations&quot;,&quot;Sales Mail Alias&quot;,&quot;Seminar Partner&quot;,&quot;Seminar-Internal&quot;,&quot;Trade Show&quot;,&quot;Web Download&quot;,&quot;Web Research&quot;,&quot;Chat&quot;]"><option value="">-None-</option><option value="Advertisement">Advertisement</option><option value="Cold Call">Cold Call</option><option value="Employee Referral">Employee Referral</option><option value="External Referral">External Referral</option><option value="OnlineStore">OnlineStore</option><option value="Partner">Partner</option><option value="Public Relations">Public Relations</option><option value="Sales Mail Alias">Sales Mail Alias</option><option value="Seminar Partner">Seminar Partner</option><option value="Seminar-Internal">Seminar-Internal</option><option value="Trade Show">Trade Show</option><option value="Web Download">Web Download</option><option value="Web Research">Web Research</option><option value="Chat">Chat</option></select></td><td width="25%" class="label" id="Crm_Leads_STATUS_label">  Lead Status</td><td class="element" width="25%"><select data-module="Leads" class="select" style="width:95%" id="Crm_Leads_STATUS" maxlength="120" data-zcqa="Lead Status" data-def-mandate="false" data-mandate="false" data-content-type="Pick List" data-uitype="2" data-colname="STATUS" data-name="Lead Status" data-maxlength="120" data-customfield="false" data-decimal-length="2" data-displaylabel="Lead Status" data-old-value="-None-" data-label="Lead Status" data-readonly="false" data-values="[&quot;-None-&quot;,&quot;Attempted to Contact&quot;,&quot;Contact in Future&quot;,&quot;Contacted&quot;,&quot;Junk Lead&quot;,&quot;Lost Lead&quot;,&quot;Not Contacted&quot;,&quot;Pre Qualified&quot;]"><option value="">-None-</option><option value="Attempted to Contact">Attempted to Contact</option><option value="Contact in Future">Contact in Future</option><option value="Contacted">Contacted</option><option value="Junk Lead">Junk Lead</option><option value="Lost Lead">Lost Lead</option><option value="Not Contacted">Not Contacted</option><option value="Pre Qualified">Pre Qualified</option></select></td></tr><tr id="Leads_fldRow_"><td width="25%" class="label" id="Crm_Leads_INDUSTRY_label">  Industry</td><td class="element" width="25%"><select data-module="Leads" class="select" style="width:95%" id="Crm_Leads_INDUSTRY" maxlength="120" data-zcqa="Industry" data-def-mandate="false" data-mandate="false" data-content-type="Pick List" data-uitype="2" data-colname="INDUSTRY" data-name="Industry" data-maxlength="120" data-customfield="false" data-decimal-length="2" data-displaylabel="Industry" data-old-value="-None-" data-label="Industry" data-readonly="false" data-values="[&quot;-None-&quot;,&quot;ASP&quot;,&quot;Data/Telecom OEM&quot;,&quot;ERP&quot;,&quot;Government/Military&quot;,&quot;Large Enterprise&quot;,&quot;ManagementISV&quot;,&quot;MSP (Management Service Provider)&quot;,&quot;Network Equipment (Enterprise)&quot;,&quot;Non-management ISV&quot;,&quot;Optical Networking&quot;,&quot;Service Provider&quot;,&quot;Small/Medium Enterprise&quot;,&quot;Storage Equipment&quot;,&quot;Storage Service Provider&quot;,&quot;Systems Integrator&quot;,&quot;Wireless Industry&quot;]"><option value="">-None-</option><option value="ASP">ASP</option><option value="Data/Telecom OEM">Data/Telecom OEM</option><option value="ERP">ERP</option><option value="Government/Military">Government/Military</option><option value="Large Enterprise">Large Enterprise</option><option value="ManagementISV">ManagementISV</option><option value="MSP (Management Service Provider)">MSP (Management Service Provider)</option><option value="Network Equipment (Enterprise)">Network Equipment (Enterprise)</option><option value="Non-management ISV">Non-management ISV</option><option value="Optical Networking">Optical Networking</option><option value="Service Provider">Service Provider</option><option value="Small/Medium Enterprise">Small/Medium Enterprise</option><option value="Storage Equipment">Storage Equipment</option><option value="Storage Service Provider">Storage Service Provider</option><option value="Systems Integrator">Systems Integrator</option><option value="Wireless Industry">Wireless Industry</option></select></td><td width="25%" class="label" id="Crm_Leads_EMPCT_label">  No of Employees</td><td class="element" width="25%"><input type="text" class="textField" style="width:100%" id="Crm_Leads_EMPCT" maxlength="9" data-zcqa="No of Employees" data-def-mandate="false" data-mandate="false" data-content-type="Integer" data-uitype="32" data-colname="EMPCT" data-name="No of Employees" data-maxlength="9" data-customfield="false" data-decimal-length="2" data-displaylabel="No of Employees" data-old-value="" data-label="No of Employees" data-readonly="false" value=""></td></tr><tr id="Leads_fldRow_"><td width="25%" class="label" id="Crm_Leads_ANNUALREVENUE_label">  Annual Revenue</td><td class="element" width="25%"><span id="currencySymbol_Crm_Leads_ANNUALREVENUE">$&nbsp;</span><input type="text" class="textField" style="width:77%" id="Crm_Leads_ANNUALREVENUE" maxlength="16" data-zcqa="Annual Revenue" data-def-mandate="false" data-mandate="false" data-content-type="Currency" data-uitype="36" data-colname="ANNUALREVENUE" data-name="Annual Revenue" data-maxlength="16" data-customfield="false" data-decimal-length="2" data-displaylabel="Annual Revenue" data-old-value="" data-label="Annual Revenue" data-readonly="false"><img src="//img.zohostatic.com/crm/v898/images//spacer.gif" width="17" height="19" title="Calculator" align="absmiddle" class="calcu" data-label="Crm_Leads_ANNUALREVENUE" data-cid="showCalculator" data-params="Crm_Leads_ANNUALREVENUE"></td><td width="25%" class="label" id="Crm_Leads_RATING_label">  Rating</td><td class="element" width="25%"><select data-module="Leads" class="select" style="width:95%" id="Crm_Leads_RATING" maxlength="120" data-zcqa="Rating" data-def-mandate="false" data-mandate="false" data-content-type="Pick List" data-uitype="2" data-colname="RATING" data-name="Rating" data-maxlength="120" data-customfield="false" data-decimal-length="2" data-displaylabel="Rating" data-old-value="-None-" data-label="Rating" data-readonly="false" data-values="[&quot;-None-&quot;,&quot;Acquired&quot;,&quot;Active&quot;,&quot;Market Failed&quot;,&quot;Project Cancelled&quot;,&quot;ShutDown&quot;]"><option value="">-None-</option><option value="Acquired">Acquired</option><option value="Active">Active</option><option value="Market Failed">Market Failed</option><option value="Project Cancelled">Project Cancelled</option><option value="ShutDown">ShutDown</option></select></td></tr><tr id="Leads_fldRow_"><td width="25%" class="label" id="Crm_Leads_EMAILOPTOUT_label">  Email Opt Out</td><td class="element" width="25%"><input type="checkbox" onchange="crmTemplate.modifyCheckBox(event,this,&quot;Leads&quot;)" style="[object Object]" id="Crm_Leads_EMAILOPTOUT" maxlength="50" data-zcqa="Email Opt Out" data-def-mandate="false" data-mandate="false" data-content-type="Boolean" data-uitype="301" data-colname="EMAILOPTOUT" data-name="Email Opt Out" data-maxlength="50" data-customfield="false" data-decimal-length="2" data-displaylabel="Email Opt Out" data-old-value="false" data-label="Email Opt Out" data-readonly="false"></td><td width="25%" class="label" id="Crm_Leads_SKYPEIDENTITY_label">  Skype ID</td><td class="element" width="25%"><input type="text" style="width:100%" class="textField" id="Crm_Leads_SKYPEIDENTITY" maxlength="50" data-zcqa="Skype ID" data-def-mandate="false" data-mandate="false" data-content-type="Text" data-uitype="37" data-colname="SKYPEIDENTITY" data-name="Skype ID" data-maxlength="50" data-customfield="false" data-decimal-length="2" data-displaylabel="Skype ID" data-old-value="" data-label="Skype ID" data-readonly="false" value=""></td></tr><tr id="Leads_fldRow_"><td width="25%" class="label" id="Crm_Leads_undefined_label">  </td><td class="element" width="25%"></td><td width="25%" class="label" id="Crm_Leads_ADDN_EMAIL_label">  Secondary Email</td><td class="element" width="25%"><input type="text" class="textField" style="width:100%" id="Crm_Leads_ADDN_EMAIL" maxlength="100" data-zcqa="Secondary Email" data-def-mandate="false" data-mandate="false" data-content-type="Email" data-uitype="25" data-colname="ADDN_EMAIL" data-name="Secondary Email" data-maxlength="100" data-customfield="false" data-decimal-length="2" data-displaylabel="Secondary Email" data-old-value="" data-label="Secondary Email" data-readonly="false" value=""></td></tr><tr id="Leads_fldRow_"><td width="25%" class="label" id="Crm_Leads_undefined_label">  </td><td class="element" width="25%"></td><td width="25%" class="label" id="Crm_Leads_TWITTER_label">  Twitter</td><td class="element" width="25%"><div style="position:relative;" disabled="true"><span style="opacity:0.6;position:absolute;bottom:-21px;left:4px;font-size:15px;">@</span></div><input type="text" style="width:93%;padding-left:20px" class="textField" id="Crm_Leads_TWITTER" maxlength="50" data-zcqa="Twitter" data-def-mandate="false" data-mandate="false" data-content-type="Text" data-uitype="22" data-colname="TWITTER" data-name="Twitter" data-maxlength="50" data-customfield="false" data-decimal-length="2" data-displaylabel="Twitter" data-old-value="" data-label="Twitter" data-readonly="false" value=""></td></tr></tbody>
                    </table>


                </div><div id="secDiv_Address_Information">


                    <table style="width:95%" cellspacing="0" cellpadding="0" id="secHead_Address_Information">
                        <tbody>
                        <tr>
                            <td class="secHead">
                                Address Information
                            </td>

                        </tr>
                        </tbody>
                    </table>





                    <table style="width:95%" class="secContent" border="0" cellspacing="1" cellpadding="0" id="secContent_Address_Information">
                        <tbody width="100%">


                        <tr id="Leads_fldRow_"><td width="25%" class="label" id="Crm_Leads_LANE_label">  Street</td><td class="element" width="25%"><input type="text" class="textField" style="width:100%" id="Crm_Leads_LANE" maxlength="250" data-zcqa="Street" data-def-mandate="false" data-mandate="false" data-content-type="Text" data-uitype="1" data-colname="LANE" data-name="Street" data-maxlength="250" data-customfield="false" data-decimal-length="2" data-displaylabel="Street" data-old-value="" data-label="Street" data-readonly="false" value=""></td><td width="25%" class="label" id="Crm_Leads_CITY_label">  City</td><td class="element" width="25%"><input type="text" class="textField" style="width:100%" id="Crm_Leads_CITY" maxlength="30" data-zcqa="City" data-def-mandate="false" data-mandate="false" data-content-type="Text" data-uitype="1" data-colname="CITY" data-name="City" data-maxlength="30" data-customfield="false" data-decimal-length="2" data-displaylabel="City" data-old-value="" data-label="City" data-readonly="false" value=""></td></tr><tr id="Leads_fldRow_"><td width="25%" class="label" id="Crm_Leads_STATE_label">  State</td><td class="element" width="25%"><input type="text" class="textField" style="width:100%" id="Crm_Leads_STATE" maxlength="30" data-zcqa="State" data-def-mandate="false" data-mandate="false" data-content-type="Text" data-uitype="1" data-colname="STATE" data-name="State" data-maxlength="30" data-customfield="false" data-decimal-length="2" data-displaylabel="State" data-old-value="" data-label="State" data-readonly="false" value=""></td><td width="25%" class="label" id="Crm_Leads_CODE_label">  Zip Code</td><td class="element" width="25%"><input type="text" class="textField" style="width:100%" id="Crm_Leads_CODE" maxlength="30" data-zcqa="Zip Code" data-def-mandate="false" data-mandate="false" data-content-type="Text" data-uitype="1" data-colname="CODE" data-name="Zip Code" data-maxlength="30" data-customfield="false" data-decimal-length="2" data-displaylabel="Zip Code" data-old-value="" data-label="Zip Code" data-readonly="false" value=""></td></tr><tr id="Leads_fldRow_"><td width="25%" class="label" id="Crm_Leads_COUNTRY_label">  Country</td><td class="element" width="25%"><input type="text" class="textField" style="width:100%" id="Crm_Leads_COUNTRY" maxlength="30" data-zcqa="Country" data-def-mandate="false" data-mandate="false" data-content-type="Text" data-uitype="1" data-colname="COUNTRY" data-name="Country" data-maxlength="30" data-customfield="false" data-decimal-length="2" data-displaylabel="Country" data-old-value="" data-label="Country" data-readonly="false" value=""></td></tr></tbody>
                    </table>


                </div><div id="secDiv_Description_Information">


                    <table style="width:95%" cellspacing="0" cellpadding="0" id="secHead_Description_Information">
                        <tbody>
                        <tr>
                            <td class="secHead">
                                Description Information
                            </td>

                        </tr>
                        </tbody>
                    </table>





                    <table style="width:95%" class="secContent" border="0" cellspacing="1" cellpadding="0" id="secContent_Description_Information">
                        <tbody width="100%">


                        <tr id="Leads_fldRow_DESCRIPTION"><td width="25%" class="label" id="Crm_Leads_DESCRIPTION_label">  Description</td><td class="element"><textarea class="textField" style="width:98%" id="Crm_Leads_DESCRIPTION" cols="5" rows="5" maxlength="32000" data-zcqa="Description" data-def-mandate="false" data-mandate="false" data-content-type="TextArea" data-uitype="3" data-colname="DESCRIPTION" data-name="Description" data-maxlength="32000" data-customfield="false" data-decimal-length="2" data-displaylabel="Description" data-old-value="" data-label="Description" data-readonly="false"></textarea></td></tr></tbody>
                    </table>


                </div></div>

            <table width="95%">
                <tbody>
                <tr>
                    <td align="center">
                        <div class="bodyText" style="float:right">
                            <a target="_blank" class="smalledit" href="/crm/ShowSetup.do?module=Leads&amp;tab=customize&amp;subTab=modules&amp;innerTab=layouts" style="display:none">
                                Edit Page Layout
                            </a>
                        </div>


                        <input data-params="" onclick="crmTemplate.handleButtonClick(event,this)" data-module="Leads" type="button" id="saveLeadsBtn_Bottom" name="save" class="newgraybtn" value="Save">


                        <input data-params="" onclick="crmTemplate.handleButtonClick(event,this)" data-module="Leads" type="button" id="saveAndNewLeadsBtn_Bottom" name="saveAndNew" class="newgraybtn" value="Save &amp; New">


                        <input data-params="" onclick="crmTemplate.handleButtonClick(event,this)" data-module="Leads" type="button" id="cancelLeadsBtn_Bottom" name="cancel" class="newgraybtn" value="Cancel" data-cid="backOneLevel">


                    </td>
                </tr>
                </tbody>
            </table></div>



    </section><!-- /.content -->
@stop