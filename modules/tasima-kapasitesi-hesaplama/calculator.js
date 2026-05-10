function hcTaşımaKapasitesiHesapla() {
    const resource = parseFloat(document.getElementById('hc-cc-resource').value);
    const consumption = parseFloat(document.getElementById('hc-cc-consumption').value);
    const regen = parseFloat(document.getElementById('hc-cc-regen').value) / 100;

    if (!resource || !consumption) return;

    // Sürdürülebilir kapasite: Yıllık yenilenen miktar / Kişi başı yıllık tüketim
    const annualRegen = resource * regen;
    const capacity = annualRegen / consumption;

    document.getElementById('hc-cc-val').innerText = Math.floor(capacity).toLocaleString('tr-TR') + ' Kişi';
    document.getElementById('hc-cc-result').classList.add('visible');
}
