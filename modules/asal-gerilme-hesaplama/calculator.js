function hcAsalGerilmeHesapla() {
    const sx = parseFloat(document.getElementById('hc-st-sigx').value) || 0;
    const sy = parseFloat(document.getElementById('hc-st-sigy').value) || 0;
    const txy = parseFloat(document.getElementById('hc-st-tauxy').value) || 0;

    // Mohr dairesi formülleri
    const merkez = (sx + sy) / 2;
    const yaricap = Math.sqrt(Math.pow((sx - sy) / 2, 2) + Math.pow(txy, 2));

    const s1 = merkez + yaricap;
    const s2 = merkez - yaricap;
    const tmax = yaricap;

    const sonucDiv = document.getElementById('hc-stress-result');
    document.getElementById('hc-st-res-s1').innerText = s1.toLocaleString('tr-TR', {maximumFractionDigits: 3}) + ' MPa';
    document.getElementById('hc-st-res-s2').innerText = s2.toLocaleString('tr-TR', {maximumFractionDigits: 3}) + ' MPa';
    document.getElementById('hc-st-res-tmax').innerText = tmax.toLocaleString('tr-TR', {maximumFractionDigits: 3}) + ' MPa';
    
    const noteDiv = document.getElementById('hc-st-res-note');
    noteDiv.innerText = `Merkez Gerilme: ${merkez.toFixed(2).toLocaleString('tr-TR')} MPa.`;

    sonucDiv.classList.add('visible');
}
