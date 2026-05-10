function hcYumurtaVerimiHesapla() {
    const eggs = parseFloat(document.getElementById('hc-yv-eggs').value);
    const hens = parseInt(document.getElementById('hc-yv-hens').value);

    if (!eggs || !hens) {
        alert('Lütfen tüm alanları doldurunuz.');
        return;
    }

    const percentage = (eggs / hens) * 100;

    const resVal = document.getElementById('hc-yv-res-val');
    resVal.innerText = percentage.toFixed(1).toLocaleString('tr-TR');

    document.getElementById('hc-yumurta-verimi-result').classList.add('visible');
}
