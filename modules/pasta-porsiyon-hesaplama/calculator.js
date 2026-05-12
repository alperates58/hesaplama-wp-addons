function hcCakeShapeChange() {
    const shape = document.getElementById('hc-cp-shape').value;
    document.getElementById('hc-cp-round-inputs').style.display = (shape === 'round') ? 'block' : 'none';
    document.getElementById('hc-cp-square-inputs').style.display = (shape === 'square') ? 'block' : 'none';
}

function hcPastaPorsiyonHesapla() {
    const shape = document.getElementById('hc-cp-shape').value;
    let area = 0;

    if (shape === 'round') {
        const d = parseFloat(document.getElementById('hc-cp-diameter').value);
        if (!d) return;
        area = Math.PI * Math.pow(d/2, 2);
    } else {
        const l = parseFloat(document.getElementById('hc-cp-length').value);
        const w = parseFloat(document.getElementById('hc-cp-width').value);
        if (!l || !w) return;
        area = l * w;
    }

    // Party portion: ~25 cm2 (wedding/event)
    // Dessert portion: ~35-40 cm2 (cafe)
    const party = area / 25;
    const dessert = area / 40;

    const resultDiv = document.getElementById('hc-cake-portion-result');
    document.getElementById('hc-cp-res-val').innerText = Math.round(dessert) + ' - ' + Math.round(party) + ' Kişilik';
    
    resultDiv.classList.add('visible');
}
