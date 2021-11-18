<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="Assets/img/favicon.ico">
    <title>Login</title>

    <link rel="stylesheet" href="Assets/css/style.css">

    <script src="Assets/js/script.js" defer></script>
    <script src="https://kit.fontawesome.com/61d00844fc.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="content first-content">
            <div class="first-column">
                <img src="Assets/img/logoAduana.png" width="310" height="110" alt="Logo da Aduana">
                <h2 class="title title-primary">Bem Vindo</h2>
                <p class="descricao descricao-primary">Para se manter conectado com a gente</p>
                <p class="descricao descricao-primary">por favor faça o login com suas informações pessoais</p>
                <!--<button id="signin" class="btn btn-primary">Criar Conta</button>-->
            </div>
            <div class="second-column">
                <h2 class="title title-second">Entrar no Sistema</h2>
                <!-- <div class="social-media">
                    <ul>
                        <li><a href="#">facebook</a></li>
                        <li><a href="#">google</a></li>
                        <li><a href="#">instagram</a></li>
                    </ul>
                </div> -->
                <p class="descricao descricao-second">Use o Usuário que a Equipe de T.I lhe forneceu</p>
        
                <form action="verificarLogin.php" method="POST" class="form">
                    <!-- <label class="label-input" for="">
                        <i class="fas fa-user-astronaut icones"></i>
                         <input type="text" placeholder="Nome" required>
                    </label> -->

                    <label class="label-input" for="usuario">
                        <i class="fas fa-user-astronaut icones"></i>
                        <!-- <i class="far fa-envelope icones"></i> -->
                         <input type="text" placeholder="Usuário" id="usuario" name="usuario" required>
                         <span class="error"></span>
                    </label>

                    <label class="label-input" for="senha">
                        <i class="fas fa-lock icones"></i>
                         <input type="password" placeholder="Insira sua senha" id="senha" name="senha" required>
                         <span class="error"></span>
                    </label>

                    <a class="password" href="#">Esqueceu sua senha ?</a>

                    <!-- <input class="btn btn-second" type="submit" name="submit" value="Enviar"> -->
                    <button type="submit" name="submit" class="btn btn-second">Login</button>
                </form>
            </div>
        </div>

        
        <!--<div class="content second-content">
            <div class="first-column">
                <h2 class="title title-primary">Olá Cliente</h2>
                <p class="descricao descricao-primary">Insira seus dados pessoais</p>
                <p class="descricao descricao-primary">e comece a jornada conosco</p>
                <p class="descricao descricao-primary">Caso não tenha, faça agora mesmo um cadastro.</p>
                <button id="signup" class="btn btn-primary">Login</button>
            </div>
            <div class="second-column">
                <h2 class="title title-second">Cadastro</h2>
                 <div class="social-media">
                    <ul>
                        <li><a href="#">facebook</a></li>
                        <li><a href="#">google</a></li>
                        <li><a href="#">instagram</a></li>
                    </ul>
                </div>
                
                <p class="descricao descricao-second">Já tem uma Conta Aduana? faça o login:</p>
        
                <form action="" class="form">

                    <label class="label-input" for="">
                        <i class="fas fa-user-astronaut icones"></i>
                         <input type="text" placeholder="Nome" required>
                    </label>

                    <div class="label-input sexo">
                        <p class="descricao-second">Sexo:</p>
                        <label for="feminino">Feminino
                            <input type="radio" id="feminino" name="genero" value="feminino" required>
                        </label>
                        
                        <label for="masculino">Masculino 
                        <input type="radio" name="genero" id="masculino" value="masculino" required>
                        </label>
                    </div>

                    <label class="label-input" for="">
                        <i class="far fa-envelope icones"></i>
                         <input type="email" placeholder="Email" required>
                    </label>

                    <label class="label-input" for="">
                        <i class="fas fa-lock icones"></i>
                         <input type="password" placeholder="Insira sua senha" required>
                    </label>

                    <a class="password" href="#">Esqueceu sua senha ?</a>
                    <button type="submit" class="btn btn-second">Criar Conta</button>
                </form>
            </div>
        </div>-->

    </div>

    <script src="Assets/js/app.js"></script>
</body>
</html>