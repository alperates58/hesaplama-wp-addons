function hcTransEffHesapla() {
    const positive = parseFloat(document.getElementById('hc-te-positive').value);
    const total = parseFloat(document.getElementById('hc-te-total').value);

    if (isNaN(positive) || !total) {
        alert('Lütfen hücre sayılarını giriniz.');
        return;
    }

    const efficiency = (positive / total) * 100;

    const resVal = document.getElementById('hc-te-res-val');
    resVal.innerText = efficiency.toFixed(1).toLocaleString('tr-TR');

    document.getElementById('hc-trans-eff-result').classList.add('visible');
}
