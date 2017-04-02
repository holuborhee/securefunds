@extends('layouts.app')

@section('content')

<div class="testimonial">

  <img class="img-responsive" src="{{asset('images/chess.jpg')}}"  width="100%" height="2"/>   

    
    
    
    </div><!--/#testimonial--><br>
    
    <section id="main-slider">
     <section id="hero-text" class="wow fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <h2>CHECKERS FUNDS</h2>
                    <p style="font-family:georgia,garamond,serif;"> CHECKERSFUNDS  is a peer to peer donation exchange platform. We strive on our cooperative support and constantly grow through influx of new members.  The goal of checkersfunds is to willingly help one another overcome the world's unjust financial system 
            
that helps the rich to get richer while the poor get poorer. For believers to help one another acheive their
dreams.We believe that we have what it takes to deliver on our promises and hence we look forward to a mutually benefiting working relationship with individuals and organizations.</p><br><h2>HOW IT WORKS</h2><br>

<p style="font-family:georgia,garamond,serif;">To participate you need to register on the website. Once you register successfully, the system matches you to donate the sum of either ₦10,000, ₦20,000, ₦50,000 and ₦100,000 plans to a fellow member. To donate, call the member to inform him/her that you are about paying and to please confirm you fast so you can re-donate again the same day. If unavailable due to work, church or a meeting, kindly send an SMS and wait for a reply before your 12 hrs expires.

After making the payment, You will require a confirmation of payment from the member, then the system will automatically assign 2 members to pay you as well.

WARNING: Donations are to be made directly to members bank account details specified and are final. No refunds.
 
If after 15 days and you are yet to be matched to receive donations. Simply log in to your PO and open a support ticket with the title "MERGE TIME ELAPSED" and you will be matched within. It is a promise and we intend to fulfill it absolutely.
</DIV>  
<div class="col-sm-3 ">
<h2>OUR CORE VALUES</h2>

<p style="font-family:georgia,garamond,serif;">Instant 100% return on your donation!

You receive 100% instant increase on any donation package chosen. Donate ₦100,000 and receive ₦200,000 total donated by two members automatically.

Superfast 12 hrs Donation Timeline

Members are to make payments within 12 hours! This assures the system pays faster for several daily re-donations. Do NOT register if you cannot provide help within 12 hrs. Failure is automatic blocking of account.

Recycle Timeline is 48 hrs!

To ensure CHECKERSFUNDS LASTS a very LONG time, re-donation is compulsory in 48 hrs after receiving help. Failure is automatic blocking of account. Your IP, Bank Account Info, Phone Number is also BLOCKED.

24/7 Support</p>
</div>


</p><br>
<h4>DONATE and RECIEVE help from active members, a minimum of 10k,20k,50kand 100k to receive help<br> of 100% within 12hrs</h4>
               


               </div>
                <div class="col-sm-3 ">
                
            </div>
        </div>
    </section><!--/#hero-text-->
 
 <section id="pricing">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">PACKAGES WE OFFER YOU</h2>
            </div>

            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="wow zoomIn" data-wow-duration="400ms" data-wow-delay="0ms">
                        <ul class="pricing">
                            <li class="plan-header">
                                <div class="price-duration">
                                    <span class="price">
                                        <strong>₦10,000</strong>
                                    </span>
                                    <span class="duration">
                                        
                                    </span>
                                </div>

                                <div class="plan-name">
                                    <h4>PAWN</h4>
                                </div>
                            </li>
                           <abbr> <li>2:1 MATRIX</li>
                            <li>AUTO ASSIGN</li>
                            <li>REFERRAL BONUS</li>
                            <li></li></abbr>
                            <li><b>₦20,000</b></li>
                            <li><b>RETURN INVESTMENT</b> </li>
                            <li class="plan-purchase"><a class="btn btn-primary" href="{{url('/register?cat=1')}}">SIGN UP</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="wow zoomIn" data-wow-duration="400ms" data-wow-delay="200ms">
                        <ul class="pricing featured">
                            <li class="plan-header">
                                <div class="price-duration">
                                    <span class="price">
                                        <strong>₦20,000</strong>
                                    </span>
                                    <span class="duration">
                                        
                                    </span>
                                </div>

                                <div class="plan-name">
                                    <h4>KNIGHT</h4>
                                </div>
                            </li>
                            <abbr><li>2:1 MATRIX</li>
                            <li>AUTO ASSIGN</li>
                            <li>REFERRAL BONUS</li>
                            <li></li></abbr>
                            <li><b>₦40,000</b></li>
                            <li><b>RETURN INVESTMENT</b> </li>
                            <li class="plan-purchase"><a class="btn btn-primary" href="{{url('/register?cat=2')}}">SIGN UP</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="wow zoomIn" data-wow-duration="400ms" data-wow-delay="400ms">
                        <ul class="pricing">
                            <li class="plan-header">
                                <div class="price-duration">
                                    <span class="price">
                                        <strong>₦50,000</strong>
                                    </span>
                                    <span class="duration">
                                        
                                    </span>
                                </div>

                                <div class="plan-name">
                                    <h4>BISHOP</h4>
                                </div>
                            </li>
                            <abbr><li>2:1 MATRIX</li>
                            <li>AUTO ASSIGN</li>
                            <li>REFERRAL BONUS</li>
                            <li></li></abbr>
                            <li><b>₦100,000</b></li>
                            <li><b>RETURN INVESTMENT</b></li>
                            <li class="plan-purchase"><a class="btn btn-primary" href="{{url('/register?cat=3')}}">SIGN UP</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="wow zoomIn" data-wow-duration="400ms" data-wow-delay="600ms">
                        <ul class="pricing">
                            <li class="plan-header">
                                <div class="price-duration">
                                    <span class="price">
                                        <strong>₦100,000</strong>
                                    </span>
                                    <span class="duration">
                                        
                                    </span>
                                </div>

                                <div class="plan-name">
                                    <h4>QUEEN</h4>
                                </div>
                            </li>
                            <abbr><li>2:1 MATRIX</li>
                            <li>AUTO ASSIGN</li>
                            <li>REFERRAL BONUS</li>
                            <li></li></abbr>
                            <li><b>₦200,000</b> </li>
                            <li><b>RETURN INVESTMENT</b></li>
                            <li class="plan-purchase"><a class="btn btn-primary" href="{{url('/register?cat=4')}}">SIGN UP</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#pricing--> 
 
 
 <section id="features">
        <div class="container">
            <div class="section-header">
               
