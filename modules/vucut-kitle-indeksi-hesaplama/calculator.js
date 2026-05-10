function hcVkiHesapla() {
    const height = parseFloat(document.getElementById('hc-vki-height').value) / 100;
    const weight = parseFloat(document.getElementById('hc-vki-weight').value);

    if (isNaN(height) || isNaN(weight) || height === 0) {
        alert('Lütfen boy ve kilo bilgilerini giriniz.');
        return;
    }

    const vki = weight / (height * height);
    const resVal = document.getElementById('hc-vki-res-val');
    const resDesc = document.getElementById('hc-vki-res-desc');

    resVal.innerText = vki.toFixed(1).toLocaleString('tr-TR');

    if (vki < 18.5) {
        resDesc.innerText = 'Zayıf';
        resDesc.style.color = '#3498db';
    } else if (vki < 25) {
        resDesc.innerText = 'Normal (İdeal)';
        resDesc.style.color = '#27ae60';
    } else if (vki < 30) {
        resDesc.innerText = 'Fazla Kilolu';
        resDesc.style.color = '#f1c40f';
    } else if (vki < 35) {
        resDesc.innerText = '1. Derece Obezite';
        resDesc.style.color = '#e67e22';
    } else {
        resDesc.innerText = '2. Derece veya İleri Obezite';
        resDesc.style.color = '#e74c3c';
    }

    document.getElementById('hc-vki-result').classList.add('visible');
}
