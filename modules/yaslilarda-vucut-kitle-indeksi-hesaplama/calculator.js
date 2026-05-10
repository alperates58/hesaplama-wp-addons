function hcVkiYasliHesapla() {
    const height = parseFloat(document.getElementById('hc-vky-height').value) / 100;
    const weight = parseFloat(document.getElementById('hc-vky-weight').value);

    if (!height || !weight) return;

    const vki = weight / (height * height);
    const resVal = document.getElementById('hc-vky-res-val');
    const resDesc = document.getElementById('hc-vky-res-desc');

    resVal.innerText = vki.toFixed(1).toLocaleString('tr-TR');

    if (vki < 23) {
        resDesc.innerText = 'Düşük Kilo (Yaşlılarda riskli)';
        resDesc.style.color = '#e67e22';
    } else if (vki <= 30) {
        resDesc.innerText = 'İdeal Aralık (Yaşlılık dönemi için sağlıklı)';
        resDesc.style.color = '#27ae60';
    } else {
        resDesc.innerText = 'Fazla Kilolu / Obezite';
        resDesc.style.color = '#e74c3c';
    }

    document.getElementById('hc-vki-yasli-result').classList.add('visible');
}
