var PhotoBitMap = new Image;

var Precedent = document.getElementById('LightBoxPrec');
var Suivant = document.getElementById('LightBoxSuiv');
var lbCalque = document.getElementById("LightBox");
var lbCadrePhoto = document.getElementById("LightBoxCadre");
var lbPhoto = document.getElementById("LightBoxPhoto");
var nums;
var Ratio, Largeur_Photo, Hauteur_Photo, Largeur_ecran, Hauteur_ecran;

// Chargement de l'url dans la grande photo, préparation des flèches Précédent et Suivant.
// l'affichage de la lightbox sera géré est asynchrone par l'événement Photo.onload
function BasculeGrandePhoto(num) {
  nums = num;
  var elt = zoomables[num];
  var gd = elt.getAttribute("grande");
  var compteur = document.getElementById("LightBoxCompteur");
  compteur.textContent = (nums + 1) + ' / ' + zoomables.length;

  var source = elt.src;
  if( gd != null ) {
    source = gd;
  }

  PhotoBitMap.src=source;
  extractIPTC(source);

  if(num > 0){
    Precedent.style.display = 'block';
  }
  else{
    Precedent.style.display = 'none';
  }
  if(num<zoomables.length-1){
    Suivant.style.display = 'block';
  }
  else{
    Suivant.style.display = 'none';
  }
}

function Pan(event) {
  let largeur_ecran = (window.innerWidth);
  let hauteur_ecran = (window.innerHeight);
  let pX = event.clientX;
  let pY = event.clientY;
  let ratioY = pY / hauteur_ecran;
  let ratioX = pX / largeur_ecran;
  let shiftY = (PhotoBitMap.height-hauteur_ecran)*ratioY;
  let shiftX = (PhotoBitMap.width-largeur_ecran)*ratioX;
  
  if(shiftX >= 0){
    lbCadrePhoto.style.left = (- shiftX) + 'px';
  }
  if(shiftY >= 0){
    lbCadrePhoto.style.top = (- shiftY) + 'px';
  }
};

function afficheTailleReduite(event) {
  lbPhoto.onmousedown = null;
  lbCadrePhoto.style.left = null;
  lbCadrePhoto.style.top = null;
    lbPhoto.classList.remove("tailleReelle");
    lbPhoto.classList.add("tailleReduite");
  lbPhoto.onclick = afficheTailleReelle;
  calculerTaillePhoto();

  event.stopPropagation();
}

function afficheTailleReelle(event) {
    lbPhoto.classList.remove("tailleReduite");
    lbPhoto.classList.add("tailleReelle");
    lbPhoto.onclick = afficheTailleReduite;

    lbCalque.onmousemove = Pan;
    lbPhoto.style.height = (PhotoBitMap.height) + "px";
    lbPhoto.style.width = (PhotoBitMap.width) + "px";

    event.stopPropagation();
}

function ReduireTaille(){
  if(PhotoBitMap.height > Hauteur_ecran){
    lbPhoto.classList.add("tailleReduite");
    lbPhoto.onclick = afficheTailleReelle;
    Hauteur_Photo=Hauteur_ecran;
    Largeur_Photo=Hauteur_Photo*Ratio;
    if(Largeur_Photo > Largeur_ecran){
      Largeur_Photo=Largeur_ecran;
      Hauteur_Photo=Largeur_Photo/Ratio;
    }
  }
  else if(PhotoBitMap.width > Largeur_ecran){
    lbPhoto.classList.add("tailleReduite");
    lbPhoto.onclick = afficheTailleReelle;
    Largeur_Photo=Largeur_ecran;
    Hauteur_Photo=Largeur_Photo/Ratio;
  }
}

function calculerTaillePhoto() {
  Largeur_ecran = (window.innerWidth)-20;
  Hauteur_ecran = (window.innerHeight)-20;
  lbPhoto.classList.remove("tailleReelle");
  lbPhoto.classList.remove("tailleReduite");
  lbCalque.onmousemove = null;
  lbPhoto.onclick = null;

  ReduireTaille();

  Precedent.style.height = Hauteur_Photo + "px";
  Suivant.style.height = Hauteur_Photo + "px";
  lbPhoto.style.height = Hauteur_Photo + "px";
  lbPhoto.style.width = Largeur_Photo + "px";
}

window.onresize = calculerTaillePhoto;

PhotoBitMap.onload = function(){
  Largeur_Photo = (PhotoBitMap.width);
  Hauteur_Photo = (PhotoBitMap.height);
  Ratio = PhotoBitMap.width/PhotoBitMap.height;
  calculerTaillePhoto();
  lbPhoto.style.backgroundImage  = "url('" + PhotoBitMap.src + "')";
  lbCalque.style.display = "flex";
  
  lbPhoto.onmousedown = null;
  lbCadrePhoto.style.left = null;
  lbCadrePhoto.style.top = null;
}

let zoomables = document.getElementsByClassName('zoomable');
var i = 0;
for(var element of zoomables){
	element.setAttribute("nums", i);
	element.addEventListener('click', function (){
		strNums = this.getAttribute("nums");
		BasculeGrandePhoto(eval(strNums));
	}.bind(element));
	++i;
}

function FermerGrandePhoto() {
  if(lbPhoto.classList.contains("Pan")){
    lbPhoto.classList.remove("Pan");
    lbPhoto.onclick = afficheTailleReduite;
    return false;
  }
  if(lbCalque != null) lbCalque.style.display = 'none';
}
