<meta charset="UTF-8">

<title>Painel - Sistema P&G</title>

<link rel="icon" href="../Assets/img/favicon.ico">

<!-- Bootstrap 4 -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!-- Fontawesome 5 -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

<!-- GoogleFonts - OpenSans -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

<style>
    /* body {
        margin: 0;
        background-color: #fff;
    }
    * {
      font-family: 'Open Sans', sans-serif;
    } */

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        margin: 0;
        padding: 0;
        font-family: "Trebuchet MS", Verdana, Helvetica, Sans-Serif;
        color: #696969;
    }

    h2{
        font-family: 'Open Sans', sans-serif;
    }
    
    .thead {
        background-color: #f7f7f7;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-size: 1.5em;
        color:  #727376;
    }

    h1 {
        font-size: 2em;
        padding-bottom: 0;
        margin-bottom: 0;
    }

    h2 {
        padding: 80px 0 10px 0;
    }

    /* header .logo {
        position: relative;
        margin: 0 36px;
    } */

    ul.nav {
        position: absolute;
        top: 55px;
        right: 70px;
        overflow: hidden;
    }

    ul.nav li {
        display: inline;
        margin: 0 0 0 16px;
        list-style: none;
        font-size: 1.5em;
    }

    ul.nav li a {
        text-decoration: none;
        color: #ccc;
    }

    ul.nav li a:hover {
        color: #fff;
        transition: color 400ms ease-out;
    }

    /* Estilização da Tabela --------
    --------------------------------*/

    table {
        border: solid 1px #e8eef4;
        border-collapse: collapse;
    }

    table td {
        padding: 5px;
        border: solid 1px #e8eef4;
    }

    table th {
        padding: 6px 5px;
        text-align: left;
        background-color: #e8eef4;
        border: solid 1px #e8eef4;
        color: #0c43d6;
    }

    header {
        display: block;
        background: #6495ED;
        padding: 20px;
    }

    .botoes {
        display: flex;
        margin: 0 25rem;
    }

    .botoes a {
        color: #fff;
        font-size: 1.1rem;
        font-weight: bold;
        text-decoration: none;
    }

    .button__entrada {
        border-radius: 30px;
        width: 150px;
        height: 40px;
        background-color: #0066ff;
        text-align: center;
        float: left;
        padding: 10px 5px 10px 10px;
        transition: .5s ease-in-out;
        cursor: pointer;
    }

    .button__saida {
        border-radius: 30px;
        width: 150px;
        height: 40px;
        margin-left: 12px;
        background-color: #ff3e3e;
        text-align: center;
        float: left;
        padding: 10px 5px 10px 10px;
        transition: .5s ease-in-out;
        cursor: pointer;
    }

    .button__entrada:hover {
        transform: scale(1.1);
        transition: .5s all;
    }

    .button__saida:hover {
        transform: scale(1.1);
    }

    /* Footer */

    .footer-distributed {
        background-color: #1a73e8; /* cor padrão #292c2f */
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.12);
        box-sizing: border-box;
        width: 100%;
        text-align: left;
        font: normal 16px sans-serif;
        padding: 45px 50px;
    }

    .footer-distributed .footer-left p {
        color: #ffffff; /* cor para fundo preto #8f9296*/
        font-size: 14px;
        margin: 0;
    }

    /* Footer links */
        
    .footer-distributed p.footer-links {
        font-size: 18px;
        font-weight: bold;
        color: #ffffff;
        margin: 0 0 10px;
        padding: 0;
        transition: ease .25s;
    }
        
    .footer-distributed p.footer-links a {
        display: inline-block;
        line-height: 1.8;
        text-decoration: none;
        color: inherit;
        transition: ease .25s;
    }
        
    .footer-distributed .footer-links a:before {
        content: "·";
        font-size: 20px;
        left: 0;
        color: #fff;
        display: inline-block;
        padding-right: 5px;
    }
        
    .footer-distributed .footer-links .link-1:before {
        content: none;
    }
        
    .footer-distributed .footer-right {
        float: right;
        margin-top: 6px;
        max-width: 180px;
    }
        
    .footer-distributed .footer-right a {
        display: inline-block;
        width: 35px;
        height: 35px;
        background-color: #33383b;
        border-radius: 2px;
        font-size: 20px;
        color: #ffffff;
        text-align: center;
        line-height: 35px;
        margin-left: 3px;
        transition:all .25s;
    }
        
    .footer-distributed .footer-right a:hover{transform:scale(1.1); -webkit-transform:scale(1.1);}
        
    .footer-distributed p.footer-links a:hover{text-decoration:underline;}
        
    /* Media Queries */
        
    @media (max-width: 600px) {
        .footer-distributed .footer-left, .footer-distributed .footer-right {
            text-align: center;
        }
        .footer-distributed .footer-right {
            float: none;
            margin: 0 auto 20px;
        }
        .footer-distributed .footer-left p.footer-links {
            line-height: 1.8;
        }
    }

    @media (max-width: 1199px) {
        .botoes {
            display: flex;
            margin: 0 18rem;
        }
    }

    @media (max-width: 991px) {
        .botoes {
            display: flex;
            margin: 0 12rem;
        }
    }

</style>