<p style="font-family:georgia,garamond,serif; class="text-center wow fadeInDown">

CHECKERSFUNDS<br>Is  not a fly by night platform. We built this platform to LAST a very long time, borne out of the misery we have experienced with other donation platforms, so that members can continue to raise funds for their special needs and benefit along with their families for a very long time. Hence our admins are honest and actually Provide Help BEFORE Getting Help. Here are the three ways we are ensuing CHECKERSFUNDS will last long:
    Our commitment to LAST very LONG: We are aware that many P2P donation platforms do NOT last long due to greed and laxity of the admin team. Here's how we are different;</p><p style="font-family:georgia,garamond,serif; class="text-center wow fadeInDown"> 
1. We Provide Help ourselves BEFORE we Get Help.<br>
 <p style="font-family:georgia,garamond,serif; class="text-center wow fadeInDown">2. Your commitment for CHECKERSFUNDS to LAST very LONG: 80% of Success Depends on members, hence our 48-hour Recycle Timeline. To ensure CHECKERSFUNDS LASTS a very LONG time, re-donation is compulsory in 48 hours after receiving help. Failure to do this is automatic blocking of members account. Your IP, Bank Account Info, Phone Number is also BLOCKED. You can keep recycling your donations several times a day. No limit.</li></ul>
<p style="font-family:georgia,garamond,serif; class="text-center wow fadeInDown">IMPORTANT:<br> Please be aware that this website is strictly a donation platform as such DO NOT REGISTER UNTIL YOU CAN DONATE WITHIN 12 HOURS to the member assigned to you once you register. There are four different distinct investment categories: ₦10,000, ₦20,000, ₦50,000 and ₦100,000 plans. Failure to make donation within 5 hours closes up your account automatically and your phone number, username, IP address and account number BANNED from the system for life.


NEWS!!! Bigger donation plans of ₦200,000 and ₦500,000 plans are coming soon.<br>


</p><br>
<p style="font-family:georgia,garamond,serif; class="text-center wow fadeInDown">BE INFORMED:-<br>

<p style="font-family:georgia,garamond,serif; class="text-center wow fadeInDown">1.&nbsp;CHECKERS FUNDS  is not a bank, we  do not collect your money,  neither are we a business nor an online business, HYIP (High yield investment program), investment or MLM (Multi-level marketing) program. There are also no guarantees, no refunds hence kindly use only your spare cash.<br>

<p style="font-family:georgia,garamond,serif; class="text-center wow fadeInDown">2.&nbsp;There is no Central CHECKERS FUNDS Account where all the donations flow into. All the donations flow through the banking accounts of the members themselves and are final. We have ZERO-tolerance to fake proofs of payments and failure to re-donate after 48hrs. For any issues, kindly contact support.<br>

