function hcAgacFaydaHesapla() {
    const count = parseFloat(document.getElementById('hc-benefit-tree-count').value);

    if (isNaN(count) || count <= 0) {
        alert('Lütfen geçerli bir ağaç sayısı giriniz.');
        return;
    }

    // 2026 Verileri:
    // 1 Olgun ağaç günde ortalama 2-4 kişinin oksijenini üretir.
    // 1 Ağaç yıllık ~10 klima gücünde soğutma etkisi sağlar (~150-200 kWh).
    // 1 Ağaç yıllık ~15.000 litre suyu tutabilir/filtreleyebilir.

    const oxygen = count * 2.5; // kişi/gün
    const cooling = count * 180; // kWh/yıl
    const water = count * 15000; // L/yıl

    document.getElementById('hc-res-oxygen').innerText = oxygen.toLocaleString('tr-TR') + ' kişi/gün';
    document.getElementById('hc-res-cooling').innerText = cooling.toLocaleString('tr-TR') + ' kWh/yıl';
    document.getElementById('hc-res-water').innerText = water.toLocaleString('tr-TR') + ' Litre/yıl';
    
    document.getElementById('hc-agac-fayda-result').classList.add('visible');
}
