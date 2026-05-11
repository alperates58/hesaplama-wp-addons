function hcWingLoadingHesapla() {
    const mass = parseFloat(document.getElementById('hc-wl-mass').value);
    const area = parseFloat(document.getElementById('hc-wl-area').value);

    if (isNaN(mass) || isNaN(area) || area <= 0) {
        alert('Lütfen geçerli kütle ve alan değerleri girin.');
        return;
    }

    const loading = mass / area;

    document.getElementById('hc-wl-res-val').innerText = loading.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kg/m²';
    
    let desc = "";
    if (loading < 10) desc = "Planör veya hafif İHA.";
    else if (loading < 50) desc = "Genel havacılık uçağı (Light Aircraft).";
    else if (loading < 250) desc = "Hızlı pervaneli veya ticari uçak.";
    else desc = "Yüksek hızlı jet veya ağır nakliye uçağı.";

    document.getElementById('hc-wl-res-desc').innerText = desc;
    
    document.getElementById('hc-wl-result').classList.add('visible');
}
