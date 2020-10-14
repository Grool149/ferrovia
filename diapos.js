<!--
var Photo =new Image;
var prec, suiv, Grandephoto, CadrePhoto;

function AfficherGrandePhoto(num) {
prec = document.getElementById('prec-in');
suiv = document.getElementById('suiv-in');
Grandephoto = document.getElementById("Grandephoto");
CadrePhoto = document.getElementById("Photo");
document.getElementById('legende').innerHTML = Legendes[num];

Photo.src=Tableau[num];
  var numPrec = num - 1;
  var numSuiv = num + 1;
  if(num>0){
    prec.onclick = function() {AfficherGrandePhoto(numPrec)};
    prec.style.display = 'block';
  }
  else{
    prec.style.display = 'none';
  }
  if(num<NbImages){
    suiv.onclick=function() {AfficherGrandePhoto(numSuiv)};
    suiv.style.display = 'block';
  }
  else{
    suiv.style.display = 'none';
  }
}

function precOnmouveover() {
  prec.style.backgroundColor = "rgba(0, 0, 0, 0.5)";
  prec.style.color = "rgba(255, 255, 255, 1)";
}

function precOnmouveout() {
  prec.style.backgroundColor = "rgba(0, 0, 0, 0)";
  prec.style.color = "rgba(255, 255, 255, 0)";
}

function suivOnmouveover() {
  suiv.style.backgroundColor = "rgba(0, 0, 0, 0.5)";
  suiv.style.color = "rgba(255, 255, 255, 1)";
}

function suivOnmouveout() {
  suiv.style.backgroundColor = "rgba(0, 0, 0, 0)";
  suiv.style.color = "rgba(255, 255, 255, 0)";
}

Photo.onload = function(){
  var largeur_Photo = (Photo.width);
  var hauteur_Photo = (Photo.height);
  var larg = (document.body.clientWidth);
  var haut = (window.innerHeight);
  if(haut<hauteur_Photo){
    hauteur_Photo=haut;
    largeur_Photo=hauteur_Photo*Photo.width/Photo.height;
  }  
  if(larg<largeur_Photo){
    largeur_Photo=larg;
    hauteur_Photo=largeur_Photo*Photo.height/Photo.width;
  }
  var MargTop = - 10 - (hauteur_Photo/2);
  var MargGau = - 10 - (largeur_Photo/2);
  prec.style.lineHeight = hauteur_Photo + "px";
  suiv.style.lineHeight = hauteur_Photo + "px";
  CadrePhoto.style.height = hauteur_Photo + "px";
  CadrePhoto.style.width = largeur_Photo + "px";
  CadrePhoto.style.backgroundImage  = "url('" + Photo.src + "')"; 
  Grandephoto.style.marginTop  = MargTop + "px";
  Grandephoto.style.marginLeft = MargGau + "px";
  Grandephoto.style.display = 'block';
  Grandephoto.style.width = largeur_Photo + "px";
}

function FermerGrandePhoto() {
    document.getElementById('Grandephoto').style.display = 'none';
}

//Affecte la nouvelle image lorsque la souris survole l'élément
function passageDeLaSouris(element, num) {
element.setAttribute('src', substr(Tableau[num],0,-4) & '_tbl.jpg');
}
//Affecte l'image de départ lorsque la souris ne survole plus l'élément
function departDeLaSouris(element, num) {
element.setAttribute('src', substr(Tableau[num],0,-4) & '_tb.jpg');
} 
//-->