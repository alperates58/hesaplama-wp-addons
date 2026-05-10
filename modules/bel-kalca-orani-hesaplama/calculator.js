function hcWhrHesapla() {
    const gender = document.getElementById('hc-whr-gender').value;
    const waist = parseFloat(document.getElementById('hc-whr-waist').value);
    const hip = parseFloat(document.getElementById('hc-whr-hip').value);

    if (!waist || !hip) return;

    const ratio = waist / hip;
    const resVal = document.getElementById('hc-whr-res-val');
    const resDesc = document.getElementById('hc-whr-res-desc');

    resVal.innerText = ratio.toFixed(2).toLocaleString('tr-TR');

    if (gender === 'male') {
        if (ratio < 0.9) { resDesc.innerText = 'Düşük Sağlık Riski'; resDesc.style.color = '#27ae60'; }
        else if (ratio < 1.0) { resDesc.innerText = 'Orta Sağlık Riski'; resDesc.style.color = '#f1c40f'; }
        else { resDesc.innerText = 'Yüksek Sağlık Riski'; resDesc.style.color = '#e74c3c'; }
    } else {
        if (ratio < 0.8) { resDesc.innerText = 'Düşük Sağlık Riski'; resDesc.style.color = '#27ae60'; }
        else if (ratio < 0.85) { resDesc.innerText = 'Orta Sağlık Riski'; resDesc.style.color = '#f1c40f'; }
        else { resDesc.innerText = 'Yüksek Sağlık Riski'; resDesc.style.color = '#e74c3c'; }
    }

    document.getElementById('hc-whr-result').classList.add('visible');
}
