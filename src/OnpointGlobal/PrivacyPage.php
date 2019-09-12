<?php


namespace OnpointGlobal;


class PrivacyPage
{
    /**
     * Privacy page options
     *
     * @link https://developer.wordpress.org/themes/basics/theme-functions/
     * @author Henry Rojas Douglas
     * @version 1.0.0
     * @package Majestic_Elephant
     * @license OnPoint Global
     * @copyright OnPoint Global
     */
    public function __construct() {
        add_action('admin_init', array( $this, 'privacy_page_creation' ));
    }
    /**
     * Creates privacy policy, terms of use and marketing partners
     * action "admin_init"
     * Ayuco: addition 2019-02-13 09:34 pm
     * @since 1.0.0
     */
    function privacy_page_creation()
    {
        $privacy_page_id = get_option( 'wp_page_for_privacy_policy' );
        $onpoint_privacy_page = get_option( 'onpoint_privacy_page', false );
        if ( $onpoint_privacy_page || $privacy_page_id )
            return;
        $privacy_page = get_post( $privacy_page_id );
        if ( $privacy_page ) {
            $privacy_page = wp_update_post( [
                'ID'            => $privacy_page->ID,
                'post_content'  => privacy_page_content(),
                'post_status'   => 'publish',
            ] );
        } else {
            $privacy_page = wp_insert_post( [
                'post_title'    => 'Privacy Policy',
                'post_type'     => 'page',
                'post_status'   => 'publish',
                'post_content'  => $this->privacy_page_content(),
            ] );
        }
        update_option( 'onpoint_privacy_page', $privacy_page, 'yes' );
    }

