function hcVkiGencHesapla() {
    const height = parseFloat(document.getElementById('hc-vkg-height').value) / 100;
    const weight = parseFloat(document.getElementById('hc-vkg-weight').value);

    if (!height || !weight) return;

    const vki = weight / (height * height);
    const resVal = document.getElementById('hc-vkg-res-val');
    const resDesc = document.getElementById('hc-vkg-res-desc');

    resVal.innerText = vki.toFixed(1).toLocaleString('tr-TR');

    if (vki < 19) resDesc.innerText = 'Zayıf';
    else if (vki < 26) resDesc.innerText = 'İdeal';
    else if (vki < 30) resDesc.innerText = 'Kilolu';
    else resDesc.innerText = 'Obezite';

    document.getElementById('hc-vki-genc-result').classList.add('visible');
}
