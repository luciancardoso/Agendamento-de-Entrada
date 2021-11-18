//var url = "http://localhost:1888/",
//    outra = "valor em outra contantes";

var url = location.href; //pega endereço que esta no navegador
url = url.split("/"); //quebra o endeço de acordo com a / (barra)
url = "http://" + url[2] + "/aduana/"; // retorna a parte www.endereco.com.br