<p style="font-family:georgia,garamond,serif; class="text-center wow fadeInDown">3.&nbsp;Referring others is NOT compulsory to get help, but loyal members who want us to LAST very LONG to benefit in the long term would automatically refer.   This is your community service to us even though optional. The more people hear about us, the more donations you can receive and the LONGER your beloved platform LASTS.<br>

<p style="font-family:georgia,garamond,serif; class="text-center wow fadeInDown">4.&nbsp;Please be aware that this website is strictly a donation platform as such DO NOT REGISTER UNTIL YOU CAN DONATE WITHIN 12 HOURS to the member assigned to you once you register. There are four different distinct investment categories: ₦10,000, ₦20,000, ₦50,000 and ₦100,000 plans. Failure to make the donation within 12 hours, your account is BLOCKED automatically and your phone number, username, IP address and bank account details BANNED from the system for life.
<p style="font-family:georgia,garamond,serif; class="text-center wow fadeInDown">5.&nbsp;<b>WARNING:</b> There are NO guarantees and promises! Neither explicit nor implicit. CHECKERS FUNDS  is neither an investment nor a business! Members help each other, sending each other money directly and without intermediaries. That’s all! There's nothing more.
<p style="font-family:georgia,garamond,serif; class="text-center wow fadeInDown">6.&nbsp;Support makes no claims on how much money you can make on this platforms. Your ability to earn depends on a number of factors, including where and how (and how often) you advertise the program, and the motivation and entry of new members.
<p style="font-family:georgia,garamond,serif; class="text-center wow fadeInDown">7.&nbsp;Members understand that all payments will be made to you from other members, but in an event where the initial member to donate to you fails, a new member will be assigned to pay you.
<p style="font-family:georgia,garamond,serif; class="text-center wow fadeInDown">8.&nbsp;Do not Provide Help(PH) in this platform if you already have your money in the system you are yet to Get Help(GH). In the event that you are matched to pay and you decline on the grounds of existing PH in the system...you will be deleted from the platform which may result in a loss of your investments. Ensure you participate with spare money only.
<br>

<p style="font-family:georgia,garamond,serif; class="text-center wow fadeInDown">Thank you.<br>REMEMBER:<br> These measures are put in place to sustain the CHECKERS FUNDS  PLATFORM and serve you better.
Together we achieve greatness!!!<br>

Thanks.To your Success,<br>
CHECKERSFUNDS  Admin Team</p> 

            </div>
            <div class="row">               
                <div class="col-md-6">
                    <div class="media service-box wow fadeInRight">
                        <div class="imgs pull-left">
                          
                 </div>
                        
                    </div>
                    </div>
<div class="col-md-6">
                    <div class="media service-box wow fadeInRight">
                        <div class="imgs pull-left">
                         
                        </div>
                       
                    </div>
                    </div> 
                    </div>
        </div>
    </section>
<br><br><br><br>
 <section id="services">


 
 
 
                                                     
 <center><h1>CONTACT US</h1><br>
 </center><br>
 <div class="row">
                <div class="col-sm-6 wow fadeInLeft">
                  <img class="img-responsive" src="{{asset('images/fame.jpg')}}"  alt="">
                </div>

                <div class="col-sm-6 wow fadeInRight">
                    <h4 class="column-title"><p style="font-family:georgia,garamond,serif;" > <b>SUPPORT</b></p></h4>
                    <P style="font-family:georgia,garamond,serif;">
<abbr>FAST SUPPORT RESPONSE<br>

For fast resolutions of the following:<b><ul> 
 
<LI>Fake POP (proof of payment)</li>
<li> Wrong phone numbers</li>
<li> Cyber BEGGARS</li>
<li> Non confirmation of payment and other issues...</li> </ul></b>

<abbr>For MEMBERS ONLY, send a mail to contactcheckersfunds@gmail.com:</abbr><br><b><ol>
<li> Your donation reference</li> <li>Full Names</li> <li>Username</li><li>Phone Number</li><li>WITH the details(name, email and phone number) of the erring member</li> <li> The issue in detail with a picture/screenshot where necessary.</li></b><br>

<abbr>For NON-members, contact us via email on contactsecurefunds@gmail.com.<br> 

<b>IMPORTANT</b>: Members please do ensure that you have received a transaction confirmation and an uploaded bank receipt before confirmation</abbr><br>

Thank you<br>
<b>CHECKERSFUNDS</b> Support Team</abbr>
</P>






            

          </div>


</div>
                    
                    
                    


 </div>
            </div>
        </div>
    </section><!--/#bottom-->
@endsection