<script type="text/javascript" src="//libs.coremetrics.com/eluminate.js"></script>
<script type="text/javascript">
    var thisUrl = window.location.host;
    var domainPart = thisUrl; // this chops off host portion if its there
    if (domainPart.split(".").length > 2)
    {
        domainPart = domainPart.split(".")[1] + "." + domainPart.split(".")[2];
    }
    var clientIDGivenEnvironment = "60226174"; // QA
    if (domainPart.toUpperCase().indexOf("TUAMICA.COM") > -1)
    {
        clientIDGivenEnvironment = "90226174"; // PROD
    }
    var cmPageName = thisUrl; // ex 'broad.amicacoverage.com' with full hostname
    var cmCategory = 'Microsites';
    //console.log("cmPageName " + cmPageName);
    //console.log("domainPart " + domainPart);
    //console.log("clientIDGivenEnvironment " + clientIDGivenEnvironment);
    function setCoremetricsClient() {
        var ADC_PROD_CLIENT_ID = clientIDGivenEnvironment; //Amica.com Production
        var PROD_CM_DOMAIN = "data.coremetrics.com"; //Production Domain
        var clientID = ADC_PROD_CLIENT_ID;
        var collectionDomain = PROD_CM_DOMAIN;
        var clientManaged = true;
        var cookieDomain = domainPart;
        cmSetClientID(clientID, clientManaged, collectionDomain, cookieDomain);
    }
    setCoremetricsClient();
</script>
