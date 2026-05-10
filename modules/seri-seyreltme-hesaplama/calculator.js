function hcSerialDilHesapla() {
    const factor = parseFloat(document.getElementById('hc-sd-factor').value);
    const targetVol = parseFloat(document.getElementById('hc-sd-vol').value);

    if (!factor || !targetVol) {
        alert('Lütfen oran ve hacim bilgilerini giriniz.');
        return;
    }

    // V_stok = V_hedef / (f - 1)
    // Örn: 1/10 seyreltme için (f=10): 9mL su + 1mL stok = 10mL toplam.
    // Bizim formül: f = Toplam / Stok -> Stok = Toplam / f
    const stokVol = targetVol / (factor - 1);
    
    document.getElementById('hc-sd-res-info').innerHTML = `
        Her adımda <strong>${stokVol.toFixed(2).toLocaleString('tr-TR')} mL</strong> stok/örneği, 
        <strong>${targetVol.toFixed(2).toLocaleString('tr-TR')} mL</strong> seyrelticiye (su/tampon) ekleyin.
    `;

    document.getElementById('hc-serial-dil-result').classList.add('visible');
}