    /**
     * Creates privacy policy, terms of use and marketing partners
     * @since 1.0.0
     * @return String
     */
    function privacy_page_content()
    {
        $site_url = str_replace( ['http://', 'https://', 'staging.'], '', site_url() );
        ob_start()
        ?>
        <p>
            <?= $site_url ?> (“Company” “we” or “our”) is committed to advising you of the right to your privacy, and strives to provide a safe and secure user experience. This Privacy Policy explains how we collect, store and use personal information provided by you on our Website. It also explains how we collect and use non-personal information. By accessing and using our Website, you explicitly accept, without limitation or qualification, the collection, use and transfer of the personal information and non-personal information in the manner described in this Privacy Policy. Please read this Policy carefully, as it affects your rights and liabilities under the law. If you disagree with the way we collect and process personal and non-personal information, please do not use this Website.
        </p>
        <h3 class="page_title">
            Information We Collect.
        </h3>
        <p>
            We collect the following types of information about you when you visit and use our Website
        </p>
        <p>
            “Personal information” is information that can be used to identify you or any other individual to whom the information may relate. This is information which you are prompted to provide to us. Such information may include your name, address, telephone number(s), mobile numbers and email address, or other unique information about you which you provide to us during the registration process, or through the course of communicating with us about the products and services provided on our Website.
        </p>
        <p>
            “Demographic information” is information that may or may not be unique to you in the sense that it refers to selected population characteristics. Such information may include, but is not limited to, zip code, mobile phone carrier, age, gender, salary range, education and marital status, occupation, industry of employment, personal and online interests.
        </p>
        <p>
            “Behavioral information” is information which is automatically collected pertaining to how you use our Website, the areas of our Website that you visit, what services you access, and information about your computer hardware and software, including your IP address, geographic location, browser preference, operating system type, domain names, times that you access the internet, and other websites you have visited.
        </p>
        <p>
            “Third party collected information” is information about you that we acquire from a third party which may include personal, demographic, behavioral and indirect information. This collection may include, but not limited to, first party cookies, third party cookies, anonymous cookies, persistent identifiers, email opt in, and search engine keywords. We have no access or control over these cookies and other tracking devices used by data aggregators, third party advertisers and third party networks. We have no responsibility or liability for the policies and practices of these parties.
        </p>
        <p>
            “Web technology information” is information we automatically collect from you when you visit our Website. This includes internet protocol (IP) addresses, browser type, internet service provider (ISP), referring/exit pages, operating system, date/time stamp, and/or clickstream data. This information is collected from the use of cookies, Web beacons or JavaScript. This also includes information which is contained within the autofill functionality of your browser. This information may include Personal and Non-Personal Information.
        </p>
        <p>
            <i>No Information Collected from Children</i>. We will never knowingly collect any Personal Information from children under the age of 13. If we obtain actual knowledge that we have collected Personal Information about a child under the age of 13, that information will be immediately deleted from our database. Because we do not collect such information, we have no such information to use or to disclose to third parties.
        </p>
        <h3 class="page_title">
            <u>Cookies, Web Beacons, and JavaScript.</u>
        </h3>
        <p>
            Generally, we as well as third party vendors and supporting advertisers use technologies such as cookies, web beacons, and java scripts to collect information. These technologies collect internet protocol (IP) addresses, browser type, internet service provider (ISP), referring/exit pages, operating system, date/time stamp, and/or clickstream data. This information is used to analyze trends, administer our Website, track user's movements through our Website and gather demographic information about our user base as a whole. We may receive reports based on these technologies on an individual or aggregated basis
        </p>
        <p>
            “Cookies” are a feature in your browser software. If enabled, cookies store small amounts of data on your computer about actions you take on the pages of our Website including the placement of identifiers. Cookies assist us in tracking which of our features you visit most often, and what content you viewed on past visits. When you visit this Website again, cookies allow us to remember you’re your settings and may be used for authentication.  We may use cookies to keep track of the number of return visits, accumulate and aggregate statistical information generally pertaining to our Website, and deliver specific content to you based on your past viewing history. You can disable cookies, although our Website may not function properly for you. Your browser preferences can be modified to accept or reject all cookies, or request a notification when a cookie is set. You may read more about cookies at http://cookiecentral.com. In order to use all of the features and functionality of our Website, you need to accept cookies.
        </p>
        <p style="margin-left: 50px;">
            <u>Third Party Cookies</u>. We allow third party vendors and advertisers to set their own cookies on and through our Website. We have no control over the practices of those third parties and are not responsible for their technology or tracking.  We encourage you to review the policies of such persons or entities on their websites. We use AdWords Remarketing through Google which is a Remarketing and Behavioral Targeting service provided by Google Inc. that connects the activity on our Website with the AdWords advertising network and the DoubleClick cookie. That Cookie collects information regarding certain patterns in your browsing history. To opt-out of this tracking, please see https://support.google.com/ads/answer/2662922?hl=en. We also participate in all of Google Analytics Advertising . This includes (i) Remarketing with Google Analytics; (ii) Google Display Network Impression Reporting; (iii) DoubleClick Campaign Manager integration; and (iv) Google Analytics Demographics and Interest Reporting. Google uses cookies to track activity performed by Google Analytics and its AdWords or DoubleClick cookie. To opt-out please see https://tools.google.com/dlpage/gaoptout/. We also use Google Analytics which is an analysis service also provided by Google Inc. Google utilizes the data collected through its cookies to track and examine the use of this site, to prepare reports on its activities, and to share them with other Google services. You may opt-out of the Google Analytics service using Google’s Browser Add-available at https://tools.google.com/dlpage/gaoptout/.
        </p>
        <p style="margin-left: 50px;">
            <u>Social Media Cookies/Plug-ins</u>. Plug-ins for social media including Facebook, Twitter, LinkedIn, Yahoo, Windows and Google Plus are integrated on our Website. By interacting with us through a social media plug-in, certain information will be transmitted to the social network and you permit us to have continued access to information from your profile. Social media features are either hosted by a third party or hosted directly on our Website. Your interactions with these features are governed by the privacy policy of the company providing it.
        </p>
        <p>
            <u>Web Beacons</u>. We use electronic images known as Web Beacons (sometimes called single-pixel gifs, clear gifs or action tags) which allow us to collect information about your visit to our Website, measure and improve the effectiveness of advertisements and track delivery of advertising. Web Beacons collect only a limited set of information including a cookie number, time and date of page view, as well as a description of the page on which the Web Beacon resides. We may also use Web beacons in email messages sent to you. This allows us to determine if you opened or acted upon the email messages. Because Web beacons are the same as any other content request, you cannot opt out or refuse them. However, they can be rendered ineffective by either opting out of cookies or changing the cookie setup in your browser.
        </p>
        <p>
            <u>JavaScript</u>. We may also use JavaScript. JavaScript is a computer language that enhances the functionality of websites, particularly with respect to pictures. We use it to analyze and improve our Website’s functions. You may deactivate JavaScript through your browser settings or activate it the same way. If you disable JavaScript, you will not be able to use some of the functions of our Website.
        </p>
        <p>
            <u>Proprietary Auto-Fill Tracking</u>. At times, we use third party vendors who have technology which collects information held in your browser’s auto-fill functionality This collection allows them to notify you of an error in the registration or a failure to submit the registration. You can stop this functionality by turning it off in your browser. There is no loss of use of our Website or services should this browser function be turned off.
        </p>
        <h3 class="page_title">
            <u>How We Use Information Collected.</u>
        </h3>
        <p>
            Providing Services and Products. We use the information we gather on our Website to provide you with the services and or products you have requested from third parties. After visiting one of our client’s websites, we use the information we have collected during your visit to send you an email to complete your registration or provide you with additional offers that may be of interest to you. This may include passing your information on to a third party to provide such services or products. Although our contractual arrangement limits how this party can use your information, we do not control the privacy practices of third parties. If you have any questions or wish to remove your information from the third party databases, you will need to contact that party directly.
        </p>
        <p>
            <u>Improving Our Website</u>. We use the information we gather to respond to any inquires you make, operate and improve the functionality of our Website, and deliver the products and services advertised on our Website. Our services include the display of personalized products, content, and advertising, relating to your experience and interests.
        </p>
        <p>
            <u>Targeted Advertising</u>. Based on User Information, we may customize and target advertising to an individual. In our discretion, we may combine information to target advertising to an individual on the Site, in email and/or through direct mail. Such advertising may be different to the products or services offered or promoted on our Website.
        </p>
        <p>
            <u>Commercial Email</u>. We may use your email address to promote goods and services of third parties that may be of interest to you and these may be different than the products or services offered or promoted on the Site.
        </p>
        <p>
            <u>Direct Mail</u>. We may use User Information to advertise, directly or indirectly to individuals using postal mail.
        </p>
        <h3 class="page_title">
            <u>We Share Your Information.</u>
        </h3>
        <p>
            We will share your personal information with third parties in the following ways:.
        </p>
        <p>
            <u>Product and Service Delivery</u>. We share your personal information with third parties who help us in the delivery of the products and services you have requested.
        </p>
        <p>
            <u>Website Functionality</u>. We share your Personal and Non-Personal information with companies and individuals we employ to perform technical functions on our behalf. Examples include third parties who host our Website, analyze our data, provide marketing assistance, process credit card payments, and provide customer service.
        </p>
        <p>
            <u>Third Party Products and Services</u>. We share your Personal and Non Personal Information with third parties who will provide you with their opportunities, products or services. This includes your personal and non-personal information, and includes your interests and preferences, so they may determine whether you might be interested in their products or services.
        </p>
        <p>
            <u>Anonymous information</u>. We share aggregated anonymous information about you, combined with other persons using our Website with third parties, so that they can understand the kinds of visitors that come to our Website, and how those visitors use our Website. This includes demographic information and behavioral information.
        </p>
        <p>
            <u>Legal Process</u>. We disclose and share your information if legally required to do so, or at our discretion, pursuant to a request from a governmental entity, or if we believe in good faith that such action is necessary to (a) conform to legal requirements or comply with legal process; (b) protect our rights or property, or our affiliated companies; (c) prevent a crime or protect national security; or (d) protect the personal safety of users or the public.
        </p>
        <p>
            <u>Acquisition or Merger</u>. We may disclose and transfer your information to a third party who acquires any or all of our business, whether such acquisition is by way of merger, consolidation or purchase of all or a substantial portion of our assets. In the event we become the subject of an insolvency proceeding, whether voluntary or involuntary, we or our liquidator, administrator, receiver or administrative receiver may sell, license or otherwise dispose of, such information in a transaction approved by the court.
        </p>
        <h3 class="page_title">
            <u>Third Party Collection and Use of Information.</u>
        </h3>
        <p>
            Third Parties collect and use information about you on or through our Website in the following ways:
        </p>
        <p>
            <u>Service Providers and Advertisers</u>. Service Providers of the service or product you have requested, Advertising agencies, advertising networks, and other companies who place ads on our Website, may use their own cookies, Web beacons, and other technology, to collect information about you. We do not control the use of such technology and have no responsibility for the use of such technology to gather information about you.
        </p>
        <p>
            <u>Hyperlinks</u>. Our Website and email messages sometimes contain hypertext links to Websites owned by third parties. We are not responsible for the privacy practices or the content of such other Websites. These links are provided for your convenience and reference only. We do not operate or control any information, software, products or services, available on these third party Websites. The inclusion of a link on our Website does not imply any endorsement of the services, products or website, or its sponsoring organization.
        </p>
        <p>
            <u>Analytics</u>. As described above, we use third parties to monitor analyze and report on the traffic to, from and within our Website and email messages.
        </p>
        <p>
            <u>Disclaimer</u>.  We do not control the collection and use of any information collected by Third Parties.  Please review their policies and terms before providing any information.
        </p>
        <h3 class="page_title">
            <u>Information Security and Retention.</u>
        </h3>
        <p>
            We use industry standard precautions to safeguard your personal Information from loss, theft and misuse including unauthorized access, disclosure, alteration and destruction. These precautions are technical, physical and managerial. We have security measures in place to protect against the loss, misuse, and alteration of personal information under our control. The servers in which we store your information are kept in a secure physical environment. The servers have industry standard firewalls. Access to such servers is password protected and access by our employees is limited. Currently, we use Secure Socket Layer software ("SSL") to protect data and to secure any transactions. SSL encrypts information including credit card number(s), and names and addresses, as they are transmitted over the Internet. Please be advised that, although we take commercially reasonable technological precautions to protect your data, no data transmission over the Internet can be guaranteed to be 100% secure from improper actions of third parties not under our control; therefore, we cannot and do not warrant that your information will be absolutely secure. Any transmission of information through our Website or through email communications is at your own risk.
        </p>
        <p>
            We retain Personal Information for the time necessary to fulfill the purpose for which you provided the information and retain it thereafter for a period permitted by law. We retain Non-Personal Information indefinitely as the same is used by us for any proper purpose, including but not limited to analysis, development and improvement of our Website, services and products.
        </p>
        <h3 class="page_title">
            <u>Changes to Privacy Policy.</u>
        </h3>
        <p>
            8.1. We reserve the right to make material changes to the substance of this Privacy Policy. We will post those changes through a prominent notice on the Website, so that you will always know what information we gather, how we might use that information, and to whom we will disclose it.
        </p>
        <h3 class="page_title">
            <u>California Resident Rights.</u>
        </h3>
        <p>
            California residents have the right to receive, once a year, information about third parties with whom we have shared information about you or your family for their marketing purposes during the previous calendar year, and a description of the categories of personal information shared. In addition, California residents have the right to know if we respond to do not track signals or cookies. We do not respond to such signals or cookies.
        </p>
        <p>
            As stated in this Policy, you have agreed to allow us to share information with third parties for their direct marketing purposes until you remove your information; and thus, you have agreed to this disclosure. California customers may request further information about our compliance with this law ore request that no personally identifiable information be shared by sending us an email at <?= get_bloginfo( 'admin_email' ) ?>. Please note that we are only required to respond to one request per customer each year, and we are not required to respond to requests made by means other than through this email address.
        </p>
        <h3 class="page_title">
            <u>GDPR and CASL Compliance.</u>
        </h3>
        <p>
            Unfortunately, we are not in a position to accept clients who are not U.S. Citizens.  The CASL and GDPR regulations, in particular, provide certain rights to their citizens which are not the same as the United States.  For this reason, we do not accept referrals from any citizen outside the United States.  Our services are specifically designed for United States citizens.  We have expunged all European Union Member and Canadian Citizens data to the extent we have been made aware of the same. If you are a European Union Member, Canadian or any country outside of the United States citizen, please notify us at <?= get_bloginfo( 'admin_email' ) ?> and we will remove and destroy your Personal Information.
        </p>
        <h3 class="page_title">
            <u>CONTACT US</u>
        </h3>
        <p>
            If you have any questions regarding this Privacy Policy, please contact: <?= get_bloginfo( 'admin_email' ) ?><br>
            Revised Posting Date:  [privacy_current_day]
        </p>
        <?php
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
}
