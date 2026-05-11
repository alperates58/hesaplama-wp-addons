function hcMriSarHesapla() {
    const power = parseFloat(document.getElementById('hc-mri-power').value);
    const mass = parseFloat(document.getElementById('hc-mri-mass').value);

    if (isNaN(power) || isNaN(mass) || mass <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // SAR = Power / Mass
    const sar = power / mass;

    document.getElementById('hc-mri-res-total').innerText = sar.toLocaleString('tr-TR', { maximumFractionDigits: 3 });
    
    const limit = document.getElementById('hc-mri-limit');
    if (sar > 4) {
        limit.innerText = "Sınır Değer Aşımı: Tüm vücut için 4 W/kg limitinin üzerindedir.";
        limit.style.color = "#e74c3c";
    } else if (sar > 2) {
        limit.innerText = "Yüksek Seviye: 2-4 W/kg arası kontrollü izleme gerektirir.";
        limit.style.color = "#f39c12";
    } else {
        limit.innerText = "Normal Seviye: 2 W/kg altı güvenli çalışma aralığıdır.";
        limit.style.color = "#2ecc71";
    }

    document.getElementById('hc-mri-result').classList.add('visible');
}
