function hcWaistRiskHesapla() {
    const gender = document.querySelector('input[name="hc-wr-gender"]:checked').value;
    const waist = parseFloat(document.getElementById('hc-wr-waist').value);

    if (!waist) return;

    const resTitle = document.getElementById('hc-wr-res-title');
    const resDesc = document.getElementById('hc-wr-res-desc');

    if (gender === 'male') {
        if (waist < 94) {
            resTitle.innerText = 'Düşük Risk';
            resTitle.style.color = '#27ae60';
            resDesc.innerText = 'Sağlıklı sınırlar içindesiniz.';
        } else if (waist < 102) {
            resTitle.innerText = 'Artmış Risk';
            resTitle.style.color = '#f1c40f';
            resDesc.innerText = 'Kalp ve damar hastalıkları riski artmaya başlamıştır.';
        } else {
            resTitle.innerText = 'Yüksek Risk';
            resTitle.style.color = '#e74c3c';
            resDesc.innerText = 'Ciddi metabolik risk altındasınız. Kilo kontrolü önerilir.';
        }
    } else {
        if (waist < 80) {
            resTitle.innerText = 'Düşük Risk';
            resTitle.style.color = '#27ae60';
            resDesc.innerText = 'Sağlıklı sınırlar içindesiniz.';
        } else if (waist < 88) {
            resTitle.innerText = 'Artmış Risk';
            resTitle.style.color = '#f1c40f';
            resDesc.innerText = 'Sağlık riskleri artmaya başlamıştır.';
        } else {
            resTitle.innerText = 'Yüksek Risk';
            resTitle.style.color = '#e74c3c';
            resDesc.innerText = 'Metabolik hastalıklar açısından yüksek risk grubundasınız.';
        }
    }

    document.getElementById('hc-waist-risk-result').classList.add('visible');
}
