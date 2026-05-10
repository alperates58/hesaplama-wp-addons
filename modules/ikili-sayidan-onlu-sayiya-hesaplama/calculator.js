function hcBinToDecHesapla() {
    const bin = document.getElementById('hc-bd-bin').value.trim();

    if (!/^[01]+$/.test(bin)) {
        alert('Lütfen geçerli bir ikili sayı giriniz.');
        return;
    }

    const dec = parseInt(bin, 2);

    document.getElementById('hc-bd-res-val').innerText = dec.toLocaleString('tr-TR');
    document.getElementById('hc-bin-dec-result').classList.add('visible');
}
