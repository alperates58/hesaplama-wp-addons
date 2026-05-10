function hcVkiKadinHesapla() {
    const height = parseFloat(document.getElementById('hc-vkk-height').value) / 100;
    const weight = parseFloat(document.getElementById('hc-vkk-weight').value);

    if (isNaN(height) || isNaN(weight) || height === 0) {
        alert('Lütfen boy ve kilo bilgilerini giriniz.');
        return;
    }

    const vki = weight / (height * height);
    const resVal = document.getElementById('hc-vkk-res-val');
    const resDesc = document.getElementById('hc-vkk-res-desc');

    resVal.innerText = vki.toFixed(1).toLocaleString('tr-TR');

    // Similar ranges to general BMI but with tailored descriptions
    if (vki < 18.5) {
        resDesc.innerText = 'Düşük Kilolu';
        resDesc.style.color = '#3498db';
    } else if (vki < 24) {
        resDesc.innerText = 'Sağlıklı / İdeal Kilo';
        resDesc.style.color = '#27ae60';
    } else if (vki < 29) {
        resDesc.innerText = 'Hafif Kilolu';
        resDesc.style.color = '#f1c40f';
    } else {
        resDesc.innerText = 'Fazla Kilolu / Obezite Riski';
        resDesc.style.color = '#e74c3c';
    }

    document.getElementById('hc-vki-kadin-result').classList.add('visible');
}
