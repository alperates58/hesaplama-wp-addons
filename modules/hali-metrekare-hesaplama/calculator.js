function hcCarpetCalcHesapla() {
    const w = parseFloat(document.getElementById('hc-cc-width').value);
    const l = parseFloat(document.getElementById('hc-cc-length').value);
    const rollW = parseFloat(document.getElementById('hc-cc-roll').value);

    if (!w || !l) {
        alert('Lütfen oda ölçülerini giriniz.');
        return;
    }

    const netArea = w * l;
    
    // Carpet is sold by rolls. If roll is 4m wide, and room is 5m wide, we need 2 strips.
    // Simpler commercial approach: 
    const strips = Math.ceil(Math.min(w, l) / rollW);
    const totalArea = strips * rollW * Math.max(w, l);

    const resVal = document.getElementById('hc-cc-res-val');
    resVal.innerText = totalArea.toFixed(2).toLocaleString('tr-TR');

    const waste = totalArea - netArea;
    const resWaste = document.getElementById('hc-cc-res-waste');
    resWaste.innerText = `Net Alan: ${netArea.toFixed(2)} m² | Tahmini Fire: ${waste.toFixed(2)} m²`;

    document.getElementById('hc-carpet-calc-result').classList.add('visible');
}
