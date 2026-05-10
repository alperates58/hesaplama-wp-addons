function hcWthrHesapla() {
    const waist = parseFloat(document.getElementById('hc-wthr-waist').value);
    const height = parseFloat(document.getElementById('hc-wthr-height').value);

    if (!waist || !height) return;

    const ratio = waist / height;
    const resVal = document.getElementById('hc-wthr-res-val');
    const resDesc = document.getElementById('hc-wthr-res-desc');

    resVal.innerText = ratio.toFixed(2).toLocaleString('tr-TR');

    if (ratio <= 0.42) { resDesc.innerText = 'Zayıf (Düşük Risk)'; resDesc.style.color = '#3498db'; }
    else if (ratio <= 0.52) { resDesc.innerText = 'Sağlıklı / İdeal'; resDesc.style.color = '#27ae60'; }
    else if (ratio <= 0.57) { resDesc.innerText = 'Dikkat: Belirgin Yağlanma'; resDesc.style.color = '#f1c40f'; }
    else { resDesc.innerText = 'Yüksek Risk (Merkezi Obezite)'; resDesc.style.color = '#e74c3c'; }

    document.getElementById('hc-wthr-result').classList.add('visible');
}
