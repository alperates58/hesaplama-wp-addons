function hcWbNormHesapla() {
    const target = parseFloat(document.getElementById('hc-wn-target').value);
    const control = parseFloat(document.getElementById('hc-wn-control').value);

    if (isNaN(target) || !control) {
        alert('Lütfen yoğunluk değerlerini giriniz.');
        return;
    }

    const normalized = target / control;

    const resVal = document.getElementById('hc-wn-res-val');
    resVal.innerText = normalized.toFixed(4).toLocaleString('tr-TR');

    document.getElementById('hc-wb-norm-result').classList.add('visible');
}
