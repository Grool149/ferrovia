// Operation JS IPTC

function getAPP13(arrayBuffer){
	const dataView = new DataView(arrayBuffer);
	let offset = 0;
	const long = arrayBuffer.byteLength;
	
	if(dataView.getUint16(offset) !== 0xFFD8){
		throw new Error('Pas un JPG');
	}
	offset += 2;
	
	while(offset < long){
		const marker = dataView.getUint16(offset);
		offset += 2;
		if(marker === 0xFFED){
			const segLong = dataView.getUint16(offset);
			offset += 2;

			const app13Seg = new Uint8Array(arrayBuffer, offset, segLong-2);
			return app13Seg;
		}
		const segLong = dataView.getUint16(offset);
		offset += segLong;
	}
	return null;
}

function parseIptcCaption(app13SegmentData) {
  if(!app13SegmentData) return null;
  const signature = new TextEncoder().encode('Photoshop 3.0\x00'); // 14-byte signature
  let offset = 0;

  // Photoshop signature
/*  if (!arraysEqual(app13SegmentData.subarray(0, signature.length), signature)) {
   // throw new Error('Invalid IPTC segment (missing Photoshop signature)');
   console.log("Pas content");
  }*/
  offset += signature.length;

  //8BIM Image Resource Block
  offset += 4;

  // IPTC-NAA record
  offset += 9;

  let CodedCharSetUTF8 = false;
  // IIM data
  while (offset < app13SegmentData.length) {
    // IIM tag header: 4 bytes (Directory: 1 byte, Tag: 1 byte, Type: 1 byte, Length: 1 byte)
    const directory = app13SegmentData[offset];
    const tag = app13SegmentData[offset + 1];
    const type = app13SegmentData[offset + 2];
    const dataLength = app13SegmentData[offset + 3];
    offset += 4;

    if (directory === 1 && tag === 90) {
        if(dataLength === 3 && app13SegmentData[offset] === 27 && app13SegmentData[offset+1] === 37 && app13SegmentData[offset+2] === 71){
            CodedCharSetUTF8 = true;
        }
    }
    // Champ IPTC Caption/Abstract (Directory 2, Tag 120)
    if (directory === 2 && tag === 120) {
      const captionBytes = app13SegmentData.subarray(offset, offset + dataLength);
      if(CodedCharSetUTF8){
          return new TextDecoder('utf-8').decode(captionBytes); //
      }
      return new TextDecoder('latin1').decode(captionBytes); // IPTC utilise Latin-1 par défaut
    }
    offset += (1+dataLength);
  }
  return null; // Champ vide
}

// 1. Charger l'image (URL ou Blob)
async function loadImage(url) {
  const response = await fetch(url, { mode: 'cors' }); // CORS requis si domaine différent
  const blob = await response.blob();                 // Blob de l'image
  return blob;
}

// 2. Convertir le Blob en ArrayBuffer
function blobToArrayBuffer(blob) {
  return new Promise((resolve, reject) => {
    const reader = new FileReader();
    reader.onload = () => resolve(reader.result); // result = ArrayBuffer
    reader.onerror = reject;
    reader.readAsArrayBuffer(blob);
  });
}

async function extractIPTC(cheminJPG){
    const imgBlob = await loadImage(cheminJPG);
    const arrayBuffer = await blobToArrayBuffer(imgBlob);

    const app13Segment = getAPP13(arrayBuffer);   
    const caption = parseIptcCaption(app13Segment);

    const legende = document.getElementById('LightBoxLegende');
    legende.textContent = caption || '';
}
