function hcAtikSuBiyokutleHesapla() {
    const mlss = parseFloat(document.getElementById('hc-as-mlss').value);
    const vssFrac = parseFloat(document.getElementById('hc-as-vss-frac').value);
    const tankVol = parseFloat(document.getElementById('hc-as-tank-vol').value);

    if (isNaN(mlss) || isNaN(vssFrac) || isNaN(tankVol) || mlss <= 0 || vssFrac <= 0 || tankVol <= 0) {
        alert('Lütfen geçerli pozitif değerler giriniz.');
        return;
    }

    const mlvss = mlss * vssFrac;
    const totalBio = (mlvss * tankVol) / 1000; // kg

    document.getElementById('hc-as-mlvss').innerText = mlvss.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' mg/L';
    document.getElementById('hc-as-total-bio').innerText = totalBio.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kg';
    
    document.getElementById('hc-as-result').classList.add('visible');
}
