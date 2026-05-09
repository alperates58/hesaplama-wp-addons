function hcDOHesapla() {
    const vTit = parseFloat(document.getElementById('hc-do-v-tit').value);
    const nTit = parseFloat(document.getElementById('hc-do-n-tit').value);
    const vSam = parseFloat(document.getElementById('hc-do-v-sam').value);

    if (isNaN(vTit) || isNaN(nTit) || isNaN(vSam)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    if (vSam === 0) {
        alert('Numune hacmi 0 olamaz.');
        return;
    }

    // mg/L DO = (V_tit * N_tit * 8000) / V_sam
    const doi = (vTit * nTit * 8000) / vSam;

    document.getElementById('hc-do-val').innerText = doi.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' mg/L';
    document.getElementById('hc-do-result').classList.add('visible');
}
