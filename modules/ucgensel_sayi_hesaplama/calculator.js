function hcTriNumHesapla() {
    const n = parseInt(document.getElementById('hc-tn-n').value);

    if (isNaN(n) || n < 1) {
        alert('Lütfen pozitif bir tam sayı giriniz.');
        return;
    }

    // T_n = n * (n + 1) / 2
    const res = (n * (n + 1)) / 2;

    document.getElementById('hc-tn-res-val').innerText = res.toLocaleString('tr-TR');
    document.getElementById('hc-ucgensel-sayi-result').classList.add('visible');
}
