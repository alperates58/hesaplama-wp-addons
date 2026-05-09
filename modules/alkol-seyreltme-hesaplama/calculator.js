function hcAlcoholDiluteHesapla() {
    const c1 = parseFloat(document.getElementById('hc-ad-current-deg').value) || 0;
    const v1 = parseFloat(document.getElementById('hc-ad-current-vol').value) || 0;
    const c2 = parseFloat(document.getElementById('hc-ad-target-deg').value) || 0;

    if (c2 >= c1 || c2 <= 0) {
        alert('Hedef derece mevcut dereceden küçük ve 0\'dan büyük olmalıdır.');
        return;
    }

    // V2 = (C1 * V1) / C2
    const v2 = (c1 * v1) / c2;
    const water = v2 - v1;

    document.getElementById('hc-res-ad-water').innerText = water.toFixed(3) + ' Litre';
    document.getElementById('hc-res-ad-total').innerText = v2.toFixed(3) + ' Litre';
    
    document.getElementById('hc-alcohol-dilute-result').classList.add('visible');
}
