@extends('template.login-template')

@section('content')
    <div class="register-box-body">

        <div class="panel-body">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <p class="login-box-msg">Registrar nuevo miembro</p>
                <form class="form-horizontal" id="register_form" role="form" method="POST" action="{{route('register')}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="nombrecliente" id="nombrecliente" data-rule-required="true" value="{{ old('nombrecliente') }}" placeholder="Empresa">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <select name="idcatcantidadempleados" id="idcatcantidadempleados" class="form-control"  data-rule-required="true">
                            <option value="">Cantedidad de Empleados</option>
                            <?php
                                foreach ($catcantidadempleados as $ind=>$ce){
                            ?>
                                <option value="<?php echo $ce->idcatcantidadempleados ?>" ><?php echo $ce->catcantidadempleados ?></option>
                            <?php

                                }
                            ?>
                        </select>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <select name="idcatpais" id="idcatpais" class="form-control"  data-rule-required="true">
                            <option value="">País</option>
                            <?php
                                foreach ($catpais as $ind=>$cp){
                            ?>
                                <option value="<?php echo $cp->idcatpais ?>" ><?php echo $cp->pais ?></option>
                            <?php

                                }
                            ?>
                        </select>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="dominio" id="dominio" data-rule-required="true" data-rule-domaindName="true" data-rule-domainIsset="true" value="{{ old('dominio') }}" placeholder="Dominio">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}"  data-rule-required="true" placeholder="Nombres">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="paterno" id="paterno" value="{{ old('paterno') }}"  data-rule-required="true" placeholder="Apellido Paterno">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="materno" id="materno" value="{{ old('materno') }}" placeholder="Apellido Materno">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" name="password" id="password"  data-rule-required="true" placeholder="Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"  data-rule-required="true" data-rule-equalto="#password"  placeholder="Repetir password">
                        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="puesto" id="puesto"  data-rule-required="true" placeholder="Puesto">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>


                        <div class="g-recaptcha" data-sitekey="6LdUnCITAAAAAHbiTlGgcenO36vl6SpIKCW4ycmy" data-callback="correctCaptcha" ></div>
                        <span id="errorCaptcha" class="errorCaptcha hide" ></span>

                    <br/>
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox icheck">
                                <label>
                                    <input name="terminosCondiciones" id="terminosCondiciones" class="form-control" type="checkbox" > Acepto terminos y <a href="" class="font-color-white" data-toggle="modal" data-target="#terminos" >condiciones</a>
                                </label>
                            </div>
                        </div><!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" id="register"  class="btn btn-primary btn-block btn-flat">Registrar</button>
                        </div><!-- /.col -->
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-xs-8">
                            <a href="" class="font-color-white" data-toggle="modal" data-target="#leyes" >Política de Privacidad</a>
                        </div><!-- /.col -->
                    </div>
                </form>
        </div>
        <!--div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using Facebook</a>
          <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using Google+</a>
        </div-->

    </div>


    </div><!-- /.form-box -->

    <div id="terminos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                    <h4><span>Terms of</span> Service</h4>
                </div>
                <div class="modal-body">
                    <div class="content-terminos">

                        <span>Updated on:</span> 19th March 2015.<br>
                        <span>Effective Date:</span> 19th April 2015.<br><br>


                        <p>
                            THIS IS AN AGREEMENT BETWEEN YOU OR THE ENTITY THAT YOU REPRESENT (hereinafter “You” or “Your”) AND KUNDE CORPORATION (hereinafter “KUNDE”) GOVERNING YOUR USE OF KUNDE SUITE OF ONLINE BUSINESS PRODUCTIVITY AND COLLABORATION SOFTWARE.
                        </p>
                        <p>
                            Parts of this Agreement
                            This Agreement consists of the following terms and conditions (hereinafter the “General Terms”) and terms and conditions, if any, specific to use of individual Services (hereinafter the “Service Specific Terms”). The General Terms and Service Specific Terms are collectively referred to as the “Terms”. In the event of a conflict between the General Terms and Service Specific Terms, the Service Specific Terms shall prevail.
                        </p>
                        <p>
                            Acceptance of the Terms
                            You must be of legal age to enter into a binding agreement in order to accept the Terms. If you do not agree to the General Terms, do not use any of our Services. If you agree to the General Terms and do not agree to any Service Specific Terms, do not use the corresponding Service. You can accept the Terms by checking a checkbox or clicking on a button indicating your acceptance of the terms or by actually using the Services.
                        </p>
                        <p>
                            Description of Service
                            We provide an array of services for online collaboration and management including word processor, spreadsheet, presentation tool, database application creator, email client, chat client, organizer, customer relationship management application and project management application ("Service" or "Services"). You may use the Services for your personal and business use or for internal business purpose in the organization that you represent. You may connect to the Services using any Internet browser supported by the Services. You are responsible for obtaining access to the Internet and the equipment necessary to use the Services. You can create and edit content with your user account and if you choose to do so, you can publish and share such content.
                        </p>
                        <p>
                            Subscription to Beta Service
                            We may offer certain Services as closed or open beta services ("Beta Service" or “Beta Services”) for the purpose of testing and evaluation. You agree that we have the sole authority and discretion to determine the period of time for testing and evaluation of Beta Services. We will be the sole judge of the success of such testing and the decision, if any, to offer the Beta Services as commercial services. You will be under no obligation to acquire a subscription to use any paid Service as a result of your subscription to any Beta Service. We reserve the right to fully or partially discontinue, at any time and from time to time, temporarily or permanently, any of the Beta Services with or without notice to you. You agree that KUNDE will not be liable to you or to any third party for any harm related to, arising out of, or caused by the modification, suspension or discontinuance of any of the Beta Services for any reason.
                        </p>
                        <p>
                            Modification of Terms of Service
                            We may modify the Terms upon notice to you at any time through a service announcement or by sending email to your primary email address. If we make significant changes to the Terms that affect your rights, you will be provided with at least 30 days advance notice of the changes by email to your primary email address. You may terminate your use of the Services by providing KUNDE notice by email within 30 days of being notified of the availability of the modified Terms if the Terms are modified in a manner that substantially affects your rights in connection with use of the Services. In the event of such termination, you will be entitled to prorated refund of the unused portion of any prepaid fees. Your continued use of the Service after the effective date of any change to the Terms will be deemed to be your agreement to the modified Terms.
                        </p>
                        <p>
                            User Sign up Obligations
                            You need to sign up for a user account by providing all required information in order to access or use the Services. If you represent an organization and wish to use the Services for corporate internal use, we recommend that you, and all other users from your organization, sign up for user accounts by providing your corporate contact information. In particular, we recommend that you use your corporate email address. You agree to: a) provide true, accurate, current and complete information about yourself as prompted by the sign up process; and b) maintain and promptly update the information provided during sign up to keep it true, accurate, current, and complete. If you provide any information that is untrue, inaccurate, outdated, or incomplete, or if KUNDE has reasonable grounds to suspect that such information is untrue, inaccurate, outdated, or incomplete, KUNDE may terminate your user account and refuse current or future use of any or all of the Services.
                        </p>
                        <p>
                            Organization Accounts and Administrators
                            When you sign up for an account for your organization you may specify one or more administrators. The administrators will have the right to configure the Services based on your requirements and manage end users in your organization account. If your organization account is created and configured on your behalf by a third party, it is likely that such third party has assumed administrator role for your organization. Make sure that you enter into a suitable agreement with such third party specifying such party’s roles and restrictions as an administrator of your organization account.
                            You are responsible for i) ensuring confidentiality of your organization account password, ii) appointing competent individuals as administrators for managing your organization account, and iii) ensuring that all activities that occur in connection with your organization account comply with this Agreement. You understand that KUNDE is not responsible for account administration and internal management of the Services for you.
                            You are responsible for taking necessary steps for ensuring that your organization does not lose control of the administrator accounts. You may specify a process to be followed for recovering control in the event of such loss of control of the administrator accounts by sending an email to legal@KUNDEcorp.com, provided that the process is acceptable to KUNDE. In the absence of any specified administrator account recovery process, KUNDE may provide control of an administrator account to an individual providing proof satisfactory to KUNDE demonstrating authorization to act on behalf of the organization. You agree not to hold KUNDE liable for the consequences of any action taken by KUNDE in good faith in this regard.
                        </p>
                        <p>
                            Personal Information and Privacy
                            Personal information you provide to KUNDE through the Service is governed by KUNDE Privacy Policy. Your election to use the Service indicates your acceptance of the terms of the KUNDE Privacy Policy. You are responsible for maintaining confidentiality of your username, password and other sensitive information. You are responsible for all activities that occur in your user account and you agree to inform us immediately of any unauthorized use of your user account by email to accounts@KUNDEcorp.com or by calling us on any of the numbers listed on https://www.KUNDE.com/contact.html. We are not responsible for any loss or damage to you or to any third party incurred as a result of any unauthorized access and/or use of your user account, or otherwise.
                        </p>
                        <p>
                            Communications from KUNDE
                            The Service may include certain communications from KUNDE, such as service announcements, administrative messages and newsletters. You understand that these communications shall be considered part of using the Services. As part of our policy to provide you total privacy, we also provide you the option of opting out from receiving newsletters from us. However, you will not be able to opt-out from receiving service announcements and administrative messages.
                        </p>
                        <p>
                            Complaints
                            If we receive a complaint from any person against you with respect to your activities as part of use of the Services, we will forward the complaint to the primary email address of your user account. You must respond to the complainant directly within 10 days of receiving the complaint forwarded by us and copy KUNDE in the communication. If you do not respond to the complainant within 10 days from the date of our email to you, we may disclose your name and contact information to the complainant for enabling the complainant to take legal action against you. You understand that your failure to respond to the forwarded complaint within the 10 days’ time limit will be construed as your consent to disclosure of your name and contact information by KUNDE to the complainant.
                        </p>
                        <p>
                            Fees and Payments
                            The Services are available under subscription plans of various durations. Payments for subscription plans of duration of less than a year can be made only by Credit Card. Your subscription will be automatically renewed at the end of each subscription period unless you downgrade your paid subscription plan to a free plan or inform us that you do not wish to renew the subscription. At the time of automatic renewal, the subscription fee will be charged to the Credit Card last used by you. We provide you the option of changing the details if you would like the payment for the renewal to be made through a different Credit Card. If you do not wish to renew the subscription, you must inform us at least seven days prior to the renewal date. If you have not downgraded to a free plan and if you have not informed us that you do not wish to renew the subscription, you will be presumed to have authorized KUNDE to charge the subscription fee to the Credit Card last used by you. Please click here to know about our Refund Policy.
                            From time to time, we may change the price of any Service or charge for use of Services that are currently available free of charge. Any increase in charges will not apply until the expiry of your then current billing cycle. You will not be charged for using any Service unless you have opted for a paid subscription plan.
                        </p>
                        <p>
                            Restrictions on Use
                            In addition to all other terms and conditions of this Agreement, you shall not: (i) transfer the Services or otherwise make it available to any third party; (ii) provide any service based on the Services without prior written permission; (iii) use the third party links to sites without agreeing to their website terms & conditions; (iv) post links to third party sites or use their logo, company name, etc. without their prior written permission; (v) publish any personal or confidential information belonging to any person or entity without obtaining consent from such person or entity; (vi) use the Services in any manner that could damage, disable, overburden, impair or harm any server, network, computer system, resource of KUNDE; (vii) violate any applicable local, state, national or international law; and (viii) create a false identity to mislead any person as to the identity or origin of any communication.
                        </p>
                        <p>
                            Spamming and Illegal Activities
                            You agree to be solely responsible for the contents of your transmissions through the Services. You agree not to use the Services for illegal purposes or for the transmission of material that is unlawful, defamatory, harassing, libelous, invasive of another's privacy, abusive, threatening, harmful, vulgar, pornographic, obscene, or is otherwise objectionable, offends religious sentiments, promotes racism, contains viruses or malicious code, or that which infringes or may infringe intellectual property or other rights of another. You agree not to use the Services for the transmission of "junk mail", "spam", "chain letters", “phishing” or unsolicited mass distribution of email. We reserve the right to terminate your access to the Services if there are reasonable grounds to believe that you have used the Services for any illegal or unauthorized activity.
                        </p>
                        <p>
                            Inactive User Accounts Policy
                            We reserve the right to terminate unpaid user accounts that are inactive for a continuous period of 120 days. In the event of such termination, all data associated with such user account will be deleted. We will provide you prior notice of such termination and option to back-up your data. The data deletion policy may be implemented with respect to any or all of the Services. Each Service will be considered an independent and separate service for the purpose of calculating the period of inactivity. In other words, activity in one of the Services is not sufficient to keep your user account in another Service active. In case of accounts with more than one user, if at least one of the users is active, the account will not be considered inactive.
                        </p>
                        <p>
                            Data Ownership
                            We respect your right to ownership of content created or stored by you. You own the content created or stored by you. Unless specifically permitted by you, your use of the Services does not grant KUNDE the license to use, reproduce, adapt, modify, publish or distribute the content created by you or stored in your user account for KUNDE’s commercial, marketing or any similar purpose. But you grant KUNDE permission to access, copy, distribute, store, transmit, reformat, publicly display and publicly perform the content of your user account solely as required for the purpose of providing the Services to you.
                        </p>
                        <p>
                            User Generated Content
                            You may transmit or publish content created by you using any of the Services or otherwise. However, you shall be solely responsible for such content and the consequences of its transmission or publication. Any content made public will be publicly accessible through the internet and may be crawled and indexed by search engines. You are responsible for ensuring that you do not accidentally make any private content publicly available. Any content that you may receive from other users of the Services, is provided to you AS IS for your information and personal use only and you agree not to use, copy, reproduce, distribute, transmit, broadcast, display, sell, license or otherwise exploit such content for any purpose, without the express written consent of the person who owns the rights to such content. In the course of using any of the Services, if you come across any content with copyright notice(s) or any copy protection feature(s), you agree not to remove such copyright notice(s) or disable such copy protection feature(s) as the case may be. By making any copyrighted/copyrightable content available on any of the Services you affirm that you have the consent, authorization or permission, as the case may be from every person who may claim any rights in such content to make such content available in such manner. Further, by making any content available in the manner aforementioned, you expressly agree that KUNDE will have the right to block access to or remove such content made available by you if KUNDE receives complaints concerning any illegality or infringement of third party rights in such content. By using any of the Services and transmitting or publishing any content using such Service, you expressly consent to determination of questions of illegality or infringement of third party rights in such content by the agent designated by KUNDE for this purpose.
                            For procedure relating to complaints of illegality or infringement of third party rights in content transmitted or published using the Services, click here.
                            If you wish to protest any blocking or removal of content by KUNDE, you may do so in the manner provided here.
                        </p>
                        <p>
                            Sample files and Applications
                            KUNDE may provide sample files and applications for the purpose of demonstrating the possibility of using the Services effectively for specific purposes. The information contained in any such sample files and applications consists of random data. KUNDE makes no warranty, either express or implied, as to the accuracy, usefulness, completeness or reliability of the information or the sample files and applications.
                            Trademark
                            KUNDE, KUNDE logo, the names of individual Services and their logos are trademarks of KUNDE Corporation. You agree not to display or use, in any manner, the KUNDE trademarks, without KUNDE’s prior permission.
                            Disclaimer of Warranties
                            YOU EXPRESSLY UNDERSTAND AND AGREE THAT THE USE OF THE SERVICES IS AT YOUR SOLE RISK. THE SERVICES ARE PROVIDED ON AN AS-IS-AND-AS-AVAILABLE BASIS. KUNDE EXPRESSLY DISCLAIMS ALL WARRANTIES OF ANY KIND, WHETHER EXPRESS OR IMPLIED, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE. KUNDE MAKES NO WARRANTY THAT THE SERVICES WILL BE UNINTERRUPTED, TIMELY, SECURE, OR ERROR FREE. USE OF ANY MATERIAL DOWNLOADED OR OBTAINED THROUGH THE USE OF THE SERVICES SHALL BE AT YOUR OWN DISCRETION AND RISK AND YOU WILL BE SOLELY RESPONSIBLE FOR ANY DAMAGE TO YOUR COMPUTER SYSTEM, MOBILE TELEPHONE, WIRELESS DEVICE OR DATA THAT RESULTS FROM THE USE OF THE SERVICES OR THE DOWNLOAD OF ANY SUCH MATERIAL. NO ADVICE OR INFORMATION, WHETHER WRITTEN OR ORAL, OBTAINED BY YOU FROM KUNDE, ITS EMPLOYEES OR REPRESENTATIVES SHALL CREATE ANY WARRANTY NOT EXPRESSLY STATED IN THE TERMS.
                            Limitation of Liability
                            YOU AGREE THAT KUNDE SHALL, IN NO EVENT, BE LIABLE FOR ANY CONSEQUENTIAL, INCIDENTAL, INDIRECT, SPECIAL, PUNITIVE, OR OTHER LOSS OR DAMAGE WHATSOEVER OR FOR LOSS OF BUSINESS PROFITS, BUSINESS INTERRUPTION, COMPUTER FAILURE, LOSS OF BUSINESS INFORMATION, OR OTHER LOSS ARISING OUT OF OR CAUSED BY YOUR USE OF OR INABILITY TO USE THE SERVICE, EVEN IF KUNDE HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGE. IN NO EVENT SHALL KUNDE’S ENTIRE LIABILITY TO YOU IN RESPECT OF ANY SERVICE, WHETHER DIRECT OR INDIRECT, EXCEED THE FEES PAID BY YOU TOWARDS SUCH SERVICE.
                            Indemnification
                            You agree to indemnify and hold harmless KUNDE, its officers, directors, employees, suppliers, and affiliates, from and against any losses, damages, fines and expenses (including attorney's fees and costs) arising out of or relating to any claims that you have used the Services in violation of another party's rights, in violation of any law, in violations of any provisions of the Terms, or any other claim related to your use of the Services, except where such use is authorized by KUNDE.
                            Arbitration
                            Any controversy or claim arising out of or relating to the Terms shall be settled by binding arbitration in accordance with the commercial arbitration rules of the American Arbitration Association. Any such controversy or claim shall be arbitrated on an individual basis, and shall not be consolidated in any arbitration with any claim or controversy of any other party. The decision of the arbitrator shall be final and unappealable. The arbitration shall be conducted in California and judgment on the arbitration award may be entered into any court having jurisdiction thereof. Notwithstanding anything to the contrary, KUNDE may at any time seek injunctions or other forms of equitable relief from any court of competent jurisdiction.
                            Suspension and Termination
                            We may suspend your user account or temporarily disable access to whole or part of any Service in the event of any suspected illegal activity, extended periods of inactivity or requests by law enforcement or other government agencies. Objections to suspension or disabling of user accounts should be made to legal@KUNDEcorp.com within thirty days of being notified about the suspension. We may terminate a suspended or disabled user account after thirty days. We will also terminate your user account on your request.
                            In addition, we reserve the right to terminate your user account and deny the Services upon reasonable belief that you have violated the Terms and to terminate your access to any Beta Service in case of unexpected technical issues or discontinuation of the Beta Service. You have the right to terminate your user account if KUNDE breaches its obligations under these Terms and in such event, you will be entitled to prorated refund of any prepaid fees. Termination of user account will include denial of access to all Services, deletion of information in your user account such as your email address and password and deletion of all data in your user account.
                            END OF TERMS OF SERVICE
                            If you have any questions or concerns regarding this Agreement, please contact us at legal@KUNDEcorp.com.
                        </p>
                    </div>

                </div>
                <div class="modal-footer">
                    <!--<div class="footer_form_appointment">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                        <button type="submit" class="btn btn-primary enviarSolicitudCita" data-url="/citas/agendarCita" data-selector-form="#createAppointmentForm_" id="submitButton">Save</button>
                    </div>-->
                </div>
            </div>
        </div>
    </div>

    <div id="leyes" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                    <h4><span>Privacy  </span> Policy</h4>
                </div>
                <div class="modal-body">
                    <div class="content-terminos">

                        <span>TRUSTe European Safe Harbor certification</span><br>
                        <span>Updated on:</span> 19th March 2015.<br>
                        <span>Effective Date:</span> 19th April 2015.<br><br>


                        <p>
                            General
                            At KUNDE Corporation, we respect your need for online privacy and protect any Personal Information that you may share with us, in an appropriate manner. Our practice with respect to use of your Personal Information is as set forth below in this Privacy Policy Statement. As a condition to use of KUNDE Services, you consent to the terms of the Privacy Policy Statement as it may be updated from time to time. This Privacy Policy Statement applies exclusively to www.KUNDE.com.
                            KUNDE Corporation has been awarded TRUSTe's Privacy Seal signifying that this Privacy Policy Statement and practices have been reviewed by TRUSTe for compliance with TRUSTe's program requirements including transparency, accountability and choice regarding the collection and use of your Personal Information. The TRUSTe program does not cover information that may be collected through downloadable software. The TRUSTe program covers only information that is collected through this website, https://www.KUNDE.com and does not cover information that may be collected through our mobile applications. TRUSTe's mission, as an independent third party, is to accelerate online trust among consumers and organizations globally through its leading privacy Trustmark and innovative trust solutions. If you have questions or complaints regarding our privacy policy or practices, please contact us at Mailing Address: 4141 Hacienda Drive,Pleasanton, CA 94588, USA. We can be reached via email at privacy@KUNDEcorp.com or you can reach KUNDE Customer Support Services by telephone at 888 900 9646.If you are not satisfied with our response you can contact TRUSTe here.
                            KUNDE Corporation complies with the U.S. - E.U. Safe Harbor framework and the U.S. - Swiss Safe Harbor framework as set forth by the U.S. Department of Commerce regarding the collection, use, and retention of personal data from European Union member countries and Switzerland. KUNDE Corporation has certified that it adheres to the Safe Harbor Privacy Principles of notice, choice, onward transfer, security, data integrity, access, and enforcement. To learn more about the Safe Harbor program, and to view KUNDE Corporation‘s certification, please visit http://export.gov/safeharbor/.
                        </p>
                        <p>
                            Children's Online Privacy Protection
                            KUNDE does not knowingly collect Personal Information from users who are under 13 years of age.
                            Information Recorded and Use:
                            Personal Information
                            During the Registration Process for creating a user account, we request for your name and email address. You will also be asked to choose a unique username and a password, which will be used solely for the purpose of providing access to your user account. Upon registration you will have the option of choosing a security question and an answer to the security question, which if given, will be used solely for the purpose of resetting your password. Your name and email address will be used to inform you regarding new services, releases, upcoming events and changes in this Privacy Policy Statement.
                            KUNDE will have access to third party personal information provided by you as part of using KUNDE Services such as contacts in your KUNDE Mail account. This information may include third party names, email addresses, phone numbers and physical addresses and will be used for servicing your requirements as expressed by you to KUNDE and solely as part and parcel of your use of KUNDE Services. We do not share this third party personal information with anyone for promotional purposes, nor do we utilize it for any purposes not expressly consented to by you. When you elect to refer friends to the website, we request their email address and name to facilitate the request and deliver a one time email. Your friend may contact us at support@KUNDEcorp.com to request that we remove this information from our database.
                            We post user testimonials on our website. These testimonials may include names and other Personal Information and we acquire permission from our users prior to posting these on our website. KUNDE is not responsible for the Personal Information users elect to post within their testimonials.
                        </p>
                        <p>
                            Usage Details
                            Your usage details such as time, frequency, duration and pattern of use, features used and the amount of storage used will be recorded by us in order to enhance your experience of the KUNDE Services and to help us provide you the best possible service.
                        </p>
                        <p>
                            Contents of your User Account
                            We store and maintain files, documents, to-do lists, emails and other data stored in your user account at our facilities in the United States. In order to prevent loss of data due to errors or system failures, we also keep backup copies of data including the contents of your user account. Hence your files and data may remain on our servers even after deletion or termination of your user account. We may retain and use your Personal Information and data as necessary to comply with our legal obligations, resolve disputes, and enforce our rights. We assure you that the contents of your user account will not be disclosed to anyone and will not be accessible even to employees of KUNDE except in circumstances specifically mentioned in this Privacy Policy Statement and Terms of Services. We also do not scan the contents of your user account for serving targeted advertisements.
                        </p>
                        <p>
                            Payment Information
                            In case of services requiring payment, we request credit card or other payment account information, which will be used solely for processing payments. Your financial information will not be stored by us except for the name and address of the card holder, the expiry date and the last four digits of the Credit Card number. Subject to your prior consent and where necessary for processing future payments, your financial information will be stored in encrypted form on secure servers of our reputed Payment Gateway Service Provider who is beholden to treating your Personal Information in accordance with this Privacy Policy Statement.
                        </p>
                        <p>
                            Visitor Details
                            We use the Internet Protocol address, browser type, browser language, referring URL, files accessed, errors generated, time zone, operating system and other visitor details collected in our log files to analyze the trends, administer the website, track visitor's movements and to improve our website. We link this automatically collected data to other information we collect about you.
                        </p>
                        <p>
                            Cookies and Other Tracking Technologies
                            We use temporary and permanent cookies to enhance your experience of our KUNDE Services. Temporary cookies will be removed from your computer each time you close your browser. By selecting ‘keep me signed-in’ option in KUNDE Services, a permanent cookie will be stored in your computer and you will not be required to sign-in by providing complete login information each time you return to our website. If you have turned cookies off, you may not be able to use registered areas of the website. We tie cookie information to your email address when you elect to remain logged in so as to maintain and recall your preferences within the website.
                            Technologies such as: cookies, beacons, tags and scripts are used by KUNDE Corporation and our partners [such as reseller partners], affiliates, or service providers [such as analytics service providers]. These technologies are used in analyzing trends, administering the site, tracking users’ movements around the site and to gather demographic information about our user base as a whole. We may receive reports based on the use of these technologies by these companies on an individual as well as aggregated basis.
                            We use Local Storage Objects (LSOs) such as HTML5 to store content information and preferences. Third parties with whom we partner to provide certain features on our site or to display advertising based upon your Web browsing activity use LSOs such as HTML 5 to collect and store information. Various browsers may offer their own management tools for removing HTML5 LSOs.
                        </p>
                        <p>
                            Organization Accounts and Administrators
                            When you sign up for an account for your organization you may specify one or more administrators. The administrators will have the right to configure the Services based on your requirements and manage end users in your organization account. If your organization account is created and configured on your behalf by a third party, it is likely that such third party has assumed administrator role for your organization. Make sure that you enter into a suitable agreement with such third party specifying such party’s roles and restrictions as an administrator of your organization account.
                            You are responsible for i) ensuring confidentiality of your organization account password, ii) appointing competent individuals as administrators for managing your organization account, and iii) ensuring that all activities that occur in connection with your organization account comply with this Agreement. You understand that KUNDE is not responsible for account administration and internal management of the Services for you.
                            You are responsible for taking necessary steps for ensuring that your organization does not lose control of the administrator accounts. You may specify a process to be followed for recovering control in the event of such loss of control of the administrator accounts by sending an email to legal@KUNDEcorp.com, provided that the process is acceptable to KUNDE. In the absence of any specified administrator account recovery process, KUNDE may provide control of an administrator account to an individual providing proof satisfactory to KUNDE demonstrating authorization to act on behalf of the organization. You agree not to hold KUNDE liable for the consequences of any action taken by KUNDE in good faith in this regard.
                        </p>
                        <p>
                            Behavioral Targeting/ Re-Targeting
                            We partner with third parties to manage our advertisements on other sites. Our third party partners may use technologies such as cookies to gather information about your activities on this site and other sites in order to provide you advertising based upon your browsing activities and interests. If you wish to not have this information used for the purpose of serving you interest-based advertisements, you may opt-out by clicking here (or if located in the European Union click here). However, you will continue to receive generic advertisements on other websites that display advertisements.
                        </p>
                        <p>
                            Links from our website
                            Some pages of our website contain external links. You are advised to verify the privacy practices of such other websites. We are not responsible for the manner of use or misuse of information made available by you at such other websites. We encourage you not to provide Personal Information, without assuring yourselves of the Privacy Policy Statement of other websites.
                        </p>
                        <p>
                            Federated Authentication
                            You can log in to our site using federated authentication providers such as Facebook Connect. These services will authenticate your identity and provide you the option to share certain Personal Information with us such as your name and email address to pre-populate our sign up form.
                        </p>
                        <p>
                            With whom we share Information
                            We may need to share your Personal Information and your data to our affiliates, resellers, service providers and business partners solely for the purpose of providing KUNDE Services to you. The purposes for which we may disclose your Personal Information or data to our service providers may include, but are not limited to, data storage, database management, web analytics and payment processing. These service providers are authorized to use your Personal Information or data only as necessary to provide these services to us. In such cases KUNDE will also ensure that such affiliates, resellers, service providers and business partners comply with this Privacy Policy Statement and adopt appropriate confidentiality and security measures. We will obtain your prior specific consent before we share your Personal Information or data to any person outside KUNDE for any purpose that is not directly connected with providing KUNDE Services to you. We will share your Personal Information with third parties only in the ways that are described in this Privacy Policy Statement. We do not sell your Personal Information to third parties. We may share generic aggregated demographic information not linked to any Personal Information regarding visitors and users with our business partners and advertisers. Please be aware that laws in various jurisdictions in which we operate may obligate us to disclose user information and the contents of your user account to the local law enforcement authorities under a legal process or an enforceable government request. In addition, we may also disclose Personal Information and contents of your user account to law enforcement authorities if such disclosure is determined to be necessary by KUNDE in our sole and absolute discretion for protecting the safety of our users, employees, or the general public. If KUNDE is involved in a merger, acquisition, or sale of all or a portion of its business or assets, you will be notified via email and/or a prominent notice on our website of any change in ownership or uses of your Personal Information, as well as any choices you may have regarding your Personal Information.
                        </p>
                        <p>
                            Restrictions on Use
                            In addition to all other terms and conditions of this Agreement, you shall not: (i) transfer the Services or otherwise make it available to any third party; (ii) provide any service based on the Services without prior written permission; (iii) use the third party links to sites without agreeing to their website terms & conditions; (iv) post links to third party sites or use their logo, company name, etc. without their prior written permission; (v) publish any personal or confidential information belonging to any person or entity without obtaining consent from such person or entity; (vi) use the Services in any manner that could damage, disable, overburden, impair or harm any server, network, computer system, resource of KUNDE; (vii) violate any applicable local, state, national or international law; and (viii) create a false identity to mislead any person as to the identity or origin of any communication.
                        </p>
                        <p>
                            How secure is your Information
                            We adopt industry appropriate data collection, storage and processing practices and security measures, as well as physical security measures to protect against unauthorized access, alteration, disclosure or destruction of your Personal Information, username, password, transaction information and data stored in your user account. Access to your name and email address is restricted to our employees who need to know such information in connection with providing KUNDE Services to you and are bound by confidentiality obligations.
                        </p>
                        <p>
                            Your Choice in Information Use
                            In the event we decide to use your Personal Information for any purpose other than as stated in this Privacy Policy Statement, we will offer you an effective way to opt out of the use of your Personal Information for those other purposes. From time to time, we may send emails to you regarding new services, releases and upcoming events. You may opt out of receiving newsletters and other secondary messages from KUNDE by selecting the ‘unsubscribe’ function present in every email we send. However, you will continue to receive essential transactional emails.
                        </p>
                        <p>
                            Data Ownership
                            We respect your right to ownership of content created or stored by you. You own the content created or stored by you. Unless specifically permitted by you, your use of the Services does not grant KUNDE the license to use, reproduce, adapt, modify, publish or distribute the content created by you or stored in your user account for KUNDE’s commercial, marketing or any similar purpose. But you grant KUNDE permission to access, copy, distribute, store, transmit, reformat, publicly display and publicly perform the content of your user account solely as required for the purpose of providing the Services to you.
                        </p>
                        <p>
                            Accessing, Updating and Removing Personal Information
                            Users who wish to correct, update or remove any Personal Information including those from a public forum, directory or testimonial on our site may do so either by accessing their user account or by contacting KUNDE Customer Support Services at support@KUNDEcorp.com. Such changes may take up to 48 hours to take effect. We respond to all enquiries within 30 days.
                        </p>
                        <p>
                            Investigation of Illegal Activity
                            We may need to provide access to your Personal Information and the contents of your user account to our employees and service providers for the purpose of investigating any suspected illegal activity or potential violation of the terms and conditions for use of KUNDE Services. However, KUNDE will ensure that such access is in compliance with this Privacy Policy Statement and subject to appropriate confidentiality and security measures.
                        </p>
                        <p>
                            Enforcement of Privacy Policy
                            We make every effort, including periodic reviews to ensure that Personal Information provided by you is used in conformity with this Privacy Policy Statement. If you have any concerns regarding our adherence to this Privacy Policy Statement or the manner in which Personal Information is used for the purpose of providing KUNDE Services, kindly contact KUNDE Customer Support Services at support@KUNDEcorp.com. We will contact you to address your concerns and we will also co-operate with regulatory authorities in this regard if needed.
                        </p>
                        <p>
                            Blogs and Forums
                            We provide the capacity for users to post information in blogs and forums for sharing information in a public space on the website. This information is publicly available to all users of these forums and visitors to our website. We require registration to publish information, but given the public nature of both platforms, any Personal Information disclosed within these forums may be used to contact users with unsolicited messages. We encourage users to be cautious in disclosure of Personal Information in public forums as KUNDE is not responsible for the Personal Information users elect to disclose.
                            KUNDE also supports third party widgets such as Facebook and Twitter buttons on the website that allow users to share articles and other information on different platforms. These widgets may collect your IP address, which page you are visiting on our site, and may set a cookie to enable the widgets to function properly. These widgets do not collect or store any Personal Information from users on the website and simply act as a bridge for your convenience in sharing information. Your interactions with these widgets are governed by the privacy policy of the company providing it.
                        </p>
                        <p>
                            END OF PRIVACY POLICY
                            IIf you have any questions or concerns regarding this Privacy Policy Statement, please contact us at legal@KUNDEcorp.com. We shall respond to all inquiries within 30 days of receipt upon ascertaining your identity. In the event that your inquiry goes unaddressed beyond this reasonable expectation, please contact TRUSTe. TRUSTe shall then serve as a liaison with us to resolve your concerns.
                        </p>
                    </div>

                </div>
                <div class="modal-footer">
                    <!--<div class="footer_form_appointment">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                        <button type="submit" class="btn btn-primary enviarSolicitudCita" data-url="/citas/agendarCita" data-selector-form="#createAppointmentForm_" id="submitButton">Save</button>
                    </div>-->
                </div>
            </div>
        </div>
    </div>
@endsection