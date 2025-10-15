<html>

<head>
    <title>RELATÓRIO | IDC</title>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-BCN2M0R3V6');
    </script>
    <style type="text/css">
        #wrapper {
            width: 100%;
            float: left;
            height: auto;
            border: 1px solid #5694cf;
        }
    </style>
</head>
<div id="wrapper">
    <object data="{{$report->getFile()}}" width="100%" height="100%">
        <p>Seu navegador não possui leitor de PDF embutido. Em vez disso, você pode <a
                href="http://partners.adobe.com/public/developer/en/acrobat/PDFOpenParameters.pdf"> Baixar esse
                documento e
                abri-lo em um leitor.</a></p>
    </object>
</div>

</html>
