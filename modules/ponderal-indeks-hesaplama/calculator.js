function hcPiHesapla() {
    const heightCm = parseFloat(document.getElementById('hc-pi-height').value);
    const weight = parseFloat(document.getElementById('hc-pi-weight').value);

    if (!heightCm || !weight) return;

    const heightM = heightCm / 100;
    // Rohrer's Ponderal Index: weight / height^3
    const pi = weight / Math.pow(heightM, 3);

    const resVal = document.getElementById('hc-pi-res-val');
    const resDesc = document.getElementById('hc-pi-res-desc');

    resVal.innerText = pi.toFixed(2).toLocaleString('tr-TR');

    if (pi < 11) { resDesc.innerText = 'Çok Zayıf'; resDesc.style.color = '#3498db'; }
    else if (pi <= 15) { resDesc.innerText = 'Normal'; resDesc.style.color = '#27ae60'; }
    else { resDesc.innerText = 'Kilolu'; resDesc.style.color = '#e74c3c'; }

    document.getElementById('hc-pi-result').classList.add('visible');
}
